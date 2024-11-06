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
    <link rel="stylesheet" href="../../css/home_style.css">
    <title>Adicionar saldo</title>
</head>

<body>
    <style>
        /* Estilos gerais dos modais */
        #loginModal {
            height: 1200px;
            /* Ajuste a altura do modal */
            display: none;
            /* Inicialmente oculto */
            position: fixed;
            /* Fica fixado na tela */
            top: 0;
            /* Fica no topo da tela */
            right: 0;
            /* Fica no canto direito da tela */
            background-color: #fff;
            /* Cor de fundo */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Sombra suave */
            padding: 15px;
            border-radius: 5px;
            width: 300px;
            /* Largura fixa do modal */
            z-index: 1000;
            /* Fica acima de outros elementos */
            font-family: Arial, sans-serif;
            animation: fadeIn 0.3s ease-in-out;
            /* Animação suave */
        }

        /* Definição da animação fadeIn */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Modal de Carrinho */
        #cartModal {
            height: 1200px;
            /* Ajuste a altura do modal */
            display: none;
            /* Inicialmente oculto */
            position: fixed;
            /* Fica fixado na tela */
            top: 0;
            /* Fica no topo da tela */
            right: 0;
            /* Fica no canto direito da tela */
            background-color: #fff;
            /* Cor de fundo */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Sombra suave */
            padding: 15px;
            border-radius: 5px;
            width: 300px;
            /* Largura fixa do modal */
            z-index: 9999;
            /* Fica acima de outros elementos */
            font-family: Arial, sans-serif;
            animation: fadeIn 0.3s ease-in-out;
            /* Animação suave */
        }

        /* Definição da animação fadeIn */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }



        /* Conteúdo do modal de login */
        #loginModal .dropdown-header p {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            text-align: center;
        }

        #loginModal .dropdown-header a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            font-size: 14px;
            text-decoration: none;
        }

        #loginModal .dropdown-header a:hover {
            text-decoration: underline;
        }

        /* Estilo para o conteúdo dentro do modal de carrinho */
        .cart-modal-content h4 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Estilo para o botão de fechar */
        #loginModal .close,
        .cart-modal .close {
            font-size: 20px;
            color: #333;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            font-weight: bold;
        }

        #loginModal .close:hover,
        .cart-modal .close:hover {
            color: #ff0000;
        }

        /* Estilo para o ícone de carrinho */
        .header-btn.header-cart i {
            cursor: pointer;
        }

        /* Estilo para o modal do carrinho */
        .cart-modal {
            display: none;
            /* Inicialmente oculto */
            position: fixed;
            /* Fica fixado na tela */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* Centraliza o modal */
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            /* Sombra mais forte */
            padding: 20px;
            border-radius: 5px;
            width: 300px;
            /* Tamanho do modal */
            z-index: 9999;
            /* Fica acima de outros elementos */
        }

        /* Ajustes no botão de fechar para o carrinho */
        .cart-modal .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        /* Modal para exibir no lado direito */
        .cart-modal2 {
            height: 100%;
            display: flex;
            justify-content: end;
            /* Alinha o modal à direita */
        }

        /* Animação de Fade-In para os modais */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

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
            margin-top: 30px;

        }

        .logo {
            width: 95px;
            height: 75px;
        }

        a {
            text-decoration: none;
        }

        .input-valor {
            padding: 2%;
            height: 20px;
            width: 20%;
            background-color: #fff;
            border: none;
            border-radius: 20px;
        }

        .saldo {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
        }
    </style>

    <div class="geral">

        <div class="col-lg-10">
            <div class="main-navigation">
                <button class="menu-toggle"><span></span><span></span></button>
                <nav class="header-menu">
                    <ul class="menu food-nav-menu">
                        <li><a href="home.php">Inicio</a></li>
                        <li><a href="#about"></a></li>
                        <li><a href="#blog">Menu</a></li>
                        <li><a href="#gallery"></a></li>
                        <li><a href="#blog"></a></li>
                        <li><a href="#contact"></a></li>
                    </ul>
                </nav>
                <div class="header-right">
                    <form action="#" class="header-search-form for-des">
                        <input type="search" class="form-input" placeholder="Pesquisar...">
                        <button type="submit">
                            <i class="uil uil-search"></i>
                        </button>
                    </form>

                    <!-- Modal de Login -->
                    <div id="login" class="header-btn header-dropdown">
                        <i class="uil uil-user-md" onclick="toggleLoginModal()"></i>
                        <!-- Abre/fecha o modal de login -->
                        <div id="loginModal" class="dropdown-menu">
                            <div class="dropdown-header">
                                <span class="close" onclick="closeModal('loginModal')">&times;</span>
                                <!-- Fechar o modal de login -->
                                <p id="welcomeMessage">Seja bem-vindo(a), Alana!</p>
                                <a href="javascript:void(0)" onclick="toggleModal('cartModal')">Abrir
                                    Carrinho</a> <!-- Abre o modal de carrinho -->
                                <button onclick="window.location.href='saldo/pagamentoSDK.php'">Adicionar saldo</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal do Carrinho -->
                    <div id="cartModal" class="cartModal2" style="display: none;">
                        <div class="cart-modal-content">
                            <span class="close" onclick="closeModal('cartModal')">&times;</span>
                            <!-- Fechar o modal de carrinho -->
                            <h4>Seu Carrinho</h4>
                            <div class="subtitulo">
                                <p>Ops, seu carrinho ainda está vazio...</p>
                            </div>
                            <a href="#blog" class="button">Escolher produtos</a>
                        </div>
                    </div>


                    <!-- Modal de Login -->
                    <div id="login" class="header-btn header-dropdown">
                        <i class="uil uil-user-md" onclick="toggleLoginModal()"></i>
                        <!-- Abre/fecha o modal de login -->
                        <div id="loginModal" class="dropdown-menu">
                            <div class="dropdown-header">
                                <span class="close" onclick="closeModal('loginModal')">&times;</span>
                                <!-- Fechar o modal de login -->
                                <p id="welcomeMessage">Seja bem-vindo(a), Alana!</p>
                                <a href="javascript:void(0)" onclick="toggleModal('cartModal')">Abrir
                                    Carrinho</a> <!-- Abre o modal de carrinho -->
                                <button onclick="window.location.href='saldo/pagamentoSDK.php'">Adicionar saldo</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal do Carrinho -->
                    <div id="cartModal" class="cartModal2" style="display: none;">
                        <div class="cart-modal-content">
                            <span class="close" onclick="closeModal('cartModal')">&times;</span>
                            <!-- Fechar o modal de carrinho -->
                            <h4>Seu Carrinho</h4>
                            <div class="subtitulo">
                                <p>Ops, seu carrinho ainda está vazio...</p>
                            </div>
                            <a href="#blog" class="button">Escolher produtos</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <span class="linha"></span>
        <h2>Username: <?= $dados_user->username; ?></h2>
        <div class="saldo">
            <h2>Saldo: R$ <?= $dados_user->balance; ?></h2>
            <input type="number" class="input-valor" placeholder="0.00" name="valor" id="valor">
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

        <script>
            function toggleLoginModal() {
                const modal = document.getElementById('loginModal'); // Seleciona o modal de login pelo ID

                // Verifica se o modal está visível
                if (window.getComputedStyle(modal).display === 'block') {
                    modal.style.display = 'none'; // Se estiver visível, oculta
                } else {
                    modal.style.display = 'block'; // Se estiver oculto, exibe
                }
            }

            // Função para alternar a exibição de outros modais (como o carrinho)
            function toggleModal(modalId) {
                const modal = document.getElementById(modalId); // Seleciona o modal pelo ID

                // Verifica se o modal está visível
                if (window.getComputedStyle(modal).display === 'block') {
                    modal.style.display = 'none'; // Se estiver visível, oculta
                } else {
                    modal.style.display = 'block'; // Se estiver oculto, exibe
                }
            }

            // Função para fechar o modal
            function closeModal(modalId) {
                const modal = document.getElementById(modalId); // Seleciona o modal pelo ID
                modal.style.display = 'none'; // Fecha o modal
            }

        </script>
</body>

</html>