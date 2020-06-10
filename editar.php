<?php
session_start();
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, "id");
if($id) {
    if($usuarioDao->findById($id)){
        $u = $usuarioDao->findById($id);
        $_SESSION['email'] = $u->getEmail();
    }else{
        header("Location: index.php");
        exit;
    }
}else{
    header("Location: index.php");
    exit;
}
?>

<h1>Editando Usuarios <?= $u->getNome(); ?></h1>
<form method="POST" action="editar_action.php?id=<?= $u->getId(); ?>">
    <label>
        Nome:<br>
        <input type="text" name="name" value="<?= $u->getNome(); ?>" />
    </label><br/><br/>
    
    <label>
        E-mail:<br>
        <input type="email" name="email" value="<?= $u->getEmail(); ?>" />
    </label><br/><br/>
    <input type="submit" value="Atualizar" />
</form>