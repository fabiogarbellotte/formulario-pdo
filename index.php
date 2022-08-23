<?php
require_once 'Usuario.php';
$u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <link rel="stylesheet" href="stilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https: //fonts.googleapis.com/css2? family= Open+Sans:wght@300 & display=swap" rel="stylesheet">
</head>

<body>
    <div>
        <form method="POST" >
            <h1>ENTRAR</h1>
            <input type="text" name="Email" id="" placeholder="Email">
            <input type="password" name="Senha" id="" placeholder="Senha">
            <input type="submit" value="ACESSAR">
            <a href="cadastrar.php">Ainda não é Inscrito Cadastre-se</a>
        </form>
    </div>
    <?php
        if (isset($_POST['Email'])) {
            $Email  = addslashes($_POST['Email']);
            $Senha  = addslashes($_POST['Senha']);
            if (!empty($Email) && !empty($Senha) ) {
                $u->conectar("banco", "localhost", "root", "");
                if ($u->msg == "") {
                
                if($u->logar($Email,$Senha)){
                    header("location:painel.php");
                }else{
                    ?>
                    <div class="msg-erro">
                        Email ou senha incorretos!
                    </div>
            <?php
                }
            }else{
                echo "Erro " . $u->msg;
            }
            
        }else{
            ?>
            <div class="msg-erro">
                Preencha todos os campos!
            </div>
    <?php
        }
    }
    ?>

</body>