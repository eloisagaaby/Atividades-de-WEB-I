<?php
require_once 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM livros WHERE id = ?");
$stmt->execute([$id]);

$livro = $stmt->fetch();

if (!$livro) {
    die("Livro não encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $categoria = $_POST['categoria'];
    $dataPublicacao = $_POST['dataPublicacao'];
    $editora = $_POST['editora'];

    $stmt = $pdo->prepare("
        UPDATE livros
        SET titulo = ?, autor = ?, categoria = ?, data_publicacao = ?, editora = ?
        WHERE id = ?
    ");

    $stmt->execute([
        $titulo,
        $autor,
        $categoria,
        $dataPublicacao,
        $editora,
        $id
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
    <title>Editar Livro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Editar Livro</h1>

    <form method="POST">
        <input type="text" name="titulo" value="<?= htmlspecialchars($livro['titulo']) ?>" required>
        <input type="text" name="autor" value="<?= htmlspecialchars($livro['autor']) ?>" required>
        <input type="text" name="categoria" value="<?= htmlspecialchars($livro['categoria']) ?>" required>
        <input type="date" name="dataPublicacao" value="<?= $livro['data_publicacao'] ?>" required>
        <input type="text" name="editora" value="<?= htmlspecialchars($livro['editora']) ?>" required>

        <button type="submit">Atualizar</button>
    </form>
</div>

</body>
</html>
