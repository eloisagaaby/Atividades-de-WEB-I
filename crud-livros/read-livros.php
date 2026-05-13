<?php
require_once 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM livros WHERE id = ?");
$stmt->execute([$id]);

$livro = $stmt->fetch();

if (!$livro) {
    die("Livro não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Livro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Detalhes do Livro</h1>

    <div class="card">
        <p><strong>Título:</strong> <?= htmlspecialchars($livro['titulo']) ?></p>
        <p><strong>Autor:</strong> <?= htmlspecialchars($livro['autor']) ?></p>
        <p><strong>Categoria:</strong> <?= htmlspecialchars($livro['categoria']) ?></p>
        <p><strong>Data:</strong> <?= $livro['data_publicacao'] ?></p>
        <p><strong>Editora:</strong> <?= htmlspecialchars($livro['editora']) ?></p>
    </div>

    <div class="menu">
        <a href="index-livros.php">Voltar</a>
        <a href="update-livros.php?id=<?= $livro['id'] ?>">Editar</a>
    </div>
</div>

</body>
</html>
