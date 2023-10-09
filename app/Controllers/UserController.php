<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\UserModel;
use Config\Services;

class UserController extends BaseController
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_users', $data);
    }

    public function show($id)
    {
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user'  => $user,
        ];

        return view('profile', $data);
    }

    public function create()
    {
        $kelas = $this->kelasModel->getKelas();

        if (session('validation') != null) {
            $validation = session('validation');
        } else {
            $validation = Services::validation();
        }


        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
            'validation' => $validation,
        ];


        return view('create_user', $data);
    }

    public function store()
    {
        $rules = [
            'nama'  => 'required',
            'npm'   => 'required',
            'kelas' => 'required',
        ];
        if (!$this->validate($rules)) {

            $validation = Services::validation();

            return redirect()->to(base_url('user/create'))->withInput()->with('validation', $validation);
        }

        $path = 'assets/uploads/img/';

        $foto = $this->request->getFile('foto');

        $name = $foto->getRandomName();

        if ($foto->move($path, $name)) {
            $foto = base_url($path . $name);
        }

        $this->userModel->saveUser([
            'nama'      => $this->request->getVar('nama'),
            'id_kelas'  => $this->request->getVar('kelas'),
            'npm'       => $this->request->getVar('npm'),
            'foto'      => $foto
        ]);

        return redirect()->to('/user');
    }

    public function edit($id)
    {
        $user = $this->userModel->getUser($id);
        $kelas = $this->kelasModel->getKelas();

        if (session('validation') != null) {
            $validation = session('validation');
        } else {
            $validation = Services::validation();
        }

        $data = [
            'title' => 'Edit User',
            'user'  => $user,
            'kelas' => $kelas,
            'validation'    => $validation,
        ];

        return view('edit_user', $data);
    }

    public function update($id)
    {
        $path = 'assets/uploads/img/';

        $foto = $this->request->getFile('foto');

        if ($foto->isValid()) {
            $name = $foto->getRandomName();

            if ($foto->move($path, $name)) {
                $foto_path = base_url($path . $name);
            }
        }

        $data = [
            'nama'      => $this->request->getVar('nama'),
            'id_kelas'  => $this->request->getVar('kelas'),
            'npm'       => $this->request->getVar('npm'),
            'foto'      => $foto_path
        ];

        $result = $this->userModel->updateUser($data, $id);

        if (!$result) {
            return redirect()->back()->withInput()->with('error', 'Gagal Menyimpan data');
        }

        return redirect()->to('/user');
    }

    public function destroy($id)
    {
        $result = $this->userModel->deleteUser($id);

        if (!$result) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }

        return redirect()->to(base_url('/user'))->with('success', 'Berhasil menghapus data');
    }
}
