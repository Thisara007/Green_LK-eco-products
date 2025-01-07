<?php
	 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="Styles.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
	<title>GrennLK</title>
</head>
<body>
		<header>
			<input type="checkbox" name="" id="toggler">
			<label for="toggler" class="menubar"><span class="material-symbols-outlined">menu</span></label>
			<a href="#"> <img src="logo.webp" placeholder="logo"></a>
			<nav class="navbar" style="width:500px;">
				<li type="none" class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
				<li type="none" class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
				<li type="none" class="nav-item">
                    <a class="nav-link" href="test2.html">AboutUs</a>
                </li>
				<li type="none" class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
			</nav>
			<div class="icons">
				<a href="cart.php"><i class="bi bi-cart"></i></a>
		<?php 
				 if(isset($_SESSION["id"])){
					require_once "dbconfi.php";
					$ID = $_SESSION["id"];
					$sql = "SELECT * FROM users WHERE user_id='$ID';";
					
					$result = mysqli_query($connect,$sql);
					if($row=mysqli_fetch_assoc($result)){
						$name = $row['name'];
					}else{
						header("Location: login.php");
						exit(); 
					}
				?>
				<a href="profile.php"><?php $name ?></i></a>
				<?php
				 }
				 ?>
				<a href="signup.php"><i class="bi bi-person"></i></a>
			</div>


	</header>

    