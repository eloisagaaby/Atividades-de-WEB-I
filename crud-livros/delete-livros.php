<?php
require_once 'db.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $stmt = $pdo->prepare("DELETE FROM livros WHERE id = ?");
    $stmt->execute([$id]);
}

header('Location: index-livros.php');
exit;
?>
