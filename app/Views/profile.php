<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>

<body>
   <div class="container">
      <div class="w-100 d-grid border gap-2" style="height: 100vh; place-content: center;">
         <div class="w-50 text-center border mx-auto">
            <img src="https://images.unsplash.com/photo-1481349518771-20055b2a7b24?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cmFuZG9tfGVufDB8fDB8fHww&w=1000&q=80" width="100%" height="100%" alt="">
         </div>
         <div class="w-100 text-bg-warning px-5 rounded py-2 fs-5 text-center"><?= $nama ?></div>
         <div class="w-100 text-bg-warning px-5 rounded py-2 fs-5 text-center"><?= $npm ?></div>
         <div class="w-100 text-bg-warning px-5 rounded py-2 fs-5 text-center"><?= $kelas ?></div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>