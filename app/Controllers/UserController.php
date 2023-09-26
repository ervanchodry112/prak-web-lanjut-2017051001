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

    public function profile($nama = '', $kelas = '', $npm = '')
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
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
        d($validation->hasError('nama'));

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

        $this->userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
        ]);

        return redirect()->to('/user');
    }
}
