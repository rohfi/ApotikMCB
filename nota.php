<?php session_start();
error_reporting(0);
$id=$_SESSION["user"]['id']?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota</title>
    <?php include 'koneksi.php' ?>
    <?php include 'component.php' ?>
</head>
<body>
<div class="container">
    <table class="table table_bordered">
	<thead>
    <tr>
		<th>No</th>
		<th>Nama Obat</th>
		<th>Jumlah</th>
		<th>Harga Satuan</th>
		<th>Total</th>
	</tr>
    </thead>
    <tbody>
    <?php $nomor=1; ?>
	<?php $ambil = $koneksi->query("SELECT * FROM keranjang JOIN obat ON keranjang.id_obat=obat.id WHERE id_user='$id'"); ?>
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
		</tr>
		<?php $nomor++; ?>
        <?php $totalbelanja+=$total; ?>
		<?php } ?>
    </tbody>
    <tfoot>
				<th colspan="4">Total Belanja</th>
				<th>Rp. <?php echo number_format($totalbelanja) ?></th>
			</tfoot>
	
</table>
<form method="post">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Username : </label>
						<input type="text"  readonly value="<?php echo $_SESSION
						["user"]['username'] ?>" class="form-control">
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Email : </label>
						<input type="text"  readonly value="<?php echo $_SESSION
						["user"]['email'] ?>" class="form-control">
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Nomor telepon : </label>
						<input type="text"  readonly value="<?php echo $_SESSION
						["user"]['telepon'] ?>" class="form-control">
					</div>	
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Total Pembayaran : </label>
						<input type="text"  readonly value="Rp. <?php echo number_format($totalbelanja) ?>" class="form-control">
					</div>	
				</div>
			</div>
			<?php $ambil = $koneksi->query("SELECT * FROM user JOIN pembelian ON user.id=pembelian.id_user WHERE user.id='$id'"); ?>
				<?php while ($pecah = $ambil->fetch_assoc()){ ?>
					
						<?php $pembayaran = $pecah['pembayaran']; ?>
						<?php $pengiriman = $pecah['pengiriman']; ?>
						
					
			<?php } ?>
			<br><div class="form-group">
				<label>Metode Pembayaran : </label>
				<input type="text"  readonly value="<?php echo $pembayaran ?>" class="form-control">
			</div>
			<br><div class="form-group">
				<label>Pengiriman : </label>
				<input type="text"  readonly value="<?php echo $pengiriman ?>" class="form-control">
			</div><br>
			<div class="form-group">
				<label>Alamat Pengiriman : </label>
				<input type="text"  readonly value="<?php echo $_SESSION
						["user"]['alamat'] ?>" class="form-control">
			</div><br>
		</form>
		<div>
			<h3><center>Terima kasih telah berbelanja di Apotek MCB<center></h3>
		</div>
		<?php  echo "<script>window.print()</script>"; ?>
		<?php  echo "<meta http-equiv='refresh' content='1;url=index.php'>"; ?>
		<?php  $koneksi->query("DELETE FROM keranjang WHERE id_user='$id'"); ?>
</div>
</body>
</html>