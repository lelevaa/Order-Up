<?php
include '../php/conexao.php';

// Inicializa as variáveis
$produtos = [];
$produtosFiltrados = [];
$descricaoProduto = '';
$dataLancamento = '';

// Capture a data de lançamento
$dataLancamento = isset($_POST['lancamento']) ? date('Y-m-d', strtotime($_POST['lancamento'])) : '';


// Consulta para obter todos os produtos
$sql = "SELECT * FROM produtosgeral";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $produtos[] = $row;
}
// Aplicar filtro se houver
$categoriaFiltro = isset($_POST['categoriaFiltro']) ? $_POST['categoriaFiltro'] : '';
$nomeFiltro = isset($_POST['nomeFiltro']) ? $_POST['nomeFiltro'] : '';

$produtosFiltrados = array_filter($produtos, function ($produto) use ($categoriaFiltro, $nomeFiltro, $dataLancamento) {
    $correspondeCategoria = $categoriaFiltro === '' || $produto['categoria'] === $categoriaFiltro;
    $correspondeNome = $nomeFiltro === '' || $produto['nome'] === $nomeFiltro;
    $correspondeLancamento = empty($dataLancamento) || date('Y-m-d', strtotime($produto['lancamento'])) === $dataLancamento;

    return $correspondeCategoria && $correspondeNome && $correspondeLancamento;
});

