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
    <link rel="stylesheet" href="../estilos/login.css">

</head>
<body>
    <div class="container">
        <section class="content">
            <h1 class="title">Login</h1>
            <form class="form" action="">
                <input type="email" name="email" placeholder="Usuário, Email ou CPF" required>
                <input type="password" name="password" placeholder="Senha" required>

                <button type="submit" class="submit-btn">Entrar</button>

                <div class="form-links">
                    <a class="link" href="./cadastro.php">Cadastre-se</a>
                </div>
            </form>
        </section>

        <section class="banner">
            <picture>
                <img src="../imagens/banner-img.svg" alt="ilustração com um simbolo bancário">
            </picture>
        </section>
    </div>
</body>
</html>