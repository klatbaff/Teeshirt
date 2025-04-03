<?php

// equivalent pour une table de BDD avec l'id del l'utilisateur
//SELECT * FROM order where user.id = $id


// je crée une fonction pour retrouver une commande liée a un utilisateur
function findOrderByUser() {
     //je regarde s'il y une clé order dans mon espace de stockage de session sur le serveur
	if (array_key_exists("order", $_SESSION)) {
     // si oui, je renvoie la valeur de cette clé
		return $_SESSION["order"];
	} else {
        // sinon, je renvoie null
		return null;
	}
}
 //je créé une fonction pour créer une commande
// je lui passe en paramètre le produit et la quantité
function createOrder($product, $quantity) {

	// si la quantité est inférieure a 0 ou supérieure a 3 
	if ($quantity < 0 || $quantity > 3) {
		//cela n'est pas possible donc retour false
		return false;
	} else {
		//sinon cela me retourne le produit et sa quantité
		$order = [
			"product" => $product,
			"quantity" => $quantity
		];

			return $order;
	}
}
 
// equivalent pour une BDD
// INSERT INTO order values ($order['product'], $order['quantity'])

function saveOrder($order) {
        // je renvoie le tableau associatif
    // je l'enregistre dans la session
	$_SESSION["order"] = $order;
}