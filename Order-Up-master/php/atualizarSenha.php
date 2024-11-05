<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    
    $sql = "UPDATE usuarios SET senha=PASSWORD() WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        echo "Solicitação de redefinição registrada com sucesso!";
    } else {
        echo "Erro ao registrar a solicitação de redefinição: " . $conn->error;
    }

    $conn->close();
}
?>

