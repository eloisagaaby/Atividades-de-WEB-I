<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Executa a consulta para obter todos os médicos
$stmt = $pdo->query("SELECT * FROM medico");

// Recupera todos os resultados da consulta como um array associativo
$medicos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Médicos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de Médicos</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index-medico.php">Listar Médicos</a></li>
                <li><a href="create-medico.php">Adicionar Médico</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de Médicos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Especialidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Itera sobre os médicos e cria uma linha para cada médico na tabela -->
                <?php foreach ($medicos as $medico): ?>
                    <tr>
                        <!-- Exibe os dados do médico -->
                        <td><?= $medico['id'] ?></td>
                        <td><?= $medico['nome'] ?></td>
                        <td><?= $medico['especialidade'] ?></td>
                        <td>
                            <!-- Links para visualizar, editar e excluir o médico -->
                            <a href="read-medico.php?id=<?= $medico['id'] ?>">Visualizar</a>
                            <a href="update-medico.php?id=<?= $medico['id'] ?>">Editar</a>
                            <a href="delete-medico.php?id=<?= $medico['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Médicos</p>
    </footer>
</body>
</html>