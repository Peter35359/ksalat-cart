<?php
	session_start();
if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ksalat cart page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style>
		body{
			background-color: ;

		}
		.wlc{
			background-color: grey;
		}
		.wlc h3 p{
			align-text: center;
			font-weight: 4vh;
		}
		.log{
			align-content:right;
		}
	</style>
</head>
<body>
<div class="wlc">
	<?php if (isset($_SESSION['success'])) : ?>
		<div class="error success">
			<h3>
				<?php 
					echo $_SESSION['success'];
					unset($_SESSION['success']);
				?>
			</h3>
		</div>
	<?php endif ?>

	<?php if (isset($_SESSION['username'])) : ?>
		<p><center>Welcome <strong><?php echo $_SESSION['username']; ?><strong></center></p>
		<p class="log"> <a href="login.php?logout='1'" style="color: red">logout</a></p>
	<?php endif ?>
	</div>
	<div>
	<?php
	 	include 'cart.php';
		 ?>
</div>
</body>
</html>