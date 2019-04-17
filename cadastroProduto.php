<?php

require_once 'conn.php';

if ($_POST) {
	$nomeProduto = $_POST["nomeProduto"];
	$descricaoProduto = $_POST["descricaoProduto"];
    $valor = $_POST["valor"];
    $categoria = $_POST["categoria"];
	$imagemFoto = $_POST["imagemFoto"];
	

	
	
$sql = "INSERT INTO produtos (nomeProduto, descricaoProduto, valor, categoria, imagemFoto) 
VALUES (:nomeProduto, :descricaoProduto, :valor, :categoria, :imagemFoto)";

$query = $db->prepare($sql);

$salvou = $query->execute([
	":nomeProduto" =>$nomeProduto,
	":descricaoProduto" => $descricaoProduto,
    ":valor" => $valor,
    ":categoria" => $categoria,
	":imagemFoto" => $imagemFoto
	
]);
}
?>


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
    

   <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Cadastro de Produtos</h1>
    <p class="lead">Use o formulario abaixo para cadastrar.</p>
  </div>
</div>

<form  method="post" action="cadastroProduto.php">
    <div class= "container">
        <div class="form-group">
            <label for="formGroupExampleInput">Nome</label>
            <input  name='nomeProduto' type="text" class="form-control" id="formGroupExampleInput" placeholder="Nome produto">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Descrição</label>
            <input name='descricaoProduto' type="text" class="form-control" id="formGroupExampleInput2" placeholder="Descriçao Produto">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Valor</label>
            <input  name='valor' type="text" class="form-control" id="formGroupExampleInput" placeholder="Valor Produto">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Categoria</label>
            <input  name='categoria' type="text" class="form-control" id="formGroupExampleInput" placeholder="Categoria Produto">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Imagem Foto</label>
            <input  name='imagemFoto' type="text" class="form-control" id="formGroupExampleInput2" placeholder="Imagem URL">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

</body>