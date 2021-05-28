<?php
    include("config/config.php");
?>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/shop-homepage.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css">

<script>
    $(document).ready(function() {	
		$(".form-item").submit(function(e) {
			var form_data = $(this).serialize();
			var button_content = $(this).find('button[type=submit]');
			button_content.html('Adicionando...'); //Loading button text 

			$.ajax({ //make ajax request to cart_process.php
				url: "includes/cart_process.php",
				type: "POST",
                dataType:"json", //expect json value from server
                data: form_data
            }).done(function(data){ //on Ajax success
                $(".cart-box").html(data.items); //total items in cart-info element
                button_content.html('Adicionar'); //reset button text to original text
            })
            e.preventDefault();
        });

        //Show Items in Cart
        $(".cart-box").click(function(e) { //when user clicks on cart box
            e.preventDefault(); 
            $(".shopping-cart-box").fadeIn(); //display cart box
            $("#shopping-cart-results").html('<img src="img/ajax-loader.gif">'); //show loading image
            $("#shopping-cart-results" ).load( "includes/cart_process.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
        });

        //Close Cart
        $( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
            e.preventDefault(); 
            $(".shopping-cart-box").fadeOut(); //close cart-box
        });

        //Remove items from cart
        $("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
            event.preventDefault(); 
            var pcode = $(this).attr("data-code"); //get product code
            $(this).parent().fadeOut(); //remove item element from box
            $.getJSON("includes/cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
                $("#cart-info").html(data.items); //update Item count in cart-info
                $(".cart-box").trigger("click"); //trigger click on cart-box to update the items list
            });
        });
    });
</script>

<body>
    <div class="col-md-9">
        <a href="#" class="cart-box" id="cart-info" title="Ver Carrinho">
            <?php 
                if(isset($_SESSION["products"])) {
                    echo count($_SESSION["products"]); 
                } else {
                    echo 0; 
                }
            ?>
        </a>

        <div class="shopping-cart-box cartInfoFix">
            <a href="#" class="close-shopping-cart-box" >Fechar</a>
            <h4>Carrinho de Compras</h4>
            <div id="shopping-cart-results">
            </div>
        </div>
        <hr>
    </div>
    <div class="col-md-9">
        <div class="row carousel-holder">
            <div class="col-md-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="slide-image" src="http://placehold.it/800x300" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="http://placehold.it/800x300" alt="">
                        </div>
                        <div class="item">
                            <img class="slide-image" src="http://placehold.it/800x300" alt="">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <?php
                include("config/config.php");
                if($stmt = $mysqli->prepare("SELECT nome_produto, descricao_produto, codigo_produto, valor_produto, qtd_produto, imagem_produto, aprovar FROM produto")) {
                    $mysqli->set_charset('utf8mb4');
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($nome_produto, $descricao_produto, $codigo_produto, $valor_produto, $qtd_produto, $imagem_produto, $aprovar);
                    $num_rows = $stmt->num_rows;
                    if($num_rows>0) {
                        while ($stmt->fetch()) {
                            if($qtd_produto >= 1 && $aprovar == 1) {
                                echo "<div class='col-sm-4 col-lg-4 col-md-4'>
                                    <div class='thumbnail'>
                                        <img src='includes/back-office/img/$imagem_produto' height='150' width='320'/>
                                        <form class='form-item'>
                                            <div class='caption'>
                                                <input name='product_code' type='hidden' value='$codigo_produto'>
                                                <h4 class='pull-right' name='product_price'> $valor_produto € </h4>
                                                <h4 name='product_name'><a href='#'> $nome_produto </a></h4>
                                                <p> $descricao_produto </p>
                                            </div>
                                            <div class='ratings'>
                                                <span>Quantidade: </span><input required='' type='number' name='product_qty' placeholder='1' min='1' max='$qtd_produto'>
                                                <button type='submit' name='submit'>Adicionar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>";
                            }
                        }
                        $stmt->close();	
                    } else {
                        echo "Não foram encontrados resultados!<br>";
                    }
                }
            ?>
        </div>
    </div>
</body>