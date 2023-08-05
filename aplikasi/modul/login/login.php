<?php 
session_start();
include"../../config/database.php";

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="login">
        <h1 class="login-text">Login</h1>
        <form class="form-login" action="" method="POST">
            <label class="label-login" for="username">Username</label>
            <input class="input-login" type="text" id="username" name="username" placeholder="Enter your username" autocomplete="off" required>
  
            <label class="label-login" for="password">Password</label>
            <input class="input-login" type="password" id="password" name="password" placeholder="Enter your password" autocomplete="off" required>
  
            <button name="login" class="btn-login" type="submit">Login</button>
        </form>
    </div>

</body>
</html>

<?php 

if (isset($_POST['login'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");

    // cek username
    if ( mysqli_num_rows($result) === 1 ) {
        // cek password
        $row = mysqli_fetch_assoc($result);

        if ( $password == $row['password'] ) {
            // set session
            $_SESSION['login'] = true;

            echo "<script>
              Swal.fire({
                  title: 'Berhasil login !',
                  text: 'Selamat datang $username',
                  width: '40%',
                  icon: 'success',
                  iconColor: 'rgb(27, 199, 133)',
                  showConfirmButton: false,
                  allowEnterKey: false,
                  allowEscapeKey: false,
                  allowOutsideClick: false,
              });

              setTimeout(function(){
                  window.location.href='../../../index.php';
              }, 1500);
                 </script>";
            exit;
        }

        else{
            echo "
            <script>
                Swal.fire({
                    width: '40%',
                    position: 'center',
                    icon: 'error',
                    iconColor: 'rgb(255, 0, 0)',
                    title: 'Password Salah !',
                    text: 'Periksa kembali password yang anda inputkan !',
                    showConfirmButton: false,
                    allowEnterKey: false,
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    showCloseButton: true,
                });
            </script>
            ";
        }
    }

    else if(mysqli_num_rows($result) === 0 ) {

     echo "
            <script>
                Swal.fire({
                icon: 'error',
                iconColor: 'red',
                title: 'Username tidak ada!',
                text: 'Pastikan username yang Anda Masukkan Benar',
                showConfirmButton: false,
                timer: 1700,
                allowEnterKey: false,
                allowEscapeKey: false,
                allowOutsideClick: false,
                })
            </script>
            ";
        }   
    }

 ?>