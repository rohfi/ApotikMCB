<?php
session_start();
$koneksi = new mysqli("localhost","root","","apotikmcb")
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php include 'koneksi.php'?>
    <?php include 'component.php'?>
</head>
<body>
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
            <!-- <input type="text" class="form-control" name="keyword">
			<button class="btn btn-primary">Cari</button> -->
            <a class="nav-link" aria-current="page" href="Login.php">Login</a>
            <a class="nav-link" aria-current="page" href="register.php">Daftar</a>
            </form>
          </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col"><br>
                <form method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Username</label>
                      <input type="text" class="form-control" placeholder="Masukkan Username" name="username">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Email</label>
                      <input type="email" class="form-control" placeholder="Masukkan Email" name="email">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" placeholder="Minimal 8 Karakter" name="onepass">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
                      <input type="password" class="form-control" placeholder="Minimal 8 Karakter" name="secpass">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">No Telepon</label>
                      <input type="number" class="form-control" placeholder="Masukkan Nomor Telepon" name="tlp">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Alamat</label>
                      <textarea class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat Lengkap"></textarea>
                    </div>
                    <p>Sudah Punya Akun? Silakan <a href="login.php">Login</a></p>
                    <button type="submit" class="btn btn-primary" name="register">Submit</button><br><br>
                  </form>
                  <?php
                        if (isset($_POST['register'])) 
                        {
                            $username  = $_POST['username'];
                            $email  = $_POST['email'];
                            $onepass = $_POST['onepass'];
                            $secpass = $_POST['secpass'];
                            $panjang    =strlen($_POST['onepass']);
                            $tlp = $_POST['tlp'];
                            $alamat = $_POST['alamat'];

                            $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM user WHERE email='$email'"));
                            if ($cek > 0){
                                echo "<div class='alert alert-danger'>Email Telah Digunakan</div>";
                                echo "<meta http-equiv='refresh' content='1;url=register.php'>";
                            }else{
                                if($onepass!=$secpass){
                                echo "<div class='alert alert-danger'>Kombinasi Password Berbeda</div>";
                                echo "<meta http-equiv='refresh' content='1;url=register.php'>";
                                }
                                else{
                                    if($panjang<8){
                                        echo "<div class='alert alert-danger'>Password Kurang Dari 8 Karakter</div>";
                                        echo "<meta http-equiv='refresh' content='1;url=register.php'>";
                                    }else{
                                        $mysqli  = "INSERT INTO user (username,email,password,tipe,alamat,telepon) VALUES ('$username','$email','$onepass','1','$alamat','$tlp')";
                                        $result  = mysqli_query($koneksi, $mysqli);
                                        if ($result) {
                                            echo "<script>alert('Pembuatan Akun Berhasil')</script>";
                                            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                                        }
                                        else {
                                            echo "<script>alert('Registrasi Gagal Di Tambah Ke Database Anda !');</script>";
                                                 }
                                         mysqli_close($koneksi);
                                    }
                                }
                            }
                      
                        }
                        ?>
            </div>
            <div class="col"><br>
                <center><h1>Daftar Akun</h1></center>
                <h>Agar anda dapat menggunakan fasilitas Apotek MCB anda harus daftar terlebih dahulu untuk mendapatkan akun. Isi form pendaftaran dengan lengkap dan tepat untuk tujuan  mempermudah saat anda melakukan pembelian.</p>
                <img src="assets/registerr.png" width="500" height="400">
            </div>
        </div>
    </div>
</body>
</html>