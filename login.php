<?php require_once 'conn.php'; ?>

<?php

if ($_POST) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $query = $db->prepare('SELECT * FROM usuarios WHERE email = :email AND senha = :senha');
    
    $query->execute([
        ":email" => $email,
        ":senha" => $senha
    ]);

    $usuario = $query->fetch(PDO::FETCH_ASSOC);
       
    if (!$usuario) {
        $erro = true;
    } else {
        session_start();

        $_SESSION["logado"] = true;
        $_SESSION["id"] = $usuario["id"];
        $_SESSION["nome"] = $usuario["nome"];
        

        header("location: index.php");
    }
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="styles/css/valida.css">
    <link rel="stylesheet" href="styles/css/login.css" media="all">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
<!------ Include the above in your HEAD tag ---------->
<div class="super_container">

<?php	include 'inc/header.php'; ?>
<br><br><br><br><br><br><br>

<div class="container">

<div id="erro" class="alert alert-danger d-none">
        Preencha a descrição corretamente!
      </div>

    <?php if (isset($erro) && $erro === true): ?>
        <div class="alert alert-danger" role="alert">
            Usuário ou senha inválidos!
        </div>
    <?php endif; ?>
      
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Faça o Login para Continuar</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin" id="formAdicionarTarefa" action="#" method="POST">
                    <input name="email" id='description' type="text" class="form-control"  placeholder="Email"  ><br>
                    <input name="senha" type="password" class="form-control" placeholder="Password" >
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        Entre
                    </button>
                    <label class="checkbox pull-left">
                        <input type="checkbox" value="remember-me">
                        Lembre meus dados
                    </label>
                    <a href="contact.php" class="pull-right need-help">Precisa de Ajuda? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="cadastro.php" class="text-center new-account">Crie sua conta aqui </a>
        </div>
    </div>
</div>
</div>



</body>
</html>