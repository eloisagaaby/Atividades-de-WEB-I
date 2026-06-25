<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Verifica se o formulário foi submetido através do método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];

    // Prepara a instrução SQL para inserir um novo médico no banco de dados
    $stmt = $pdo->prepare("INSERT INTO medico (nome, especialidade) VALUES (?, ?)");

    // Executa a instrução SQL com os dados do formulário
    $stmt->execute([$nome, $especialidade]);

    // Redireciona para a página de listagem de médicos após a inserção
    header('Location: index-medico.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Médico</title>
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
        <h2>Adicionar Médico</h2>

        <!-- Formulário para adicionar um novo médico -->
        <form method="POST">

            <label for="nome">Nome:</label>
            <!-- Campo para inserir o nome do médico -->
            <input type="text" id="nome" name="nome" required>

            <label for="especialidade">Especialidade:</label>
            <!-- Campo para inserir a especialidade do médico -->
            <input type="text" id="especialidade" name="especialidade" required>

            <!-- Botão para submeter o formulário -->
            <button type="submit">Adicionar</button>

        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Médicos</p>
    </footer>
</body>
</html>