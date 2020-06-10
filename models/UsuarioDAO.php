<?php

interface UsuarioDAO {
    public function create(Usuario $u);
    public function update(Usuario $u);
    public function findAll();
    public function findById($id);
    public function findByEmail($email);
    public function delete($id);
}