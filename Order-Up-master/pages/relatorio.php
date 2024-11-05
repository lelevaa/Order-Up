<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Relatório</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- for icons  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- bootstrap  -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="./css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="cardapio/css/cardapio.css" />

    <!-- fancy box  -->
    <link rel="stylesheet" href="./css/jquery.fancybox.min.css" />
    <!-- custom css  -->
    <link rel="stylesheet" href="./css/home_style.css" />
    <link rel="stylesheet" href="./css/cardapio.css" />
    <link rel="stylesheet" href="login.html" />


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;

        }

        .hidden {
            display: none;
        }

        .produto-option {
            cursor: pointer;
        }

        .produto-table {
            width: 80%;
            /* Set the desired width */
            max-width: 1000px;
            /* Optional: maximum width for larger screens */
            margin: 57px auto;
            /* Center the table horizontally and add some vertical space */
            border-collapse: collapse;
            /* Maintain border style */
        }


        .produto-table th,
        .produto-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        .produto-table th {
            text-align: center;
            background-color: #dda52f;
            font-weight: bold;
            color: #ffff;
        }

        .produto-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .produto-table tr:hover {
            background-color: #e2e6ea;
        }

        .btn-primary {
            padding: 3px 35px;
            background-color: #dda52f;
            color: white;
            border: none;
            border-radius: 29px;
        }

        .btn-secundary {
            margin-top: 92px;
            padding: 3px 47px;
            background-color: #dda52f;
            color: white;
            border: none;
            border-radius: 43px;
        }

        .btn-primary:hover {
            color: #000;
            background-color: #f5ebd9;
        }

        .btn-secundary:hover {
            color: #000;
            background-color: #f5ebd9;
        }

        .btn-pdf:hover {
            color: #000;
            background-color: #f5ebd9;
        }

        .btn-pdf {
            margin-top: -31px;
            margin-right: 126px;
            padding: 3px 10px;
            background-color: #dda52f;
            color: white;
            border: none;
            border-radius: 29px;
        }

        .text-center {
            margin-top: 17px;
        }

        #filtro0 {
            background-color: #dda52f;
            font-weight: 700;
            border: none;
            color: #ffff;
        }

        .site-nav-header {
            /*background-color: #F5EBD9;*/
            padding: 10px 0;
            display: flex;
            align-items: center;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 99;
            transition: 0.5s;
            border-bottom: 1px solid transparent;
        }
        .site-nav-header {
        display: flex;}
        .site-nav-header {
            display: flex;
            width: 100%;
            /* Ocupa 100% da largura */
        }
        .imagem-container {
    width: 70px;
    height: 70px;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 8px;
    overflow: hidden;
        }
        .imagem {
    max-width: 100%;
    max-height: 100%;
        }
    </style>
</head>

<header class="site-nav-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header-logo">
                    <a href="index.html">
                        <img src="./img/logoOrderup.png" alt="Logo" />
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
                            <li><a href="index.html">Adicionar produtos geral</a></li>
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
                        <div class="header-btn header-dropdown">
                            <button class="loginbotao" type="submit">
                                <i class="uil uil-user-md"></i>
                            </button>


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
        <p class="n" onclick="scrollToSection('doces')">Doces</p>
        <p class="n" onclick="scrollToSection('almoco')">Almoço</p>
    </nav>
</div>
</div>

