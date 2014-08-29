<?php
session_start();
include_once("fonctions_panier.php");
init_panier();
init_produits();

if (!isset($_GET['selection']))
{
	$_GET['selection'] = '';
}

if (!isset($_GET['suppression']))
{
	$_GET['suppression'] = '';
}

$tmp;
$suppr;
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Panier</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" href="CSS/style.css" />
		<LINK REL="SHORTCUT ICON" href="images/icon.ico">
	</head>
		<body>
			<?php include("banniere.php"); ?>

			<div id="corps">
				
				<?php
				if(!isset($_SESSION['panier']) || calcul_totalarticles() == 0)
				{
				echo '<legend>Panier</legend>';
				echo '<fieldset>';
				echo '<div  class="paniervide">Votre panier est vide !</div>';
				echo '</fieldset>';
				}
				else
				{
					echo '<legend>Panier</legend>';
					$taille=count($_SESSION['panier']['qte']);
					for($i=0;$i<count($_SESSION['panier']['qte']);$i++)
					{
						if($_SESSION['panier']['qte'][$i] >= 1)
						{
							echo '<fieldset>';
							for($j=0;$j<5;$j++)
							{
								if($_SESSION['panier']['nom'][$i] == $_SESSION['produits']['nom'][$j])
								{

									echo '<div class="nomprod">';
									echo '<strong>Produit : </strong>';
									echo $_SESSION['produits']['nom'][$j];
									echo '</div>';
									
									echo '<div class="prix">';
									echo '<strong>Prix unitaire : </strong>';
									echo $_SESSION['produits']['prix'][$j], ' €'; 
									echo '</div>';
									
									echo '<div class="qte">';
									echo '<strong>Quantit&eacute encore disponible : </strong>';
									echo $_SESSION['produits']['qte'][$j];
									echo '</div>';
									
									echo '<div class="qtepanier">';
									echo '<strong>Quantit&eacute dans le panier : </strong>';
									echo $_SESSION['panier']['qte'][$i];
									echo '</div>';
							
									echo '<fieldset class="ajout">';
									echo "<a href=\"".htmlspecialchars("panier.php?selection=".rawurlencode($_SESSION['produits']['nom'][$j]))."\">Ajouter au panier</a>";
									echo '</fieldset>';
									echo '<fieldset class="ajout">';
									echo "<a href=\"".htmlspecialchars("panier.php?suppression=".rawurlencode($_SESSION['produits']['nom'][$j]))."\">Retirer du panier</a>";
									echo '</fieldset>';
								}
							}			
							echo '</fieldset>';
						}
					}
				}
				
				$tmp=$_GET['selection'];
				$suppr=$_GET['suppression'];
				
				for($count=0; $count<5; $count++)
				{
					if($_SESSION['produits']['nom'][$count] == $tmp)
					{						
						ajout_panier($count);
						header("Location: panier.php");
					}
				}
				
				for($count=0; $count<5; $count++)
				{
					if($_SESSION['produits']['nom'][$count] == $suppr)
					{	
						enlever_panier($count);
						header("Location: panier.php");
					}
				}
				?>
				
				<br>
				<legend>Total</legend>
				<fieldset>
					<div id="finfin">
					<br>
					<strong>Contenu : </strong><?php echo calcul_totalarticles(); ?> articles<br>
					<strong>Total TTC : </strong><?php echo calcul_total()?> €
					</div>
					<div class = "optionpanier">
					<a href="products.php">Retour aux produits</a><br><br>
					<a href="achats.php">Finaliser vos achats</a><br><br>
					<a href="destroy.php">Vider le panier</a>
					</div>
				</fieldset>
			
			</div>
			
				
	
		<?php include("footer.php"); ?>
	</body>
</html>
