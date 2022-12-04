<?php
    include_once("../php/validador_acesso.php");
    include_once("../php/conexao.php");

    $matricula = $_SESSION['login_funcionario'];

    //pegando nome e agencia_id do atendente que está logado
    $stmt = $conexao->prepare("SELECT nome_completo, agencia_id FROM Funcionarios WHERE matricula = '$matricula'");
    if($stmt->execute()){
        $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nome = $retorno_consulta[0]['nome_completo'];
        $agencia_id = $retorno_consulta[0]['agencia_id'];
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nullbank</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&display=swap" rel="stylesheet"> 

    <link rel="stylesheet" href="../estilos/global.css">
    <link rel="stylesheet" href="../estilos/atendente.css">

</head>
<body>
    <a class="back-page-btn" href="../php/logoff.php">Sair</a>
    <header class="header">
        <h1 class="logo">Nullbank</h1>
    </header>
    <main class="main">
        <section class="section-info">
            <div class="info-conta">
                <img class="icon" src="../imagens/user.png" alt="icone do usuário">
                <div>
                    <h3 class="card-text">Atendente</h3>
                    <p class="card-value"><?php echo $nome ?></p>
                </div>
            </div>

            <div class="info-conta">
                <img class="icon" src="../imagens/user.png" alt="icone do usuário">
                <div>
                    <h3 class="card-text">Numero da agência</h3>
                    <p class="card-value"><?php echo $agencia_id ?></p>
                </div>
            </div>
        </section>

        <section class="content-area">
            <h2 class="title">Contas</h2>
                <?php 
                    //pegando informações sobre as contas
                    $stmt = $conexao->prepare("SELECT num_conta, agencia_id, saldo, tipo_conta, conta_conjunta FROM Contas WHERE agencia_id = '$agencia_id'");
                    if($stmt->execute()){
                        $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach($retorno_consulta as $tupla){ 
                            $num_conta = $tupla['num_conta'];
                            $agencia_id_conta = $tupla['agencia_id'];
                            $saldo = $tupla['saldo'];
                            $tipo_conta = $tupla['tipo_conta'];
                            $conta_conjunta = $tupla['conta_conjunta'];

                            $modalidade;
                            if($conta_conjunta === 'S'){
                                $modalidade = "Conjunta";
                            }else if($conta_conjunta === 'N'){
                                $modalidade = "Pessoal";
                            }

                            //pegando os cpfs dos clientes que possuem as contas
                            $stmt = $conexao->prepare("SELECT Clientes_cpf FROM Possui WHERE Contas_num_conta = '$num_conta'");
                            if($stmt->execute()){
                                $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $cpf = $retorno_consulta[0]['Clientes_cpf'];

                                //pegando o nome do cliente pelo seu cpf
                                $stmt = $conexao->prepare("SELECT nome_completo FROM Clientes WHERE cpf = '$cpf'");
                                if($stmt->execute()){
                                    $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    $nome_cliente = $retorno_consulta[0]['nome_completo'];
                                }
                            }
                            ?>
                            <div class="card">
                                <div>
                                    <h3 class="card-text">Numero da conta</h3>
                                    <p class="card-value"><?php echo $num_conta ?></p>
                                </div>

                                <div>
                                    <h3 class="card-text">Usuário</h3>
                                    <p class="card-value"><?php echo $nome_cliente ?></p>
                                </div>

                                <div>
                                    <h3 class="card-text">Tipo da conta</h3>
                                    <p class="card-value"><?php echo $tipo_conta ?></p>
                                </div>

                                <div>
                                    <h3 class="card-text">Modalidade</h3>
                                    <p class="card-value"><?php echo $modalidade ?></p>
                                </div>

                                <div>
                                    <h3 class="card-text">Saldo</h3>
                                    <p class="card-value"><?php echo $saldo ?></p>
                                </div>
                            </div>
                <?php }} ?>    
        </section>

    </main>
</body>
</html>