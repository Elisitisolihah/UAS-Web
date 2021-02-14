<?php
include 'koneksi.php';

if (isset($_SESSION['id']) == 0) {
    header('Location: login.php');
}


$id = $_GET['id'];
$data = $conn->prepare("SELECT * FROM companies WHERE id_company = $id");
$data->execute();
$companies = $data->fetch();

$id_user = $_SESSION['id'];
$data = $conn->prepare("SELECT username FROM user WHERE id_user =$id_user");
$data->execute();
$user = $data->fetch();

$data = $conn->prepare('SELECT * FROM detail INNER JOIN companies ON detail.id_company = companies.id_company WHERE companies.id_company = :id');
$data->bindParam(':id', $id);
$data->execute();
$details = $data->fetchAll();



?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Halaman Detail</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="halaman-menu-utama.php">UAS</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="halaman-menu-utama.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="form-edit-profile.php">Ubah Profile</a>
                </li>
                <li>
                    <a href="form-add-company.php" class="nav-link">Add Company</a>
                </li>
            </ul>
            <p class="font-weight-bold">Hi, <?php echo $user['username'] ?></p>
            <a href="logout.php" class="btn btn-danger ml-3">Logout</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <img class="card-img-top" src="image/<?php echo $companies['image'] ?>" height="350px" width="100%">
            </div>
            <div class="col-md-8">
                <?php if ($companies) { ?>
                    <a href="form-edit-company.php?id=<?php echo $id ?>" class="btn btn-primary " style="float: right;">UPDATE</a>
                    <h1><?php echo $companies['company_name'] ?></h1>
                    <h5 class="mt-5">About :</h5>
                    <p><?php echo $companies['about'] ?></p>
                <?php } ?>
                <div class="col-md-13">
                    <h2 style="color: orangered;">COMPANY INFORMATION <a href="form-add-detail.php?id=<?php echo $id ?>" class="btn btn-success btn-sm" style="float: right;">ADD INFORMATION</a></h2>

                    <?php if ($details > 0) { ?>
                        <?php foreach ($details as $detail) { ?>
                            <h3><?php echo $detail['tittle'] ?></h3>
                            <div style="float: right;">
                                <a href="form-edit-detail.php?id=<?php echo $detail['id_detail'] ?>&id_company=<?php echo $id ?>" class="btn btn-warning btn-sm">UPDATE</a>
                                <a href="deleteDetail.php?id=<?php echo $detail['id_detail'] ?>&id_company=<?php echo $id ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">DELETE</a>
                            </div>
                            <p><?php echo $detail['desc'] ?></p>
                            <hr>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
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