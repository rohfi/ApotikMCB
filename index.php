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
    <title>Home</title>
    <?php include 'component.php' ?>
</head>
<body>
    <?php include 'header.php'?>
    <div class="container">
		<br></br>
		<table width=100%>

			<tr bgcolor=#8ec9bb>

				<td colspan=2>
					<div class="row">
						<div align="center" class="col-md-8">
						<div class="kolom">
							<br>
							<h2>Selamat datang di Apotek MCB</h2>

							<h1>APOTEK ONLINE TERPERCAYA</h1>

							<h2>100 % Asli dan sudah lulus BPOM</h2>   
							<br>         
						</div>
					</div>
					<div class="col-md-3">
						<div class="kolom">
							<img src="pict/design/obat background 4.png" class="img-responsive" width="105%">        
						</div>
					</div>
					</div>
				</td>	
			</tr>
		</table>
		<br></br>

		<div class="kepala">
			<h1>Obat Kepala</h1>
			<div align="right">
				<a href="kepala.php">Lihat semua obat kepala -></a>
			</div>
			<br>
		</div>
		<div class="row">
			<?php $ambil=$koneksi->query("SELECT * FROM obat where kategori=1 and id<42"); ?>
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
			<br>
		<div class="mata">
			<h1>Obat Mata</h1>
			<div align="right">
				<a href="mata.php">Lihat semua obat mata -></a>
			</div>
		</div><br>
		<div class="row">
			<?php $ambil=$koneksi->query("SELECT * FROM obat where kategori=3 and id between 49 and 53"); ?>
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
				</div> 
			</div>
			<?php } ?>
		</div>	<br>
		<div class="kulit">
			<h1>Obat Kulit</h1>
			<div align="right">
				<a href="kulit.php">Lihat semua obat kulit -></a>
			</div>
		</div><br>
		<div class="row">
			<?php $ambil=$koneksi->query("SELECT * FROM obat where kategori=2 and id between 61 and 65"); ?>
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
				</div> 
			</div>
			<?php } ?>
		</div>	
	</div><br><br>
	<?php include 'footer.php'?>
</body>
</html>