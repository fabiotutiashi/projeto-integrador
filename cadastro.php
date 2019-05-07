<?php

require_once 'conn.php';

if ($_POST) {
	$nome = $_POST["nome"];
	$sobrenome = $_POST["sobrenome"];
	$data = $_POST["data"];
	$email = $_POST["email"];
	$endereco = $_POST["endereco"];
	$cidade = $_POST["cidade"];
	$cep = $_POST["cep"];
	$senha = $_POST["senha"];
	$confirmar_senha = $_POST["confirmar_senha"];
	$genero = $_POST["genero"];

	if ($genero == "masculino"){
		$generou = "masculino";
	} else {
		$generou = "feminino";
	}
	
$sql = "INSERT INTO usuarios (nome, sobrenome, nasc, email, endereco, cidade, cep, senha, confirmar_senha, genero) 
VALUES (:nome, :sobrenome, :nasc, :email, :endereco, :cidade, :cep, :senha, :confirmar_senha, :genero)";

$query = $db->prepare($sql);

$salvou = $query->execute([
	":nome" => $nome,
	":sobrenome" => $sobrenome,
	":nasc" => $data,
	":email" => $email,
	":endereco" => $endereco,
	":cidade" => $cidade,
	":cep" => $cep,
	":senha" => $senha,
	":confirmar_senha" => $confirmar_senha,
	":genero" => $genero
]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Cadastro</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Incluindo o header -->
<?php	include 'inc/header.php'; ?>

	
	<!-- Home -->

	<div class="home">
		
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">Cadastro de usuario</h1>
				<p class="lead">Use o formulario abaixo para se cadastrar.</p>
			</div>
		</div>
		
		
		<?php if (isset($salvou) && $salvou === true): ?>
								<div class="alert alert-success" role="alert">
								Cadastro realizado com sucesso!
								</div>
							<?php endif; ?>

	

	<!-- Checkout -->
	
	<div class="checkout">
	
	
	

<div id="erro" class="alert alert-danger d-none ">
        Preencha a descrição corretamente!
      </div>

<!-- cadastro cliente -->
<div class="container">
	<form method="post" action="cadastro.php">
  		<div class="form-row">
    		<div class="form-group col-md-5 ">
      			<label for="nome">Nome</label>
      			<input name="nome" type="text"  id="description" placeholder="Nome" class="form-control">
    		</div>
    		<div class="form-group col-md-5">
      			<label for="sobrenome">Sobrenome</label>
      			<input name="sobrenome" type="text" class="form-control" id="sobrenome" placeholder="Sobrenome">
    		</div>
			<div class="form-group col-md-2">
      			<label for="data">Data de nascimento</label>
      			<input name="data" type="date" class="form-control" id="data" placeholder="Data">
    		</div>
  		</div>
  		<div class="form-group">
    		<label for="email">Email</label>
   	 		<input name="email" type="email" class="form-control" id="email" placeholder="Email">
  		</div>
  		<div class="form-row">
  			<div class="form-group col-md-5">
    			<label for="endereco">Endereço</label>
    			<input name="endereco" type="text" class="form-control" id="endereco" placeholder="R/A">
  			</div>  
    		<div class="form-group col-md-5">
      			<label for="cidade">Cidade</label>
      			<input name="cidade" type="text" class="form-control" id="cidade" placeholder="Cidade">
    		</div>
    		<div class="form-group col-md-2">
      			<label for="cep">Cep</label>
      			<input name="cep" type="text" id="cep" class="form-control" placeholder="Cep">        
    		</div>
  		</div>
		  <div class="form-row">
    		<div class="form-group col-md-6">
      			<label for="senha">Senha</label>
      			<input name="senha" type="password" class="form-control" id="nome" placeholder="Senha">
    		</div>
    		<div class="form-group col-md-6">
      			<label for="confirma">Confirmar Senha</label>
      			<input name="confirmar_senha" type="password" class="form-control" id="sobrenome" placeholder="Confirmar Senha">
    		</div>			
  		</div>  		
  		<div class="form-check">
  			<input name="genero" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="masculino" checked>
  			<label class="form-check-label" for="exampleRadios1">Masculino</label>
		</div>
		<div class="form-check">
  			<input name="genero" class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="feminino">
  			<label class="form-check-label" for="exampleRadios2">Feminino</label>
		</div>	  
  		<button type="submit" class="btn btn-primary">Cadastrar</button>
	</form>	
	
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
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/checkout.js"></script>
</body>
</html>