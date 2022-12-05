<?php
    include_once('../php/conexao.php');

    $matricula = $_POST['matricula'];
    $cidade = $_POST['cidade'];
    $endereco = $_POST['cidade'];

    $stmt = $conexao->prepare("UPDATE Funcionarios SET endereco = '$endereco', cidade = '$cidade' WHERE matricula = '$matricula'");
    if($stmt->execute()){
        header('Location: ../paginas/gerente.php');
    }
?>