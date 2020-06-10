<?php
session_start();
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');
$nome = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); 

if($nome && $email && $id){

    if(!$usuarioDao->findByEmail($email) || $email == $_SESSION['email']){
        $usuario = new Usuario();
        $usuario->setId($id);
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuarioDao->update($usuario);
        header("Location: index.php");
        exit;
    }else{
        header("Location: editar.php?id=$id");
        exit;
    }
}else{
    header("Location: index.php");
    exit;
}

