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
				
				
				$sweat = 2; /*ID de la catégorie sweat*/
				$query = "SELECT * FROM produit WHERE idCategorie=:id";
				$statementProduit = $connexion->prepare($query);
				$statementProduit -> bindValue(':id', $sweat);
				$statementProduit -> execute();
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
					<?php
						$i = 0;
						while ($produit = $statementProduit -> fetch()) {
							$i++;
				
							echo "<div class='product".$i."'>";


					?>
							<div class="img-product">
								<a href="detail.php">		
									<?php 
										$query ="SELECT * FROM image WHERE idProduit=:id LIMIT 0,1";
										$statementImage = $connexion->prepare($query);
										$statementImage -> bindValue(':id', $i);
										$statementImage -> execute();
										$image = $statementImage -> fetch ();
										echo "<img alt='image1' src='images/".$image-> nomImage."'>";
									?>
								</a>
							</div>
							<div class="first-line">
								<a href="detail.php">
								<?php 
									echo "<h2>".$produit -> nomProduit."</h2>";
								?>
								</a>
								<div class="hearts">
									<img src="images/icones/like.png" alt="heart">
									<img src="images/icones/like-red.png" alt="heart">
								</div>
							</div>
							<div class="description">
								<?php 
									echo "<p>".$produit -> descriptionProduit."</p>";
								?>								
							</div>
							<div class="price">
								<?php 
									echo "<h2>".$produit -> prixProduit."€</h2>";
								?>
							</div>
						</div>						
						
						<?php 
							} 
						?>
						
						
					</div>
				</div>
			</div>
		</div>
		
		<?php 
			} catch(Exception $e) {
				echo '<p>Erreur n° : '.$e->getCode().' : '. $e->getMessage().'</p>';
				echo '<p>Dans : '.$e->getFile().' ('.$e->getLine().') </p>';
				echo "<pre>"; //Pour que le var dump s'affiche mieux
				var_dump($e->getTrace());
				echo "</pre>";
			}
		?>

	
		<?php 
			include('button.php');
			include('parts/footer.php');
		?>

	</body>
</html>