<?php
require_once 'classes/usuarios.php';
$u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD AULA - ENTRAR</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="corpo-form">
        <h1>Entrar</h1>
        <form method="POST">
            <input type="email" placeholder="Usuário" name="email">
            <input type="password" placeholder="Senha" name="senha">
            <input type="submit" value="ACESSAR">
            <a href="cadastro.php">Ainda não é inscrito? <strong>Cadastre-se aqui!</strong> </a>
        </form>
    </div>
    <?php
    //verificar se clicou no botao
    if (isset($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        if (!empty($email) && !empty($senha)) {
            $u->conectar("projeto_login", "localhost", "root", "");
            if ($u->msgErro == "") {
                if ($u->logar($email, $senha)) {
                    header("location: AreaPrivada.php");
                } else {
    ?>
                    <div class="msg-erro">
                        Email e/ou senha estão incorretos!
                    </div>
            <?php
                }
            } else {
                echo "Erro: " . $u->msgErro;
            }
        } else {
            ?>
            <div class="msg-erro">
                Preencha todos os campos!
            </div>
    <?php

        }
    }
    ?>
</body>

</html>