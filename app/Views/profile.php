<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container">
   <div class="w-100 d-grid border gap-2" style="height: 100vh; place-content: center;">
      <div class="w-50 text-center border mx-auto">
         <img src="<?= $user['foto'] ?? 'https://images.unsplash.com/photo-1481349518771-20055b2a7b24?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cmFuZG9tfGVufDB8fDB8fHww&w=1000&q=80' ?>" width="100%" height="100%" alt="">
      </div>
      <div class="w-100 text-bg-warning px-5 rounded py-2 fs-5 text-center"><?= $user['nama'] ?></div>
      <div class="w-100 text-bg-warning px-5 rounded py-2 fs-5 text-center"><?= $user['npm'] ?></div>
      <div class="w-100 text-bg-warning px-5 rounded py-2 fs-5 text-center"><?= $user['nama_kelas'] ?></div>
   </div>
</div>
<?= $this->endSection() ?>