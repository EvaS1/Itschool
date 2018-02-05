<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Itschool</title>

<link rel="icon" href="images/logo.png">
<link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/detail.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/eva.css">

</head>

<body>

<?php
	include('parts/header.php');
?>

<div class="content">
	<div class="block-content-detail">
		<div class="inner">
			<div class="location">
				<ul>
					<li><a href="homepage.php">Accueil </a>> </li>
					<li><a href="#"> Vêtements </a>></li>
					<li><a href="listing.php"> Sweats </a>></li>
					<li><a href="#"> PARIS </a></li>
				</ul>
			</div>
			
			<div class="ficheproduit">
				<div class="preview">
					<div class="imgdetail">
						<img src="images/Detail-1.jpg">
						<img src="images/Detail-2.jpg">
						<img src="images/Detail-3.jpg">	
					</div>
					<div class="product">
						<img src="images/listing-1.jpg">
					</div>
				</div>

				<div class="text">
					<div class="title">
						<h2>PARIS</h2>
						<img src="images/icones/likelau.png">
					</div>
					<div class="description">
						<h3>Description</h3>
						<p>Sweat unisexe chaud et épais, d’une qualité irréprochable tant sur la qualité du molleton que sur la finition.</p>
					</div>
					<div class="caracteristiques">
						<h3>Caractéristiques</h3>
						<p>65 % coton, 35 % polyester, très doux, traitement spécial en finition peau de pêche pour un maximum de douceur (ce type de finition peut entraîner une légère différence de teinte entre les différentes tailles).</p>
					</div>
					<div class="livraison">
						<h3>Livraison / retour</h3>
						<p>Livraison en 3 jours.<br>Retours gratuits.</p>
					</div>
					<div class="price">
						<h2>17,30€</h2>
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