<?php session_start(); ?>
<html>
<head>
    <title>RobotWithMe</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="CSS/style.css"/>	
	<LINK REL="SHORTCUT ICON" href="images/icon.ico">
</head>


<body>
	<?php include("banniere.php"); ?>
	<?php
								
			$prenom=$_POST['prenom'];
			$nom=$_POST['nom'];
			$age=$_POST['age'];
			$mail=$_POST['mail'];
	?>
			<script>
			var formulaire = document.getElementById('formulaire');
			formulaire.style.display='none';
			</script>
	<?php
			
			try{
			$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
			}
			catch(PDOException $e)
			{
			echo("Impossible");
			}
			
			$req = $bdd->prepare('INSERT INTO registered_user(firstname, lastname, age, email) VALUES(:firstname, :lastname, :age, :email)');
			$req->execute(array(
			'firstname' => $prenom,
			'lastname' => $nom,
			'age' => $age,
			'email' => $mail	
			));	
	?>
			
	<fieldset class="cible"><legend>Inscription réussie</legend>
	<p> 
	<?php echo "Merci $prenom, votre inscription a bien été prise en compte !"; ?>
	<div class="backhome"><a href="index.php"> Retour à l'accueil </a></div>
	</p>
	</fieldset>
			


	<?php include("footer.php"); ?>	
	</body>
</html>
