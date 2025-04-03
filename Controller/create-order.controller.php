<?php

require_once('../Config.php');
require_once('../Model/product.repository.php');
require_once('../Model/order.repository.php');

// je démarre la session : php créé un identifiant unique, l'associe à une zone de stockage sur le serveur
// et envoie l'identifiant au navigateur qui le stocke en cookie
session_start();

$message = "";

// je vérifie que la quantité est bien renseignée et que le produit est bien sélectionnée

if (array_key_exists("quantity", $_POST) && 
	array_key_exists("product", $_POST))
{
	// je crée une commande (un tableau qui contient les données du formulaire)
	//  ( $order = [
	//	"product" => $_POST["product"],
	//	"quantity" => $_POST["quantity"]
	//  ];)

	//j'utilise le bloc try-catch pour intercepter les erreurs et afficher un message d'erreur 
     //si une exception est lancée dans la fonction createOrder
	try {
			$order = createOrder($_POST['product'], $_POST['quantity']);
	// si c'est une nouvelle commande je l'enregistre
		   saveOrder($order);
    //  sinon je recupère un message d'erreur de l'exception
	} catch(Exception $e) {
		$message = $e->getMessage();
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