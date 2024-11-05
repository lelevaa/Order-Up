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

    <style>
        /* Estilo do body - Fontes e Cor de Fundo */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header{
            background-color:#dda52f;
        }

        /* Contêiner dos retângulos */
        .container-retangulos {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            width: 80%;
            max-width: 1000px;
            justify-items: center;
        }

        /* Cada retângulo */
        .retangulo {
            width: 100%;
            height: 120px;
            background-color: #F9EAE1;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
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
        }

        @media screen and (max-width: 480px) {
            .container-retangulos {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>
<body>

    <!-- Navegação -->
    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header-logo">
                        <a href="home.php">
                            <img src="../img/logoOrderup.png" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="main-navigation">
                        <button class="menu-toggle"><span></span><span></span></button>
                        <nav class="header-menu">
                            <ul class="menu food-nav-menu">
                                <li><a href="#inicio">Inicio</a></li>
                                <li><a href="#about"></a></li>
                                <li><a href="cardapio.html">Menu</a></li>
                                <li><a href="#gallery"></a></li>
                                <li><a href="#blog"></a></li>
                                <li><a href="#con
                                
                                tact"></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    

    <!-- Seção com os 12 Retângulos -->
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

</body>
</html>
