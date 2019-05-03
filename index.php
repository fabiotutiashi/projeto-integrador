   <?php require_once 'conn.php'; 
   session_start();
   ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Sublime</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<div class="super_container">

<!-- Incluindo o header -->
<?php	include 'inc/header.php'; ?>

	
	
	<!-- Home -->

	<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(images/home_slider_1moto.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">Uma nova experiência de loja online.</div>
										<div class="home_slider_subtitle">Aqui voçê encontra todas as peças e acessórios para sua moto com preço compatível no mercado</div>
										<div class="button button_light home_button"><a href="#">Compre Agora</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(images/home_slider_1moto.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
									<div class="home_slider_title">Uma nova experiência de loja online.</div>
										<div class="home_slider_subtitle">Aqui voçê encontra todas as peças e acessórios para sua moto com preço compatível no mercado</div>
										<div class="button button_light home_button"><a href="#">Compre Agora</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(images/home_slider_1moto.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
									<div class="home_slider_title">Uma nova experiência de loja online.</div>
										<div class="home_slider_subtitle">Aqui voçê encontra todas as peças e acessórios para sua moto com preço compatível no mercado</div>
										<div class="button button_light home_button"><a href="#">Compre Agora</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- Home Slider Dots -->
			
			<div class="home_slider_dots_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_slider_dots">
								<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
									
								</ul>
							</div>
						</div>
					</div>
				</div>	
			</div>

		</div>
	</div>

	<!-- Ads -->

	<div class="avds">
		<div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
			<div class="avds_small">
				<div class="avds_background" style="background-image:url(images/capacetes.jpg)"></div>
				<div class="avds_small_inner">
					<div class="avds_discount_container">
						<img src="images/discount.png" alt="">
						<div>
							<div class="avds_discount">
								<div>20<span>%</span></div>
								<div>Desconto</div>
							</div>
						</div>
					</div>
					<div class="avds_small_content">
						<div class="avds_title">Capacetes</div>
						<div class="avds_link"><a href="categoriesAcessorios.php">Veja Mais</a></div>
					</div>
				</div>
			</div>
			<div class="avds_large">
				<div class="avds_background" style="background-image:url(images/motor.jpg)"></div>
				<div class="avds_large_container">
					<div class="avds_large_content">
						<div class="avds_title">Peças para Motores</div>
						<div class="avds_text">Aqui voçê encontra peças para motor de todos os modelos de motos, peças de qualidade originais e similares de primeira linha</div>
						<div class="avds_link avds_link_large"><a href="categoriesPecas.php">Veja Mais</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="product_grid">
   				
					   
					<?php
						$query = $db->prepare("SELECT * FROM produtos");
						$query->execute();
						$produtos = $query->fetchAll(PDO::FETCH_ASSOC);
						
						foreach ($produtos as $produto):

					?>
						
				<!-- Product -->
						<div class="product">

							<div class="product_image float-right"><img src=<?=$produto['imagemFoto']?> alt=""></div>
								<div class="product_content">
									<div class="product_title"><a href="product.php?id=<?= $produto['id']; ?>"><?=$produto['nomeProduto']?></a></div>
										<div class="product_price"><?=$produto['valor']?></div>
									</div>
								</div>
									<?php endforeach;	?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
				
	
	<!-- Ad -->

	<div class="avds_xl">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="avds_xl_container clearfix">
						<div class="avds_xl_background" style="background-image:url(images/avds1.jpg)"></div>
						<div class="avds_xl_content">
							<div class="avds_title">Escolha por Categoria</div>
							<div class="avds_text">Voçê pode escolher entre peças e acessórios!</div>
							<div class="avds_link avds_xl_link"><a href="categories.php">Veja Mais</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">
				
				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
						<div class="icon_box_title">Frete Gratis</div>
						<div class="icon_box_text">
							<p>Frete gratis para todo o Brasil</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
						<div class="icon_box_title">Devolução Gratuita</div>
						<div class="icon_box_text">
							<p>Devoluçao gratuita para todo o Brasil</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
						<div class="icon_box_title">Suporte 24 horas</div>
						<div class="icon_box_text">
							<p>Suporte 24 horas para todo o Brasil</p>
						</div>
					</div>
				</div>

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
<script src="js/custom.js"></script>
</body>
</html>