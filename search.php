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
		<link rel="stylesheet" href="css/search.css">
		
	</head>

	<body>


		<?php
			include('parts/header.php');
		?>

		<div class="content">
			<div class="block-content-search">
				<div class="inner">
				
				
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
						
						//Récupération colonnes de la table produit
						$query = "SELECT * FROM produit  WHERE idProduit=:id ORDER BY idProduit ASC";
						$statementProduit = $connexion->prepare($query);
						$statementProduit -> bindValue(':id', 'idProduit');
						$statementProduit -> execute();
						
						
						//S'il y a une recherche
						if(isset($_GET['q']) AND !empty($_GET['q'])) {
							$q = htmlspecialchars($_GET['q']);
							$query = 'SELECT * FROM produit WHERE CONCAT(nomProduit, descriptionProduit, caracteristiquesProduit) LIKE "%'.$q.'%" ORDER BY idProduit ASC';
							$statementProduit = $connexion->prepare($query);
							$statementProduit -> bindValue(':id', 'idProduit');
							$statementProduit -> execute();
						}
						
						//S'il y a au moins un résultat : affichage du nombre de résultat(s)
						if ($statementProduit -> rowCount() > 0) { 
						 echo "<div class='results'>Votre recherche pour '".$q."' a donné ".$statementProduit -> rowCount();
							if ($statementProduit -> rowCount() > 1) {
								echo " résultats : </div>";
							} else {
								echo " résultat : </div>";
							} ?>
						
							<!--Affichage du ou des résultat(s)-->
							<ul>
								<?php while($produit = $statementProduit->fetch()) { 
								
								$query ="SELECT * FROM image WHERE idProduit=:id LIMIT 0,1";
								$statementImage = $connexion->prepare($query);
								$statementImage -> bindValue(':id', $produit -> idProduit);
								$statementImage -> execute();
								$image = $statementImage -> fetch (); ?>
								
								<li>
								<a href="detail.php?id=<?php echo $produit -> idProduit?>">
								<?php echo "<img alt='image1' src='images/".$image-> nomImage."'>";?></a><br />
								<?php echo "<div class='first-line '><span class='name'>".$produit -> nomProduit."</span><span class='price'>".$produit -> prixProduit."€</div>";  ?>
								<?php echo "<div class='description'>".$produit -> descriptionProduit."</div>"; ?>
								
								<?php } ?>
							</ul>
							
							
							<?php } else { ?>
							<div class='results'>Aucun résultat pour "<?php echo $q?>"...</div>
							<?php } 
						
					} catch(Exception $e) {
						echo '<p>Erreur n° : '.$e->getCode().' : '. $e->getMessage().'</p>';
						echo '<p>Dans : '.$e->getFile().' ('.$e->getLine().') </p>';
						echo "<pre>"; //Pour que le var dump s'affiche mieux
						var_dump($e->getTrace());
						echo "</pre>";
					}
		
				?>
				
				
				
				</div>
			 </div>
		 </div>
	 
	 
		<?php 
			include('button.php');
			include('parts/footer.php');
		?>
	</body>
</html>