<?php
session_start();
include("../config/config.php"); 

############# add products to session #########################
if(isset($_POST["product_code"]))
{
	foreach($_POST as $key => $value){
		$new_product[$key] = $value; //create a new product array 
	}
	
	//we need to get product name and price from database.
	$statement = $mysqli->prepare("SELECT nome_produto, valor_produto FROM produto WHERE codigo_produto=? LIMIT 1");
    $mysqli->set_charset('utf8mb4');
	$statement->bind_param('s', $new_product['product_code']);
	$statement->execute();
	$statement->bind_result($product_name, $product_price);

	while($statement->fetch()){ 
		$new_product["product_name"] = $product_name; //fetch product name from database
		$new_product["product_price"] = $product_price;
		
		if(isset($_SESSION["products"])){  //if session var already exist
			if(isset($_SESSION["products"][$new_product['product_code']])) //check item exist in products array
			{
				unset($_SESSION["products"][$new_product['product_code']]); //unset old item
			}			
		}
		
		$_SESSION["products"][$new_product['product_code']] = $new_product;	//update products with new item array
	}
	
 	$total_items = count($_SESSION["products"]); //count total items
	die(json_encode(array('items'=>$total_items))); //output json
    
}

################## list products in cart ###################
if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1) {

	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ //if we have session variable
		$cart_box = '<ul class="cart-products-loaded">';
		$total = 0;
		foreach($_SESSION["products"] as $product){ //loop though items and prepare html content
			
			//set variables to use them in HTML content below
            $mysqli->set_charset('utf8mb4');
			$product_name = $product["product_name"];
			$product_price = $product["product_price"];
			$product_code = $product["product_code"];
			$product_qty = $product["product_qty"];
			
			$cart_box .=  "<li> $product_name (Quantidade : $product_qty ) - ".$product_price * $product_qty. "€ <a href=\"#\" class=\"remove-item\" data-code=\"$product_code\">&times;</a></li>";
			$subtotal = ($product_price * $product_qty);
			$total = ($total + $subtotal);
		}
		$cart_box .= "</ul>";
		$cart_box .= '<div class="cart-products-total">Total : '.$total.' € <u><a href="index.php?page=view_cart" title="Verifica o carrinho e faz checkout">Checkout</a></u></div>';
		die($cart_box); //exit and output content
	}else{
		die("O teu carrinho está vazio!"); //we have empty cart
	}
}

################# remove item from shopping cart ################
if(isset($_GET["remove_code"]) && isset($_SESSION["products"]))
{
	$product_code = $_GET["remove_code"]; //get the product code to remove

	if(isset($_SESSION["products"][$product_code]))
	{
		unset($_SESSION["products"][$product_code]);
	}
	
 	$total_items = count($_SESSION["products"]);
	die(json_encode(array('items'=>$total_items)));
}