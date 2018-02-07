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
<script src="vendors/jquery.min.js"></script> <!--Dans balise head ou fin du body-->
 <script src="detail.js"></script>
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
		
		$idProduit=$_GET['id'];
		$query = "SELECT * FROM produit WHERE idProduit=:id";
		$statement = $connexion->prepare($query);
		$statement -> bindValue(':id', $idProduit);
		$statement -> execute();
		$produit = $statement -> fetch();
	?>
	
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
						<?php 
							$query ="SELECT * FROM image WHERE idProduit=:id";
							$statement = $connexion->prepare($query);
							$statement -> bindValue(':id', $idProduit);
							$statement -> execute();
							$isfirstimage = true;
							while($image = $statement -> fetch ()){
								if ($isfirstimage) {
 									$firstimage = $image;
 									$isfirstimage = false;
 								}
 								echo "<img id='detail' alt='image1' src='images/".$image ->	nomImage."'>";
								
							}
						?>
						
					</div>
					<div class="product">
						<img src="images/<?php echo $firstimage -> nomImage?>" id ="main-image">
					</div>
				</div>

				<div class="text">
					<div class="title">
						<h2><?php $titre = $produit -> nomProduit;
							$titre = strtoupper($titre);
							echo $titre;?></h2>
						<div class="hearts">
							<img src="images/icones/likelau.png">
							<img src="images/icones/like-red.png">
						</div>
					</div>
					<div class="description">
						<h3>Description</h3>
						<p><?php echo $produit -> descriptionProduit;?></p>
					</div>
					<div class="caracteristiques">
						<h3>Caractéristiques</h3>
						<p><?php echo $produit -> caracteristiquesProduit;?></p>
					</div>
					<div class="livraison">
						<h3>Livraison / retour</h3>
						<p>Livraison en 3 jours.<br>Retours gratuits.</p>
					</div>
					<div class="price">
						<h2><?php echo $produit -> prixProduit ."€";?></h2>
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
<?php } catch(Exception $e) {
		echo '<p>Erreur n° : '.$e->getCode().' : '. $e->getMessage().'</p>';
		echo '<p>Dans : '.$e->getFile().' ('.$e->getLine().') </p>';
		echo "<pre>"; //Pour que le var dump s'affiche mieux
		var_dump($e->getTrace());
		echo "</pre>";
	}?>
	</body>
</html>