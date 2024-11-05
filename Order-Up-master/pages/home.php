<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orderup</title>

    <!-- for icons  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- bootstrap  -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">


    <!-- for swiper slider  -->
    <link rel="stylesheet" href="../css/swiper-bundle.min.css">

    <!-- fancy box  -->
    <link rel="stylesheet" href="../css/jquery.fancybox.min.css">

    <!-- custom css  -->
    <link rel="stylesheet" href="../css/home_style.css">
</head>

<body class="body-fixed">
<style>
    /* Estilos gerais dos modais */
    #loginModal,
    #cartModal {
        display: none; /* Inicialmente oculto */
        position: absolute;
        top: 30px; /* Posição do modal */
        right: 0;
        background-color: #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 15px;
        border-radius: 5px;
        width: 250px; /* Tamanho do modal */
        z-index: 1000;
        font-family: Arial, sans-serif;
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
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

    /* Estilo para o modal do carrinho */
    .cart-modal {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        padding: 20px;
        border-radius: 5px;
        width: 300px;
        z-index: 9999;
    }

    .cart-modal-content h4 {
        text-align: center;
        margin-bottom: 20px;
    }

    .cart-modal .subtitulo {
        text-align: center;
        margin-bottom: 20px;
    }

    /* Estilo do botão de fechar */
    .cart-modal .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    /* Estilo para o ícone de carrinho */
    .header-btn.header-cart i {
        cursor: pointer;
    }

    /* Ajuste para o modal do carrinho */
    .cartModal {
        display: flex;
        justify-content: end;
    }
