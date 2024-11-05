<?php
include 'conexao.php';

if (isset($_GET['nome'])) {
    $nome = $conn->real_escape_string(trim($_GET['nome']));

    $sql = "DELETE FROM produtosgeral WHERE nome = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $nome);

        if ($stmt->execute()) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            echo "Erro ao deletar produto: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta: " . $conn->error;
    }
}

$conn->close();
?>
