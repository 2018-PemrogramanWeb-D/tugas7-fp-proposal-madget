<?php 
session_start();
$conn = new mysqli("localhost", "root", "", "toko_onlen"); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Pelanggan</title>
	<link rel="stylesheet"  href="admin/assets/css/bootstrap.css">
</head>
<body>

<nav class="navbar navbar-default">
	<div class="container">

		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="keranjang.php">Keranjang</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="checkout.php">Checkout</a></li>
		</ul>
	</div>
</nav>	

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Login Pelanggan</h3>
				</div>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password">
						</div>
						<button class="btn btn-primary" name="login">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
if (isset($_POST["login"]))
{
	$email = $_POST["email"];
	$password = $_POST["password"];

	$ambil = $conn->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
	
	//ngitung yg terambil
	$akuncocok = $ambil->num_rows;

	//kalo ada yg cocok
	if($akuncocok==1)
	{
		//anda sudak login
		$akun = $ambil->fetch_assoc();

		$_SESSION["pelanggan"] = $akun;
		echo "<script>alert('Anda Sukses login'); </script>";
		echo "<script>location='checkout.php';</script>";
	}
	else
	{
		echo "<script>alert('Anda gagal login, periksa kemnbali akun anda'); </script>";
		echo "<script>location='login.php' </script>";
	}
}
?>


</body>
</html>