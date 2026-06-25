<?php
    // Inclui o arquivo de conexão com o banco de dados
    require_once 'db.php';

    // Obtém o ID do médico a partir da URL usando o método GET
    $id = $_GET['id'];

    // Prepara a instrução SQL para selecionar o médico pelo ID
    $stmt = $pdo->prepare("SELECT * FROM medico WHERE id = ?");
    // Executa a instrução SQL, passando o ID do médico como parâmetro
    $stmt->execute([$id]);

    // Recupera os dados do médico como um array associativo
    $medico = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Médico</title>
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
        <h2>Detalhes do Médico</h2>
        <?php if ($medico): ?>
            <!-- Exibe os detalhes do médico -->
            <p><strong>ID:</strong> <?= $medico['id'] ?></p>
            <p><strong>Nome:</strong> <?= $medico['nome'] ?></p>
            <p><strong>Especialidade:</strong> <?= $medico['especialidade'] ?></p>
            <p>
                <!-- Links para editar e excluir o médico -->
                <a href="update-medico.php?id=<?= $medico['id'] ?>">Editar</a>
                <a href="delete-medico.php?id=<?= $medico['id'] ?>">Excluir</a>
            </p>
        <?php else: ?>
            <!-- Exibe uma mensagem caso o médico não seja encontrado -->
            <p>Médico não encontrado.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Médicos</p>
    </footer>
</body>
</html>