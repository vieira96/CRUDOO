<?php

require_once 'models/Usuario.php';
require_once 'models/UsuarioDAO.php';

class UsuarioDaoMysql implements UsuarioDAO {
    
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function create(Usuario $u)
    {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(":nome", $u->getNome());
        $sql->bindValue(":email", $u->getEmail());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());

        return $u;
    }

    public function update(Usuario $u)
    {
        $sql = $this->pdo->prepare("UPDATE usuarios SET nome  = :nome, email = :email WHERE id = :id");
        $sql->bindValue(":id", $u->getId());
        $sql->bindValue(":nome", $u->getNome());
        $sql->bindValue(":email", $u->getEmail());
        $sql->execute();  
        return true;
    }

    public function findAll()
    {
        $array = [];
        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();
            foreach($data as $usuario){
                $u = new Usuario();
                $u->setId($usuario['id']);
                $u->setNome($usuario['nome']);
                $u->setEmail($usuario['email']);

                $array[] = $u;
            }
        }

        return $array;
    }

    public function findById($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $usuario = $sql->fetch();
            $u = new Usuario();
            $u->setId($usuario['id']);
            $u->setNome($usuario['nome']);
            $u->setEmail($usuario['email']);

            return $u;
        }else{
            return false;
        }

    }

    public function findByEmail($email)
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $usuario = $sql->fetch();
            $u = new Usuario();
            $u->setId($usuario['id']);
            $u->setNome($usuario['nome']);
            $u->setEmail($usuario['email']);

            return $u;
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

}