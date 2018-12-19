<?php
session_start();

echo "<pre>";
print_r($_SESSION['keranjang']);
echo "</pre>";

$conn = new mysqli("localhost", "root", "", "toko_onlen");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Keranjang Belanja</title>
	<link rel="stylesheet"  href="admin/assets/css/bootstrap.css">
</head>
<body>

<nav class="navbar navbar-default">
	<div class="container">

		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="keranjang.php">Keranjang</a></li>
			<?php if (isset($_SESSION["pelanggan"])): ?>
				<li><a href="logout.php">Logout</a></li>
				<?php else: ?>
					<li><a href="Login.php">Login</a></li>
				<?php endif ?>
			<li><a href="checkout.php">Checkout</a></li>
		</ul>
	</div>
</nav>


<section class="konten">
	<div class="container">
		<h1>Keranjang Belanjaku</h1>
		<hr>
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Produk</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Subharga</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor=1; ?>
			<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):  ?>

			<?php
			$ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
			$pecah = $ambil->fetch_assoc();
			$subharga = $pecah["harga_produk"]*$jumlah;
			//echo "<pre>";
			//print_r($pecah);
			//echo "</pre>"; 
			?>
			<tr>
				<td><?php echo $nomor; ?> </td>
				<td><?php echo $pecah["nama_produk"]; ?></td>
				<td>Rp <?php echo number_format($subharga); ?></td>
				<td><?php echo $jumlah; ?></td>
				<td>Rp <?php echo number_format($subharga); ?></td>
			</tr>
			<?php $nomor++; ?>
			<?php endforeach ?>
		</tbody>
		</table>

		<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
		<a href="checkout.php" class="btn btn-primary">Checkout</a>
	</div>
</section>
</body>
</html>

