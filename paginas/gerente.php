<?php
    include_once('../php/validador_acesso.php');
    include_once('../php/conexao.php');

    //pegando a matricula do gerente que está logado
    $matricula = $_SESSION['login_funcionario'];

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
                    <p class="card-value">Fernando Rodrigues Lima</p>
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

        <h2 class="title">Contas gerenciadas</h2>
        

        <button class="edit-conta cliente" onclick="Modal.openModalCliente()">Alterar dados </button>
        <button class="edit-conta funcionario" onclick="Modal.openModalFuncionario()">Aterar dados</button>
        
        <section class="cotent-area">

            <div class="subtitle-divider">
                <h3 class="subtitle">Clientes</h3>
                
                <div class="scroll-area">
                    <div class="card">
                        <div>
                            <h3 class="card-text">Número</h3>
                            <p class="card-value">3</p>
                        </div>
        
                        <div>
                            <h3 class="card-text">Nome</h3>
                            <p class="card-value">Igor pierre</p>
                        </div>
        
                        <div>
                            <h3 class="card-text">CPF</h3>
                            <p class="card-value">080589843</p>
                        </div>
        
                        <div>
                            <h3 class="card-text">Tipo</h3>
                            <p class="card-value">Poupança</p>
                        </div>
        
                        <div>
                            <h3 class="card-text">Modalidade</h3>
                            <p class="card-value">Poupança</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr class="vertical-divider"/>

            <div class="subtitle-divider">
                <h3 class="subtitle">Funcionários</h3>
                
                <div class="scroll-area">
                    <div class="card">
                        <div>
                            <h3 class="card-text">Número</h3>
                            <p class="card-value">3</p>
                        </div>
        
                        <div>
                            <h3 class="card-text">Nome</h3>
                            <p class="card-value">Wendel Manfrini</p>
                        </div>
        
                        <div>
                            <h3 class="card-text">CPF</h3>
                            <p class="card-value">080589843</p>
                        </div>
        
                        <div>
                            <h3 class="card-text">Cargo</h3>
                            <p class="card-value">Poupança</p>
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <h3 class="card-text">Número</h3>
                            <p class="card-value">3</p>
                        </div>
        
                        <div>
                            <h3 class="card-text">Nome</h3>
                            <p class="card-value">Wendel Manfrini</p>
                        </div>
        
                        <div>
                            <h3 class="card-text">Matrícula</h3>
                            <p class="card-value">080589843</p>
                        </div>
        
                        <div>
                            <h3 class="card-text">Cargo</h3>
                            <p class="card-value">Poupança</p>
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <h3 class="card-text">Número</h3>
                            <p class="card-value">3</p>
                        </div>
        
                        <div>
                            <h3 class="card-text">Nome</h3>
                            <p class="card-value">Wendel Manfrini</p>
                        </div>
        
                        <div>
                            <h3 class="card-text">CPF</h3>
                            <p class="card-value">080589843</p>
                        </div>
        
                        <div>
                            <h3 class="card-text">Cargo</h3>
                            <p class="card-value">Poupança</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <div class="modal-overlay">
        <div class="modal modal-cliente">
            <a class="close-modal" onclick="Modal.close()">Cancelar</a>
            <h2 class="form-title">Editar dados do cliente</h2>

            <form class="modal-form" action="../php/transacao.php" method="POST">
                <div class="content-separator endereco">
                    <div class="input-content">
                        <label for="logradouro">Tipo de logradouro</label>
                        <input type="text" name="logradouro" placeholder="Preencher campo" required>
                    </div>

                    <div class="input-content">
                        <label for="nome_logradouro">Nome do logradouro</label>
                        <input type="text" name="nome_logradouro" placeholder="Preencher campo" required>
                    </div>

                    <div class="input-content">
                        <label for="num_casa">Número</label>
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

            <form class="modal-form" action="../php/transacao.php" method="POST">
                <div class="content-separator endereco">
                    <div class="input-content">
                        <label for="logradouro">Tipo de logradouro</label>
                        <input type="text" name="logradouro" placeholder="Preencher campo" required>
                    </div>

                    <div class="input-content">
                        <label for="nome_logradouro">Nome do logradouro</label>
                        <input type="text" name="nome_logradouro" placeholder="Preencher campo" required>
                    </div>

                    <div class="input-content">
                        <label for="num_casa">Número</label>
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