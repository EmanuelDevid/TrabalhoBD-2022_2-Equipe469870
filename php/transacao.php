<?php
    include_once("../php/validador_acesso.php");
    include_once("../php/conexao.php");

    $cpf = $_SESSION["login_usuário"];

    //pegando o num_Conta informado pelo usuário
    $num_conta = $_SESSION['num_conta'];

    //convertendo o valor digitado pelo cliente em float
    $valor_transacao = floatval(str_replace(',', '.', $_POST['valor_transacao']));
    $tipo_transacao = $_POST['select_transacoes'];

    //Realizando uma transação na conta cujo o num_conta foi informado pelo usuário
    $stmt = $conexao->prepare("INSERT INTO Transacao(tipo_transacao, data_hora, valor, Contas_num_conta) VALUES ('$tipo_transacao', sysdate(), '$valor_transacao', '$num_conta')");
    if($stmt->execute()){
        header('Location: ../paginas/cliente.php');
    }
?>