<?php
session_start();
include_once("fonctions_panier.php");
init_produits();

try{
$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
}
catch(Exception $e){
die('Erreur:'.$e->getMessage());
}
if (!isset($_GET['confirm']))
{
	$_GET['confirm'] = false;
}

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Achats</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" href="CSS/style.css" />
		<LINK REL="SHORTCUT ICON" href="images/icon.ico">
	</head>
		<body>
			<?php include("banniere.php"); ?>

										
					<legend>Vos achats</legend>
					<fieldset id="finfinfin">
					<div id="finfin">
					<strong>Contenu : </strong><?php echo calcul_totalarticles(); ?> articles<br>
					<strong>Total TTC : </strong><?php echo calcul_total()?> €
					</div>
					<br>
				<?php
				echo '<div class = "optionpanier">';
				echo "<a href=\"".htmlspecialchars("achats.php?confirm=".rawurlencode(true))."\">Confirmer vos achats</a>";
				echo '</div>';
				?>
				
					</fieldset>
				

				<?php
				if($_GET['confirm'] && count($_SESSION['panier']['qte'])>0)
				{
					echo '<fieldset class="cible"><legend>Achat finalisé</legend>';
					echo '<p>';
					$verif=0;
					for($i=0;$i<count($_SESSION['panier']['qte']);$i++)
					{
						if($_SESSION['panier']['qte'][$i]>0)
						{
							$verif++;
						}
					}
					if($verif>0)
					{
						for ($i=0;$i<count($_SESSION['produits']['qte']);$i++)
						{
							$produits_restants = $_SESSION['produits']['qte'][$i];
							$nom = $_SESSION['produits']['nom'][$i];
							$req = $bdd->prepare('UPDATE productlist SET number = :produits_restants WHERE title = :nom');
							$req->execute(array(
							'produits_restants' => $produits_restants,
							'nom' => $nom                      
							));
						}
						RAZ_panier();
						echo 'Merci de votre confiance !';

						unset($_GET['confirm']);
					}
					else
					{
						echo '<br><br>';
						echo 'Votre panier est vide !';	
				
						unset($_GET['confirm']);
					}		
					
					echo '<div class="backhome"><a href="index.php"> Retour à l\'accueil </a></div>';
					echo '</p></fieldset>';
				}
				else if($_GET['confirm'] && count($_SESSION['panier']['qte'])==0)
				{
					echo '<fieldset class="cible"><legend>Achat impossible</legend>';
					echo '<p>';
					echo '<br><br>';
					echo 'Votre panier est vide !';	

					unset($_GET['confirm']);
					echo '<div class="backhome"><a href="index.php"> Retour à l\'accueil </a></div>';
					echo '</p></fieldset>';
				}
				?>
				
				
				
	
			<?php include("footer.php"); ?>

	</body>
</html>
