<?php
session_start();
$conn = new mysqli("localhost", "root", "", "toko_onlen");


if (!isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('Silahkan login');</script>";
	echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<link rel="stylesheet" type="" href="admin/assets/css/bootstrap.css">
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

<pre>
	<?php print_r($_SESSION["pelanggan"]); ?>
</pre>

</body>
</html>