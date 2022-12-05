<?php
    include_once('../php/validador_acesso.php');
    include_once('../php/conexao.php');

    //pegando a matricula do gerente que está logado
    $matricula = $_SESSION['login_funcionario'];

    //pegando nome e agência_id do gerente que está logado
    $stmt = $conexao->prepare("SELECT nome_completo, agencia_id FROM Funcionarios WHERE matricula = '$matricula'");
    if($stmt->execute()){
        $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nome_gerente = $retorno_consulta[0]['nome_completo'];
        $agencia_id = $retorno_consulta[0]['agencia_id'];

        //pegando nome da agência
        $stmt = $conexao->prepare("SELECT nome FROM Agencia WHERE id = '$agencia_id'");
        if($stmt->execute()){
            $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $nome_agencia = $retorno_consulta[0]['nome'];
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
    <link rel="stylesheet" href="../estilos/gerente.css">

</head>
<body>
    <a class="link-btn" href="../php/logoff.php">Sair</a>

    <header class="header">
        <h1 class="logo">Nullbank</h1>
    </header>

    <main class="main">
        <section class="section-info">
            <div class="info-conta">
                <img class="icon" src="../imagens/user.png" alt="icone do usuário">
                <div>
                    <h3 class="card-text">Gerente</h3>
                    <p class="card-value"><?php echo $nome_gerente ?></p>
                </div>
            </div>

            <div class="info-conta">
                <img class="icon" src="../imagens/company.png" alt="icone do usuário">
                <div>
                    <h3 class="card-text">Numero da agência</h3>
                    <p class="card-value"><?php echo $nome_agencia . ' - ' . $agencia_id?></p>
                </div>
            </div>
        </section>

        <h2 class="title">Contas gerenciadas</h2>
        

        <button class="edit-conta cliente" onclick="Modal.openModalCliente()">Alterar dados </button>
        <button class="edit-conta funcionario" onclick="Modal.openModalFuncionario()">Aterar dados</button>
        
        <section class="cotent-area">

            <div class="subtitle-divider">
                <h3 class="subtitle">Clientes</h3>
                
                <div class="scroll-area">
                    <?php 
                        //pegando num_conta das contas da agência do caixa que está logado
                        $stmt = $conexao->prepare("SELECT Clientes_cpf, Contas_num_conta FROM Possui WHERE Contas_agencia_id = '$agencia_id'");
                        if($stmt->execute()){
                           $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                           foreach($retorno_consulta as $tupla){//pegando cada tupla do resultado
                               $num_conta = $tupla['Contas_num_conta'];
                               $cpf = $tupla['Clientes_cpf'];

                               $stmt = $conexao->prepare("SELECT nome_completo FROM Clientes WHERE cpf = '$cpf'");
                               if($stmt->execute()){
                                    $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    $nome_cliente = $retorno_consulta[0]['nome_completo'];
                                }
                    
                               //pegando tipos das contas e suas modalidades (Conjunta ou Pessoal)
                               $stmt = $conexao->prepare("SELECT tipo_conta, conta_conjunta FROM Contas WHERE num_conta = $num_conta");
                               if($stmt->execute()){
                                   $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                   $tipo_conta = $retorno_consulta[0]['tipo_conta'];
                                   $conta_conjunta = $retorno_consulta[0]['conta_conjunta'];

                                   $tipo_conta2; //tratando o valor que vem do banco para uma melhor exibição
                                    if($tipo_conta === 'poupanca'){
                                        $tipo_conta2 = "Poupança";
                                    } else if($tipo_conta === 'especial'){
                                        $tipo_conta2 = "Especial";
                                    } else if($tipo_conta === 'corrente'){
                                        $tipo_conta2 = "Corrente";
                                    }

                                   $modalidade;
                                    if($conta_conjunta === 'S'){
                                        $modalidade = "Conjunta";
                                    }else if($conta_conjunta === 'N'){
                                        $modalidade = "Pessoal";
                                    }
                               } ?>
                                       <div class="card">
                                            <div>
                                                <h3 class="card-text">Nome</h3>
                                                <p class="card-value"><?php echo $nome_cliente ?></p>
                                            </div>
                            
                                            <div>
                                                <h3 class="card-text">CPF</h3>
                                                <p class="card-value"><?php echo $cpf ?></p>
                                            </div>

                                            <div>
                                                <h3 class="card-text">N° Conta</h3>
                                                <p class="card-value"><?php echo $num_conta ?></p>
                                            </div>
                            
                                            <div>
                                                <h3 class="card-text">Tipo</h3>
                                                <p class="card-value"><?php echo $tipo_conta2 ?></p>
                                            </div>
                                        </div>
                        <?php }}?>
                </div>
            </div>
            
            <hr class="vertical-divider"/>

            <div class="subtitle-divider divider2">
                <h3 class="subtitle">Funcionários</h3>
                
                <div class="scroll-area">
                <?php 
                    //pegando informações dos funcionários (que não são gerente) da agência
                    $stmt = $conexao->prepare("SELECT matricula, nome_completo, cargo FROM Funcionarios WHERE agencia_id = '$agencia_id' AND cargo <> 'gerente'");
                    if($stmt->execute()){
                       $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                       foreach($retorno_consulta as $tupla){//pegando cada tupla do resultado
                           $matricula_func = $tupla['matricula'];
                           $nome_func = $tupla['nome_completo'];
                           $cargo = $tupla['cargo'];

                ?>
                            <div class="card">
                                <div>
                                    <h3 class="card-text">Matricula</h3>
                                    <p class="card-value"><?php echo $matricula_func ?></p>
                                </div>

                                <div>
                                    <h3 class="card-text">Nome</h3>
                                    <p class="card-value"><?php echo $nome_func ?></p>
                                </div>
                            
                                <div>
                                    <h3 class="card-text">Cargo</h3>
                                    <p class="card-value"><?php echo $cargo ?></p>
                                </div>
                            </div>
                        <?php }}?>
                </div>
            </div>
        </section>
    </main>

    <div class="modal-overlay">
        <div class="modal modal-cliente">
            <a class="close-modal" onclick="Modal.close()">Cancelar</a>
            <h2 class="form-title">Editar dados do cliente</h2>

            <form class="modal-form" action="../php/altera-dados-cliente.php" method="POST">
                <div class="content-separator endereco">
                    <div class="input-content">
                        <label for="CPF">CPF do cliente</label>
                        <input type="text" name="CPF" placeholder="Preencher campo" required>
                    </div>

                    <div class="input-content">
                        <label for="logradouro">Tipo de logradouro</label>
                        <input type="text" name="logradouro" placeholder="Preencher campo" required>
                    </div>

                    <div class="input-content">
                        <label for="nome_logradouro">Nome do logradouro</label>
                        <input type="text" name="nome_logradouro" placeholder="Preencher campo" required>
                    </div>

                    <div class="input-content">
                        <label for="num_casa">Número da casa</label>
                        <input type="text" name="num_casa" placeholder="Preencher campo" required>
                    </div>
                    
                    <div class="input-content">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" placeholder="Preencher campo" required>
                    </div>

                    <div class="input-content">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" placeholder="Preencher campo" required>
                    </div>
                    
                    <div class="input-content">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" placeholder="Preencher campo" required>
                    </div>

                    <div class="input-content">
                        <label for="estado">Estado</label>
                        <input type="text" name="estado" placeholder="Preencher campo" required>
                    </div>
                </div>
                <button class="btn-submit-trasaction" type="submit">Confirmar</button>
            </form>
        </div>

        <div class="modal modal-funcionario">
            <a class="close-modal" onclick="Modal.close()">Cancelar</a>
            <h2 class="form-title">Editar dados do funcionário</h2>

            <form class="modal-form" action="../php/alter-dados-funcionario.php" method="POST">
                <div class="content-separator endereco">
                    <div class="input-content">
                        <label for="matricula">Matricula do funcionário</label>
                        <input type="text" name="matricula" placeholder="Preencher campo" required>
                    </div>

                    <div class="input-content">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" placeholder="Preencher campo" required>
                    </div>

                    <div class="input-content">
                        <label for="endereco">Endereço</label>
                        <small class="help">Ex. Rua da Paz, 287</small>
                        <input type="text" name="endereco" placeholder="Preencher campo" required>
                    </div>
                </div>
                <button class="btn-submit-trasaction" type="submit">Confirmar</button>
            </form>
        </div>
    </div>

    <script>
        const Modal = {
            openModalCliente(){
                document
                    .querySelector(".modal-overlay")
                    .classList
                    .add("active")
                document
                    .querySelector(".modal-cliente")
                    .style
                    .display = 'flex';
            },
            openModalFuncionario(){
                document
                    .querySelector(".modal-overlay")
                    .classList
                    .add("active")

                document
                    .querySelector(".modal-funcionario")
                    .style
                    .display = 'flex';
            },
            close(){
                document
                    .querySelector(".modal-overlay")
                    .classList
                    .remove("active")

                document
                    .querySelector(".modal-cliente")
                    .style
                    .display = 'none';

                document
                    .querySelector(".modal-funcionario")
                    .style
                    .display = 'none';
            }
        }
    </script>
</body>
</html>