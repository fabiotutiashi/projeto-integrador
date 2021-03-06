<?php require_once 'conn.php'; 
   session_start();

    $id_usuario = $_SESSION["id"];

	$_SESSION["idProduto"] = $_GET['id'];

	$query = $db->prepare('SELECT * FROM produtos WHERE id = :id');
	$query->execute([
		":id" => $_SESSION["idProduto"]
	]);

	$produto = $query->fetch(PDO::FETCH_ASSOC);

	if ($_POST) {

		$idUsuario = $_POST["id_usuario"]; 
		$idProduto = $_POST["id_produto"]; 
		$valor = $_POST["valor"];
		$status = " ";

		$query = $db->prepare("INSERT INTO pedido_compra (id_usuario, id_produto, valor_produto, status) 
		VALUES (:id_usuario, :id_produto, :valor_produto, :status)");

		$salvou = $query->execute([
			":id_usuario" => $idUsuario,
			":id_produto" => $idProduto,
			":valor_produto" => $valor,
			":status" => $status
		]);

	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Product</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/product.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
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
								<div class="home_title">Produto e Descrição</div>
								<div class="home_text"><p>Aqui voçê verifica a descricao do produto e adiciona ao carrinho</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Product Details -->

	<div class="product_details">
		<div class="container">
			<div class="row details_row">

				<!-- Product Image -->
				<div class="col-lg-6">
					<div class="details_image">
						<div class="details_image_large"><img src="<?=$produto['imagemFoto']?>" alt=""><div class="product_extra product_new"><a href="categories.php">New</a></div></div>
						<div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
							</div>
					</div>
				</div>

				<!-- Product Content -->
				<div class="col-lg-6">
					<div class="details_content">
						<div class="details_name"><?=$produto["nomeProduto"]?></div>
						
						<div class="details_price"><?=$produto["valor"]?></div>

						<!-- In Stock -->
						<div class="in_stock_container">
							<div class="availability">Disponobilidade:</div>
							<span>Em Estoque</span>
						</div>
						<div class="details_text">
							<p><?=$produto["descricaoProduto"]?></p>
						</div>

						<!-- Product Quantity -->
						<form action="" method="post">
							<div class="product_quantity_container">
								<input type="hidden" name="id_usuario" value="<?= $id_usuario; ?>">
								<input type="hidden" name="id_produto" value="<?= $produto['id']; ?>">
								<input type="hidden" name="valor" value="<?= $produto['valor']; ?>">
								
								<button type="submit" class="btn btn-secondary">Adicionar</button>
							</div>
						</form>
							<?php if (isset($salvou) && $salvou === true): ?>
								<div class="alert alert-success" role="alert">
									Produto adicionado ao carrinho!
								</div>
								
							<?php endif; ?>
						<!-- Share -->
						<div class="details_share">
							<span>Share:</span>
							<ul>
							<li><a href="https://br.pinterest.com/"target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
								<li><a href="https://www.instagram.com"target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="https://pt-br.facebook.com/"target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="https://twitter.com/"target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="row description_row">
				<div class="col">
					
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="products_title"></div>
				</div>
			</div>
			<div class="row">
				
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_border"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="newsletter_content text-center">
					<div class="newsletter_title">Receba nossas Ofertas</div>
						<div class="newsletter_text"><p>Digite seu e-mail para receber ofertas</p></div>
						<div class="newsletter_form_container">
							<form action="#" id="newsletter_form" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required">
								<button class="newsletter_button trans_200"><span>Inscreva-se</span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

		<!-- incluindo o footer -->
		<?php include 'inc/footer.php';?>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/product.js"></script>
</body>
</html>