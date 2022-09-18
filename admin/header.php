<!DOCTYPE html>
<html lang="tr">
<?php 
ob_start();
session_start();
include "baglan.php";

$kullanicisor=$db->prepare("SELECT * FROM kullanicilar where kullanici_mail=:mail and kullanici_yetki=:yetki");
$kullanicisor->execute(array(
'mail'=> $_SESSION['kullanici_mail'],
'yetki'=> 2
));
$say = $kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);


if($say == 0){
    header("Location:login.php?giris=basarisiz");
    exit;
  }
  
  





?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Yönetici Paneli</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/a.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="images/favicon.png" />

</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="index.php">
                        <b style="font-size: 22px;">Yönetici Panel</b>
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.php">
                        <img src="images/logo-mini.svg" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">Hoş Geldin, <span class="text-black fw-bold"><?php echo $kullanicicek['kullanici_adsoyad']; ?></span></h1>

                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">




                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="images/faces/face2.jpg" alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="images/faces/face2.jpg" alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold"><?php echo $kullanicicek['kullanici_adsoyad']; ?></p>
                                <p class="fw-light text-muted mb-0"><?php echo $kullanicicek['kullanici_mail']; ?></p>
                            </div>
                            <a class="dropdown-item" href="urunekle.php"><i class="mdi mdi-grid-large mdi-plus-box" ></i> Ürün Ekle</a>
                            <a class="dropdown-item" href="urunlistele.php"><i class="mdi mdi-view-list"></i> Ürün Listele</a>
                            <a class="dropdown-item" href="kullanicilar.php"><i class="mdi mdi-account-multiple"></i> Kullanıcılar</a>
                            <a class="dropdown-item" href="cikisyap.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Çıkış Yap</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Anasayfa</span>
                        </a>
                    </li>



                    <li class="nav-item nav-category">Ürün Ekle Ve Listele</li>
                    <li class="nav-item">
                        <a class="nav-link" href="urunekle.php">
                            <i class="mdi mdi-grid-large mdi-plus-box" style="font-size:20px ;"> </i>
                            <span class="menu-title" style="margin-left:10px;"> Ürün Ekle</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="urunlistele.php">
                            <i class="mdi mdi-view-list" style="font-size:20px ;"> </i>
                            <span class="menu-title" style="margin-left:10px;"> Ürün Listele</span>
                        </a>
                    </li>
                    <li class="nav-item nav-category">Kullanıcılar</li>
                    <li class="nav-item">
                        <a class="nav-link" href="kullanicilar.php">
                            <i class="mdi mdi-account-multiple" style="font-size:20px ;"> </i>
                            <span class="menu-title" style="margin-left:10px;">Kullanıcılar</span>
                        </a>
                    </li>
                </ul>
            </nav>