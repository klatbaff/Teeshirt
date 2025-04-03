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
	//if ($quantity < 0 || $quantity > 3) {
    //cela n'est pas possible donc retour false
    //return false;
	// } else {
    //sinon cela me retourne le produit et sa quantité et la date de création


	//pour vérifier que le produit existe dans ma liste de produits
    // je calcule si la quantité de mon produit est inférieure a 0
	if ($quantity < 0) {
		// je lève une exception pour que la quantité soit supérieure à 0 
		throw new Exception("La quantité doit être supérieur à 0");
		//ou si la quantité est supérieure a 3
	} else if ($quantity > 3) {
		// je lève une exception pour que la quantité soit inférieure à 3
		throw new Exception("La quantité doit être inférieur à 3");
	} else {
		// sinon, je renvoie un tableau contenant le produit, la quantité et la date de création de la commande
		$order = [
			"product" => $product,
			"quantity" => $quantity,
			"createdAt" => new DateTime()
		];

			return $order;
	}
}
 
// equivalent pour une BDD
// INSERT INTO order values ($order['product'], $order['quantity'])


// fonction pour enregistrer
function saveOrder($order) {
        // je renvoie le tableau associatif
        // je l'enregistre dans la session
	$_SESSION["order"] = $order;
}
// fonction pour supprimer
function deleteOrder() {
	//je supprime la clé order de mon espace de stockage de session sur le serveur
	unset($_SESSION["order"]);
}