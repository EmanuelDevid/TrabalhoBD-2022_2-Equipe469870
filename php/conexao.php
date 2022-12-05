<?php
    $servidor = 'db4free.net';
    $usuario = 'emanuel_devid943';
    $senha = '3Y8u@xZd96QtNmi';
    $dbname = 'equipe469870';

    //opção de usar o localhost
    /* $servidor = 'localhost';
    $usuario = 'root';
    $senha = 'davidspfcfcb1992-21';
    $dbname = 'Equipe469870'; */

    $conexao = new PDO("mysql:host=$servidor;dbname=$dbname", "$usuario", "$senha");
?>