<?php 
	include('button.php');		
?>
	<div class="popup container" id="newpopup">
		<div class="inner">
				<div class="title">
					<h1>Inscription à la newsletter</h1>
						<a href="#" id="closepopup"><img src="images/icones/ic_clear_black_24px.svg"></a>
				</div>
				<div class="form">
					<div class="mail">
						<img src="images/icones/send2.png">
						<input type="text" name="name" id="name" placeholder="Email">
					</div>
				</div>
				<div class="button">
					<?php
						$buttonnav = new Button('ENVOYER', true);
						$buttonnav->setLink('Lauralabest');
						echo($buttonnav->getOutput());
					?>
				</div>
		</div>
	</div>
