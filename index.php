<?php 
session_start();

if (!isset($_SESSION['login']) ) {
    header("Location: aplikasi/modul/login/login.php");
    exit;
}



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php

    if ($_GET['page'] == 'home') {
        echo "Home";
    }
    elseif ($_GET['page'] == 'alternatif') {
        echo "Alternatif";
    }
    elseif ($_GET['page'] == 'kriteria') {
        echo "Kriteria";
    }
    elseif ($_GET['page'] == 'oreste') {
        echo "Oreste";
    }
    elseif ($_GET['page'] === 'about') {
        echo "About";
    }
    elseif ($_GET['page'] == 'laporan') {
        echo "Laporan";
    }

     ?></title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $stylesheet; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="assets/js/jquery.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="nm">
        <div class="nav">
            <h1 class="header-menu">Menu</h1>
            <hr>
            <ul>
                <li class="<?php if ($_GET['page'] == 'home') echo"aktif"; ?>"><a href="./?page=home">Home</a></li>
                <li class="<?php if ($_GET['page'] == 'alternatif') echo"aktif"; ?>"><a href="./?page=alternatif">Alternatif</a></li>
                <li class="<?php if ($_GET['page'] == 'kriteria') echo"aktif"; ?>"><a href="./?page=kriteria">Kriteria</a></li>
                <li class="<?php if ($_GET['page'] == 'oreste') echo"aktif"; ?>"><a href="./?page=oreste">Oreste</a></li>
                <li class="<?php if ($_GET['page'] == 'about') echo"aktif"; ?>"><a href="./?page=about">About</a></li>
                <li class="<?php if ($_GET['page'] == 'laporan') echo"aktif"; ?>"><a href="./?page=laporan">Laporan</a></li>
            </ul>
            <hr class="hr-1">
            <h2 class="logout">Logout</h2>
            <hr class="hr-1">
            <button class="logout-btn" onclick="logout()">Logout</button>
        </div>
        <div class="main">
            <div class="header">
                <h2 class="main-header"><a href="./?page=home">Home</a></h2>
                <hr class="hr-2">
            </div>

            <main>
    <?php
    include"aplikasi/config/database.php";
    $page = isset($_GET['page']) ? $_GET['page'] : '';
    $act = isset($_GET['act']) ? $_GET['act'] : '';
    if(!empty($page)){
        if (!empty($act)) {
            if (file_exists("aplikasi/modul/".$page."/".$act.".php")) {
                require("aplikasi/modul/".$page."/".$act.".php");
            }else{
                echo "Maaf, Modul ini tidak tersedia !";
            }
        }else{
            if (file_exists("aplikasi/modul/".$page."/view.php")) {
                require("aplikasi/modul/".$page."/view.php");
            }else{
                echo "Maaf, Modul ini tidak tersedia !";
            }
            
        }
    }
    // Router

    else{
        echo "<script>window.location.href='./?page=home'</script>";
    }
    ?>

</main>

            <div class="footer">
                <hr class="hr-2">
                <p class="footer-text">Copyright &copy; 2023 PKL AU & HF. All rights reserved.</p>
            </div>
        </div>
    </div>
    
</body>
</html>

<script>
    function logout() {
        Swal.fire({
            title: 'Konfirmasi logout ?',
            icon: 'warning',
            iconColor: 'orange',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonColor: 'rgb(255, 0, 0)',
            cancelButtonText: 'Tidak',
            confirmButtonColor: 'rgb(42, 89, 227)',
            allowEnterKey: false,
            allowEscapeKey: false,
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    width: '35%',
                    position: 'center',
                    icon: 'success',
                    iconColor: 'rgb(27, 199, 133)',
                    title: 'Berhasil logout !',
                    text: 'Tunggu sebentar...',
                    showConfirmButton: false,
                    allowEnterKey: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                });
                setTimeout(function() {
                    window.location.href = 'aplikasi/modul/login/logout.php';
                }, 1500);
            }
        })
    }
</script>

