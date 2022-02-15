<?php 
session_start();
include 'koneksi.php';
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
    <title>Obat Mata</title>
    <?php include 'component.php' ?>
</head>
<body>
    <?php include 'header.php'?>
    <div class="container">
		<br></br>
		<div class="mata">
            <div align="center">
                <h1>Obat Mata</h1>
			</div>
		</div>
		<br><br>
		<div class="row">
			<?php $ambil=$koneksi->query("SELECT * FROM obat where kategori=3"); ?>
			<?php while($perproduk=$ambil->fetch_assoc()){ ?>
				<!-- <?php
				echo "<pre>";
			      print_r($perproduk);
			      echo "</pre>";
				 ?> -->
			<div class="col-md-3">	
				<div class="thumbnail ">
					<img src="assets/obat/<?php echo $perproduk ['foto']; ?>" style="width: 70%;">
					<div class="caption">
						<h4><?php echo $perproduk ['nama'] ?></h4>
						<h5>Rp <?php echo number_format($perproduk ['harga']) ?></h5>
						<a href="beli.php?id=<?php echo $perproduk['id'];?>" class="btn btn-primary">Beli</a>
					</div>
				</div> <br>
			</div>
			<?php } ?>
		</div>	
	</div><br><br>
	<?php include 'footer.php'?>
</body>
</html>