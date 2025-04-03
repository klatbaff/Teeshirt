<?php

require_once('../Config.php');
require_once('../Model/product.repository.php');

// je démarre la session : php créé un identifiant unique, l'associe à une zone de stockage sur le serveur
// et envoie l'identifiant au navigateur qui le stocke en cookie
session_start();

if (array_key_exists("quantity", $_POST) && 
	array_key_exists("product", $_POST))
{
	// je crée une commande (un tableau qui contient les données du formulaire)
	//  ( $order = [
	//	"product" => $_POST["product"],
	//	"quantity" => $_POST["quantity"]
	//  ];)

	// Je regroupe
	$order = createOrder($_POST['product'], $_POST['quantity']);
	saveOrder($order);

	// j'ajoute dans "ma" zone de stockage de session (sur le serveur) la commande que je viens de créer
	// $_SESSION["order"] = $order;


}
$orderByUser = findOrderByUser();


require_once('../View/create-order.view.php');

// le controleur : 

// récupère les données de requête (GET, POST etc etc)
// appelle le(s) répository pour récupérer les données (bdd, session)
// créé des variables / fonctions etc, pour simplifier l'utilisation des données dans la view
// renvoie une réponse contenant le HTML généré par la view