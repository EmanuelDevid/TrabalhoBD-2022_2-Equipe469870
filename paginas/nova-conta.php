<?php
    include_once('../php/validador_acesso.php');
    include_once('../php/conexao.php');

    //pegando cpf do cliente que está logado
    $cpf = $_SESSION["login_usuário"];
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
    <link rel="stylesheet" href="../estilos/nova-conta.css">

</head>

<body>
    <div class="container">
        <a class="back-page-btn" href="escolha-conta.php">Voltar</a>
        <h1 class="title">Nova conta</h1>
        

            <h3 class="subtitle">Agências disponíveis</h3>
            <div class="scroll-area">
                <?php
                    $stmt = $conexao->prepare("SELECT id, nome, cidade FROM Agencia");
                    if($stmt->execute()){
                        $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach($retorno_consulta as $tupla){
                            $agencia_id = $tupla['id'];
                            $nome_agencia = $tupla['nome'];
                            $cidade = $tupla['cidade']; ?>

                            <div class="card">
                                <div>
                                    <h3 class="card-text">Numero da agência</h3>
                                    <p class="card-value"><?php echo $agencia_id ?></p>
                                </div>

                                <div>
                                    <h3 class="card-text">Agência</h3>
                                    <p class="card-value"><?php echo $nome_agencia ?></p>
                                </div>

                                <div>
                                    <h3 class="card-text">Local da agência</h3>
                                    <p class="card-value"><?php echo $cidade ?></p>
                                </div>
                            </div>
                <?php   }
                    } ?>
            </div>

            <button class="submit-btn" onclick="Modal.open()">Criar conta</button>
            
    </div>

    <div class="modal-overlay">
        <div class="modal">
            <a class="close-modal" onclick="Modal.close()">Cancelar</a>

            <h2 class="form-title">Informações</h2>
            <form class="modal-form" method="POST" action="../php/cria-conta.php">
                
                <label for="agencia_id">Numero da agencia</label>
                <input type="text" name="agencia_id" required>

                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha">
                   
                <label for="tipo_conta">Tipo de conta</label>
                <select name="tipo_conta">
                    <option value="poupanca">Poupança</option>
                    <option value="corrente">Corrente</option>
                    <option value="especial">Especial</option>
                </select>
                      
                <label for="conta_conjunta">Será uma conta conjunta?</label>
                <select name="conta_conjunta">
                    <option value="N">Não</option>
                    <option value="S">Sim</option>
                </select>        
                   
                <button type="submit" class="submit-btn">Confirmar</button>
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