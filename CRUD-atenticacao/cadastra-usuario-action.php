<?php
    require_once 'conexao.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);

    echo "Senha antes do hash: " . strval($_POST['senha']) . "<br>";
    echo "Senha depois do hash: " . strval($senha) . "<br>";

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha)
                           VALUES (?, ?, ?)");

    $stmt->execute([$nome, $email, $senha]);

    $lastId = $pdo->lastInsertId();

    echo "Usuário cadastrado com sucesso!!";
?>