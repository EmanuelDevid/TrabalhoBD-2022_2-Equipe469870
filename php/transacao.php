<?php
    include_once("../php/validador_acesso.php");
    include_once("../php/conexao.php");

    $cpf = $_SESSION["login_usuário"];

    $tipo_transacao = $_POST['select_transacoes'];

    //convertendo o valor digitado pelo cliente em float
    $valor_transacao = floatval(str_replace(',', '.', $_POST['valor_transacao']));

    //pegando o num_Conta informado pelo usuário
    $num_conta = $_SESSION['num_conta'];

    //Realizando uma transação na conta cujo o num_conta foi informado pelo usuário
    $stmt = $conexao->prepare("INSERT INTO Transacao(tipo_transacao, data_hora, valor, Contas_num_conta) VALUES ('$tipo_transacao', curdate(), '$valor_transacao', '$num_conta')");
    if($stmt->execute()){
        $stmt = $conexao->prepare("SELECT senha FROM Contas WHERE num_conta = '$num_conta'");
        if($stmt->execute()){
            $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $senha = $retorno_consulta[0]['senha'];
            $_SESSION['senha_conta'] = $senha;
        }
        header('Location: ../paginas/cliente.php');
    }
?>