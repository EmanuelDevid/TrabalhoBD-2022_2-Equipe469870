<?php
    include_once('../php/validador_acesso.php');
    include_once('../php/conexao.php');

    //pegando a matricula do caixa que está logado
    $matricula = $_SESSION['login_funcionario'];

    //pegando nome e agencia_id do caixa que está logado
    $stmt = $conexao->prepare("SELECT nome_completo, agencia_id FROM Funcionarios WHERE matricula = '$matricula'");
    if($stmt->execute()){
        $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nome = $retorno_consulta[0]['nome_completo'];
        $agencia_id = $retorno_consulta[0]['agencia_id'];

        //pegando nome da agência do caixa que está logado
        $stmt = $conexao->prepare("SELECT nome FROM Agencia WHERE id = '$agencia_id'");
        if($stmt->execute()){
            $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $nome_agência = $retorno_consulta[0]['nome'];
        }
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
    <link rel="stylesheet" href="../estilos/caixa.css">

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
                    <h3 class="card-text">Caixa</h3>
                    <p class="card-value"><?php echo $nome ?></p>
                </div>
            </div>

            <div class="info-conta">
                <img class="icon" src="../imagens/company.png" alt="icone do usuário">
                <div>
                    <h3 class="card-text">Agência</h3>
                    <p class="card-value"><?php echo $nome_agência . ' - ' . $agencia_id ?></p>
                </div>
            </div>
        </section>

        <h2 class="title">Todas as transações</h2>

        <button class="add-transaction" onclick="Modal.open()">Adicionar transação</button>

        <div class="scroll-area">
            <?php 
                 //pegando num_conta das contas da agência do caixa que está logado
                 $stmt = $conexao->prepare("SELECT num_conta FROM Contas WHERE agencia_id = '$agencia_id'");
                 if($stmt->execute()){
                    $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($retorno_consulta as $tupla){
                        $num_conta = $tupla['num_conta'];

                        //pegando todas os atributos da tabela Transacao
                        $stmt = $conexao->prepare("SELECT * FROM Transacao WHERE Contas_num_conta = $num_conta");
                        if($stmt->execute()){
                            $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($retorno_consulta as $tupla){
                                //armazenando as informações das transações em variáveis
                                $num_transacao = $tupla['num_transacao'];
                                $tipo_transacao = $tupla['tipo_transacao'];
                                $data_hora = $tupla['data_hora'];
                                $valor = $tupla['valor'];
                                $num_conta_transacao = $tupla['Contas_num_conta']; ?>
                                <div class="card">
                                    <div>
                                        <h3 class="card-text">Número da conta</h3>
                                        <p class="card-value"><?php echo $num_conta_transacao ?></p>
                                    </div>

                                    <div>
                                        <h3 class="card-text">Número da transação</h3>
                                        <p class="card-value"><?php echo $num_transacao ?></p>
                                    </div>

                                    <div>
                                        <h3 class="card-text">Tipo</h3>
                                        <p class="card-value"><?php echo $tipo_transacao ?></p>
                                    </div>

                                    <div>
                                        <h3 class="card-text">Valor</h3>
                                        <p class="card-value"><?php echo $valor ?></p>
                                    </div>

                                    <div>
                                        <h3 class="card-text">Data</h3>
                                        <p class="card-value"><?php echo $data_hora ?></p>
                                    </div>
                                </div>
            <?php }}}}?>
        </div>
    </main>

    <div class="modal-overlay">
        <div class="modal">
            <a class="close-modal" onclick="Modal.close()">Cancelar</a>
            <h2 class="form-title">Nova transação</h2>

            <form class="modal-form" action="../php/transacao_caixa.php" method="POST">
                <label for="num_conta" class="subtitle">Numero da conta</label>
                <input type="text" name="num_conta" required>


                <label for="select_transacoes" class="subtitle">Selecione um tipo de transação</label>
                <select name="select_transacoes" class="select_trancacoes" required>
                    <option id="opition_saque" value="saque">Saque</option>
                    <option id="opition_deposito" value="depósito">Depósito</option>
                    <option id="opition_transferencia" value="transferência">Transferência</option>
                    <option id="opition_estorno" value="estorno">Estorno</option>
                    <option id="opition_pagamento" value="pagamento">Pagamento</option>
                </select>

                <label for="valor_transacao" class="subtitle">Informe o valor da transação</label>
                <small class="help">Valor em reais, ex: 200,00</small>
                <input type="text" name="valor_transacao" required>

                <button class="btn-submit-trasaction" type="submit">Confirmar</button>
            </form>
        </div>
    </div>

    <script>
        const Modal = {
            open(){
                document
                    .querySelector(".modal-overlay")
                    .classList
                    .add("active")
            },
            close(){
                document
                    .querySelector(".modal-overlay")
                    .classList
                    .remove("active")
            }
        }
    </script>
</body>
</html>