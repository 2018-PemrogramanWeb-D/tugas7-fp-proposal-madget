<?php 
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$namadatabase = "toko_onlen";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $namadatabase);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Mad-Get</title>
	<link rel="stylesheet"  href="admin/assets/css/bootstrap.css">
</head>
<body>

<!-- Navbar sayang-->
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

<!-- Konten sayang -->
<section class="konten">
	<div class="container">
		<h1>Produk Terbaru</h1>

		<div class="row">
			
			<?php $ambil= $conn->query("SELECT * FROM produk"); ?>
			<?php while($perproduk = $ambil->fetch_assoc()) { ?>
				
			<div class="col-md-4">
				<div class="thumbnail">
					<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>">
					<div class="caption">
						<center>
						<h3><?php echo $perproduk['nama_produk']?></h3>
						<h5 style="color: OrangeRed">Rp <?php echo $perproduk['harga_produk']?>,00</h5>
						<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
						</center>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>	
	
</section>

</body>
</html>