<?php

//initialisations

function init_panier()
{
	if (!isset($_SESSION['panier']))
	{
		$_SESSION['panier']=array();
		$_SESSION['panier']['nom']=array();
		$_SESSION['panier']['qte']=array();
		$_SESSION['panier']['prix']=array();
		
	}
}

function init_produits()
{
	if (!isset($_SESSION['produits']))
	{
		
		$id=0;
		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
		$reponse = $bdd->query('SELECT * FROM productlist');
		while ($donnees = $reponse->fetch())
		{
			
			$_SESSION['produits']['nom'][$id]=$donnees['title'];
			$_SESSION['produits']['prix'][$id]=$donnees['price'];
			$_SESSION['produits']['qte'][$id]=$donnees['number'];
			$_SESSION['produits']['image'][$id]=$donnees['imgbase64'];
			$_SESSION['produits']['description'][$id]=$donnees['description'];
			$id++;
		}		
	}
}



//fonctions de modification du panier

function ajout_panier($cible)
{
	if($_SESSION['produits']['qte'][$cible]==0)
	{
		echo '<br>Limite de stocks atteinte !<br>';
	}
	else
	{
		$taille=count($_SESSION['panier']['qte']);
		if($taille == 0 && $_SESSION['produits']['qte'][$cible]>0)
			{
				array_push($_SESSION['panier']['nom'], $_SESSION['produits']['nom'][$cible]);
				array_push($_SESSION['panier']['qte'], 1);
				array_push($_SESSION['panier']['prix'], $_SESSION['produits']['prix'][$cible]);
				$_SESSION['produits']['qte'][$cible]--;
			}
		else
		{
			for($i=0;$i<$taille;$i++)
			{
				if($_SESSION['panier']['nom'][$i] == $_SESSION['produits']['nom'][$cible] && $_SESSION['produits']['qte'][$cible]>0)
					{
						$_SESSION['panier']['qte'][$i]++;
						$_SESSION['produits']['qte'][$cible]--;
						return 0;
					}
				else if($i+1==$taille && $_SESSION['produits']['qte'][$cible]>0)
					{
						array_push($_SESSION['panier']['nom'], $_SESSION['produits']['nom'][$cible]);
						array_push($_SESSION['panier']['qte'], 1);
						array_push($_SESSION['panier']['prix'], $_SESSION['produits']['prix'][$cible]);
						$_SESSION['produits']['qte'][$cible]--;
					}
				else
					{
						echo '<br/>Limite du stock atteinte<br/>';						
					}
			}
		}
	}
}



function enlever_panier($cible)
{
	for($i=0;$i<count($_SESSION['panier']['qte']);$i++)
	{
		if($_SESSION['panier']['nom'][$i] == $_SESSION['produits']['nom'][$cible] && $_SESSION['panier']['qte'][$i]>0)
			{
				$_SESSION['panier']['qte'][$i]--;
				$_SESSION['produits']['qte'][$cible]++;
			}
	}
}



function RAZ_panier()
{
	unset($_SESSION['panier']);
	init_panier();
	unset($_SESSION['produits']);
	init_produits();
}



function calcul_totalarticles()
{
	init_panier();
	
	$articles=0;
	
	$taille=count($_SESSION['panier']['qte']);
	if($taille<1)
	{
		return 0;
	}
	else
	{
		for($i=0;$i<count($_SESSION['panier']['qte']);$i++)
		{
			if($_SESSION['panier']['qte'][$i]>=1)
				{
					$articles +=$_SESSION['panier']['qte'][$i];
				}
		}
		return $articles;
	}
}



function calcul_total()
{
	$total=0;
	for($i=0;$i<count($_SESSION['panier']['qte']);$i++)
	{
		if($_SESSION['panier']['qte'][$i]>=1)
			{
				$total +=$_SESSION['panier']['qte'][$i] * $_SESSION['panier']['prix'][$i];
			}
	}
	return $total;
}


?>
