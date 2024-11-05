<?php
include '../php/conexao.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- for icons  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- bootstrap  -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="../css/swiper-bundle.min.css" />
    <!-- fancy box  -->
    <link rel="stylesheet" href="../css/jquery.fancybox.min.css" />
    <!-- custom css  -->
    <link rel="stylesheet" href="../css/home_style.css" />
    <link rel="stylesheet" href="../css/cardapio.css" />
    <link rel="stylesheet" href="login.html" />
    <title>Cardápio</title>
</head>

<body>
    <style>
        /* Estilo básico para o modal */
/* Estilos gerais dos modais */
#loginModal,
        #cartModal {
            display: none;
            /* Inicialmente oculto */
            position: absolute;
            top: 30px;
            /* Posição do modal */
            right: 0;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            border-radius: 5px;
            width: 250px;
            /* Tamanho do modal */
            z-index: 1000;
            font-family: Arial, sans-serif;
            /* Animação */
            animation: fadeIn 0.3s ease-in-out;
        }

        /* Conteúdo do modal */
        .login-modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            width: 300px;
            border-radius: 10px;
        }

                /* Estilo para o conteúdo dentro do modal de login */
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

        /* Estilo para o botão de fechar (X) */
        .close {
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: red;
        }

        .item-carrinho input[type="number"] {
            width: 20%;
            padding: 5px;
            margin-right: 10px;
            text-align: center;
        }

        .item-carrinho {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .modal-carrinho {
            display: none;
            position: fixed;
            top: 0;
            right: 0;
            width: 350px;
            height: 100%;
            background-color: white;
            border-left: 1px solid #ccc;
            padding: 20px;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .modal-content-carrinho {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .modal-content-carrinho h3 {
            margin-bottom: 20px;
        }

        #lista-carrinho {
            flex-grow: 1;
            margin-bottom: 20px;
        }

        #ir-para-pagamento,
        #confirmar-pagamento,
        #cancelar-pagamento,
        #confirmar-recebimento {
            background-color: #DDA52F;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        #ir-para-pagamento:hover {
            background-color: #CDA52F;
            /* Cor de hover mais escura */
        }

        .modal {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            z-index: 10;
        }

        .modal-content {
            max-width: 400px;
        }

        #fechar-modal-carrinho {
            background-color: transparent;
            border: none;
            display: flex;
            justify-content: end;
        }

        .a {
            background-color: #DDA52F;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
    </style>
    <div class="header_header">
        <div>
            <!-- start of header  -->
            <header class="site-nav-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="header-logo">
                                <a href="index.html">
                                    <img src="../img/logoOrderup.png" alt="Logo" />
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="main-navigation">
                                <button class="menu-toggle">
                                    <span></span><span></span>
                                </button>
                                <nav class="header-menu">
                                    <ul class="menu food-nav-menu">
                                        <li><a href="index.html">Inicio</a></li>
                                        <li><a href="cardapio.html">Menu</a></li>
                                    </ul>
                                </nav>
                                <div class="header-right">
                                    <form action="#" class="header-search-form for-des">
                                        <input type="search" class="form-input" placeholder="Pesquisar..." />
                                        <button type="submit">
                                            <i class="uil uil-search"></i>
                                        </button>
                                    </form>
                            <!-- Modal de Login -->
                            <div id="login" class="header-btn header-dropdown">
                                <i class="uil uil-user-md" onclick="toggleLoginModal()"></i> <!-- Alterado para usar toggleLoginModal -->
                                <div id="loginModal" class="dropdown-menu">
                                    <div class="dropdown-header">
                                        <p id="welcomeMessage">Seja bem-vindo(a), Alana!</p>
                                        <a href="javascript:void(0)" onclick="toggleModal('cartModal')">Abrir Carrinho</a> <!-- Abre o modal de carrinho -->
                                    </div>
                                </div>
                            </div>
                                    <a href="javascript:void(0)" class="header-btn header-cart">
                                        <i id="compr-btn" class="uil uil-shopping-bag"></i>
                                    </a>

                                    <!-- Dropdown de Usuário Atualizado -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div class="nav_link_ajuste" id="conteudo_oculto">
            <nav class="nav_link">
                <p class="n" onclick="scrollToSection('salgados')">Salgados</p>
                <p class="n" onclick="scrollToSection('bebidas')">Bebidas</p>
                <p class="n" onclick="scrollToSection('combo')">combo</p>
                <p class="n" onclick="scrollToSection('almoco')">Almoço</p>
            </nav>
        </div>
    </div>
    <!-- header ends  -->

    <div class="bg-pattern bg-light repeat-img" style="background-image: url(assets/images/blog-pattern-bg.png);">
        <section class="blog-sec section" id="blog">
            <div class="sec-wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <p class="sec-sub-title mb-3">estrelas do momento</p>
                                <h2 class="h2-title">Confira os mais vendidos</h2>
                                <div class="sec-title-shape mb-4">
                                    <img src="" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="blog-box-custom">
                                <div class="blog-img-custom back-img" style="background-image: url(./img/pngegg.png);">
                                </div>
                                <div class="blog-text-custom">
                                    <p class="blog-date-custom"></p>
                                    <a href="#" class="h4-title-custom"></a>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="blog-box-custom">
                                <div class="blog-img-custom back-img" style="background-image: url(assets/images/blog/blog2.jpg);"></div>
                                <div class="blog-text-custom">
                                    <p class="blog-date-custom"></p>
                                    <a href="#" class="h4-title-custom"></a>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="blog-box-custom">
                                <div class="blog-img-custom back-img" style="background-image: url(assets/images/blog/blog2.jpg);"></div>
                                <div class="blog-text-custom">
                                    <p class="blog-date-custom"></p>
                                    <a href="#" class="h4-title-custom"></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <div class="sec-wp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec-title text-center mb-5">
                        <p class="sec-sub-title mb-3">Nosso Cardapio</p>
                        <h2 class="h2-title">
                            Você tem fome<span>do quê?</span>
                        </h2>
                        <div class="sec-title-shape mb-4">
                            <img src="assets/images/title-shape.svg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="salgados">
        <div class="ajuste_sectio"></div>
        <h1 class="titulo">Salgados</h1>
        <div class="pai">
            <?php
            // Consultar os produtos da categoria "salgados"
            $sql = "SELECT nome, imagem, preco FROM tb_produtos WHERE categoria = 'salgados'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $produtoId = strtolower(str_replace(' ', '-', $row["nome"]));
                    echo '<div class="filha" id="' . $produtoId . '">';
                    echo '<img src="../uploads/' . $row["imagem"] . '" alt="' . $row["nome"] . '" class="produto-imagem" />';
                    echo '<div class="baixo">';
                    // Passar nome, imagem e preço para a função openModal
                    echo '<button class="buy-btn" data-nome="' . $row["nome"] . '" data-imagem="' . $row["imagem"] . '" data-preco="' . $row["preco"] . '">Comprar</button>';
                    echo '<p class="sabor">' . $row["nome"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
            ?>
        </div>
    </section>

    <section id="bebidas">
        <div class="ajuste_sectio"></div>
        <h1 class="titulo">Bebidas</h1>
        <div class="pai">
            <?php
            // Consultar os produtos da categoria "bebidas"
            $sql = "SELECT nome, imagem FROM tb_produtos WHERE categoria = 'bebidas'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="filha">';
                    echo '<img src="../uploads/' . $row["imagem"] . '" alt="' . $row["nome"] . '" class="produto-imagem" />';
                    echo '<div class="baixo">';
                    echo '<button class="buy-btn">Comprar</button>';
                    echo '<p class="sabor">' . $row["nome"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
            ?>
        </div>
    </section>

    <section id="combo">
        <div class="ajuste_sectio"></div>
        <h1 class="titulo">Combo</h1>
        <div class="pai">
            <?php
            // Consultar os produtos da categoria "combo"
            $sql = "SELECT nome, imagem FROM tb_produtos WHERE categoria = 'combo'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="filha">';
                    echo '<img src="../uploads/' . $row["imagem"] . '" alt="' . $row["nome"] . '" class="produto-imagem" />';
                    echo '<div class="baixo">';
                    echo '<button class="buy-btn">Comprar</button>';
                    echo '<p class="sabor">' . $row["nome"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
            ?>
        </div>
    </section>



    <section id="almoco">
        <div class="ajuste_sectio"></div>
        <h1 class="titulo">Almoço</h1>
        <div class="pai">
            <?php
            // Consultar os produtos da categoria "almoco"
            $sql = "SELECT nome, imagem FROM tb_produtos WHERE categoria = 'almoco'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="filha">';
                    echo '<img src="../uploads/' . $row["imagem"] . '" alt="' . $row["nome"] . '" class="produto-imagem" />';
                    echo '<div class="baixo">';
                    echo '<button class="buy-btn">Comprar</button>';
                    echo '<p class="sabor">' . $row["nome"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>Nenhum produto encontrado.</p>";
            }
            ?>
        </div>
    </section>

    <?php
    // Fechar a conexão
    $conn->close();
    ?>

    <!-- Modal para login -->
    <div id="loginModal" class="login-modal">
        <div class="login-modal-content">
            <span class="close">&times;</span>
            <h4>Orderup Card
                <hr class="modal-divider">
            </h4>
            <!-- Linha abaixo do título -->

            <div class="subtitulo">
                <h3 class="modal-title">Seja Bem-Vindo, xxxx</h3>
            </div>

            <!-- Texto abaixo da linha -->
            <p class="modal-text">Consulte as suas informações de pagamento.</p>

            <!-- Botão -->
            <button class="modal-button primary-button">Adicionar saldo a sua conta</button>

            <!-- Divisor com "ou" -->
            <div class="modal-divider-container">
                <hr class="modal-divider">
                <span class="modal-or">OU</span>
                <hr class="modal-divider">
            </div>

            <!-- Outro botão -->
            <button class="modal-button secondary-button">Verificar saldo da conta</button>

            <!-- Logo -->
            <div class="modal-logo">
                <img src="./img/logoOrderup.png" alt="Logo">
            </div>

            <!-- Adicione mais conteúdo conforme necessário -->
        </div>
    </div>


    </section>
    <!-- Adicione mais seções conforme necessário -->

    <!-- footer starts  -->
    <footer class="site-footer" id="contact">
        <div class="top-footer section">
            <div class="sec-wp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="footer-info">
                                <div class="footer-logo">
                                    <a href="index.html">
                                        <img src="./imagens/OrderUpsemnome.png" alt="">
                                    </a>
                                </div>
                                <p>Rua Mons. Andrade 298, São Paulo, SP, 03008-000
                                </p>
                                <div class="social-icon">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="uil uil-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="uil uil-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="uil uil-github-alt"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="uil uil-youtube"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="footer-flex-box">
                                <div class="footer-table-info">
                                    <h3 class="h3-title">Nossos Horarios</h3>
                                    <ul>
                                        <li><i class="uil uil-clock"></i> Seg-Sexta : 9:10 - 22:00</li>
                                        <li><i class="uil uil-clock"></i> Sabados : 9:10 - 22:00</li>

                                    </ul>
                                </div>
                                <div class="footer-menu food-nav-menu">
                                    <h3 class="h3-title">Links</h3>
                                    <ul class="column-2">
                                        <li>
                                            <a href="#inicio" class="footer-active-menu">Inicio</a>
                                        </li>
                                        <li><a href="#about"></a></li>
                                        <li><a href="cardapio.html">Menu</a></li>
                                        <li><a href="#gallery"></a></li>
                                        <li><a href="#blog"></a></li>
                                        <li><a href="#contact"></a></li>
                                    </ul>
                                </div>
                                <div class="footer-menu">
                                    <h3 class="h3-title">Companhia</h3>
                                    <ul>
                                        <li><a href="pages/termos_uso.html">Termos e Condições</a></li>
                                        <li><a href="pages/politica_privacidade.html">Politica de Privacidade</a></li>
                                        <li><a href="#">Politica de Cookie</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="direitos_reservados">
            <p>Copyright &copy; 2024 <span class="name">Orderup.</span>Todos os direitos
                reservados.
            </p>
        </div>
    </footer>

    <!-- footer ends  -->

    <!-- voltar para cima -->
    <button id="botaoVoltar" class="botao" onclick="voltarAoTopo()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5" />
        </svg></button>

    <!-- <div id="cartModal" class="cart-modal">
        <div class="modal-content">
            <span class="close">&times;</span> 

            <h4>Carrinho de Compras</h4>

            <div id="cartItems">
                <p id="cartEmptyMessage">Ops, seu carrinho ainda está vazio...</p>
            </div>

            <p id="cartTotal">Total: R$ 0,00</p>

            <button class="button" id="chooseProductsBtn">Escolher mais produtos</button>

            <button class="botao">Finalizar Compra</button>
        </div>
    </div> -->


    <!-- Modal de Carrinho que fica do lado direito da página -->
    <div id="modal-carrinho" class="modal-carrinho">
        <div class="modal-content-carrinho">
            <button id="fechar-modal-carrinho" class="fechar-modal-btn">&times;</button> <!-- Botão de fechar -->
            <h3>Carrinho de Compras</h3>

            <!-- ajuste-de-conteudo -->
            <div class="ajuste-de-conteudo">

                <!-- Lista de Itens no Carrinho -->
                <div id="lista-carrinho"></div>

            </div>

            <!-- Total Geral -->
            <p>Total: R$ <span id="total-carrinho">0.00</span></p>

            <!-- Botão de Pagamento -->
            <button class="n" id="ir-para-pagamento">Ir para pagamento</button>
        </div>
    </div>

    <div id="modal-pagamento" class="modal">
    <div class="modal-content">
        <span class="close-pagamento">&times;</span> <!-- Botão de fechar pagamento -->
        <h3>Resumo do Pedido</h3>
        <div id="resumo-carrinho"></div>
        <p>Total: R$ <span id="total-pagamento" name="total-pagamento">0.00</span></p>
        <p id="codigo-pedido-container" style="display: none;">
            Código do Pedido: <span id="codigo-pedido" name="codigo-pedido">12345</span>
        </p>

        <!-- Formulário de pagamento -->
        <form method="POST" id="form-pagamento" action="">
            <!-- Campos ocultos para enviar o código do pedido e o total do pagamento -->
            <input type="hidden" id="codigo-pedido-input" name="codigo-pedido">
            <input type="hidden" id="total-pagamento-input" name="total-pagamento">
            <button type="button" id="confirmar-pagamento" onclick="preencherCampos()">Confirmar Compra</button>
            <button type="submit" id="confirmar-recebimento" style="display: none;">Pedido Recebido</button>
            <button type="button" id="cancelar-pagamento">Cancelar</button>
        </form>
    </div>
</div>




    <!-- Modal para Carrinho -->
    <div id="loginModal" class="login-modal">
        <div class="login-modal-content">
            <span class="close">&times;</span>
            <h4>Orderup Card

                <hr class="modal-divider">
            </h4>
            <!-- Linha abaixo do título -->


            <div class="subtitulo">
                <h3 class="modal-title">Seja Bem-Vindo, xxxx </h3>
            </div>



            <!-- Texto abaixo da linha -->
            <p class="modal-text">Consulte as suas informações de pagamento.</p>

            <!-- Botão -->
            <button class="modal-button primary-button">Adicionar saldo a sua conta</button>

            <!-- Divisor com "ou" -->
            <div class="modal-divider-container">
                <hr class="modal-divider">
                <span class="modal-or">OU</span>
                <hr class="modal-divider">
            </div>

            <!-- Outro botão -->
            <button class="modal-button secondary-button">Verificar saldo da conta</button>



            <!-- Logo -->
            <div class="modal-logo">

                <img src="./img/logoOrderup.png" alt="Logo">
            </div>



            <!-- Adicione mais conteúdo conforme necessário -->
        </div>
    </div>


    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span> <!-- Botão de fechar -->
            <h3>Itens no Carrinho:</h3>

            <!-- Informações do Produto Selecionado -->
            <div class="produto-info">
                <img id="produto-imagem-modal" src="" alt="Produto Selecionado" />
                <h2 id="produto-nome-modal"></h2>
                <p>Preço: R$ <span id="produto-preco-modal"></span></p>
                <label for="quantidade">Quantidade:</label>
                <input type="number" id="quantidade" value="1" min="1">
                <p>Total do produto: R$ <span id="produto-total-modal"></span></p>
            </div>

            <!-- Lista de Itens no Carrinho -->
            <div id="lista-carrinho"></div>

            <!-- Total Geral -->
            <p id="total">Total: R$ <span>0.00</span></p>

            <!-- Botões -->
            <button id="adicionar-carrinho">Ir para pagamento</button>
            <button id="adicionar-novo-item">Adicionar Item</button>
        </div>
    </div>

    <!-- Modal de Pagamento -->
    <div id="modal-pagamento" class="modal">
        <div class="modal-content">
            <span class="close-pagamento">&times;</span> <!-- Botão de fechar -->
            <h3>Resumo do Pedido</h3>

            <!-- Lista de Itens no Resumo -->
            <div id="resumo-carrinho"></div>

            <!-- Total Geral -->
            <p>Total: R$ <span id="total-pagamento">0.00</span></p>

            <!-- Código do Pedido, inicialmente oculto -->
            <p id="codigo-pedido-container" style="display: none;">Código do Pedido: <span id="codigo-pedido"></span></p>

            <!-- Botões de Ação -->
            <button id="confirmar-pagamento" onclick="abrirCode()">Confirmar Pagamento</button>
            <button id="cancelar-pagamento">Cancelar</button>
        </div>
    </div>

    <script>
        let carrinho = [];
        let saldo = 10;
        let total = 0;

        const modalCarrinho = document.getElementById('modal-carrinho');
        const modalPagamento = document.getElementById('modal-pagamento');
        const closePagamento = document.querySelector('.close-pagamento');
        const closeCarrinho = document.getElementById('fechar-modal-carrinho');
        const resumoCarrinho = document.getElementById('resumo-carrinho');
        const totalPagamentoDisplay = document.getElementById('total-pagamento');
        const listaCarrinho = document.getElementById('lista-carrinho');
        const totalCarrinhoDisplay = document.getElementById('total-carrinho');
        const produtoNomeModal = document.getElementById('produto-nome-modal');
        const produtoImagemModal = document.getElementById('produto-imagem-modal');
        const produtoPrecoModal = document.getElementById('produto-preco-modal');
        const produtoTotalModal = document.getElementById('produto-total-modal');
        const quantidadeInput = document.getElementById('quantidade');
        const headerDropdownBtn = document.querySelector('.header-btn.header-dropdown');
        const loginModal = document.getElementById('loginModal');
        const closeModalBtn = document.querySelector('.close');



        let carrinhoAberto = false;

        const confirmarRecebimentoBtn = document.getElementById('confirmar-recebimento');
        const confirmarPagamentoBtn = document.getElementById('confirmar-pagamento');

        confirmarRecebimentoBtn.style.display = 'none';
        confirmarPagamentoBtn.style.display = 'block';

        if (headerDropdownBtn) {
            headerDropdownBtn.addEventListener('click', function() {
                const dropdownContent = document.querySelector('.dropdown-content');
                dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
            });
        }

        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', function() {
                loginModal.style.display = 'none';
            });
        }

        window.addEventListener('click', function(event) {
            if (event.target === loginModal) {
                loginModal.style.display = 'none';
            }
        });

        function adicionarNovoItem() {
            const nome = produtoNomeModal.textContent;
            const imagem = produtoImagemModal.src.split('/').pop();
            const preco = parseFloat(produtoPrecoModal.textContent);
            const quantidade = parseInt(quantidadeInput.value);
            const totalProduto = preco * quantidade;

            const item = {
                nome,
                imagem,
                preco,
                quantidade,
                totalProduto
            };

            carrinho.push(item);
            atualizarCarrinho();

            if (!carrinhoAberto) {
                abrirCarrinho();
                carrinhoAberto = true;
            }
        }

        function abrirCarrinho() {
            modalCarrinho.style.display = 'block';
        }

        function atualizarCarrinho() {
            listaCarrinho.innerHTML = '';
            total = 0;
            carrinho.forEach((item, index) => {
                const itemDiv = document.createElement('div');
                itemDiv.classList.add('item-carrinho');

                const img = document.createElement('img');
                img.src = '../uploads/' + item.imagem;
                img.alt = item.nome;
                img.style.width = '50px';
                img.style.marginRight = '10px';

                const quantidadeInput = document.createElement('input');
                quantidadeInput.type = 'number';
                quantidadeInput.value = item.quantidade;
                quantidadeInput.min = 1;
                quantidadeInput.addEventListener('input', function() {
                    atualizarQuantidade(index, parseInt(quantidadeInput.value));
                });

                const p = document.createElement('p');
                p.textContent = `${item.nome} - R$ ${item.totalProduto.toFixed(2)}`;

                const deletarBtn = document.createElement('button');
                deletarBtn.textContent = 'Deletar';
                deletarBtn.addEventListener('click', () => deletarItem(index));

                itemDiv.appendChild(img);
                itemDiv.appendChild(p);
                itemDiv.appendChild(quantidadeInput);
                itemDiv.appendChild(deletarBtn);

                listaCarrinho.appendChild(itemDiv);
                total += item.totalProduto;
            });

            totalCarrinhoDisplay.textContent = total.toFixed(2);
        }

        function atualizarQuantidade(index, novaQuantidade) {
            const item = carrinho[index];
            item.quantidade = novaQuantidade;
            item.totalProduto = item.preco * novaQuantidade;
            atualizarCarrinho();
        }

        function deletarItem(index) {
            carrinho.splice(index, 1);
            atualizarCarrinho();
        }

        function atualizarResumoPagamento() {
            resumoCarrinho.innerHTML = '';
            carrinho.forEach(item => {
                const divItem = document.createElement('div');
                divItem.textContent = `${item.quantidade}x ${item.nome} - R$ ${item.totalProduto.toFixed(2)}`;
                resumoCarrinho.appendChild(divItem);
            });
            totalPagamentoDisplay.textContent = total.toFixed(2);
        }

        document.getElementById('ir-para-pagamento').addEventListener('click', () => {
            atualizarResumoPagamento();
            modalCarrinho.style.display = 'none';
            modalPagamento.style.display = 'block';
        });

        closePagamento.addEventListener('click', () => {
            modalPagamento.style.display = 'none';
            modalCarrinho.style.display = 'block';
        });

        window.addEventListener('click', function(event) {
            if (event.target === modalPagamento) {
                modalPagamento.style.display = 'none';
                modalCarrinho.style.display = 'block';
            }
        });

        closeCarrinho.addEventListener('click', () => {
            modalCarrinho.style.display = 'none';
            carrinhoAberto = false;
        });

        const buyButtons = document.querySelectorAll('.buy-btn');
        buyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const nome = this.getAttribute('data-nome');
                const imagem = this.getAttribute('data-imagem');
                const preco = parseFloat(this.getAttribute('data-preco'));

                produtoNomeModal.textContent = nome;
                produtoImagemModal.src = '../uploads/' + imagem;
                produtoPrecoModal.textContent = preco.toFixed(2);
                produtoTotalModal.textContent = preco.toFixed(2);
                quantidadeInput.value = 1;

                adicionarNovoItem();
            });
        });

        document.getElementById('cancelar-pagamento').addEventListener('click', () => {
            modalPagamento.style.display = 'none';
            modalCarrinho.style.display = 'block';
        });

        window.addEventListener('click', function(event) {
            const dropdownContent = document.querySelector('.dropdown-content');
            if (dropdownContent && !headerDropdownBtn.contains(event.target) && !dropdownContent.contains(event.target)) {
                dropdownContent.style.display = 'none';
            }
        });

        function abrirCode() {
            const codigoPedidoContainer = document.getElementById('codigo-pedido-container');
            const codigoAleatorio = gerarCodigoAleatorio();
            document.getElementById('codigo-pedido').textContent = codigoAleatorio;
            codigoPedidoContainer.style.display = 'block';
            confirmarRecebimentoBtn.style.display = 'block';
            confirmarPagamentoBtn.style.display = 'none';
            enviarPedido(codigoAleatorio, total);
        }


        function gerarCodigoAleatorio() {
            const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let codigo = '';
            for (let i = 0; i < 6; i++) {
                const indiceAleatorio = Math.floor(Math.random() * caracteres.length);
                codigo += caracteres[indiceAleatorio];
            }
            return codigo;
        }

        function verificacaoSaldo() {
            const totalPagamento = parseFloat(totalPagamentoDisplay.textContent);

            if (saldo >= totalPagamento) {
                abrirCode();
            } else {
                alert("Você não tem saldo suficiente");
            }
        }


        document.getElementById('confirmar-pagamento').addEventListener('click', function(event) {
            event.preventDefault(); // Impede o comportamento padrão do botão

            // Obtendo os valores de total e código do pedido
            const totalPagamento = parseFloat(document.getElementById('total-pagamento').textContent);
            const codigoPedido = document.getElementById('codigo-pedido').textContent;

            // Verificação de saldo antes de prosseguir
            if (saldo >= totalPagamento) {
                // Chama a função para abrir o código de pedido (gerar o código aleatório)
                abrirCode();

                // Enviar os dados para o servidor
                enviarPedido(totalPagamento, codigoPedido);
            } else {
                alert("Você não tem saldo suficiente");
            }
        });

        function preencherCampos() {
    // Captura os valores dos elementos visíveis
    const total = document.getElementById('total-pagamento').innerText;
    const codigoPedido = document.getElementById('codigo-pedido').innerText;

    // Preenche os campos ocultos com os valores capturados
    document.getElementById('codigo-pedido-input').value = codigoPedido;
    document.getElementById('total-pagamento-input').value = total;

    // Pode fazer uma verificação para garantir que os valores não estão vazios
    if (!total || !codigoPedido) {
        alert("Erro: Dados incompletos!");
        return false; // Impede o envio do formulário se os dados estiverem faltando
    }

    // Agora o formulário pode ser enviado
    document.getElementById('form-pagamento').submit();
}
function scrollToSection(sectionId) {
            // Encontra a seção usando o ID
            var section = document.getElementById(sectionId);

            // Verifica se a seção existe
            if (section) {
                // Realiza a rolagem suave até a seção
                section.scrollIntoView({
                    behavior: 'smooth', // Faz a rolagem suave
                    block: 'start' // Alinha a seção ao topo da página
                });
            }
        }

        function toggleLoginModal() {
            const modal = document.getElementById('loginModal'); // Seleciona o modal pelo ID
            if (modal.style.display === 'block') {
                modal.style.display = 'none'; // Se estiver visível, oculta
            } else {
                modal.style.display = 'block'; // Se estiver oculto, exibe
            }
        }

    </script>


    <!-- jquery  -->
    <script src="./js/jquery-3.5.1.min.js"></script>

    <!-- bootstrap  -->

    <!-- for swiper slider  -->
    <script src="./js/swiper-bundle.min.js"></script>

    <!-- fancy box  -->
    <script src="./js/jquery.fancybox.min.js"></script>
    <?php
