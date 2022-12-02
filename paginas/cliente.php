<?php
    include_once("../php/validador_acesso.php");
    include_once("../php/conexao.php");

    $cpf = $_SESSION["login_usuário"];

    $stmt = $conexao->prepare("SELECT nome_completo FROM Clientes WHERE cpf = '$cpf'");
    if($stmt->execute()){
        $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nome = $retorno_consulta[0]['nome_completo'];
    }

    $stmt = $conexao->prepare("SELECT Contas_num_conta FROM Possui WHERE Clientes_cpf = '$cpf'");
    if($stmt->execute()){
        $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $num_conta = $retorno_consulta[0]['Contas_num_conta'];

        $stmt = $conexao->prepare("SELECT saldo FROM CONTAS WHERE num_conta = '$num_conta'");
        if($stmt->execute()){
            $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $saldo = $retorno_consulta[0]['saldo'];
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
    <link rel="stylesheet" href="../estilos/cliente.css">

</head>
<body>
    <a class="back-page-btn" href="../php/logoff.php">Sair</a>
    <header class="header">
        <h1 class="logo">Nullbank</h1>
    </header>
    <main class="main">
        <section class="section-info">
            <div class="card">
                <img class="icon" src="../imagens/user.png" alt="icone do usuário">
                <div>
                    <h3 class="card-text">Usuário</h3>
                    <p class="card-value"><?php echo $nome ?></p>
                </div>
            </div>

            <div class="card">
                <img class="icon" src="../imagens/real-brasileiro.png" alt="icone do usuário">
                <div>
                    <h3 class="card-text">Saldo</h3>
                    <p class="card-value"><?php echo $saldo ?></p>
                </div>
            </div>
        </section>

        <section class="section-services">
            <h2 class="subtitle">Todos os serviços</h2>
            <div class="services-area">
                <button class="btn-service">Saque</button>
                <button class="btn-service">Depósito</button>
                <button class="btn-service">Transferência</button>
                <button class="btn-service">Estorno</button>
            </div>
        </section>
    </main>
</body>
</html>