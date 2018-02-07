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
	</head>

	<body>


		<?php
			include('parts/header.php');
		?>

		<div class="content">
			<div class="block-content">
				<div class="inner">
				
				<?php
					if (isset($_POST['search']) && $_POST['search'] != NULL) { // on vérifie d'abord l'existence du POST et aussi si la requete n'est pas vide.
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
							
							//Création de la variable qui contient la recherche
							$search = $_POST['search'];
							
							//Recherche dans la table produit, dans la colonne nom
							$query = "SELECT * FROM produit WHERE nomProduit LIKE '%$search%' ORDER BY idProduit DESC";
							
							//On compte le nombre de résultats
							$nb_resultats = $query -> rowCount(); 
							
							//On vérifie s'il y a au moins un résultat
							if ($nb_resultats != 0) {
							
							
								/*<!--Affichage du nombre de résultats-->*/
								echo "<h3>Résultats de votre recherche</h3>
								<p>Nous avons trouvé";
								echo $nb_resultats;
									if($nb_resultats > 1) { 
										echo 'résultats : '; 
									} else { 
										echo 'résultat : '; 
									}

									while($donnees = $query -> fetch()) { // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction


								?>
								<a href="listing.php?id=<?php echo $donnees['idProduit']; ?>"><?php echo $donnees['nomProduit']; }?></a>
								
								<?php 
									} else {
								?>
								<h3>Pas de résultats</h3>
								<p>Nous n'avons trouvé aucun résultat pour votre requête "<? echo $_POST['search']; ?>". <a href="search.php">Réessayez</a> avec autre chose.</p>

							<?php
							}
							?>		
								
								
						<?php
						} catch(Exception $e) {
							echo '<p>Erreur n° : '.$e->getCode().' : '. $e->getMessage().'</p>';
							echo '<p>Dans : '.$e->getFile().' ('.$e->getLine().') </p>';
							echo "<pre>"; //Pour que le var dump s'affiche mieux
							var_dump($e->getTrace());
							echo "</pre>";
						}	
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