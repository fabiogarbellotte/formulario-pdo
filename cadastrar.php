<<?php
    require_once 'Usuario.php';
    $u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="stilo.css">
</head>

<body>
    <div id="corpo-cadastro">
        <form method="POST" >
            <h1>CADASTRAR</h1>
            <input type="text" name="Nome" id="" placeholder="Nome completo" maxlength="30">
            <input type="tel" name="Telefone" id="" placeholder="Telefone" maxlength="30">
            <input type="email" name="Email" id="" placeholder="Email" maxlength="40">
            <input type="password" name="Senha" id="" placeholder="Senha" maxlength="15">
            <input type="password" name="ConfSenha" id="" placeholder="Confirmar Senha" maxlength="15">
            <input type="submit"  value="CADASTRAR">
            <a href="index.php">Voltar e Acessar </a>
        </form>
    </div>
    <?php
if(isset($_POST['Nome'])){
    $Nome = addslashes($_POST['Nome']);
    $Telefone  = addslashes($_POST['Telefone']);
    $Email  = addslashes($_POST['Email']);
    $Senha  = addslashes($_POST['Senha']);
    $ConfirmarSenha  = addslashes($_POST['ConfSenha']);

    if(!empty($Nome)&& !empty($Telefone)&& !empty($Email) && !empty($Senha) && !empty($ConfirmarSenha)){
        $u->conectar("banco","localhost","root","");
        if ($u->$msg == ""){
            if($Senha == $ConfirmarSenha){
                    if($u->cadastrar($Nome,$Telefone,$Email,$Senha)){
                      echo "Cadastrado com sucesso! Acesse para entrar!";
                    }else{
                        echo "Email ja cadastrado";
                    }
            }else{
                echo "Senha e confirmar senha não conferem!";
            }
        }else{
            echo "Erro ".$u->$msg;
        }
}else{
    echo "Preencha todos os dados";
}
}
    ?>
</body>

</html>