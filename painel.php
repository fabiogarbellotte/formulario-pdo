<?php
session_start();
if(!isset($_SESSION['ID_USUARIO'])){
    header("location:index,php");
    exit;
}
echo "bem-vindo!";