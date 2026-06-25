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

// Verifica se o formulário foi submetido através do método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Obtém os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];

    // Prepara a instrução SQL para atualizar os dados do médico
    $stmt = $pdo->prepare("UPDATE medico SET nome = ?, especialidade = ? WHERE id = ?");

    // Executa a instrução SQL com os novos dados do formulário
    $stmt->execute([$nome, $especialidade, $id]);

    // Redireciona para a página de listagem de médicos após a atualização
    header('Location: index-medico.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Médico</title>
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

<h2>Editar Médico</h2>

<form method="POST">

<label for="nome">Nome:</label>
<input type="text" id="nome" name="nome"
value="<?= $medico['nome'] ?>" required>

<label for="especialidade">Especialidade:</label>
<input type="text" id="especialidade"
name="especialidade"
value="<?= $medico['especialidade'] ?>" required>

<button type="submit">Atualizar</button>

</form>

</main>

<footer>
<p>&copy; 2026 - Sistema de Gerenciamento de Médicos</p>
</footer>

</body>
</html>