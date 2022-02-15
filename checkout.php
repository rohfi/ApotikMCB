<?php session_start();
error_reporting(0);
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
    <h4>Checkout </h4>
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
			<br><div class="form-group">
				<label>Metode Pembayaran : </label>
				<select class="form-control" name="pembayaran" id="combo1">
					<option value=""> Pilih Metode Pembayaran</option>
					<?php
						$query = "SELECT * FROM metode_pembayaran ORDER BY nama ASC";
						$dewan1 = $koneksi->prepare($query);
						$dewan1->execute();
						$res1 = $dewan1->get_result();
						while ($row = $res1->fetch_assoc()) {
								echo "<option value='" . $row['nama'] . "'>" . $row['nama'] . "</option>";
						}
					?>
				</select>
			</div>
			<br><div class="form-group">
				<label>Pengiriman : </label>
				<select class="form-control" name="pengiriman" id="combo2">
					<option value=""> Pilih Pengiriman</option>
					<?php
						$query = "SELECT * FROM pengiriman ORDER BY nama ASC";
						$dewan1 = $koneksi->prepare($query);
						$dewan1->execute();
						$res1 = $dewan1->get_result();
						while ($row = $res1->fetch_assoc()) {
								echo "<option value='" . $row['nama'] . "'>" . $row['nama'] . "</option>";
						}
					?>
				</select>
			</div><br>
			<div class="form-group">
				<label>Alamat Pengiriman : </label>
				<textarea class="form-control" name="alamat" placeholder="Masukan Alamat Pengiriman" readonly require><?php echo $_SESSION["user"]["alamat"]?></textarea>
			</div><br>
            <button class="btn btn-primary" name="checkout">Checkout</button>
		</form> <br>
        <?php if (isset($_POST['checkout'])){
        $id = $_SESSION["user"]["id"];
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date("Y-m-d H:i:s");
		$alamat=$_POST['alamat']; 
		$pengiriman=$_POST['pengiriman']; 
		$pembayaran=$_POST['pembayaran']; 
        $mysqli  = "INSERT INTO pembelian (id_user,subtotal,tanggal,alamat,pembayaran,pengiriman) VALUES ('$id','$totalbelanja','$tanggal','$alamat','$pembayaran','$pengiriman')";
        $result  = mysqli_query($koneksi, $mysqli);
		$id_pembelian_barusan = $koneksi->insert_id;
		$ambil = $koneksi->query("SELECT * FROM keranjang join obat on keranjang.id_obat=obat.id WHERE id_user='$id'  ");
		while ($pecah = $ambil->fetch_assoc()){
			$id_obat=$pecah["id"];
			$jumlah=$pecah["jumlah"];
			$harga=$pecah["harga"];
			$total=$pecah["jumlah"]*$pecah["harga"];
			$koneksi->query("INSERT INTO detail_pembelian (id_pembelian,id_obat,jumlah,harga,total) VALUES ('$id_pembelian_barusan','$id_obat','$jumlah','$harga','$total')");
		}
        echo "<meta http-equiv='refresh' content='1;url=nota.php'>";
        }?>
</div>
<?php include 'footer.php'?>
</body>
</html>