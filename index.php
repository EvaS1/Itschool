<!doctype html>

<?php 
	include('button.php');		
?>

<html>
<head>
	<link rel="stylesheet" href="css/style.css" />
	<meta charset="utf-8">
	<title>footer</title>
</head>

<body>

<footer class="block-footer">
	<div class="inner">
		<ul>
			<li><a href="#"> Plan du site </a></li>
			<li><img src="images/icones/Sans titre - 1.png" alt="Puce" /><a href="#"> Informations </a></li>
  			<li><img src="images/icones/Sans titre - 1.png" alt="Puce" /><a href="#"> Contact </a></li>
  			<li><img src="images/icones/Sans titre - 1.png" alt="Puce" /><a href="#"> Mentions légales</a></li>
  			<li><img src="images/icones/Sans titre - 1.png" alt="Puce" /><a href="#" id="msgpopup"><img src="images/icones/send.png" alt="Send" /> <p>Inscrivez vous à la newsletter</p></a></li>
		</ul>
	</div>
</footer>

	<script type="text/javascript">
		var lienpopup = document.getElementById('msgpopup');
		var body = document.body;
		var popup = document.getElementById('newpopup');
		
		lienpopup.addEventListener("click", afficherPopup, false);

		function afficherPopup(){
			sendQuery('popup.php', body, false);
		}

		function sendQuery(query, showin, erase){
			console.log('Function sendQuery');
			console.log("query : " + query);

			//instance de l'objet
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange=function() {
				if (this.readyState == 4 && this.status == 200) {
					console.log("ShowMessage response = ");
					console.log(this.responseText);
					if (erase){
						showin.innerHTML = this.responseText;
					} else {
						showin.innerHTML += this.responseText;
					}
				}
			};

			xhttp.open("GET",query , true);
			xhttp.send();
		}
		
		
	</script>
	
</body>	
</html>
