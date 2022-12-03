<?php
    include_once('../php/validador_acesso.php');
    include_once('../php/conexao.php');

    //pegando cpf do cliente que está logado
    $cpf = $_SESSION["login_usuário"];

    //pegando informações que o cliente passou na tela de criar nova conta
    $tipo_conta = $_POST['tipo_conta'];
    $conta_conjuta =  $_POST['conta_conjunta'];
    $agencia_id = (int) $_POST['agencia_id'];
    $senha = $_POST['senha'];

    //verificando se o id da agência informada realmente existe na tabela Agencia e redirecionando pra pagina de criar conta caso não
    $stmt = $conexao->prepare("SELECT COUNT(*) AS num FROM Agencia WHERE id = '$agencia_id'");
    if($stmt->execute()){
        $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $valor = (int) $retorno_consulta[0]['num'];
        if($valor === 0){
            header('Location: ../paginas/nova-conta.php?agencia_id=erro');
        }
    }

    //pegando a matricula do gerente que trabalha na agência cujo id é o id informado pelo o usuário
    $stmt = $conexao->prepare("SELECT matricula FROM Funcionarios WHERE cargo = 'gerente' AND agencia_id = '$agencia_id'");
    if($stmt->execute()){
        $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $matricula_gerente = $retorno_consulta[0]['matricula']; //guardando a matricula do gerente em uma variável
    }

    //verificando se já existe uma conta desse cliente na agência informada
    $stmt = $conexao->prepare("SELECT COUNT(Contas_num_conta) AS num FROM Possui WHERE Clientes_cpf = '$cpf' AND Contas_agencia_id = '$agencia_id'");
    if($stmt->execute()){
        $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $valor = $retorno_consulta[0]['num'];
        if($valor > 0){
            header('Location: ../paginas/escolha-conta.php?criacao_conta=erro');
        } else {
            //inserindo a nova conta com as devidas informações no banco
            $stmt = $conexao->prepare("INSERT INTO Contas(agencia_id, saldo, senha, tipo_conta, conta_conjunta, gerente_matricula)
            VALUES('$agencia_id', '0.00', '$senha', '$tipo_conta', '$conta_conjuta', '$matricula_gerente')");
            if($stmt->execute()){
                //pegando o último o maior num_conta, ou seja, o mais recente
                $stmt = $conexao->prepare("SELECT MAX(num_conta) AS num_conta FROM  Contas");
                if($stmt->execute()){
                    $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $num_conta = $retorno_consulta[0]['num_conta'];

                    $stmt = $conexao->prepare("INSERT INTO Possui VALUES('$cpf', '$num_conta', '$agencia_id')");
                    if($stmt->execute()){
                        header('Location: ../paginas/escolha-conta.php');
                    }
                }
            }
        }
    }
?>

