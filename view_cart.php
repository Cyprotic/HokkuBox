<link href="../css/style.css" rel="stylesheet" type="text/css">
    
<h3 style="text-align:center">Meu carrinho</h3>
<?php
    if(isset($_SESSION["products"]) && count($_SESSION["products"])>0) {
        $total = 0;
        $cart_box = "<ul class='view-cart'>";

        foreach($_SESSION["products"] as $product) {
            $product_name = $product["product_name"];
            $product_qty = $product["product_qty"];
            $product_price = $product["product_price"];
            $product_code = $product["product_code"];

            $item_price = $product_price * $product_qty;  

            $cart_box .= "<p> <b>$product_name (Quantidade: $product_qty ) -</b> <span> $item_price € </span></p>";

            $subtotal = ($product_price * $product_qty);
            $total = ($total + $subtotal);
        }

        $grand_total = $total;

        $cart_box .= "<p class=\"view-cart-total\"> <hr><b>Valor a Pagar:</b> ".$grand_total." €</p>";
        $cart_box .= "</ul>";

        echo $cart_box;
    } else {
        echo "O teu carrinho está vazio";
    }
?>