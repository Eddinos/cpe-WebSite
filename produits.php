<?php
session_start();
include_once("fonctions_panier.php");
init_panier();
init_produits();

if (!isset($_GET['selection']))
{
$_GET['selection'] = '';
} 

$tmp;
$id=0;

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Produits</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" href="CSS/style.css" />
		<LINK REL="SHORTCUT ICON" href="images/icon.ico">

	</head>
		<body>
			<?php include("banniere.php"); ?>
			

			<div id="corps">
			
				<?php
				

				
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
				}
				catch(Exception $e)
				{
					die('Erreur:'.$e->getMessage());
				}
				$reponse = $bdd->query('SELECT * FROM productlist');
				$i=0;
				while ($donnees = $reponse->fetch())
				{
					$i=$i+1;
					echo '<div id="section'.$i.'">';
					
					echo '<fieldset>';
					echo '<legend>';
					echo $donnees['title'];
					echo '</legend>';
					
					$image=$donnees['imgbase64'];
					echo '<img id="imgprod" alt=" " src="data:image/gif;base64,'.$image.'" />';

					echo '<div id="description">';
					echo $donnees['description'];
					echo '</div>';
					
					echo '<fieldset id="prix"><legend>Prix</legend>';
					echo $donnees['price'], ' €';
					echo '</fieldset>';
					echo '<br><br><br><br>';
					
					echo '<fieldset id="qte"><legend>Quantité disponible</legend>';
					echo $_SESSION['produits']['qte'][$id];
					echo '</fieldset>';
					echo '<br><br><br><br><br><br>';

					echo '<fieldset id="ajout">';
					echo "<a href=\"products.php?selection=".rawurlencode($donnees['title'])."\" id=\"ajout\">Ajouter au panier</a>";
					echo '</fieldset>';
					
					echo '</div>';					
					echo '</fieldset>';

					$id++;
					
				}
					

				$tmp=$_GET['selection'];
				
				for($count=0; $count<5; $count++)
				{
					if($_SESSION['produits']['nom'][$count] == $tmp)
					{						
						ajout_panier($count);
						
						header("Location: products.php");
					}
				}
				
				?>
				

			</div>
	
		<?php include("footer.php"); ?>

	</body>
</html>
