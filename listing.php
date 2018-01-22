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
 					<div class="top">
						<div class="location">
							<ul>
								<li>
									<a href="homepage.php">Accueil </a> > 
								</li>
								<li>
									<a href="#">Vêtements</a> >
								</li>
								<li>
									<a href="#">Sweats</a> 
								</li> 	
							</ul>											
						</div>
						<div class="display">
							<span>Voir :</span>
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
					</div>
					<div class="products">
						<div class="product1">
							<div class="img-product">
								<img src="images/listing-1.jpg" alt="image1">
							</div>
							<div class="first-line">
								<p>Paris</p>
								<img src="images/icones/like.png" alt="heart">
							</div>
							<div class="description">
								<p>Sweat unisexe chaud et épais, d’une qualité irréprochable tant sur la qualité du molleton que sur la finition.</p>
							</div>
							<div class="price">
								<p>17,30€</p>
							</div>
						</div>
						<div class="product2">
							<div class="img-product">
								<img src="images/listing-2.jpg" alt="image2">
							</div>
							<!--<div class="text">-->
								<div class="first-line">
									<p>Angers</p>
									<img src="images/icones/like.png" alt="heart">
								</div>
								<div class="description">
									<p>Le modèle Angers est un sweat à capuche simple et de bonne qualité.</p>
								</div>
								<div class="price">
									<p>18,00€</p>
								</div>
							<!--</div>-->
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