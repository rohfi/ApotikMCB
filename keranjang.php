<?php session_start();
$id=$_SESSION["user"]['id']?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <?php include 'koneksi.php' ?>
    <?php include 'component.php' ?>
</head>
<body>
<?php include 'header.php' ?>
<div class="container">
    <br><h1><center>Keranjang<center></h1><br><br>
    <table class="table table_bordered">
	<tr>
		<th>No</th>
		<th>Nama Obat</th>
		<th>Jumlah</th>
		<th>Harga Satuan</th>
		<th>Total</th>
		<th>Action</th>
	</tr>
	<?php $nomor=1; ?>
	<?php $ambil = $koneksi->query("SELECT * FROM keranjang JOIN obat ON keranjang.id_obat=obat.id where id_user='$id' "); ?>
	<?php while ($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama']; ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo number_format($pecah['harga']); ?></td>
            <?php
            $total=$pecah["jumlah"]*$pecah['harga'];
            ?>
            <td><?php echo number_format($total); ?></td>
            <td><a href="hapus_keranjang.php?id=<?php echo $pecah['id']; ?>" class="btn btn-danger">Hapus</a></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
</table>
<a href="checkout.php" class="btn btn-success" name="checkout">Checkout</a>
</div><br><br>
	<?php include 'footer.php'?>
</body>
</html>