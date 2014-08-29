<?php
session_start();
unset($_SESSION['panier']);
unset($_SESSION['produits']);
Header("Location: panier.php");
?>
