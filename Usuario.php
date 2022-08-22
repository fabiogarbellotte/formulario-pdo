<?php

class Usuario
{

    private $pdo;
    public $msg = "";

    public function conectar($Nome, $Host, $Usuario, $Senha)
    {
        global $pdo;
        global $msg;
        try {
            $pdo = new PDO("mysql:dbname=" . $Nome . ";host=" . $Host, $Usuario, $Senha);
        } catch (PDOException $e) {
            $msg = $e->getMessage();
        }
    }

    public function cadastrar($Nome, $Telefone, $Email, $Senha)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT ID_USUARIO FROM USUARIO WHERE EMAIL = :e");
        $sql->bindValue(":e",$Email);
        $sql->execute();
    }

    public function logar($Email,$Senha)
    {
        global $pdo;
    }
}
