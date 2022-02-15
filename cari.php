<?php include 'koneksi.php'; ?>
<?php include 'component.php';
session_start() ?>
<?php  
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM obat WHERE nama LIKE '%$keyword%' ");
while ($pecah =$ambil->fetch_assoc()) 
{
	$semuadata[]=$pecah;
}

// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pencarian Produk</title>
</head>
<body>
	<?php include 'header.php'?>
<div class="container">
	<h3>Hasil Pencarian : "<?php echo $keyword ?>"</h3>
<?php if (empty($semuadata)): ?>
	<div class="alert alert-danger">Produk '<strong><?php echo $keyword ?></strong>' Tidak Di Temukan !</div>
<?php endif ?>
<div class="row">

		<?php foreach ($semuadata as $key => $value): ?>
		<div class="col-md-3">
		<div class="thumbnail ">
				<img src="assets/obat/<?php echo $value ['foto']; ?>" style="width: 70%;">
				<div class="caption">
					<h4><?php echo $value ['nama'] ?></h4>
					<h5>Rp <?php echo number_format($value ['harga']) ?></h5>
					<a href="beli.php?id=<?php echo $value['id'];?>" class="btn btn-primary">Beli</a>
				</div>
			</div>
			</div>
		<?php endforeach ?>
	</div>
</div>

</body>
</html>