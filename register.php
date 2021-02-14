<?php
include 'koneksi.php';

if (isset($_POST['Registrasi'])) {

   $username = $_POST['username'];
   $password = $_POST['password'];
   $email = $_POST['email'];

   $data = $conn->prepare('INSERT INTO user (username,password,email) VALUES (?, ?, ?)');

   $data->bindParam(1, $username);
   $data->bindParam(2, $password);
   $data->bindParam(3, $email);
   $data->execute();
   echo "<script>alert('Registrasi Berhasil');</script>";
}
?>

<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">

   <title>Halaman Registrasi</title>
</head>

<body class="bg-dark">
   <div class="container mt-5">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="card text-center">
               <div class="card-header">
                  Registrasi
               </div>
               <div class="card-body justify-content-center">

                  <form method="POST">
                     <div class="row justify-content-center">

                        <div class="col-md-8">

                           <div class="form-group">
                              <label for="exampleInputEmail1">Username</label>
                              <input type="text" class="form-control" name="username" id="username">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail2">Email address</label>
                              <input type="text" class="form-control" name="email" id="email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control" name="password" id="password">
                           </div>
                           <p>Punya akun ? <a href="login.php">Login</a></p>
                           <div class="d-flex justify-content-around">
                              <a class="btn btn-secondary btn-lg" href="page-utama.php">Back</a>
                              <button type="submit" id="Registrasi" name="Registrasi" class="btn btn-success">Registrasi</button>
                           </div>
                        </div>
                     </div>

                  </form>
               </div>

               <div class="card-footer text-muted">
                  @Copyright by 18111042_EliSitiSolihah_TIFRP18CNSA_UASWEB1
               </div>
            </div>
         </div>
      </div>
   </div>



</body>
<script src="js/bootstrap.bundle.min.js"></script>

</html>