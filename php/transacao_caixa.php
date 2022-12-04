<?php
    include_once("../php/validador_acesso.php");
    include_once("../php/conexao.php");

    //convertendo o valor digitado pelo caixa em float
    $valor_transacao = floatval(str_replace(',', '.', $_POST['valor_transacao']));
    $tipo_transacao = $_POST['select_transacoes'];
    $num_conta = $_POST['num_conta'];

    //Realizando uma transação na conta cujo o num_conta foi informado pelo usuário
    $stmt = $conexao->prepare("INSERT INTO Transacao(tipo_transacao, data_hora, valor, Contas_num_conta) VALUES ('$tipo_transacao', sysdate(), '$valor_transacao', '$num_conta')");
    if($stmt->execute()){
        header('Location: ../paginas/caixa.php');
    }
?>