<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>
    <title>Inscription</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="CSS/style.css"/>
	<LINK REL="SHORTCUT ICON" href="images/icon.ico">
</head>


<body>
	<?php include("banniere.php"); ?>
	
	<fieldset id="inscrip"><legend><strong>Inscription</strong></legend>
	
	<form name="Inscription" method="post" action="cible.php" onsubmit="return verifForm1(Inscription)" enctype="multipart/form-data">
		<p>
		<label for="nom">Nom :</label><input type="text" name="nom" placeholder="Ex : Boubacar" id="nom" onblur="verifnomprenom(this)"/><br>
		<label for="prenom">Prénom :</label><input type="text" name="prenom" placeholder="Ex : Marcelinho" id="prenom" onblur="verifnomprenom(this)"/><br>
		<label for="age">Âge :</label><input type="number" name="age" placeholder="Ex : 87" onblur="verifAge(this)"/><br>
		<label for="mail">Mail :</label><input type="text" name="mail" placeholder="Ex : marcelinho.boubacar@cpe.fr" id="mail"  onblur="verifMail(this)"/><br>
		<input type="submit" value="Valider"/>	
		</p>
	</form>
	
	</fieldset>
			 			
	<?php include("footer.php"); ?>	
	
	<script src="js/valider.js" ></script>
	</body>
</html>
