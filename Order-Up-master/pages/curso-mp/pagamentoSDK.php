<?php

require_once 'class/Conn.class.php';
require_once 'class/User.class.php';

$user = new User(1);
$dados_user = $user->get();


?>
<!DOCTYPE html>
<html lang="pt-bt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Adicionar saldo</title>
</head>

<body>
    <style>
        @font-face {
            font-family: 'Super Foods';
            src: url(../fontface/Super\ Foods.ttf)
        }


        * {

            background-color: #F5EBD9;
        }

        body {
            font-family: 'Super Foods', '';
        }

        .geral {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

        }

        .titulo_e_logo {
            display: flex;
            justify-content: center;
            align-items: center;
            align-items: center;
            width: 100%;
            margin-top: -17px;
        }

        .titulo {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            margin: 20px 0;
        }

        .titulo2 {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 17px;
            margin: 20px 0;
            margin-bottom: 10px;
        }

        .adicionar_pix_cartao {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .retangulo {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 410px;
            height: 254px;
            padding: 20px;
            border: 1px solid #DDA52F;
            /* Retângulo ao redor dos dois botões */

            margin-bottom: 57px;
        }

        .ad_pix,
        .ad_cartao {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 15px;
            gap: 10px;
            width: 300px;
            font-weight: lighter;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            height: 40px;
            background-color: #F5EBD9;
            margin: 33px 0;
            cursor: pointer;
            border: 2px solid #DDA52F;
            /* Sem borda nos botões */
            border-radius: 20px;
        }


        .ad_pix:hover,
        .ad_cartao:hover {
            background-color: #DDA52F;
            border: 2px solid #F5EBD9;
            color: #fff;

        }

        .linha {
            width: 90%;
            height: 1px;
            background-color: #DDA52F;
            margin-top: -12px;

        }

        .logo {
            width: 95px;
            height: 75px;
        }
        a{
            text-decoration: none;
        }
        .input-valor{
            padding: 2%;
            height: 20px;
            width: 20%;
            background-color: #fff;
            border:none;
            border-radius: 20px;
        }
        .saldo{
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }
    </style>

    <div class="geral">

        <div class="titulo_e_logo">
            <div class="titulo">ORDERUP</div>
            <div><img src="img/logoOrderup.png" width="90px" height="80px" alt=""></div>
        </div>

        <span class="linha"></span>
        <h2>Username: <?= $dados_user->username; ?></h2>
        <div class="saldo">
        <h2>Saldo: R$ <?= $dados_user->balance; ?></h2>
        <input type="number" class="input-valor" placeholder="0.00" name="valor" id="valor" >
        </div>

        <div class="titulo2">
            <p>Adicione saldo a sua conta pelo método desejado</p>
        </div>

        <div class="adicionar_pix_cartao">
            <div class="retangulo">

                <a href="sdk/card.php"><button class="ad_cartao">Adicionar saldo por Cartão</button></a>

                <a href="sdk/pix.php">Adicionar saldo por pix </a> 

            </div>
        </div>



        <span class="linha"></span>

        <img src="./img/logoOrderup.png" alt="logo" class="logo">

        <!-- <input type="number" placeholder="0.00" name="valor" id="valor" >

        <br>

         <p style="margin-top: 30px;border: 1px solid #01d2e5;padding: 10px;border-radius: 8px;">
            API:
            <a href="api/pix.php">Adicionar saldo por pix</a> 
            <a href="api/preference.php">Adicionar saldo por preference</a>
            <a href="api/card.php">Adicionar saldo por Cartão</a>
         </p>

         <p style="margin-top: 30px;border: 1px solid #01d2e5;padding: 10px;border-radius: 8px;">
            SDK:
            <a href="sdk/preference.php">Adicionar saldo por preference</a>
            <a href="sdk/card.php">Adicionar saldo por Cartão</a>
         </p>

    </div>  -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="js/app.js"></script>
</body>

</html>