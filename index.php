<?php
session_start();
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);
$usuarios = $usuarioDao->findAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
</head>
<body>
    
    <div class="table-responsive">
        <table class="table table-sm table-bordered table-striped table-dark table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $usuario): ?>
                    <tr>
                        <th><?= $usuario->getId(); ?></th>
                        <td><?= $usuario->getNome(); ?></td>
                        <td><?= $usuario->getEmail(); ?></td>
                        <td>
                            <a class="btn btn-primary" href="editar.php?id=<?= $usuario->getId(); ?>">Editar</a> 
                            - 
                            <a class="btn btn-danger" href="excluir.php?id=<?= $usuario->getId(); ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>         
            </tbody>
        </table>
        <a class="btn btn-success" href="adicionar.php">Adicionar</a>
    </div>

<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>