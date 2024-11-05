<?php

require_once('conexao.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
        if (isset($_POST['senha']) && !empty($_POST['senha'])){

            $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
            $senha = isset($_POST['senha']) ? $_POST['senha'] : '';                
            $query = "SELECT * FROM `administrador` WHERE `usuario`=?";
            $stmt = mysqli_prepare($conn, $query);
    
            mysqli_stmt_bind_param($stmt, "s", $usuario);
            mysqli_stmt_execute($stmt);
    
            $result = mysqli_stmt_get_result($stmt);
            
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);

                if ($senha == $row ['senha']) {
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['usuario'] = $row['usuario']; 
                    echo "<script>window.location.href='../pages/produtosDiario.php';</script>";
                } else {
                    echo "<script>alert('Senha Incorreta');window.location.href='../index.php';</script>";
                }
            } else {            
                echo "<script>alert('Usuário não encontrado');window.location.href='../index.php';</script>";

            }
        }
    }
}
?>