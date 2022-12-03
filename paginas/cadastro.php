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
    <link rel="stylesheet" href="../estilos/cadastro.css">

</head>

<body>
    <div class="container">
        <a class="back-page-btn" href="index.php">Voltar</a>
        <h1 class="title">Cadastre-se</h1>
        <form class="form" method="POST" action="../php/cadastra_cliente.php">
            
            <h3 class="subtitle">Informações para cadastro</h3>
            <div class="content-separator">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Senha" required>
                <input type="text" name="nome" placeholder="Nome completo" required>
                <input type="date" name="data_nascimento" required>
            </div>
            
            <h3 class="subtitle">Documentos</h3>
            <div class="content-separator">
                <input type="text" name="cpf" maxlength="11" placeholder="CPF" required>
                <input type="text" name="rg" maxlength="11" placeholder="RG" required>
                <input type="text" name="uf" maxlength="2" placeholder="UF" required>
                <input type="text" name="orgao_emissor" placeholder="Orgão emissor" required>
            </div>

            <h3 class="subtitle">Endereço</h3>
            <div class="content-separator endereco">
                <input type="text" name="logradouro" placeholder="Logradouro" required>
                <input type="text" name="nome_logradouro" placeholder="Nome do logradouro" required>
                <input type="text" name="num_casa" placeholder="Número" required>
                <input type="text" name="bairro" placeholder="Bairro" required>
                <input type="text" name="cep" placeholder="CEP" required>
                <input type="text" name="cidade" placeholder="Cidade" required>
                <input type="text" name="estado" placeholder="Estado" required>
            </div>

            <button type="submit" class="submit-btn">Confirmar cadastro</button>
        </form>

    </div>
</body>

</html>