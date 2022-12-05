<?php
    include_once('../php/conexao.php');

    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $cep = $_POST['cep'];
    $bairro = $_POST['bairro'];
    $num_casa = $_POST['num_casa'];
    $nome_logradouro = $_POST['nome_logradouro'];
    $logradouro = $_POST['logradouro'];
    $cpf = $_POST['CPF'];

    $stmt = $conexao->prepare("UPDATE Clientes SET logradouro = '$logradouro', nome_logradouro = '$nome_logradouro', num_casa = '$num_casa', bairro = '$bairro', cep = '$cep', cidade = '$cidade', estado = '$estado'  WHERE cpf = '$cpf'");
    if($stmt->execute()){
        header('Location: ../paginas/gerente.php');
    }
?>