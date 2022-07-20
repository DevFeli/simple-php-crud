<?php

    $patch = (dirname(__FILE__) . "/controller/Actions.php");

    include_once $patch;


    $results = Actions::getAll();

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
            </div>
        </nav>
    </header>
        <main class="container-md bg-light">
            <div>
                <table class="table table-dark table-striped-columns table-hover mt-3">
                    <thead>
                        <th>#</th>
                        <th>NOME</th>
                        <th>DESCRIÇÃO</th>
                        <th>PREÇO UNITÁRIO</th>
                        <th>PREÇO TOTAL</th>
                        <th>QTD</th>
                        <th>ATT</th>
                        <th>DEL</th>
                    </thead>
                    <tbody>
                        <?php if(empty($results) != 1): ?>
                            <?php foreach($results as $result): ?>
                                <?php $class = $result['qtd'] < 5 ? "table-danger" : '' ?>
                                <tr class="<?=$class?>">
                                    <td><?=$result['id']?></td>
                                    <td><?=$result['nome']?></td>
                                    <td><?=$result['descricao']?></td>
                                    <td><?=$result['preco']?></td>
                                    <td><?=$result['qtd'] * $result['preco']?></td>
                                    <td><?=$result['qtd']?></td>
                                    <td ><a href="update.php?id=<?=$result['id']?>" class="btn btn-success">Att</a></td>
                                    <td><a href="delete.php?id=<?=$result['id']?>" class="btn btn-danger">Del</a></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <p>Não existem produtos cadastrados!</p>  
                                    </td>
                                </tr>          
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </main>
</body>
</html>