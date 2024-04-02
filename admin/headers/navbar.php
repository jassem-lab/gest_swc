<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$logname = $_SESSION['user'] ; 
if (!isset($_SESSION['user'])) {
    header('location:../admin.php');
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swc";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$mail = "";
$url = "";
$Signature = "";
$nom = "";
$logo = "";
$tel1 = "";
$tel2 = "";

$adresse = "";
$facebook = "";
$instagram = "";
$youtube = "";


$req = "select * from swc_param where id = 1";
$query = mysqli_query($conn, $req);
while ($enreg = mysqli_fetch_array($query)) {
    $mail = $enreg["mail"];
    $url = $enreg["url"];
    $signature = $enreg["signature"];
    $nom = $enreg["nom"];
    $logo = $enreg["logo"];
    $tel1 = $enreg["tel1"];
    $tel2 = $enreg["tel2"];
    $adresse = $enreg["adresse"];
    $facebook = $enreg["facebook"];
    $instagram = $enreg["instagram"];
    $youtube = $enreg["youtube"];

}

?>

<head>
    <meta charset="utf-8" />
    <title> Smart Way Consulting - Admin & Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Jassem Gaaloul" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/swc.jpg">

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="assets/vendor/daterangepicker/daterangepicker.css">

    <!-- Vector Map css -->
    <link rel="stylesheet" href="assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>

    <!-- App css -->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Topbar Start ========== -->
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="index.html" class="logo-light">
                            <span class="logo-lg">
                                <img src="assets/images/swc.jpg" alt="logo">
                            </span>
                            <span class="logo-sm">
                                <img src="assets/images/swc.jpg" alt="small logo">
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="index.html" class="logo-dark">
                            <span class="logo-lg">
                                <img src="assets/images/swc.jpg" alt="dark logo">
                            </span>
                            <span class="logo-sm">
                                <img src="assets/images/swc.jpg" alt="small logo">
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <!-- Page Title -->
                    <h4 class="page-title d-none d-sm-block">Dashboards</h4>
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="account-user-avatar">
                                <img src="assets/images/swc.png" alt="user-image" width="32" class="rounded-circle">
                            </span>
                            <span class="d-lg-block d-none">
                                <h5 class="my-0 fw-normal"><?php echo  $_SESSION['user'] ?><i
                                        class="ri-arrow-down-s-line fs-22 d-none d-sm-inline-block align-middle"></i>
                                </h5>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="pages-profile.html" class="dropdown-item">
                                <i class="ri-account-pin-circle-line fs-16 align-middle me-1 "></i>
                                <span>My Account</span>
                            </a>
                            <!-- item-->
                            <a href="logout.php" class="dropdown-item">
                                <i class="ri-logout-circle-r-line align-middle me-1"></i>
                                <span>Log out</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ========== Topbar End ========== -->

        <!-- Left Sidebar Start -->
        <div class="leftside-menu">

            <!-- Logo Light -->
            <a href="index.html" class="logo logo-light">
                <span class="logo-lg">
                    <h1 style="color : white ; font-size : 15px ; padding : 30px ">Smart Way Consulting Center</h1>
                </span>
                <span class="logo-sm">
                    <!-- <img src="assets/images/logo-sm.png" alt="small logo"> -->
                </span>
            </a>

            <!-- Logo Dark -->
            <a href="index.html" class="logo logo-dark">
                <span class="logo-lg">
                    <!-- <img src="assets/images/logo-dark.png" alt="dark logo"> -->
                </span>
                <span class="logo-sm">
                    <!-- <img src="assets/images/logo-sm.png" alt="small logo"> -->
                </span>
            </a>

            <!-- Sidebar -->
            <div data-simplebar>
                <ul class="side-nav">
                    <li class="side-nav-title">Gestion de Centre</li>

                    <li class="side-nav-item">
                        <a href="index.php" class="side-nav-link">
                            <i class="ri-dashboard-2-line"></i>
                            <span> Dashboard </span>

                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="calendar.php" class="side-nav-link">
                            <i class="ri-calendar-line"></i>
                            <span> Calendar</span>

                        </a>
                    </li>


                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false"
                            aria-controls="sidebarPagesAuth" class="side-nav-link">
                            <i class="ri-account-circle-line"></i>
                            <span> Tables de base </span>
                            <span class="menu-arrow"></span>

                        </a>
                        <div class="collapse" id="sidebarPagesAuth">
                            <ul class="side-nav-second-level">
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="gestcours.php">Gestion des Cours</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="gesteleve.php">Gestion des Eleves</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="gestprofs.php">Gestion des Enseignants</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="gestsalles.php">Gestion des Salles</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="geststock.php">Gestion de Stock</a>
                                </li>
                                <!-- <li class="side-nav-item">
                                    <a class="side-nav-link" href="gestprix.php">Gestion des Prix</a>
                                </li> -->
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPagesAuths" aria-expanded="false"
                            aria-controls="sidebarPagesAuths" class="side-nav-link">
                            <i class="ri-account-circle-line"></i>
                            <span> Suivi des présences </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarPagesAuths">
                            <ul class="side-nav-second-level">
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="Presence.php">Présence</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="Paiement.php">Paiement</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="Facturation.php">Facturation</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false"
                            aria-controls="sidebarPagesAuth" class="side-nav-link">
                            <i class="ri-account-circle-line"></i>
                            <span> Authentication </span>
                            <span class="menu-arrow"></span>

                        </a>
                        <div class="collapse" id="sidebarPagesAuth">
                            <ul class="side-nav-second-level">
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="auth-login.html"></a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="auth-register.html">Register</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="auth-logout.html">Logout</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="auth-forgotpw.html">Forgot Password</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="auth-lock-screen.html">Lock Screen</a>
                                </li>

                            </ul>
                        </div>
                    </li> -->

                    <li class="side-nav-title">Site Web</li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false"
                            aria-controls="sidebarPages" class="side-nav-link">
                            <i class="ri-stack-line"></i>
                            <span> Pages </span>
                            <span class="menu-arrow"></span>

                        </a>
                        <div class="collapse" id="sidebarPages">
                            <ul class="side-nav-second-level">
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="pages-starter.html">Paramètres</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="pages-contact-list.html">Offres</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="pages-profile.html">Sliders</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="pages-timeline.html">Les Cours</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="pages-faq.html">Promotions</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="pages-pricing.html">A Propos</a>
                                </li>
                                <li class="side-nav-item">
                                    <a class="side-nav-link" href="pages-maintenance.html">Maintenance</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Left Sidebar End -->