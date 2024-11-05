<?php

//Executa uma consulta SQL para verificar se o e-mail fornecido pelo usuário existe no banco de dados
//Se o e-mail for encontrado, a senha fornecida pelo usuário é comparada com a senha armazenada no banco de dados
//verifica a existência de um e-mail e se a senha no banco
//Usa password_verify para comparar a senha fornecida com a senha armazenada (que foi criptografada durante o registro)

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //// Consulta SQL para encontrar o usuário pelo e-mail

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //Verifica se a senha fornecida corresponde à senha armazenada
        if (password_verify($senha, $row['senha'])) {
            header("Location: ../pages/home.php");
            echo "<script>alert('Login realizado com sucesso!')</script>";

        } else {
            echo "<script>alert('Senha incorreta')</script>";

        }
    } else {
        echo "<script>alert('E-mail não encontrado')</script>";
    }

    $conn->close();
}
?>
