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
        <a class="back-page-btn" href="index.php">Voltar</a>
        <h1 class="title">Nova conta</h1>
        <form class="form" method="POST" action="">

            <h3 class="subtitle">Agências disponíveis</h3>
            <div class="scroll-area">
                <div class="card">
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
            </div>
            
            <h3 class="subtitle">Informações para cadastro</h3>
            <label for="agencia_id">Numero da agencia</label>
            <input type="text" name="agencia_id" required>

            <label for="tipo_conta">Tipo de conta</label>
            <select name="tipo_conta">
                <option value="poupanca">Poupança</option>
                <option value="corente">Corrente</option>
                <option value="especial">Especial</option>
            </select>

            <label for="conta_conjunta">Será uma conta conjunta ?</label>
            <select name="conta_conjunta">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
            
            <button type="submit" class="submit-btn">Confirmar cadastro</button>
        </form>

    </div>
</body>

</html>