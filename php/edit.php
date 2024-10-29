<?php
include 'conexao.php';

// Variáveis para armazenar dados
$nome = $descricao = $preco = $categoria = '';

// Verifica se o parâmetro 'nome' foi fornecido
if (isset($_GET['nome'])) {
    $nome = $_GET['nome'];

    // Recupera os dados do registro selecionado
    $sql = "SELECT * FROM produtosgeral WHERE nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['nome'];
        $descricao = $row['descricao'];
        $preco = $row['preco'];
        $categoria = $row['categoria'];
    } else {
        echo "Registro não encontrado. <a href='adicionar_produtos_geral.php'>Voltar</a>";
        exit();
    }
    $stmt->close();
} else {
    echo "Nome do registro não fornecido. <a href='adicionar_produtos_geral.php'>Voltar</a>";
    exit();
}

// Processamento do formulário de edição
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar'])) {
    $novoNome = htmlspecialchars($_POST['nome']);
    $novaDescricao = htmlspecialchars($_POST['descricao']);
    $novopreco = floatval(str_replace(',', '.', $_POST['preco']));
    $novocategoria = htmlspecialchars($_POST['categoria']);

    if (empty($novoNome) || empty($novaDescricao) || empty($novopreco) || empty($novocategoria)) {
        echo "Todos os campos devem ser preenchidos.";
        exit();
    }

    // Atualiza o produto
    $sql = "UPDATE produtosgeral SET nome = ?, descricao = ?, preco = ?, categoria = ? WHERE nome = ?";
    $stmt = $conn->prepare($sql);

    // Use a string de tipos correta para bind_param
    $stmt->bind_param("ssdss", $novoNome, $novaDescricao, $novopreco, $novocategoria, $nome);

    if ($stmt->execute()) {
        header("Location: adicionar_produtos_geral.php");
        exit();
    } else {
        echo "Erro ao atualizar dados: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dados</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post" class="formulario">
        <label for="nome" class="rotulo">Nome:</label>
        <input type="text" id="nome" name="nome" class="campo" value="<?php echo htmlspecialchars($nome); ?>" required><br>

        <label for="descricao" class="rotulo">Descrição:</label>
        <input type="text" id="descricao" name="descricao" class="campo" value="<?php echo htmlspecialchars($descricao); ?>" required><br>

        <label for="preco" class="rotulo">Preço:</label>
        <input type="text" id="preco" name="preco" class="campo" value="<?php echo htmlspecialchars(number_format($preco, 2, ',', '.')); ?>" required><br>

        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria" required>
            <option value="salgados" <?php echo $categoria == 'salgados' ? 'selected' : ''; ?>>Salgados</option>
            <option value="bebidas" <?php echo $categoria == 'bebidas' ? 'selected' : ''; ?>>Bebidas</option>
            <option value="almoço" <?php echo $categoria == 'almoço' ? 'selected' : ''; ?>>Almoço</option>
            <option value="combo" <?php echo $categoria == 'combo' ? 'selected' : ''; ?>>Combo</option>
        </select><br><br>

        <button type="submit" name="editar" class="botao">Salvar Edição</button>
        <a href="adicionar_produtos_geral.php" class="botao">Cancelar</a>
    </form>
</body>
</html>
