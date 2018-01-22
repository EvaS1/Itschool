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
								<a href="detail.php">
								<img src="images/listing-1.jpg" alt="image1">
								</a>
							</div>
							<div class="first-line">
								<a href="detail.php">
									<h2>Paris</h2>
								</a>
								<div class="hearts">
									<img src="images/icones/like.png" alt="heart">
									<img src="images/icones/like-red.png" alt="heart">
								</div>
							</div>
							<div class="description">
								<p>Sweat unisexe chaud et épais, d’une qualité irréprochable tant sur la qualité du molleton que sur la finition.</p>
							</div>
							<div class="price">
								<h2>17,30€</h2>
							</div>
						</div>
						<div class="product2">
							<div class="img-product">
								<img src="images/listing-2.jpg" alt="image2">
							</div>
							<div class="first-line">
								<h2>Angers</h2>
								<div class="hearts">
									<img src="images/icones/like.png" alt="heart">
									<img src="images/icones/like-red.png" alt="heart">
								</div>
							</div>
							<div class="description">
								<p>Le modèle Angers est un sweat à capuche simple et de bonne qualité.</p>
							</div>
							<div class="price">
								<h2>18,00€</h2>
							</div>
						</div>
						<div class="product3">
							<div class="img-product">
								<img src="images/listing-3.jpg" alt="image3">
							</div>
							<div class="first-line">
								<h2>Lyon</h2>
								<div class="hearts">
									<img src="images/icones/like.png" alt="heart">
									<img src="images/icones/like-red.png" alt="heart">
								</div>
							</div>
							<div class="description">
								<p>Le sweat unisexe col rond idéal pour les petites quantités et pour ceux qui recherchent un modèle simple, bien coupé et de bonne qualité.</p>
							</div>
							<div class="price">
								<h2>18,70€</h2>
							</div>
						</div>
						<div class="product4">
							<div class="img-product">
								<img src="images/listing-4.jpg" alt="image4">
							</div>
							<div class="first-line">
								<h2>Nancy</h2>
								<div class="hearts">
									<img src="images/icones/like.png" alt="heart">
									<img src="images/icones/like-red.png" alt="heart">
								</div>
							</div>
							<div class="description">
								<p>100% coton ! Le modèle Nancy est un sweat tricolore en coton (molleton non gratté) de bonne qualité avec de très belles finitions.</p>
							</div>
							<div class="price">
								<h2>15,00€</h2>
							</div>
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