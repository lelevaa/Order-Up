<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Página do administrador</title>
    <link rel="stylesheet" href="../css/telaLoginAdm.css" />
  </head>
  <body> 
    
    <div class="logo_ajuste"><img src="../img/logoOrderup.png" width="140px" height="110px" alt="logo"></div>
  
    <div class="container">
      <div class="quadrado">
        <h2 class="administrador_titulo">Página do administrador</h2>

        <form action="../php/loginAdministrador.php" method="POST">
          
            <div class="input-group_usuario">
                <label for="usuario">Usuário:</label>
                <input id="usuario" class="escrever_ad" type="text" name="usuario" required placeholder="insira seu nome de usuario"/>
            </div>

            <div class="input-group_senha">
                <label for="senha">Senha:</label>
                <input id="senha" class="escrever_ad" type="password" name="senha" required placeholder="insira sua senha"/>
            </div>

            <a href="produtosDiario.php"><button class="btn_ad" type="submit">Entrar</button></a>

        </form>       
      </div>
    </div>
  </body>
</html>