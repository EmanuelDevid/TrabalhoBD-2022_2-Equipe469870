<?php
    include_once("conexao.php");//incluindo o arquivo de conexão

    //Inicinado uma sessão. Todos os scripts de uma intância podem acessar a superglobal $_SESSION
    session_start();

    //variável que verifica autenticação do usuário
    $usuario_autenticado = false;
    
    $login = strval($_POST["login"]); //pegando login do usuário
    $senha = md5(($_POST["password"])); //pegando senha do usuário e criptografando

    //consulta que verifica se tem um (no máximo, já que a matrícula é única) funcionário com a matrícula e a senha passadas na tela de login
    $stmt = $conexao->prepare("SELECT COUNT(*) AS num FROM Funcionarios WHERE matricula = '$login' AND senha = '$senha'");
    
    if($stmt->execute()){
        $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $valor = (int) $retorno_consulta[0]['num'];
        if($valor > 0){
            $stmt = $conexao->prepare("SELECT cargo FROM Funcionarios WHERE matricula = '$login'");
            if($stmt->execute()){
                $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $cargo = $retorno_consulta[0]['cargo'];

                switch ($cargo) {
                    case 'caixa':
                        header('Location: ../paginas/caixa.php');
                        break;
                    case 'gerente':
                        header('Location: ../paginas/gerente.php');
                        break;
                    case 'atendente':
                        header('Location: ../paginas/atendente.php');
                        break;
                }
                $_SESSION['login_funcionario'] = $login;
                $_SESSION['autenticado'] = 'sim';
            }
        }else{
            $stmt = $conexao->prepare("SELECT COUNT(*) AS num FROM Clientes WHERE cpf = '$login' AND senha_login = '$senha'");
            if($stmt->execute()){
                $retorno_consulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $valor = (int) $retorno_consulta[0]['num'];
                if($valor > 0){
                    header('Location: ../paginas/escolha-conta.php');
                    $_SESSION['autenticado'] = 'sim';
                    $_SESSION['login_usuário'] = $login;
                }else{
                    if($login === "Admin" && $senha = "Root"){
                        header('Location: dba.php');
                    } else{
                        header('Location: ../paginas/index.php?login=erro');
                        $_SESSION['autenticado'] = 'nao';
                    }
                }
            }
        }
    }
?>