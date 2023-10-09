<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="w-100 container pt-5">

   <div class="row">
      <div class="col-6">
         <a href="<?= base_url('user/create') ?>">Tambah Data</a>
      </div>
   </div>

   <div class="row">

      <div class="col-12">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Nama</th>
                  <th>NPM</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $i = 1;
               foreach ($users as $user) {
               ?>
                  <tr>
                     <td><?= $i++ ?></td>
                     <td><?= $user['nama'] ?></td>
                     <td><?= $user['npm'] ?></td>
                     <td><?= $user['nama_kelas'] ?></td>
                     <td>
                        <a href="<?= base_url('/user/' . $user['id']) ?>">Detail</a>
                        <a href="<?= base_url('/user/' . $user['id'] . '/edit') ?>">Edit</a>
                        <form action="<?= base_url('user/' . $user['id']) ?>" method="post">
                           <input type="hidden" name="_method" value="DELETE">
                           <?= csrf_field() ?>
                           <button type="submit">Delete</button>
                        </form>
                     </td>
                  </tr>
               <?php
               }
               ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<?= $this->endSection() ?>