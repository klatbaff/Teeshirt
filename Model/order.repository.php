<?php

// je crée une fonction pour retrouver une commande liée a un utilisateur
function findOrderByUser() {
	if (array_key_exists("order", $_SESSION)) {
		return $_SESSION["order"];
	} else {
		return null;
	}
}
// je crée une fonction pour récuperer la commande du produit et la quantité en une fois
function createOrder($product, $quantity) {
	$order = [
		"product" => $product,
		"quantity" => $quantity
	];

	return $order;
}


function saveOrder($order) {
	$_SESSION["order"] = $order;
}