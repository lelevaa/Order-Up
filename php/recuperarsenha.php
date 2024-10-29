<!DOCTYPE html>
<html lang="en">

<head>
    <title>Esqueci Minha Senha</title>
    <link rel="stylesheet" href="../css/recuperarSenha.css">

    <!-- Inclua as bibliotecas do Firebase -->
    <script src="https://www.gstatic.com/firebasejs/10.9.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.9.0/firebase-auth-compat.js"></script>

</head>

<body>

    <div class="container">

        <div class="container_II">
            <img src="../img/logoOrderup.png" alt="OrderUp Logo">
            <p class="titulo_II">Esqueceu sua senha</p>
        </div>

        <form id="resetPasswordForm">
            <div class="quadro_login">
                <label>Email</label>
                <input type="text" id="usuario" name="email" placeholder="" required>
            </div>
            <div class="centralizarBotao">
                <button class="nextBtn" type="submit">Enviar link de recuperação</button>
            </div>
        </form>

    </div>

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

        // Função para enviar o email de redefinição de senha
       async function enviarEmailRecuperacaoSenha(email) {
            firebase.auth().sendPasswordResetEmail(email)
                .then(() => {
                    alert("Email de recuperação enviado com sucesso. Verifique sua caixa de entrada.");
                })
                .catch((error) => {
                    console.error("Erro ao enviar o email de recuperação:", error);
                    alert("Erro ao enviar o email de recuperação: " + error.message);
                });
        }

        // Enviar o email de recuperação quando o formulário for submetido
        document.getElementById('resetPasswordForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Impede o comportamento padrão do formulário
            var email = document.getElementById('usuario').value;
            enviarEmailRecuperacaoSenha(email);
        });

    </script>

</body>

</html>