// Incluir a conexão com o banco de dados
include '../php/conexao.php'; // Caminho correto para o arquivo conexao.php

// Verificar se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os dados enviados do formulário
    $codigo_pedido = $_POST['codigo-pedido'];
    $total_pagamento = $_POST['total-pagamento'];

    // Validar os dados (opcional)
    if (empty($codigo_pedido) || empty($total_pagamento)) {
        echo "Erro: Dados incompletos!";
        exit;
    }

    // Inserir os dados na tabela tb_pedidos
    $query = "INSERT INTO tb_pedidos (usuario, codigo, total) VALUES (?, ?, ?)";

    // Usar a conexão já estabelecida para preparar e executar a consulta
    if ($stmt = $db->prepare($query)) {
        // Definindo o valor de 'usuario'. Aqui você pode pegar o usuário logado ou um valor estático.
        // Por exemplo, se o usuário for logado:
        // $usuario = $_SESSION['usuario_id']; 
        // Se for estático:
        $usuario = '1'; // Este valor pode ser alterado conforme sua lógica

        // Vincular os parâmetros da consulta (usuario como string, total como float/double, e codigo como string)
        $stmt->bind_param('isd', $usuario, $codigo_pedido, $total_pagamento);

        // Executar a consulta
        if ($stmt->execute()) {
            // Sucesso
            echo json_encode(['success' => true, 'message' => 'Pedido realizado com sucesso!']);
        } else {
            // Erro ao executar a consulta
            echo json_encode(['success' => false, 'message' => 'Erro ao salvar o pedido: ' . $stmt->error]);
        }

        // Fechar a declaração
        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta: " . $db->error;
    }

    // Fechar a conexão com o banco de dados
    $db->close();
} else {
    // Caso o método não seja POST, retornar um erro
    echo json_encode(['success' => false, 'message' => 'Método inválido.']);
}
?>


</body>

</html>