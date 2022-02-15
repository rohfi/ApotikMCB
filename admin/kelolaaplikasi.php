<?php
session_start();
include '../koneksi.php';
if (!isset($_SESSION['user']))
{
  echo"<script>alert('anda harus login')</script>";
  echo"<script>location='login.php';</script>";
  header('location:login.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Aplikasi</title>
    <?php include '../component.php' ?>
</head>
<body>
    <?php include 'headeradmin.php'?>
    <br><br>
    <h1><center>Kelola Aplikasi</center></h1>
    <br><br>
    <div class="buton">
        <div align="center" class="container">
         <div class="row justify-content-between">
            <div class="col-2">
                <a href="datauser.php" class="btn btn-primary btn-lg">Data User</a>
            </div>
            <div class="col-3">
                <a href="riwayatadmin.php" class="btn btn-primary btn-lg">Riwayat Pembelian</a>
            </div>
            <div class="col-2">
                <a href="pembayaran.php" class="btn btn-primary btn-lg">Pembayaran</a>
            </div>
            <div class="col-2">
                <a href="pengiriman.php" class="btn btn-primary btn-lg">Pengiriman</a>
            </div>
            <div class="col-2">
                <a href="view.php" class="btn btn-primary btn-lg">Kelola Obat</a>
            </div>
         </div>
        </div><br><br>
    </div>
    <div class="container text-center">  
        <div class="container">
          <div id="bolain">  
            <div class="row">
              <div class="col-md-5">
                  <div class="kolom">
                    <img src="../pict/design/pengaturan.png" class="img-responsive" width="70%">        
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="kolom">
                    <br><br>
                    <p style=" text-left text-indent: 45px;"> 
                        Sebagai admin dapat mengatur dan mengelola Aplikasi untuk kebutuhan yang diperlukan
                        mulai dari menghapus, menambah dan mengubah seluruh data yang terdapat di aplikasi MCB.
                        Utamakan kenyamanan user apabila ingin mengelola aplikasi, 
                        jangan mengubah yang tidak di perlukan.
                    </p>               
                    <p> Stay safe, stay healthy, and stay happy</p>
                  </div>
              </div>
            </div>
          </div>   
        </div>    
      </div>
       
</body>
</html>