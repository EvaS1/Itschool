<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Itschool</title>

		<link rel="icon" href="images/logo.png">
		<link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/homepage.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/eva.css">
		<link rel="stylesheet" href="css/listing.css">
	</head>

	<body>

		<?php
			include('parts/header.php');
		?>

		<div class="content">
 			<div class="block-content-listing">
 				<div class="inner">
 					<div class="location">
 						<p>
 							Accueil > Vêtements > Sweats
 						</p>
 					</div>
 					<div class="display">
 						<p>Voir :</p>
 						<img src="images/icones/display.png" alt="display">
 					</div>
 					<div class="sort-by">
 						<form>
 							<label>Trier par : </label>
							<select name="sort">
								<option>Sélectionner
								<option>Nouveauté
								<option>Prix croissant
								<option>Prix décroissant
							</select>
 						</form>
 					</div>
 					<div class="product1">
 						<div class="img-product">
 							<img src="" alt="">
 						</div>
 						<div class="first-line">
 							<p>PARIS</p>
 							<img src="" alt="heart">
 						</div>
 						<div class="description">
 							<p>Sweat chaud et épais...</p>
 						</div>
 						<div class="price">
 							<p>17,30€</p>
 						</div>
 					</div>
				</div>
			</div>
		</div>

		<?php 
			include('button.php');
			include('parts/footer.php');
		?>

	</body>
</html>