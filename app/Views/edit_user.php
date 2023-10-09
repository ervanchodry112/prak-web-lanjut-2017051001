<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid" style="height: 100vh; background-color: #9D76C1;">
   <form class="container" action="<?= base_url('/user/' . $user['id']) ?>" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_method" value="PUT">
      <?= csrf_field() ?>
      <div class="pt-5">
         <h1 class="text-white">Create User</h1>
         <?= $validation->listErrors() ?>
         <hr>
         <div class="row">
            <div class="col-">
               <img src="<?= $user['foto'] ?? 'https://images.unsplash.com/photo-1481349518771-20055b2a7b24?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cmFuZG9tfGVufDB8fDB8fHww&w=1000&q=80' ?>" width="300px" alt="">
            </div>
         </div>
         <div class="mb-3 row d-flex align-items-center">
            <div class="col-1">
               <label for="foto" class="form-label text-white fs-4">Foto</label>
            </div>
            <div class="col-11">

               <input type="file" name="foto" id="foto" class="form-control <?= $validation->hasError('foto') ? 'is-invalid' : '' ?>">
            </div>
         </div>
         <div class="form-floating mb-3">
            <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : '' ?>" name="nama" value="<?= $user['nama'] ?>" id="nama" placeholder="Nama Lengkap">
            <label for="floatingInput">Nama lengkap</label>
            <div class="invalid-feedback">
               <?= $validation->getError('nama') ?>
            </div>
         </div>
         <div class="form-floating mb-3">
            <input type="text" class="form-control" name="npm" id="npm" value="<?= $user['npm'] ?>" placeholder="NPM">
            <label for="floatingInput">NPM</label>
         </div>
         <div class="row mb-3">
            <div class="col-1 fs-4 text-white">
               Kelas
            </div>
            <div class="col-11">
               <select class="form-select" name="kelas" aria-label="Default select example">
                  <?php
                  foreach ($kelas as $item) {
                  ?>
                     <option value="<?= $item['id'] ?>" <?= $user['id_kelas'] == $item['id'] ? 'selected' : '' ?>>
                        <?= $item['nama_kelas'] ?>
                     </option>
                  <?php
                  }
                  ?>
               </select>
            </div>
         </div>
         <div class="row mb-3">
            <div class="col-4">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </div>
      </div>
   </form>

</div>
<?= $this->endSection() ?>