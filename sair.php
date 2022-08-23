<?php
session_start();
unset($_SESSION['ID_USUARIO']);
    header("location:index.php");