<?php
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = 'davidspfcfcb1992-21';//davidspfcfcb1992-21
    $dbname = 'equipe469870';

    $conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);

    if(!$conexao){
        die("Houve um erro " . mysqli_connect_error());
    }
?>