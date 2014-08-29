<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>
    <title>Contact</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="CSS/style.css"/>
	<LINK REL="SHORTCUT ICON" href="images/icon.ico">
</head>


<body>
	<?php include("banniere.php"); ?>
	
	<fieldset id="inscrip"><legend><strong>Contact us</strong></legend>
	
	<form name="contact" method="post" action="formmail.php" onsubmit="return verifForm2(contact)" enctype="multipart/form-data">
		<p>
		<label for="nom">Nom :</label><input type="text" name="nom" placeholder="Ex : Boubacar" id="nom" onblur="verifnomprenom(this)"/><br>
		<label for="prenom">Prénom :</label><input type="text" name="prenom" placeholder="Ex : Marcelinho" id="prenom" onblur="verifnomprenom(this)"/><br>
		<label for="mail">Mail :</label><input type="text" name="mail" placeholder="Ex : marcelinho.boubacar@cpe.fr" id="mail"  onblur="verifMail(this)"/><br>
		<label for="objet">Objet :</label><input type="text" name="objet" placeholder="Ex : Retour sur votre site" id="objet" onblur="verifobjet(this)"/><br>
		<label for="message">Votre message :</label><br><textarea name="message" placeholder="Tu tapes ton texte ici et maintenant s'il te plait jeune padawan"></textarea><br>
		<input type="submit" value="Valider"/>	
		</p>
	</form>
	
	</fieldset>
			 			
	<?php include("footer.php"); ?>	
	
	<script src="js/valider.js" ></script>
	</body>
</html>

