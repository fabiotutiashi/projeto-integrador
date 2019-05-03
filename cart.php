<?php

	require_once 'conn.php'; 
	session_start();

	$id_usuario = $_SESSION["id"];

	$query = $db->prepare('SELECT * FROM pedido_compra WHERE id_usuario = :id_usuario AND status = :status');
	$query->execute([
		":id_usuario" => $id_usuario,
		":status" => " "
	]);

	$ítensCarrinho = $query->fetchAll(PDO::FETCH_ASSOC);

	if (isset($_POST['finalizar'])){

		$id_usuario = $_REQUEST['id_usuario'];
        $id_produto = $_REQUEST['id_produto'];
        $valor = $_REQUEST['valor'];	
        $quantidade = $_REQUEST['quantidade'];
        $valor_total = $_REQUEST['custo_total'];
		$status = $_REQUEST['status'];
		
        for($i = 0; $i < count($id_produto); $i++)  {
			$result = "UPDATE pedido_compra set quantidade = '$quantidade[$i]', valor_total = '$valor_total[$i]', status = '$status[$i]' WHERE id_usuario = '$id_usuario' AND id_produto = '$id_produto[$i]' ";  
			$resultado = $db->query($result);   
		}
		$ítensCarrinho = [];
	}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/cart.css">
<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Incluindo o header -->
<?php	include 'inc/header.php'; ?>

	
	
	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/categoria.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="index.php">Home</a></li>
										<li><a href="categories.php">Categorias</a></li>
										<li>Carrinho</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Cart Info -->

	<div class="cart_info">
		<div class="container">
			<div class="row">
				<div class="col">
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
						<div class="cart_info_col cart_info_col_product">Produto</div>
						<div class="cart_info_col cart_info_col_price">Valor</div>
						<div class="cart_info_col cart_info_col_quantity">Quantidade</div>
						<div class="cart_info_col cart_info_col_total">Total</div>
					</div>
				</div>
			</div>
					
			<div class="row cart_items_row">
				<div class="col">
					<!-- Cart Item -->
					<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<!-- Name -->
						<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
							<div class="cart_item_image">
								<div><img src="" alt=""></div>
							</div>
							<div class="cart_item_name_container">
								<div class="cart_item_name"><h2></h2></div>
								
							</div>
						</div>
						<!-- Price -->
						<div class="cart_item_price"></div>
						<!-- Quantity -->
						<form action="" method="post">	

							<?php 
								foreach ($ítensCarrinho as $item): 
							?>
									<div class="cart_item_quantity">
										<input type="hidden" name="id_usuario" value="<?= $item["id_usuario"]; ?>">
										<input type="hidden" name="id_produto[]" value="<?= $item['id_produto']; ?>">
										<input type="hidden"  id="preco_venda" name="valor[]" value="<?= $item['valor_produto']; ?>">
										<input type="hidden" name="status[]" value="FIN">

										<div class="product_quantity_container">
											<div class="product_quantity clearfix">
												<span>Qty</span>
												<input id="quantidade" type="text" name="quantidade[]" pattern="[0-9]*" value="1">
												<div class="quantity_buttons">
													<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
													<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
												</div>
											</div>
											<input type="text" id="custo_total" name="custo_total[]">
										</div>
										
									</div>
							<?php
								endforeach;
							?>	

							<div class="row row_cart_buttons">
								<div class="col-12">
									Valor Total R$: <span id="PrintSoma">0.00</span><br><br>
                					<input type="submit" class="btn btn-light" value="Finalizar Compra" id="finalizar" name="finalizar">
								</div>
							</div>

						</form>
					
					</div>

				</div>
			</div>
		</div>		
	</div>

	<!-- incluindo o footer -->
	<?php include 'inc/footer.php';?>

<script>
    /* Ínicio de Função criada para calcular dinamicamente o preço * quantidade e mostrar o resultado total por produto e por fim abaixo da tabela o total da compra */
    var prices = document.querySelectorAll("[id^=preco_venda]"),
        ammounts = document.querySelectorAll("[id^=quantidade]"),
        subTotals = document.querySelectorAll("[id^=custo_total]"),
        printSum = document.getElementById("PrintSoma")
    function sumIt() {
        var total = 0
        Array.prototype.forEach.call(prices, function (price, index) {
            var subTotal = (parseFloat(price.value) || 0) * (parseFloat(ammounts[index].value) || 0)
            subTotals[index].value = subTotal.toFixed(2)
            total += subTotal
        })
        printSum.textContent = total.toFixed(2)
    }
    Array.prototype.forEach.call(prices, function (input) {
        input.addEventListener("keyup", sumIt, false)
    })
    Array.prototype.forEach.call(ammounts, function (input) {
        input.addEventListener("keyup", sumIt, false)
    })
    /* Fim de Função criada para calcular dinamicamente o preço * quantidade e mostrar o resultado total por produto e por fim abaixo da tabela o total da compra */
    sumIt()
</script>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/cart.js"></script>
</body>
</html>