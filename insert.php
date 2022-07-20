<?php

    include_once(dirname(__FILE__) . "/controller/Actions.php");

    $message['message'] = '';
    $message['status'] = '';

    if(isset($_POST['submit'])){
        if(($_POST['nome'] !='') && ($_POST['descricao'] !='') && ($_POST['preco'] !='') && ($_POST['qtd'] !='')){

            $message = Actions::insert($_POST);
        }

    }

    unset($_POST);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <title>Simple CRUD</title>
</head>
<body>
    <header class="container-md bg-light mt-3">
        <nav class="row align-items-center justify-content-center d-flex">
            <div class="logo col-6 text-center">
                <h1>Simple CRUD</h1>
            </div>
            <div class="col-6 text-center">
                <a href="insert.php" class="btn btn-primary">Cadastrar</a>
                <a href="index.php" class="btn btn-warning">Voltar</a>
            </div>
        </nav>
    </header>
    <main class="container-md bg-light mt-3 p-3">
        <div class="col-6 mx-auto <?=$message['status']?> text-center">
            <p><?=$message['message']?></p>    
        </div>
        <form action="#" method="post" class="form-group">
            <div class="col-6 d-block mx-auto mt-2">
                <label for="nome" class="form-label">NOME</label>
                <input type="text" id="nome" name="nome" class="form-control" require>
            </div>
            <div class="col-6 d-block mx-auto mt-2">
                <label for="descricao" class="form-label">DESCRIÇÃO</label>
                <input type="text" id="descricao" name="descricao" class="form-control" require>
            </div>
            <div class="col-6 d-block mx-auto mt-2">
                <label for="preco" class="form-label">PREÇO</label>
                <input type="text" id="preco" name="preco" class="form-control" require>
            </div>
            <div class="col-6 d-block mx-auto mt-2">
                <label for="qtd" class="form-label">QUANTIDADE</label>
                <input type="text" id="qtd" name="qtd" class="form-control" require>
            </div>
            <input type="submit" name="submit" value="Cadastrar" class="btn btn-primary d-block mx-auto mt-3 col-6 mb-3">
        </form>
    </main>
</body>
</html>