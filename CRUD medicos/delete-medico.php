<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Obtém o ID do médico a ser excluído a partir da URL usando o método GET
$id = $_GET['id'];

// Prepara a instrução SQL para excluir o médico pelo ID
$stmt = $pdo->prepare("DELETE FROM medico WHERE id = ?");

// Executa a instrução SQL com o ID do médico
$stmt->execute([$id]);

// Redireciona para a página de listagem de médicos após a exclusão
header('Location: index-medico.php');
?>