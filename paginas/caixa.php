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
                    <p class="card-value">Chico Sulino da Silva</p>
                </div>
            </div>

            <div class="info-conta">
                <img class="icon" src="../imagens/company.png" alt="icone do usuário">
                <div>
                    <h3 class="card-text">Numero da agência</h3>
                    <p class="card-value">6</p>
                </div>
            </div>
        </section>

        <h2 class="title">Todas as transações</h2>

        <button class="add-transaction" onclick="Modal.open()">Adicionar transação</button>

        <div class="scroll-area">
            <div class="card">
                <div>
                    <h3 class="card-text">Número da conta</h3>
                    <p class="card-value">3</p>
                </div>

                <div>
                    <h3 class="card-text">Número da transação</h3>
                    <p class="card-value">23</p>
                </div>

                <div>
                    <h3 class="card-text">Tipo</h3>
                    <p class="card-value">Saque</p>
                </div>

                <div>
                    <h3 class="card-text">Valor</h3>
                    <p class="card-value">4000,00</p>
                </div>

                <div>
                    <h3 class="card-text">Data</h3>
                    <p class="card-value">22/12/2000 - 22:34</p>
                </div>
            </div>
        </div>
    </main>

    <div class="modal-overlay">
        <div class="modal">
            <a class="close-modal" onclick="Modal.close()">Cancelar</a>
            <h2 class="form-title">Nova transação</h2>

            <form class="modal-form" action="../php/transacao.php" method="POST">
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