<body>
    <h2 class="text-center flex-grow-1">Produtos no Cardápio</h2>
    <table class="produto-table" id="produtosTabela">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>
                    <select id="filtro0" onchange="filtrarTabelaPorLancamento()">
                        <option value="">Lançamento</option>
                        <option value="01">janeiro</option>
                        <option value="02">fevereiro</option>
                        <option value="03">março</option>
                        <option value="04">abril</option>
                        <option value="05">maio</option>
                        <option value="06">junho</option>
                        <option value="07">julho</option>
                        <option value="08">agosto</option>
                        <option value="09">setembro</option>
                        <option value="10">outubro</option>
                        <option value="11">novembro</option>
                        <option value="12">dezembro</option>
                    </select>
                </th>
                <th>Vencimento</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../php/conexao.php';
            $sql = "SELECT * FROM tb_produtos";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["descricao"] . "</td>";
                    echo "<td>" . $row["preco"] . "</td>";
                    echo "<td>" . $row["quantidade"] . "</td>";
                    echo "<td>" . $row["categoria"] . "</td>";
                    echo "<td>" . $row["lancamento"] . "</td>";
                    echo "<td>" . $row["vencimento"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Nenhum produto encontrado</td></tr>";
            }

            $sql = "SELECT lancamento, categoria, SUM(quantidade) AS total_quantidade 
                FROM tb_produtos 
                GROUP BY lancamento, categoria";
            $result = $conn->query($sql);
            $datas = [];
            $quantidades = [
                'salgados' => [],
                'combos' => [],
                'bebidas' => [],
                'almoco' => []
            ];
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data = $row["lancamento"];
                    $categoria = $row["categoria"];
                    $quantidade = (int) $row["total_quantidade"];

                    if (!in_array($data, $datas)) {
                        $datas[] = $data;
                    }

                    if (!isset($quantidades[$categoria])) {
                        continue;
                    }

                    $index = array_search($data, $datas);
                    if ($index !== false) {
                        $quantidades[$categoria][$index] = isset($quantidades[$categoria][$index]) ? $quantidades[$categoria][$index] + $quantidade : $quantidade;
                    }
                }
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-end my-3">
        <button id="gerarPDFtabela" class="btn-pdf" onclick="gerarPDF()">Gerar PDF</button>
    </div>

    <div class="text-center my-3">
        <button class="btn-primary" onclick="filterData('week')">Semana</button>
        <button class="btn-secundary" onclick="filterData('month')">Mês</button>
    </div>

    <div class="bg-white ">
        <div class="col-8 offset-2 my-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center flex-grow-1">Relatório de estoque</h5>
                    <hr>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4"></script>

    <script>
        let originalLabels = <?php echo json_encode($datas); ?>;
        let originalQuantidades = {
            'salgados': <?php echo json_encode($quantidades['salgados']); ?>,
            'combos': <?php echo json_encode($quantidades['combos']); ?>,
            'bebidas': <?php echo json_encode($quantidades['bebidas']); ?>,
            'almoco': <?php echo json_encode($quantidades['almoco']); ?>
        };

        const ctx = document.getElementById('myChart');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: originalLabels,
                datasets: [{
                        label: 'Salgados',
                        data: originalQuantidades['salgados'],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Combos',
                        data: originalQuantidades['combos'],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Bebidas',
                        data: originalQuantidades['bebidas'],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Almoço',
                        data: originalQuantidades['almoco'],
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        function filterData(period) {
            let filteredLabels = [];
            let filteredQuantidades = {
                'salgados': [],
                'combos': [],
                'bebidas': [],
                'almoco': []
            };

            originalLabels.forEach((label, index) => {
                const date = new Date(label);
                let addToFiltered = false;

                switch (period) {
                    case 'week':
                        const weekNumber = getWeekNumber(date);
                        const weekLabel = `Semana ${weekNumber}`;
                        if (!filteredLabels.includes(weekLabel)) {
                            filteredLabels.push(weekLabel);
                        }
                        filteredQuantidades['salgados'][filteredLabels.indexOf(weekLabel)] = (filteredQuantidades['salgados'][filteredLabels.indexOf(weekLabel)] || 0) + originalQuantidades['salgados'][index];
                        filteredQuantidades['combos'][filteredLabels.indexOf(weekLabel)] = (filteredQuantidades['combos'][filteredLabels.indexOf(weekLabel)] || 0) + originalQuantidades['combos'][index];
                        filteredQuantidades['bebidas'][filteredLabels.indexOf(weekLabel)] = (filteredQuantidades['bebidas'][filteredLabels.indexOf(weekLabel)] || 0) + originalQuantidades['bebidas'][index];
                        filteredQuantidades['almoco'][filteredLabels.indexOf(weekLabel)] = (filteredQuantidades['almoco'][filteredLabels.indexOf(weekLabel)] || 0) + originalQuantidades['almoco'][index];
                        break;

                    case 'month':
                        const monthLabel = date.toLocaleString('default', {
                            month: 'long'
                        });
                        if (!filteredLabels.includes(monthLabel)) {
                            filteredLabels.push(monthLabel);
                        }
                        filteredQuantidades['salgados'][filteredLabels.indexOf(monthLabel)] = (filteredQuantidades['salgados'][filteredLabels.indexOf(monthLabel)] || 0) + originalQuantidades['salgados'][index];
                        filteredQuantidades['combos'][filteredLabels.indexOf(monthLabel)] = (filteredQuantidades['combos'][filteredLabels.indexOf(monthLabel)] || 0) + originalQuantidades['combos'][index];
                        filteredQuantidades['bebidas'][filteredLabels.indexOf(monthLabel)] = (filteredQuantidades['bebidas'][filteredLabels.indexOf(monthLabel)] || 0) + originalQuantidades['bebidas'][index];
                        filteredQuantidades['almoco'][filteredLabels.indexOf(monthLabel)] = (filteredQuantidades['almoco'][filteredLabels.indexOf(monthLabel)] || 0) + originalQuantidades['almoco'][index];
                        break;
                }
            });

            updateChart(filteredLabels, filteredQuantidades);
        }

        function getWeekNumber(date) {
            const startDate = new Date(date.getFullYear(), 0, 1);
            const days = Math.floor((date - startDate) / (24 * 60 * 60 * 1000));
            return Math.ceil((days + startDate.getDay() + 1) / 7);
        }

        function updateChart(labels, quantidades) {
            chart.data.labels = labels;
            chart.data.datasets[0].data = quantidades['salgados'];
            chart.data.datasets[1].data = quantidades['combos'];
            chart.data.datasets[2].data = quantidades['bebidas'];
            chart.data.datasets[3].data = quantidades['almoco'];
            chart.update();
        }

        function filtrarTabelaPorLancamento() {
            const filtroLancamento = document.getElementById('filtro0').value;
            const tabela = document.getElementById('produtosTabela');
            const linhas = tabela.getElementsByTagName('tr');

            for (let i = 1; i < linhas.length; i++) {
                const colunaLancamento = linhas[i].getElementsByTagName('td')[5];
                if (colunaLancamento) {
                    const dataLancamento = colunaLancamento.textContent || colunaLancamento.innerText;

                    // Aqui estamos assumindo que a data está no formato YYYY-MM-DD.
                    const mesLancamento = dataLancamento.split('-')[1]; // Mude para '-' para corresponder ao formato

                    if (mesLancamento === filtroLancamento || filtroLancamento === '') {
                        linhas[i].style.display = '';
                    } else {
                        linhas[i].style.display = 'none';
                    }
                }
            }
        }

        function gerarPDF() {
            const filtroLancamento = document.getElementById('filtro0').value;
            window.location.href = `../php/gerar_pdf.php?filtroLancamento=${filtroLancamento}`;
        }
    </script>

</body>

</html>