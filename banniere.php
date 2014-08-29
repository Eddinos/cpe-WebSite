<?php
if (!isset($_cookie['panier']))
{
setcookie('panier', NULL, time() + 365*24*3600, null, null, false, true);
}
?>
<!DOCTYPE html>
<head>
	<title>Votre panier</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" type="text/css" href="CSS/style.css"/>
	<LINK REL="SHORTCUT ICON" href="images/icon.ico">
</head>
<body>
<div id="banniere">
	<div id="logo">
		<a href="index.php"><img src="Images/RobotWithLogo.png"></a>
		
	</div>
	<div id="liens">
		<div id="banaboutus"><a href="aboutus.php"> Notre entreprise  </a></div>
		<div id="banproduct"><a href="products.php"> Nos Produits  </a></div>
		<div id="baninscrip"><a href="inscription.php"> Inscription  </a></div>
		<div id="bancontact"><a href="contact.php"> Contactez-nous  </a></div>
		<div id="banpanier"><a href="panier.php"> Votre Panier  </a></div>
		
	</div>
</div>
</body>
</html>
