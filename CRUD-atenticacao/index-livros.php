<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM livros ORDER BY id DESC");
$livros = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>Lista de Livros</h1>

    <div class="menu">
        <a href="index.php">Home</a>
        <a href="create-livros.php">Adicionar Livro</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Categoria</th>
                <th>Data</th>
                <th>Editora</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($livros as $livro): ?>
                <tr>
                    <td><?= $livro['id'] ?></td>
                    <td><?= htmlspecialchars($livro['titulo']) ?></td>
                    <td><?= htmlspecialchars($livro['autor']) ?></td>
                    <td><?= htmlspecialchars($livro['categoria']) ?></td>
                    <td><?= $livro['data_publicacao'] ?></td>
                    <td><?= htmlspecialchars($livro['editora']) ?></td>

                    <td class="acoes">
                        <a href="read-livros.php?id=<?= $livro['id'] ?>">Ver</a>
                        <a href="update-livros.php?id=<?= $livro['id'] ?>">Editar</a>
                        <a href="delete-livros.php?id=<?= $livro['id'] ?>"
                           onclick="return confirm('Deseja excluir este livro?')">
                           Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
