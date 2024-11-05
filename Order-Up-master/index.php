<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderUp - Login</title>
    <link rel="shortcut icon" href="./img/Black and Yellow Simple Food Logo 2.png" type="image/x-icon">
    <link rel="stylesheet" href="./css/login.css">

    <!-- Inclua as bibliotecas do Firebase -->
    <script src="https://www.gstatic.com/firebasejs/10.9.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.9.0/firebase-auth-compat.js"></script>

    <script>
        // Configuração do Firebase
        const firebaseConfig = {
            apiKey: "AIzaSyAceMTLRz9OQGNG8WoW83idPXeo9i59y4w",
            authDomain: "recuperacaosenha-7745e.firebaseapp.com",
            projectId: "recuperacaosenha-7745e",
            storageBucket: "recuperacaosenha-7745e.appspot.com",
            messagingSenderId: "661970049630",
            appId: "1:661970049630:web:d13cc622954046d59732cf",
            measurementId: "G-QNK3VFMJSB"
        };

        // Inicializa o Firebase
        firebase.initializeApp(firebaseConfig);
    </script>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <img src="./img/logoOrderup.png" alt="OrderUp Logo">
                <h2>Logue com a sua conta</h2>
            </div>
            <form id="login-form">
                <div class="input-group">
                    <label for="email">Email de acesso</label>
                    <input type="email" name="email" id="email" placeholder="cliente@gmail.com" required>
                </div>
                <div class="input-group">
                    <label for="senha">Senha de acesso</label>
                    <input type="password" name="senha" id="senha" placeholder="Entre com a sua senha" required>
                </div>
                <a href="php/recuperarsenha.php" class="forgot-password">Esqueceu sua senha?</a>
                <button type="submit" class="login-btn">entrar agora</button>
                <div class="divider">ou</div>
                <a href="./pages/cadastro_usuario.php"><button type="button" class="register-btn">Cadastre-se</button></a>
                <a href="./pages/telaLoginAdm.php"><button type="button" class="admin-btn">administrador</button></a>
            </form>
        </div>
        <div class="logo-container">
            <img src="./img/logoOrderup.png" alt="OrderUp Logo Grande">
        </div>
    </div>

    <script>
        document.getElementById('login-form').addEventListener('submit', function (event) {
            event.preventDefault(); // Evita o envio padrão do formulário

            const email = document.getElementById('email').value;
            const password = document.getElementById('senha').value;

            const auth = firebase.auth();

            auth.signInWithEmailAndPassword(email, password)
                .then((userCredential) => {
                    // Usuário logado com sucesso
                    const user = userCredential.user;
                    // Redirecionar para a página desejada
                    window.location.href = "./pages/home.php";
                })
                .catch((error) => {
                    const errorCode = error.code;
                    const errorMessage = error.message;
                    // Exibir alerta com a mensagem de erro
                    alert(`Erro: Senha inválida`);
                });
        });
    </script>
</body>

</html>
