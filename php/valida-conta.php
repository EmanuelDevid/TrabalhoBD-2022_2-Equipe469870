<?php
    include_once("../php/conexao.php");
    session_start();

    //colocando o num_conta escolhido pelo usuário na superglobal $_SESSION para usar em transacao.php
    $_SESSION['num_conta'] = $_POST['num_conta'];

    $cpf = $_SESSION["login_usuário"];

    //pegando informações digitadas pelo o cliente na tela de escolher conta
    $num_conta = $_POST['num_conta'];
    $senha_informada = md5($_POST['senha']);

    //pegando cpf do dono da conta pertencente à agência cujo id foi informado na tela de escolher conta
    $stmt = $conexao->prepare("SELECT Clientes_cpf FROM Possui WHERE Contas_num_conta = '$num_conta'");
    if($stmt->execute()){
        $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $cpf_informado = $retorno_consulta[0]['Clientes_cpf'];

        //pegando a senha da conta informada pelo o usuário
        $stmt = $conexao->prepare("SELECT senha FROM Contas WHERE num_conta = '$num_conta'");
        if($stmt->execute()){
            $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $senha = $retorno_consulta[0]['senha'];
            if($senha !== $senha_informada || $cpf !== $cpf_informado){
                header('Location: ../paginas/escolha-conta.php?acesso=erro');
            } else {
                header('Location: ../paginas/cliente.php');
            }
        }
    }
?>