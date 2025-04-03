<?php

require_once('../Config.php');
require_once('../Model/product.repository.php');
require_once('../Model/order.repository.php');

// je démarre la session : php créé un identifiant unique, l'associe à une zone de stockage sur le serveur
// et envoie l'identifiant au navigateur qui le stocke en cookie
session_start();

$message = "";

if (array_key_exists("quantity", $_POST) && 
	array_key_exists("product", $_POST))
{
	// je crée une commande (un tableau qui contient les données du formulaire)
	//  ( $order = [
	//	"product" => $_POST["product"],
	//	"quantity" => $_POST["quantity"]
	//  ];)

	// Je déclare que ma variable order prends en compte ma fonction pour créer une commande
	$order = createOrder($_POST['product'], $_POST['quantity']);
	// si c'est une nouvelle commande je l'enregistre
	if ($order) {
		saveOrder($order);
    // sinon cle ma renvoie un message d'erreur
	} else {
		$message = "impossible de créer la commande";
	}

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