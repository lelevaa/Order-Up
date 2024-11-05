<?php
// arquivo.php
include 'conexao.php'; // Inclui o arquivo de conexão

$total = $data['total'];
$codigo = $data['codigo'];

// SQL para inserir o pedido
$sql = "INSERT INTO tb_pedidos (codigo, total) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

// Verifica se a preparação do statement foi bem-sucedida
if ($stmt === false) {
    echo json_encode(['success' => false, 'message' => 'Erro ao preparar o statement: ' . $conn->error]);
    exit;
}

// 'sd' significa: string (s) e double (d)
$stmt->bind_param('sd', $codigo, $total); 

// Executa a inserção e verifica o resultado
if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao inserir no banco: ' . $stmt->error]);
}

// Fecha o statement e a conexão
$stmt->close();
$conn->close();
?>
