<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Document sans titre</title>
</head>

<body>

<?php
	$hostname = "localhost";
	$dbname = "itschool";
	$username = "laurab";
	$userpass = "mds";
	$connexionStr = "mysql:host=$hostname;dbname=$dbname;charset=utf8";
	
	try {
		//paramètres : chaîne de connexion, identifiant, mot de passe
		$connexion = new PDO($connexionStr, $username, $userpass);
		//S'il y a un problème, il est géré sous forme d'exception
		$connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Fonctionnement en UTF8
		$connexion -> setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
		//Récupération automatique sous forme d'objet
		$connexion -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		
		/*$queryAjout = "INSERT INTO image (nomImage, idProduit) VALUES(:nomImage, :idProduit)";
		$statement = $connexion->prepare($queryAjout);
		$statement -> bindValue(':nomImage', 'listing-4.jpg',PDO::PARAM_STR);
		$statement -> bindValue(':idProduit', 2 ,PDO::PARAM_INT);
		if ($statement -> execute()) {
			echo "<p>Le nombre de modifications pour l'ajout est de ".$statement->rowCount()."</p>";
		}
		*/
	/*	$queryAjout = "INSERT INTO produit (nomProduit, descriptionProduit, caracteristiquesProduit, prixProduit, idCategorie) VALUES(:nomProduit, :descriptionProduit, :caracteristiquesProduit, :prixProduit, :idCategorie)";
		$statement = $connexion->prepare($queryAjout);
		$statement -> bindValue(':nomProduit', 'Nancy',PDO::PARAM_STR);
		$statement -> bindValue(':descriptionProduit', '100% coton ! Le modèle Nancy est un sweat tricolore en coton (molleton non gratté) de bonne qualité avec de très belles finitions.',PDO::PARAM_STR);
		$statement -> bindValue(':caracteristiquesProduit', '65 % coton, 35 % polyester, très doux, traitement spécial en finition peau de pêche pour un maximum de douceur (ce type de finition peut entraîner une légère différence de teinte entre les différentes tailles).',PDO::PARAM_STR);
		$statement -> bindValue(':prixProduit', 15.00,PDO::PARAM_INT);
		$statement -> bindValue(':idCategorie', 2 ,PDO::PARAM_INT);
		if ($statement -> execute()) {
			echo "<p>Le nombre de modifications pour l'ajout est de ".$statement->rowCount()."</p>";
		}*/
		
	
		$paris = 1;
		$angers = 2;
		$sweat = 2; /*ID de la catégorie sweat*/
		$query = "SELECT * FROM produit WHERE idCategorie=:id";
		$statement = $connexion->prepare($query);
		$statement -> bindValue(':id', $sweat);
		$statement -> execute();?>
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
		
								<?php while ($produit = $statement -> fetch()) {
									$query ="SELECT * FROM image WHERE idProduit=:id LIMIT 0,1";
									$statement = $connexion->prepare($query);
									$statement -> bindValue(':id', $paris);
									$statement -> execute();
									$image = $statement -> fetch ();
										echo "<img alt='image1' src='images/".$image-> nomImage."'>";

								};?>
								</a>
							</div>
							<div class="first-line">
								<a href="detail.php">
									<?php while ($produit = $statement -> fetch()) {
										echo "<h2>".$produit -> nomProduit;"</h2>";
									?>
								</a>
								<div class="hearts">
									<img src="images/icones/like.png" alt="heart">
									<img src="images/icones/like-red.png" alt="heart">
								</div>
							</div>
							<div class="description">
								<?php while ($produit = $statement -> fetch()) {
									echo "<p>".$produit -> descriptionProduit;"</p>";
								?>								
							</div>
							<div class="price">
								<?php while ($produit = $statement -> fetch()) {
									echo "<h2>".$produit -> prixProduit;"</h2>";
								?>
							</div>
						</div>
						<div class="product2">
							<div class="img-product">
								<!--<img src="images/listing-2.jpg" alt="image2">-->
								<a href="detail.php">
								<?php 
									$angers = 2;
									$sweat = 2; /*ID de la catégorie sweat*/
									$query = "SELECT * FROM produit WHERE idCategorie=:id";
									$statement = $connexion->prepare($query);
									$statement -> bindValue(':id', $sweat);
									$statement -> execute();
									while ($produit = $statement -> fetch()) {
								/*	echo $obj1 -> nomProduit;
									echo $obj1 -> descriptionProduit;
									echo $obj1 -> prixProduit;*/
									$query ="SELECT * FROM image WHERE idProduit=:id LIMIT 0,1";
									$statement = $connexion->prepare($query);
									$statement -> bindValue(':id', $angers);
									$statement -> execute();
									$image = $statement -> fetch ();
										echo "<img alt='image2' src='images/".$image-> nomImage."'>";

								};?>
								</a>
							</div>
							<div class="first-line">
								<?php while ($produit = $statement -> fetch()) {
										echo "<h2>".$produit -> nomProduit;"</h2>";
								?>
								<div class="hearts">
									<img src="images/icones/like.png" alt="heart">
									<img src="images/icones/like-red.png" alt="heart">
								</div>
							</div>
							<div class="description">
								<?php while ($produit = $statement -> fetch()) {
									echo "<p>".$produit -> descriptionProduit;"</p>";
								?>
							</div>
							<div class="price">
								<?php while ($produit = $statement -> fetch()) {
									echo "<h2>".$produit -> prixProduit;"</h2>";
								?>
							</div>
						</div>
						<div class="product3">
							<div class="img-product">
								<?php
									$lyon = 3;
									$sweat = 2; /*ID de la catégorie sweat*/
									$query = "SELECT * FROM produit WHERE idCategorie=:id";
									$statement = $connexion->prepare($query);
									$statement -> bindValue(':id', $sweat);
									$statement -> execute();
									while ($produit = $statement -> fetch()) {
								/*	echo $obj1 -> nomProduit;
									echo $obj1 -> descriptionProduit;
									echo $obj1 -> prixProduit;*/
									$query ="SELECT * FROM image WHERE idProduit=:id LIMIT 0,1";
									$statement = $connexion->prepare($query);
									$statement -> bindValue(':id', $lyon);
									$statement -> execute();
									$image = $statement -> fetch ();
										echo "<img alt='image3' src='images/".$image-> nomImage."'>";
								};?>
							</div>
							<div class="first-line">
								<?php while ($produit = $statement -> fetch()) {
									echo "<h2>".$produit -> nomProduit;"</h2>";
								?>
								<div class="hearts">
									<img src="images/icones/like.png" alt="heart">
									<img src="images/icones/like-red.png" alt="heart">
								</div>
							</div>
							<div class="description">
								<?php while ($produit = $statement -> fetch()) {
									echo "<p>".$produit -> descriptionProduit;"</p>";
								?>
							</div>
							<div class="price">
								<?php while ($produit = $statement -> fetch()) {
									echo "<h2>".$produit -> prixProduit;"</h2>";
								?>
							</div>
						</div>
						<div class="product4">
							<div class="img-product">
								<?php
									$nancy = 4;
									$sweat = 2; /*ID de la catégorie sweat*/
									$query = "SELECT * FROM produit WHERE idCategorie=:id";
									$statement = $connexion->prepare($query);
									$statement -> bindValue(':id', $sweat);
									$statement -> execute();
									while ($produit = $statement -> fetch()) {
								/*	echo $obj1 -> nomProduit;
									echo $obj1 -> descriptionProduit;
									echo $obj1 -> prixProduit;*/
									$query ="SELECT * FROM image WHERE idProduit=:id LIMIT 0,1";
									$statement = $connexion->prepare($query);
									$statement -> bindValue(':id', $nancy);
									$statement -> execute();
									$image = $statement -> fetch ();
										echo "<img alt='image4' src='images/".$image-> nomImage."'>";

								};?>
							</div>
							<div class="first-line">
								<?php while ($produit = $statement -> fetch()) {
									echo "<h2>".$produit -> nomProduit;"</h2>";
								?>
								<div class="hearts">
									<img src="images/icones/like.png" alt="heart">
									<img src="images/icones/like-red.png" alt="heart">
								</div>
							</div>
							<div class="description">
								<?php while ($produit = $statement -> fetch()) {
									echo "<p>".$produit -> descriptionProduit;"</p>";
								?>
							</div>
							<div class="price">
								<?php while ($produit = $statement -> fetch()) {
									echo "<h2>".$produit -> prixProduit;"</h2>";
								?>
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
		
		
	<?php } catch(Exception $e) {
		echo '<p>Erreur n° : '.$e->getCode().' : '. $e->getMessage().'</p>';
		echo '<p>Dans : '.$e->getFile().' ('.$e->getLine().') </p>';
		echo "<pre>"; //Pour que le var dump s'affiche mieux
		var_dump($e->getTrace());
		echo "</pre>";
	}?>


</body>
</html>