<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>

    <!-- Bootstrap e outros estilos -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/swiper-bundle.min.css">
    <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../css/administrador.adicionar.css">
    <link rel="stylesheet" href="../css/administrador.adicionar.css">


    <style>
        /* Estilos para centralizar os retângulos */
        .ajuste-de-centralizar {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Contêiner dos retângulos */
        .container-retangulos {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            width: 80%;
            max-width: 1000px;
        }

        /* Cada retângulo */
        .retangulo {
            cursor:pointer;
            border:1px solid #d2ab60;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 120px;
            background-color: #F9EAE1;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px;
        }

        .pedido-info {
            font-size: 16px;
        }

        .pedido-info span {
            display: block;
        }

        .pedido-info .pedido-num {
            font-weight: bold;
        }

        .pedido-info .pedido-codigo {
            font-style: italic;
            color: #555;
        }

        .pedido-info .pedido-total {
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }

        /* Responsividade: para telas menores */
        @media screen and (max-width: 768px) {
            .container-retangulos {
                grid-template-columns: repeat(2, 1fr);
            }

            /* Esconde o menu por padrão */
            .navbar-menu {
                display: none;
                width: 100%;
                text-align: center;
            }

            /* Torna o ícone de hambúrguer visível */
            .menu-icon {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                width: 30px;
                height: 20px;
                cursor: pointer;
            }

            .menu-icon span {
                display: block;
                height: 4px;
                background-color: #333;
                border-radius: 4px;
            }

            /* Exibe o menu quando ele for ativo */
            .navbar-menu.active {
                display: block;
            }

            .navbar-menu ul {
                display: block;
                padding: 0;
                margin-top: 20px;
            }

            .navbar-menu li {
                margin: 10px 0;
            }

            .navbar-menu a {
                font-size: 18px;
                font-weight: normal;
            }
        }

        /* Garantir que o menu está visível por padrão em telas grandes */
        @media screen and (min-width: 769px) {
            .navbar-menu {
                display: flex;
                justify-content: space-around;
            }
        }

    
    </style>

</head>

<body>

    <nav class="navbar">
        <ul>
            <img class="logo" src="../img/logoOrderup.png" alt="Logo" />
            <li class="nav_g">
                <a href="adicionar_produtos_geral.php">Inserção de produtos</a>
            </li>
            <li class="nav_g">
                <a href="produtosDiario.php">Inserção de produtos diario</a>
            </li>
            <li class="nav_g"><a href="relatorio.php">Relatório</a></li>
            <li class="nav_g"><a href="pedidosAdm.php">Pedidos</a></li>
        </ul>
    </nav>
    </header>

    <!-- Seção com os 12 Retângulos -->
    <div class="ajuste-de-centralizar">
        <div class="container-retangulos">
            <!-- Criando os 12 retângulos manualmente -->
            <div class="retangulo">
                <div class="pedido-info">
                    <span class="pedido-num">Pedido #1</span>
                    <span class="pedido-codigo">Código: A7B2C9</span>
                    <span class="pedido-total">Total: R$ 6,50</span>
                </div>
            </div>

            <div class="retangulo">
                <div class="pedido-info">
                    <span class="pedido-num">Pedido #2</span>
                    <span class="pedido-codigo">Código: D3E4F1</span>
                    <span class="pedido-total">Total: R$ 12,50</span>
                </div>
            </div>

            <div class="retangulo">
                <div class="pedido-info">
                    <span class="pedido-num">Pedido #3</span>
                    <span class="pedido-codigo">Código: G1H8J0</span>
                    <span class="pedido-total">Total: R$ 2,50</span>
                </div>
            </div>

            <div class="retangulo">
                <div class="pedido-info">
                    <span class="pedido-num">Pedido #4</span>
                    <span class="pedido-codigo">Código: L6M9N2</span>
                    <span class="pedido-total">Total: R$ 5,00</span>
                </div>
            </div>

            <div class="retangulo">
                <div class="pedido-info">
                    <span class="pedido-num">Pedido #5</span>
                    <span class="pedido-codigo">Código: P3Q5R0</span>
                    <span class="pedido-total">Total: R$ 6,10</span>
                </div>
            </div>

            <div class="retangulo">
                <div class="pedido-info">
                    <span class="pedido-num">Pedido #6</span>
                    <span class="pedido-codigo">Código: X7Y4Z1</span>
                    <span class="pedido-total">Total: R$ 15,60</span>
                </div>
            </div>

            <div class="retangulo">
                <div class="pedido-info">
                    <span class="pedido-num">Pedido #7</span>
                    <span class="pedido-codigo">Código: B9C0D4</span>
                    <span class="pedido-total">Total: R$ 9,60</span>
                </div>
            </div>

            <div class="retangulo">
                <div class="pedido-info">
                    <span class="pedido-num">Pedido #8</span>
                    <span class="pedido-codigo">Código: F6G1H3</span>
                    <span class="pedido-total">Total: R$ 8,45</span>
                </div>
            </div>

            <div class="retangulo">
                <div class="pedido-info">
                    <span class="pedido-num">Pedido #9</span>
                    <span class="pedido-codigo">Código: J2K4L7</span>
                    <span class="pedido-total">Total: R$ 5,40</span>
                </div>
            </div>

            <div class="retangulo">
                <div class="pedido-info">
                    <span class="pedido-num">Pedido #10</span>
                    <span class="pedido-codigo">Código: M8N9O2</span>
                    <span class="pedido-total">Total: R$ 4,60</span>
                </div>
            </div>

            <div class="retangulo">
                <div class="pedido-info">
                    <span class="pedido-num">Pedido #11</span>
                    <span class="pedido-codigo">Código: S3T0U4</span>
                    <span class="pedido-total">Total: R$ 0,15</span>
                </div>
            </div>

            <div class="retangulo">
                <div class="pedido-info">
                    <span class="pedido-num">Pedido #12</span>
                    <span class="pedido-codigo">Código: W1X5Y3</span>
                    <span class="pedido-total">Total: R$ 6,80</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Selecionando o botão de menu e o menu de navegação
        const menuIcon = document.getElementById('menu-icon');
        const navbarMenu = document.getElementById('navbar-menu');

        // Função para alternar a visibilidade do menu
        menuIcon.addEventListener('click', function () {
            navbarMenu.classList.toggle('active');
        });
    </script>

</body>

</html>