</style>
    <!-- start of header  -->
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
                                <i class="uil uil-user-md" onclick="toggleLoginModal()"></i> <!-- Alterado para usar toggleLoginModal -->
                                <div id="loginModal" class="dropdown-menu">
                                    <div class="dropdown-header">
                                        <p id="welcomeMessage">Seja bem-vindo(a), Alana!</p>
                                        <a href="javascript:void(0)" onclick="toggleModal('cartModal')">Abrir Carrinho</a> <!-- Abre o modal de carrinho -->
                                    </div>
                                </div>
                            </div>

                            <!-- Modal do Carrinho -->
                            <div id="cartModal" class="cartModal">
                                <div class="cart-modal-content">
                                    <span class="close" onclick="closeModal('cartModal')">&times;</span> <!-- Alterado para fechar corretamente -->
                                    <h4>Seu Carrinho</h4>
                                    <div class="subtitulo">
                                        <p>Ops, seu carrinho ainda está vazio...</p>
                                    </div>
                                    <button class="button">Escolher produtos</button>
                                </div>
                            </div>

                            <!-- Ícone de Carrinho na Header -->
                            <a href="javascript:void(0)" class="header-btn header-cart">
                                <i id="compr-btn" class="uil uil-shopping-bag" onclick="toggleModal('cartModal')"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
    </header>
    <!-- header ends  -->

    <div id="viewport">
        <div id="js-scroll-content">
            <section class="main-banner" id="home">
                <div class="js-parallax-scene">
                    <div class="banner-shape-1 w-100" data-depth="0.30">
                        <img src="assets/images/berry.png" alt="">
                    </div>
                    <div class="banner-shape-2 w-100" data-depth="0.25">
                        <img src="assets/images/leaf.png" alt="">
                    </div>
                </div>
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner-text">
                                    <h1 class="h1-title">
                                        Bem-Vindo a
                                        <span>Orderup</span>

                                    </h1>
                                    <p>Onde cada pedido é uma experiência! Saboreie salgados, bebidas e pratos deliciosos, tudo com a facilidade de um clique.</p>
                                    <div class="banner-btn mt-4">
                                        <a href="#menu" class="sec-btn">Faça seu pedido</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="banner-img-wp">
                                    <div class="banner-img" style="background-image: url(../img/OrderUpsemnome.png);">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="about-sec section" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <p class="sec-sub-title mb-3">Escolha a cantina desejada</p>
                                <h2 class="h2-title">Em qual cantina <span>Deseja seu pedido?</span></h2>
                                <div class="sec-title-shape mb-4">
                                    <img src="assets/images/title-shape.svg" alt="">
                                </div>
                                <div class="bg-pattern bg-light repeat-img" style="background-image: url(assets/images/blog-pattern-bg.png);">
                                    <section class="blog-sec section" id="blog">
                                        <div class="sec-wp">
                                            <div class="container">

                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="blog-box">
                                                            <div class="blog-img back-img" style="background-image: url(../img/OrderUpsemnome.png);">
                                                            </div>
                                                            <div class="blog-text">
                                                                <a href="#" class="h4-title">Cantina Térreo</a>
                                                                <p></p>
                                                                <a href="cardapioTerreo.php" class="sec-btn">Compre Aqui</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="blog-box">
                                                            <div class="blog-img back-img" style="background-image: url(../img/OrderUpsemnome.png);">
                                                            </div>
                                                            <div class="blog-text">

                                                                <a href="#" class="h4-title">Cantina 5 Andar</a>
                                                                <p></p>
                                                                <a href="cardapioUltimoAndar.php" class="sec-btn">Compre Aqui</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </section>


                                </div>
                            </div>
                        </div>

                    </div>
            </section>

            <section style="background-image: url(assets/images/menu-bg.png);" class="our-menu section bg-light repeat-img" id="menu">

                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <!-- <p class="sec-sub-title mb-3">Book Table</p> -->
                                    <h2 class="h2-title">Confira alguns dos produtos</h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="gallery">
                            <div class="col-lg-10 m-auto">
                                <div class="book-table-img-slider" id="icon">
                                    <div class="swiper-wrapper">
                                        <a href="../imagens/bannercoxinha.jpeg" data-fancybox="table-slider" class="book-table-img back-img swiper-slide" style="background-image: url(../img/bannercoxinha.jpeg)"></a>
                                        <a href="assets/images/bt2.jpg" data-fancybox="table-slider" class="book-table-img back-img swiper-slide" style="background-image: url(../img/banneralmoço.jpeg)"></a>
                                        <a href="assets/images/bt3.jpg" data-fancybox="table-slider" class="book-table-img back-img swiper-slide" style="background-image: url(../img/doce.jpeg)"></a>
                                        <a href="assets/images/bt4.jpg" data-fancybox="table-slider" class="book-table-img back-img swiper-slide" style="background-image: url(../img/banner-bebidas.png)"></a>
                                    </div>

                                    <div class="swiper-button-wp">
                                        <div class="swiper-button-prev swiper-button">
                                            <i class="uil uil-angle-left"></i>
                                        </div>
                                        <div class="swiper-button-next swiper-button">
                                            <i class="uil uil-angle-right"></i>
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </section>

            <div class="bg-pattern bg-light repeat-img" style="background-image: url(assets/images/blog-pattern-bg.png);">

            </div>

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
                                                <img src="../img/OrderUpsemnome.png" alt="">
                                            </a>
                                        </div>
                                        <p>Rua Mons. Andrade 298, São Paulo, SP, 03008-000</p>
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
                                                <li><a href="termos.php">Termos e Condições</a></li>
                                                <li><a href="politica.php">Politica de Privacidade</a></li>
                                                <li><a href="#">Politica de Cookie</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="copyright-text">
                                    <p>Copyright &copy; 2024 <span class="name">Orderup.</span>Todos os direitos
                                        reservados.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button class="scrolltop"><i class="uil uil-angle-up"></i></button>
                    </div>
                </div>
            </footer>



        </div>
    </div>

    <!-- Modal para Carrinho -->
    <!-- <div id="cartModal" class="cart-modal">
            <div class="cart-modal-content">
                <span class="close">&times;</span>
                <h4>Seu Carrinho</h4>
                <div class="subtitulo">
                    <p>ops, seu carrinho ainda está vazio...</p>
                </div> -->

    <!-- Adicione mais conteúdo conforme necessário -->
    <!-- <button class="button">escolher produtos</button>

                <div class="caixa">
                    <div class="escrita">
                        <p>uma sugestão para você</p>
                    </div>
                    <div class="imagem-container">
                        <img src="../img/pngwing.com 1.png" alt="Descrição da Imagem" class="imagem">
                    </div>
                    <span class="texto">Coxinha de Frango</span>
                </div>
                <button class="botao">comprar</button>
            </div>
        </div> -->



    <!-- JavaScript -->
    <!-- <script>
        // Seleciona o modal e o botão do carrinho
        const cartModal = document.getElementById('cartModal');
        const cartButton = document.querySelector('.header-cart');
        const closeButton = document.querySelector('.cart-modal .close');

        // Abre o modal
        cartButton.addEventListener('click', () => {
            cartModal.classList.add('open');
        });

        // Fecha o modal quando o botão de fechar é clicado
        closeButton.addEventListener('click', () => {
            cartModal.classList.remove('open');
        });

        // Fecha o modal quando clicar fora do conteúdo do modal
        window.addEventListener('click', (event) => {
            if (event.target === cartModal) {
                cartModal.classList.remove('open');
            }
        });
    </script> -->


    <!-- jquery  -->
    <script src="../js/jquery-3.5.1.min.js"></script>

    <!-- bootstrap -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>

    <!-- fontawesome  -->
    <script src="../js/font-awesome.min.js"></script>

    <!-- swiper slider  -->
    <script src="../js/swiper-bundle.min.js"></script>

    <!-- mixitup -- filter  -->
    <script src="../js/jquery.mixitup.min.js"></script>

    <!-- fancy box  -->
    <script src="../js/jquery.fancybox.min.js"></script>

    <!-- parallax  -->
    <script src="../js/parallax.min.js"></script>

    <!-- gsap  -->
    <script src="../js/gsap.min.js"></script>

    <!-- scroll trigger  -->
    <script src="../js/ScrollTrigger.min.js"></script>

    <!-- scroll to plugin  -->
    <script src="../js/ScrollToPlugin.min.js"></script>

    <!-- smooth scroll  -->
    <script src="../js/smooth-scroll.js"></script>

    <!-- custom js  -->
    <script src="../js/main.js"></script>

    <script>
 // Função para alternar a exibição do modal de login
 function toggleLoginModal() {
        const modal = document.getElementById('loginModal'); // Seleciona o modal pelo ID
        if (modal.style.display === 'block') {
            modal.style.display = 'none'; // Se estiver visível, oculta
        } else {
            modal.style.display = 'block'; // Se estiver oculto, exibe
        }
    }

    // Função para alternar a exibição de outros modais (como o carrinho)
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId); // Seleciona o modal pelo ID
        if (modal.style.display === 'block') {
            modal.style.display = 'none'; // Se estiver visível, oculta
        } else {
            modal.style.display = 'block'; // Se estiver oculto, exibe
        }
    }

    // Função para fechar o modal
    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.style.display = 'none'; // Fecha o modal
    }
    </script>
</body>

</html>