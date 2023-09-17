<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Create User</title>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>
   <div class="container-fluid" style="height: 100vh; background-color: #9D76C1;">
      <form class="container" action="<?= base_url('/user/store') ?>" method="POST">
         <div class="pt-5">
            <h1 class="text-white">Create User</h1>
            <hr>
            <div class="form-floating mb-3">
               <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
               <label for="floatingInput">Nama lengkap</label>
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


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>