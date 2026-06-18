<?php
    require_once 'conexao.php';
    session_start();

    $email = $_POST['email'];
    $senhaDigitada = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senhaDigitada, $usuario['senha'])) {

        echo "Senha correta, salvando os dados do usuário na sessão";

        $_SESSION['id_usuario_logado'] = $usuario['id'];
        $_SESSION['nome_usuario_logado'] = $usuario['nome'];
        $_SESSION['email_usuario_logado'] = $usuario['email'];

    } else {
        echo "Senha incorreta";
    }
?>