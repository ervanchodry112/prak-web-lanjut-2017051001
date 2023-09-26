<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container-fluid" style="height: 100vh; background-color: #9D76C1;">
   <form class="container" action="<?= base_url('/user/store') ?>" method="POST">
      <div class="pt-5">
         <h1 class="text-white">Create User</h1>
         <?= $validation->listErrors() ?>
         <hr>
         <div class="form-floating mb-3">
            <input type="text" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : '' ?>" name="nama" value="<?= old('nama') ?>" id="nama" placeholder="Nama Lengkap">
            <label for="floatingInput">Nama lengkap</label>
            <div class="invalid-feedback">
               <?= $validation->getError('nama') ?>
            </div>
         </div>
         <div class="form-floating mb-3">
            <input type="text" class="form-control" name="npm" id="npm" placeholder="NPM">
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
                     <option value="<?= $item['id'] ?>"><?= $item['nama_kelas'] ?></option>
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