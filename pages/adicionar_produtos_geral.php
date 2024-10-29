<?php
session_start();
include '../php/conexao.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = floatval($_POST['preco']);
    $categoria = $_POST['categoria'];

    // Lidar com o upload da imagem
    if (isset($_FILES['imagem'])) {
        $imagem = $_FILES['imagem'];
        $imagem_nome = $imagem['name'];
        $imagem_tmp = $imagem['tmp_name'];
        $imagem_size = $imagem['size'];
        $imagem_error = $imagem['error'];

        // Validar a imagem
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'jfif'];
        $ext = strtolower(pathinfo($imagem_nome, PATHINFO_EXTENSION));

        if ($imagem_error === 0 && in_array($ext, $allowed_extensions) && $imagem_size < 2000000) {
            // Definir um nome único para a imagem
            $imagem_novo_nome = uniqid('', true) . '.' . $ext;
            $imagem_destino = 'uploads/' . $imagem_novo_nome;

            // Verificar se a pasta uploads existe
            if (!is_dir('uploads')) {
                mkdir('uploads', 0755, true);
            }

            // Mover o arquivo de upload para o diretório desejado
            if (move_uploaded_file($imagem_tmp, $imagem_destino)) {
                // Preparar a instrução SQL para a tabela produtosgeral
                $stmt = $conn->prepare("INSERT INTO produtosgeral (nome, descricao, preco, categoria, imagem) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("ssdss", $nome, $descricao, $preco, $categoria, $imagem_novo_nome);

                if ($stmt->execute()) {
                    // Inserir os mesmos dados na tabela tb_produtos
                    $stmt2 = $conn->prepare("INSERT INTO tb_produtos (nome, descricao, preco, categoria, imagem) VALUES (?, ?, ?, ?, ?)");
                    $stmt2->bind_param("ssdss", $nome, $descricao, $preco, $categoria, $imagem_novo_nome);

                    if ($stmt2->execute()) {
                        echo "<script>alert('Produto inserido com sucesso nas duas tabelas!');</script>";
                    } else {
                        // Exibe o erro específico ao tentar inserir em tb_produtos
                        echo "Erro ao copiar para tb_produtos: " . $stmt2->error;
                    }

                    $stmt2->close();
                } else {
                    echo "Erro ao inserir em produtosgeral: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Erro ao mover o arquivo da imagem.";
            }
        } else {
            echo "Erro ao fazer upload da imagem. Verifique o tipo ou tamanho do arquivo.";
        }
    } else {
        echo "Imagem não foi enviada.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/administrador.adicionar.css">
    <title>Administrador</title>
    <script>
        function filtrarTabela() {
            var table, tr, td, i, j, txtValue, select, filter;
            table = document.getElementById("produtosTabela");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "";
                for (j = 0; j < tr[i].getElementsByTagName("td").length; j++) {
                    td = tr[i].getElementsByTagName("td")[j];
                    select = document.getElementById("filtro" + j);
                    filter = select.value.toUpperCase();
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (filter === "" || txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                            break;
                        }
                    }
                }
            }
        }
    </script>
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

    <h2 class="titulo_add">Inserção de produtos</h2>
    <div class="ajuste_add">
        <div class="linha_add">
            <form action="adicionar_produtos_geral.php" method="POST" enctype="multipart/form-data">
                <div class="form-container">
                    <div class="form-group">
                        <label for="categoria">Categoria:</label>
                        <select name="categoria" id="categoria">
                            <option value="">Selecione uma categoria</option>
                            <option value="salgados">Salgados</option>
                            <option value="almoco">Almoço</option>
                            <option value="combo">Combo</option>
                            <option value="bebidas">Bebidas</option>
                            <?php
                            // Aqui, você pode manter a consulta para pegar categorias do banco de dados
                            include '../php/conexao.php';
                            $sql = "SELECT DISTINCT categoria FROM tb_produtos";
                            $result = $conn->query($sql);
                            if (!$result) {
                                die("Erro na consulta: " . $conn->error);
                            }
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["categoria"] . '">' . $row["categoria"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" class="input_configuracao" required />
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" name="descricao" class="input_configuracao" required />
                    </div>
                </div>

                <div class="form-container">
                    <div class="form-group">
                        <label for="preco">Preço:</label>
                        <input type="text" name="preco" class="input_configuracao" required />
                    </div>
                    <div class="form-group">
                        <label for="imagem">Imagem:</label>
                        <input type="file" name="imagem" class="input_configuracao" accept="image/*" required />
                    </div>
                </div>
                <div class="ajuste_btn_add">
                    <button class="btn_add" type="submit">Enviar</button>
                </div>
            </form>
        </div>
        <div class="container">
            <section class="cardapio">
                <div class="table-container" id="produtosTabela">
                    <table>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Categoria</th>
                                <th>Imagem</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Consulta SQL para buscar os produtos
                            $sql = "SELECT nome, descricao, preco, categoria, imagem FROM produtosgeral";
                            $result = $conn->query($sql);

                            // Verifica se a consulta foi bem-sucedida
                            if (!$result) {
                                die("Erro na consulta: " . $conn->error);
                            }

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["nome"] . "</td>";
                                    echo "<td>" . $row["descricao"] . "</td>";
                                    echo "<td>" . $row["preco"] . "</td>";
                                    echo "<td>" . $row["categoria"] . "</td>";
                                    echo "<td><img src='../pages/uploads/" . $row["imagem"] . "' alt='Imagem do produto' width='50' height='50'></td>";
                                    echo '<td>';
                                    echo '<a href="edit.php?nome=' . urlencode($row['nome']) . '">Editar</a>';
                                    echo ' | ';
                                    echo '<a href="delete.php?nome=' . urlencode($row['nome']) . '" style="color: red;">Remover</a>';
                                    echo '</td>';
                                }
                            } else {
                                echo "<tr><td colspan='6'>Nenhum produto encontrado</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</body>

</html>