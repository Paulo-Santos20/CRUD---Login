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
    <title>CRUD AULA - CADASTRAR</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="corpo-form">
        <h1>CADASTRAR</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
            <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
            <input type="email" name="email" placeholder="Usuário" maxlength="40">
            <input type="password" name="senha" placeholder="Senha" maxlength="15">
            <input type="password" name="confSenha" placeholder="Confirme sua Senha" maxlength="15">
            <input type="submit" value="CADASTRAR">
        </form>
    </div>
    <?php
    //verificar se clicou no botao
    if (isset($_POST['nome'])) {

        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarSenha = addslashes($_POST['confSenha']);
        //verificar se esta preenchido
        if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) {
            $u->conectar("id20775902_projeto_login", "localhost", "id20775902_bufdofu", "Ba8e9b123.");
            if ($u->msgErro == "") //esta tudo ok
            {
                if ($senha == $confirmarSenha) {
                    if ($u->cadastrar($nome, $telefone, $email, $senha)) {
    ?>
                        <div id="msg-sucesso">
                            <a href="index.php"><strong>Cadastrado com sucesso! Clique aqui para acessar! </strong> </a>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="msg-erro">
                            Email ja cadastrado!
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="msg-erro">
                        Senha e confirmar senha não conrrespondem!
                    </div>
                <?php                }
            } else {
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: " . $u->msgErro; ?>
                </div>
            <?php

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