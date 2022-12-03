<?php
    include_once("../php/validador_acesso.php");
    include_once("../php/conexao.php");

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
    <link rel="stylesheet" href="../estilos/escolha-agencia.css">

</head>

<body>
    <a class="link-nova-conta" href="nova-conta.php">Criar nova conta</a>

    <header class="header">
        <h1 class="logo">Nullbank</h1>
    </header>

    <main class="main">
        <h2 class="title">Contas cadastradas</h2>

        <div class="scroll-area">
            <?php 
                $stmt = $conexao->prepare("SELECT Contas_num_conta FROM Possui WHERE Clientes_cpf = '$cpf'");
                if($stmt->execute()){
                    $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($retorno_consulta as $row){ 
                        $num_conta = $row['Contas_num_conta'];
                        $stmt = $conexao->prepare("SELECT agencia_id FROM Contas WHERE num_conta = '$num_conta'");
                        if($stmt->execute()){
                            $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            $agencia_id = $retorno_consulta[0]['agencia_id'];

                            $stmt = $conexao->prepare("SELECT nome, cidade FROM Agencia WHERE id = '$agencia_id'");
                            if($stmt->execute()){
                                $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $nome_agencia = $retorno_consulta[0]['nome'];
                                $cidade = $retorno_consulta[0]['cidade'];
                            }
                        } ?>    
        
                        <div class="card">
                            <div>
                                <h3 class="card-text">Numero da conta</h3>
                                <p class="card-value"><?php echo $num_conta ?></p>
                            </div>
            
                            <div>
                                <h3 class="card-text">Numero da agência</h3>
                                <p class="card-value"><?php echo $agencia_id?></p>
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
            <?php }} ?>
        </div>
        
        <h2 class="title">Informe os dados da conta que deseja acessar</h2>
        <form class="form-conta" action="../php/valida-conta.php" method="POST">
            <input type="text" name="num_conta" placeholder="Numero da conta">
            <input type="password" name="senha" placeholder="Senha">
            <button class="submit-btn" type="submit">Entrar</button>
        </form>   
    </main>
</body>
</html>