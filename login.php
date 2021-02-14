<?php
include 'koneksi.php';

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);
  $stmt->execute();
  $id = $stmt->fetch();
  $count = $stmt->rowCount();
  if ($count == 1) {
    $_SESSION['id'] = $id['id_user'];
    header("Location: halaman-menu-utama.php");
    return;
  }
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
  <title>Halaman Login</title>
</head>

<body class="bg-dark">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card text-center">
          <div class="card-header">
            SIGN IN
          </div>
          <div class="card-body justify-content-center">

            <form name="form" method="POST">
              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                  </div>

                  <p>Tidak punya akun ? <a href="register.php">Register</a></p>
                  <div class="d-flex justify-content-around">
                    <a class="btn btn-secondary btn-lg" href="page-utama.php">Back</a>
                    <button type="submit" class="btn btn-success" name="login" id="login">Sign In</button>
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
<script language="javascript">
  var login = document.getElementById("login");
  login.addEventListener("click", () => {
    var username = document.forms["form"]["email"].value;
    var password = document.forms["form"]["password"].value;

    if (!username == "" && !password == "") {
      window.location.replace("login.php");
    } else {
      alert("Email dan password salah!");
    }
  });
</script>

</html>