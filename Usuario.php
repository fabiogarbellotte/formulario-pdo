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
        if($sql->rowCount() > 0){
            return false;
        }else{
            $sql = $pdo->prepare("INSERT INTO USUARIOS(NOME,TELEFONE,EMAIL,SENHA) VALUES (:n, :t,:e,:s)");
            $sql->bindValue(":n",$Nome);
            $sql->bindValue(":t",$Telefone);
            $sql->bindValue(":e",$Email);
            $sql->bindValue(":s",$Senha);
            $sql->execute();
            return true;
        }
    }

    public function logar($Email,$Senha)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT ID_USUARIOS FROM USUARIOS WHERE EMAIL =:e AND SENHA = :s");
        $sql->bindValue(":e",$Email);
        $sql->bindValue(":s",$Senha);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            session_start();
            $_SESSION['ID_USUARIO'] = $dado['ID_USUARIO'];
            return true;
        }else{
            return false;
    }
}
}