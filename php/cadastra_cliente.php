<?php
    include_once("conexao.php");

    //Pegando informações fornecidas pelo usuário na tela de cadastro
    $email = $_POST['email'];
    $senha = $_POST['password'];
    $nome = $_POST['nome'];
    $data_nasc = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $uf = $_POST['uf'];
    $orgao_emissor = $_POST['orgao_emissor'];
    $logradouro = $_POST['logradouro'];
    $nome_logradouro = $_POST['nome_logradouro'];
    $numero_casa = $_POST['num_casa'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $stmt = $conexao->prepare("INSERT INTO Clientes VALUES('$cpf', '$nome', '$rg', '$data_nasc', '$uf', '$orgao_emissor', '$logradouro', '$nome_logradouro', '$numero_casa', '$bairro', '$cep', '$cidade', '$estado', '$senha')");

    if($stmt->execute()){
        $stmt = $conexao->prepare("INSERT INTO Emails VALUES ('$cpf', '$email')");

        if($stmt->execute()){
            header('Location: ../paginas/index.php');
        }
    }
?>