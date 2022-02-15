<?php 
session_start();
$koneksi = new mysqli("localhost","root","","apotikmcb");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php include 'component.php' ?>
        <style>
        body {
          background-image: url('assets/login.png');
          background-repeat: no-repeat;
          background-attachment: fixed;
          background-size: cover;
        }
        </style>
</head>
<body>
    <script>
    swal("Good job!", "You clicked the button!", "success");
    </script>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Apotek MCB</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
              </li>
            </ul>
            
            <form action="cari.php" method="get" class="navbar-form navbar-right d-flex">
            <a class="nav-link" aria-current="page" href="Login.php">Login</a>
            <a class="nav-link" aria-current="page" href="register.php">Daftar</a>
            </form>
          </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col"><br><br><br>
            <h3>Selamat Datang di Website
                Apotek MCB </h3>
                <br>
                <p>Apotek MCB adalah salah satu apotek online yang dapat membantu anda dalam 
                    pembelian obat jarak jauh. Tidak perlu waktu lama untuk proses pembelian, 
                    dapat memilih beberapa jenis pembayaran dan jenis pengiriman dengan cepat 
                    dan tepat sampai ke tempat tujuan.</p>
            </div>
            <div class="col">
                <br><br><br>
                <form method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Username</label>
                      <input type="text" class="form-control" placeholder="Masukkan Username" name="username">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control"  placeholder="Masukkan Password" name="password">
                    </div>
                    <p>Belum Punya Akun ? Daftar <a href="register.php">Disini</a></p>
                    <button type="submit" class="btn btn-primary" name="button">Login</button><br><br> 
                </form>
                <?php   
                  if (isset($_POST['button']) ) {
                          
                              $sql = "SELECT * FROM user WHERE username='$_POST[username]' AND password = '$_POST[password]'";
                              $hasil = mysqli_query ($koneksi,$sql);
                              $jumlah = mysqli_num_rows($hasil);

                              if ($jumlah>0) {
                                $row = mysqli_fetch_assoc($hasil);
                                $_SESSION["id"]=$row["id"];
                                $_SESSION["username"]=$row["username"];
                                $_SESSION["alamat"]=$row["alamat"];
                                $_SESSION["email"]=$row["email"];
                                $_SESSION["tipe"]=$row["tipe"];
                            
                                $_SESSION['user']=$row;
                                if ($_SESSION["tipe"]=$row["tipe"]==1){
                                  echo "<script>alert('Login Sukses')</script>";
                                  header("Location:index.php");
                                }
                                else if ($_SESSION["tipe"]=$row["tipe"]==2){
                                  echo "<script>alert('Login Sebagai Admin Sukses')</script>";
                                  header("Location:admin/kelolaaplikasi.php");
                                }
                            
                                
                              }
                              else {
                                echo "<div class='alert alert-danger'>
                                <strong>Error!</strong> Username dan password salah. 
                                </div>";
                              }
                            } 
                ?>
            </div>
          </div>    
    </div>
</body>
</html>