<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $categoria = $_POST['categoria'];
    $dataPublicacao = $_POST['dataPublicacao'];
    $editora = $_POST['editora'];

    $stmt = $pdo->prepare("
        INSERT INTO livros
        (titulo, autor, categoria, data_publicacao, editora)
        VALUES (?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $titulo,
        $autor,
        $categoria,
        $dataPublicacao,
        $editora
    ]);

    header('Location: index-livros.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Adicionar Livro</h1>

    <form method="POST">
        <input type="text" name="titulo" placeholder="Título" required>
        <input type="text" name="autor" placeholder="Autor" required>
        <input type="text" name="categoria" placeholder="Categoria" required>
        <input type="date" name="dataPublicacao" required>
        <input type="text" name="editora" placeholder="Editora" required>

        <button type="submit">Salvar Livro</button>
    </form>
</div>

</body>
</html>
