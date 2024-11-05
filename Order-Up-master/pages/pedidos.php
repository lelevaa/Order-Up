<?php
include '../php/conexao.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>

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
<body>
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
                            <div class="header-btn header-dropdown">
                                <i class="uil uil-user-md"></i>
                                <div class="dropdown-menu">
                                    <div class="dropdown-header">
                                        <a href="" class="dropdown-link">entrar</a>
                                        <span>|</span>
                                        <a href="" class="dropdown-link">cadastrar</a>
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
</body>
</html>