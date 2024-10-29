<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrderUp - Cadastro</title>
    <link rel="shortcut icon" href="../img/Black and Yellow Simple Food Logo 2.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/cadastrar.css">

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
                <img src="../img/logoOrderup.png" alt="OrderUp Logo">
                <h2>Começe agora a fazer seus pedidos!</h2>
            </div>
            <form id="cadastroForm">
                <div class="input-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" placeholder="insira seu nome completo" required>
                </div>
                <div class="input-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" placeholder="insira seu CPF" required>
                </div>
                <div class="input-group">
                    <label for="email">Email de acesso</label>
                    <input type="email" name="email" id="email" placeholder="Insira um email valído" required>
                </div>
                <div class="input-group">
                    <label for="senha">Senha de acesso</label>
                    <input type="password" name="senha" id="senha" placeholder="Entre com a sua senha" required>
                </div>
                <button type="submit" class="login-btn">Cadastrar</button>
                <div class="divider">ou</div>
                <a href="../index.php"><button type="button" class="register-btn">Entrar Agora</button></a>
            </form>
        </div>
        <div class="logo-container">
            <img src="../img/logoOrderup.png" alt="OrderUp Logo Grande">
        </div>
    </div>

    <script>

        //feito para salvar o cadastro do usuario tanto no banco do firebase quanto no banco local
        //e assim fazer o envio do link para recuperação de senha
        document.getElementById('cadastroForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Impede o envio automático do formulário

            // Captura os dados do formulário
            var nome = document.getElementById('nome').value;
            var cpf = document.getElementById('cpf').value;
            var email = document.getElementById('email').value;
            var senha = document.getElementById('senha').value;

            // Cria o usuário no Firebase
            firebase.auth().createUserWithEmailAndPassword(email, senha)
                .then((userCredential) => {
                    // Usuário cadastrado com sucesso no Firebase
                    console.log('Usuário cadastrado no Firebase:', userCredential.user);

                    // Agora envia os dados para o PHP (cadastra no banco de dados local)
                    fetch('../php/cadastrar.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            nome: nome,
                            cpf: cpf,
                            email: email
                        })
                    })
                    .then(response => response.text())
                    .then(result => {
                        console.log(result);
                        alert("Cadastro realizado com sucesso!");
                    })
                    .catch(error => {
                        console.error('Erro ao cadastrar no banco de dados local:', error);
                        alert("Erro ao cadastrar no banco de dados local.");
                    });
                })
                .catch((error) => {
                    console.error('Erro ao cadastrar no Firebase:', error.message);
                    alert("Erro ao cadastrar no Firebase: " + error.message);
                });
        });
    </script>
</body>
</html>
