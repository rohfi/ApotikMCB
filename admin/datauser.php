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
    <title>Data User</title>
    <?php include '../koneksi.php' ?>
    <?php include '../component.php' ?>
</head>
<body>
<?php include 'headeradmin.php' ?>
<div class="container">
    <br><h1><center>Data User</center></h1><br>
    <table class="table table-bordered">
	<thead>
    <tr> 
		<th>No</th>
		<th>Username</th>
		<th>Password</th>
		<th>Email</th>
		<th>Nomor telepon</th>
		<th>Alamat</th>
        <th>Action</th>
	</tr>
    </thead>
    <tbody>
    <?php $nomor=1; ?>
	<?php $ambil = $koneksi->query("SELECT * FROM user where tipe=1"); ?>
	<?php while ($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
        <td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['username']; ?></td>
			<td><?php echo $pecah['password']; ?></td>
            <td><?php echo $pecah['email']; ?></td>
            <td><?php echo $pecah['telepon']; ?></td>
			<td><?php echo $pecah['alamat']; ?></td>
            <td>
				<a href="deleteuser.php?id=<?php echo $pecah['id'] ?>"  class="btn-danger btn">Hapus</a>
				<a href="edituser.php?id=<?php echo $pecah['id'] ?>" class="btn btn-warning">Ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
    </tbody>
	
</table>
<a href="adduser.php" class="btn btn-primary">Tambah User Manual</a>
</div>
</body>
</html>