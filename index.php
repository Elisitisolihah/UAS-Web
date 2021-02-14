<?php

include 'koneksi.php';

$data = $conn->prepare('SELECT * FROM companies');
$data->execute();
$companies = $data->fetchAll();

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <title>Halaman Utama</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">UAS</a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.php">Home </a>
        </li>
      </ul>
      <div class="d-flex">
        <a href="register.php" class="btn btn-success mr-5">Register</a>
        <a href="login.php" class="btn btn-primary">Login</a>
      </div>
    </div>
  </nav>
  <!--  -->
  <div class="container">

    <?php if ($companies > 0) { ?>
      <!-- <div class="card-deck mt-5"> -->
      <div class="row">
        <?php for ($i = 0; $i < count($companies); $i++) { ?>
          <div class="col-sm-4 mt-3">
            <div class="card">
              <?php if (isset($companies[$i])) { ?>

                <img class="card-img-top" src="image/<?php echo $companies[$i]['image'] ?>" height="350px" width="100%">
                <div class="card-body">
                  <a href="#" class="card-title h5"><?php echo $companies[$i]['company_name'] ?></a>
                  <p class="card-text"><?php echo $companies[$i]['about'] ?></p>
                  <a href="page-detail.php?id=<?php echo $companies[$i]['id_company'] ?>" class="btn btn-primary">Detail</a>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>

  </div>
  <hr>
  <div class="row ">
    <div class="col-md-12 text-center">
      <p class="font-weight-bold">@Copyright by 18111042_EliSitiSolihah_TIFRP18CNSA_UASWEB1</p>
    </div>
  </div>
</body>
<script src="js/bootstrap.bundle.min.js"></script>

</html>