<?php

class Usuario {
    private $id;
    private $nome;
    private $email;

    public function setId($id) 
    {
        $this->id = $id;
    }

    public function setNome($nome) 
    {
        $this->nome = ucwords(trim($nome));
    }

    public function setEmail($email) 
    {
        $this->email = strtolower(trim($email));
    }


    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }
}