// Definir a descrição do produto selecionado
if ($nomeFiltro) {
    foreach ($produtosFiltrados as $produto) {
        if ($produto['nome'] === $nomeFiltro) {
            $descricaoProduto = $produto['descricao'];
            break;
        }
    }
} else {
    $produtosFiltrados = $produtos;
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/administrador.adicionar.css">
    <title>Inserir e Visualizar Produtos</title>

</head>

<body>
    <header>
        <nav class="navbar">
            <ul>
                <img class="logo" src="../img/logoOrderup.png" alt="Logo" />
                <li class="nav_g">
                    <a href="adicionar_produtos_geral.php">Inserção de produtos</a>
                </li>
                <li class="nav_g">
                    <a href="produtosDiario.php">Inserção de produtos diario</a>
                </li>
                <li class="nav_g"><a href="#"></a></li>
                <li class="nav_g"><a href="#"></a></li>
            </ul>
        </nav>
    </header>


    <!-- Modal cantina-->
    <div id="modalCantina" class="modalCantina">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Escolha uma Cantina</h2>
            <div id="cantinaButtons">
                <a href="produtosDiario.php" class="cantinaBtn" data-value="cantina1">Cantina 1</a>
                <a href="produtosDiario2.php" class="cantinaBtn" data-value="cantina2">Cantina 2</a>

            </div>
            <button id="confirmBtn">Confirmar</button>
        </div>
    </div>
    <div class="Botões-cantinas">
        <a href="produtosDiario.php" class="cantinaBtn" data-value="cantina1">Cantina 1</a>
        <a href="produtosDiario2.php" class="cantinaBtn" data-value="cantina2">Cantina 2</a>
    </div>

    <!-- Formulário de filtro -->
    <div class="filtroCategoria">
        <div class="ajuste_add">
            <div class="linha_add">
                <div class="form-container">
                    <!--div que temos que mexer-->
                    <h1>Filtrar Produtos - Cantina 2</h1>
                    <form id="filtroForm" method="POST" action="">
                        <div class="form-container">
                            <div class="form-group">
                                <label for="categoriaFiltro">Categoria:</label>
                                <select id="categoriaFiltro" name="categoriaFiltro" onchange="atualizarNomes()">
                                    <option value="">Mostrar Todos</option>
                                    <option value="salgados" <?php echo isset($categoriaFiltro) && $categoriaFiltro === 'salgados' ? 'selected' : ''; ?>>Salgados</option>
                                    <option value="bebidas" <?php echo isset($categoriaFiltro) && $categoriaFiltro === 'bebidas' ? 'selected' : ''; ?>>Bebidas</option>
                                    <option value="almoço" <?php echo isset($categoriaFiltro) && $categoriaFiltro === 'almoço' ? 'selected' : ''; ?>>Almoço</option>
                                    <option value="combo" <?php echo isset($categoriaFiltro) && $categoriaFiltro === 'combo' ? 'selected' : ''; ?>>Combo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nomeFiltro">Nome:</label>
                                <select id="nomeFiltro" name="nomeFiltro" onchange="atualizarDescricaoPreco()">
                                    <option value="">Mostrar Todos</option>
                                    <?php
                                    $nomesFiltrados = array_unique(array_map(function ($produto) {
                                        return $produto['nome'];
                                    }, array_filter($produtos, function ($produto) use ($categoriaFiltro) {
                                        return $categoriaFiltro === '' || $produto['categoria'] === $categoriaFiltro;
                                    })));
                                    foreach ($nomesFiltrados as $nome) {
                                        echo '<option value="' . htmlspecialchars($nome) . '" ' . (isset($nomeFiltro) && $nomeFiltro === $nome ? 'selected' : '') . '>' . htmlspecialchars($nome) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-container">
                            <div class="form-group">
                                <label for="descricao">Descrição:</label>
                                <input id="descricao" name="descricao"
                                    readonly><?php echo htmlspecialchars($descricaoProduto); ?></input><br><br>
                            </div>



                            <div class="form-group">
                                <label for="preco">Preço:</label>
                                <input id="preco" name="preco" readonly value="<?php echo isset($precoProduto) ? htmlspecialchars($precoProduto) : ''; ?>"><br><br>
                            </div>


                            <!-- Certifique-se de que o campo 'preco' está correto -->
                            <div class="form-group">
                                <label for="quantidade">Quantidade:</label>
                                <input type="number" id="quantidade" name="quantidade"><br><br>
                            </div>

                            <div class="form-group">
                                <label for="lancamento">Lancamento:</label>
                                <input type="date" id="lancamento" name="lancamento"><br><br>
                            </div>

                            <div class="form-group">
                                <label for="vencimento">Vencimento:</label>
                                <input type="date" id="vencimento" name="vencimento"><br><br>
                            </div>
                        </div>

                        <button class="btn_add" type="submit" onclick="adicionarAoCardapio()">Adicionar ao
                            Cardápio</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Lista de produtos filtrados -->
    <div class="produtosEncontrados">
        <h2>Produtos Encontrados</h2>
        <ul id="produtosLista">
            <?php if (!empty($produtosFiltrados)): ?>
                <?php foreach ($produtosFiltrados as $produto): ?>
                    <li class="produto-option" data-produto='<?php echo json_encode($produto); ?>'>
                        <?php echo htmlspecialchars($produto['nome']); ?> -
                        <?php echo htmlspecialchars($produto['descricao']); ?> -
                        <?php echo htmlspecialchars($produto['preco']); ?> -
                        <?php echo htmlspecialchars($produto['categoria']); ?>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>Nenhum produto encontrado.</li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Tabela de produtos -->
    <h2>Produtos no Cardápio</h2>
    <div class="posicaoTable">
        <table class="produto-table" id="produtosTabela">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th>
                        <select id="filtro0" onchange="filtrarTabelaPorLancamento()">
                            <option value="">Lançamento</option>
                            <?php
                            include '../php/conexao.php';
                            $sql = "SELECT DISTINCT lancamento FROM tb_produtos2";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["lancamento"] . '">' . $row["lancamento"] . '</option>';
                            }
                            ?>
                        </select>
                    </th>
                    <th>Vencimento</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../php/conexao.php';

                // Consulta SQL para buscar os produtos
                $sql = "SELECT nome, descricao, preco, quantidade, categoria, lancamento, vencimento, imagem FROM tb_produtos2";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Exibe os dados de cada linha
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><img src='../pages/uploads/" . $row["imagem"] . "' alt='Imagem do produto' width='50' height='50'></td>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>" . $row["descricao"] . "</td>";
                        echo "<td>" . $row["preco"] . "</td>";
                        echo "<td>" . $row["quantidade"] . "</td>";
                        echo "<td>" . $row["categoria"] . "</td>";
                        echo "<td>" . $row["lancamento"] . "</td>";
                        echo "<td>" . $row["vencimento"] . "</td>";
                        echo "<td>";
                        echo '<a href="editDiario.php?nome=' . urlencode($row['nome']) . '">Editar</a>';
                        echo ' | ';
                        echo '<a href="../php/deleteDiario.php?nome=' . urlencode($row['nome']) . '" style="color: red;">Remover</a>';
                        echo '</td>';
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhum produto encontrado</td></tr>";
                }
                ?>


            </tbody>
        </table>

    </div>

    <script>
    // Função para remover produto da tabela
    function removerProdutoTabela(button) {
        const row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    // Atualiza a lista de nomes de produtos
    function atualizarNomes() {
        const categoriaFiltro = document.getElementById('categoriaFiltro').value;
        const nomeFiltro = document.getElementById('nomeFiltro');

        const produtos = <?php echo json_encode($produtos); ?>;
        const nomesFiltrados = produtos
            .filter(produto => categoriaFiltro === '' || produto.categoria === categoriaFiltro)
            .map(produto => produto.nome);

        nomeFiltro.innerHTML = '<option value="">Mostrar Todos</option>';
        nomesFiltrados.forEach(nome => {
            const option = document.createElement('option');
            option.value = nome;
            option.textContent = nome;
            nomeFiltro.appendChild(option);
        });

        atualizarDescricaoPreco(); // Atualiza descrição e preço ao alterar a categoria
    }

    // Atualiza a descrição, preço e vencimento do produto selecionado
    function atualizarDescricaoPreco() {
        const nomeFiltro = document.getElementById('nomeFiltro').value;
        const produtos = <?php echo json_encode($produtos); ?>;
        const produtoSelecionado = produtos.find(produto => produto.nome === nomeFiltro);

        if (produtoSelecionado) {
            document.getElementById('descricao').value = produtoSelecionado.descricao;
            document.getElementById('preco').value = produtoSelecionado.preco;
            document.getElementById('quantidade').value = produtoSelecionado.quantidade;
            document.getElementById('lancamento').value = produtoSelecionado.lancamento;
            document.getElementById('vencimento').value = produtoSelecionado.vencimento;
        } else {
            document.getElementById('descricao').value = '';
            document.getElementById('preco').value = '';
            document.getElementById('quantidade').value = '';
            document.getElementById('lancamento').value = '';
            document.getElementById('vencimento').value = '';
        }
    }

    // Filtra e mostra produtos
    function atualizarProdutosLista(produtos) {
        const lista = document.getElementById('produtosLista');
        lista.innerHTML = '';
        produtos.forEach(produto => {
            const item = document.createElement('li');
            item.className = 'produto-option';
            item.dataset.produto = JSON.stringify(produto);
            item.innerHTML = `${produto.nome} - ${produto.descricao} - ${produto.preco} - ${produto.categoria}`;
            item.onclick = function() {
                adicionarProdutoTabela(produto);
            };
            lista.appendChild(item);
        });
    }

    // Adiciona o produto à tabela
    function adicionarProdutoTabela(produto) {
        const tabela = document.getElementById('produtosTabela').getElementsByTagName('tbody')[0];
        const novaLinha = tabela.insertRow();

        novaLinha.insertCell(0).innerText = produto.nome;
        novaLinha.insertCell(1).innerText = produto.descricao;
        novaLinha.insertCell(2).innerText = produto.preco;
        novaLinha.insertCell(3).innerText = produto.quantidade;
        novaLinha.insertCell(4).innerText = produto.categoria;
        novaLinha.insertCell(5).innerText = produto.lancamento;
        novaLinha.insertCell(6).innerText = produto.vencimento;
        novaLinha.insertCell(7).innerHTML = '<button onclick="removerProdutoTabela(this)">Remover</button>';
    }

    // Função chamada ao clicar no botão "Adicionar ao Cardápio"
    function adicionarAoCardapio() {
        const categoriaFiltro = document.getElementById('categoriaFiltro').value;
        const nomeFiltro = document.getElementById('nomeFiltro').value;

        const produtos = <?php echo json_encode($produtos); ?>;
        const produtoSelecionado = produtos.find(produto => produto.nome === nomeFiltro);

        if (produtoSelecionado) {
            adicionarProdutoTabela(produtoSelecionado);
        }

        const produtosFiltrados = produtos.filter(produto => {
            const correspondeCategoria = categoriaFiltro === '' || produto.categoria === categoriaFiltro;
            const correspondeNome = nomeFiltro === '' || produto.nome === nomeFiltro;
            return correspondeCategoria && correspondeNome;
        });

        atualizarProdutosLista(produtosFiltrados);
    }

    // Filtrar tabela por data de lançamento
    function filtrarTabelaPorLancamento() {
        const filtroLancamento = document.getElementById('lancamento').value;
        const tabela = document.getElementById('produtosTabela');
        const linhas = tabela.getElementsByTagName('tr');

        for (let i = 1; i < linhas.length; i++) {
            const colunaLancamento = linhas[i].getElementsByTagName('td')[5];
            if (colunaLancamento) {
                const dataLancamento = colunaLancamento.textContent || colunaLancamento.innerText;
                linhas[i].style.display = (dataLancamento === filtroLancamento || filtroLancamento === '') ? '' : 'none';
            }
        }
    }

    // Adiciona evento para filtrar a tabela quando a data for alterada
    document.getElementById('lancamento').addEventListener('change', filtrarTabelaPorLancamento);

    // Inicializar a lista com todos os produtos e atualizar a lista de nomes
    atualizarProdutosLista(<?php echo json_encode($produtos); ?>);
    atualizarNomes();

    // Função para verificar se o modal já foi exibido
    function mostrarModalCantina() {
        const modalExibido = localStorage.getItem('modalCantinaExibido');

        if (!modalExibido) {
            document.getElementById('modalCantina').style.display = 'block';
            localStorage.setItem('modalCantinaExibido', 'true');
        }
    }

    // Exibir o modal ao carregar a página (se ainda não foi exibido)
    window.onload = mostrarModalCantina;

    // Fechar o modal ao clicar no "x"
    document.getElementById('closeModal').onclick = function() {
        document.getElementById('modalCantina').style.display = 'none';
    };

    // Fechar o modal ao clicar fora do conteúdo
    window.onclick = function(event) {
        const modal = document.getElementById('modalCantina');
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    };

    // Confirmar a escolha da cantina
    document.getElementById('confirmBtn').onclick = function() {
        const selectedCantina = document.getElementById('cantinaSelectInput').value;
        alert('Você escolheu: ' + selectedCantina);
        document.getElementById('modalCantina').style.display = 'none';
    };
</script>



</body>

</html>

<?php
include '../php/conexao.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém e sanitiza os dados do formulário
    $nome = isset($_POST['nomeFiltro']) ? $conn->real_escape_string(trim($_POST['nomeFiltro'])) : '';
    $descricao = isset($_POST['descricao']) ? $conn->real_escape_string(trim($_POST['descricao'])) : '';
    $preco = isset($_POST['preco']) ? floatval(str_replace(',', '.', $_POST['preco'])) : 0.0;
    $quantidade = isset($_POST['quantidade']) ? intval($_POST['quantidade']) : 0;
    $categoria = isset($_POST['categoriaFiltro']) ? $conn->real_escape_string(trim($_POST['categoriaFiltro'])) : '';
    $lancamento = isset($_POST['lancamento']) ? $conn->real_escape_string(trim($_POST['lancamento'])) : '';
    $vencimento = isset($_POST['vencimento']) ? $conn->real_escape_string(trim($_POST['vencimento'])) : '';


    // Converte a data do formato dd-mm-yyyy para yyyy-mm-dd
    $date = DateTime::createFromFormat('Y-m-d', $vencimento);
    if ($date) {
        $vencimento = $date->format('Y-m-d');
    } else {
        echo "<div class='produtosEncontrados'>Data inválida. O formato esperado é yyyy-mm-dd.</div>";
        exit;
    }

    // Prepara e executa a consulta SQL para inserir os dados
    $sql = "INSERT INTO tb_produtos2 (nome, descricao, preco,quantidade, categoria,lancamento, vencimento) VALUES (?, ?,?,?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssdisss", $nome, $descricao, $preco, $quantidade, $categoria, $lancamento, $vencimento);

        if ($stmt->execute()) {
            echo "<script> window.location.href='produtosDiario.php'</script>";
        } else {
            echo "Erro ao inserir produto: " . $stmt->error;
        }

        // Fecha o statement
        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta: " . $conn->error;
    }
}

$conn->close();
?>