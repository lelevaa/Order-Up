<?php
require_once('../tcpdf/tcpdf.php');
include_once('conexao.php');

// Captura o filtro de lançamento da URL
$filtroLancamento = isset($_GET['filtroLancamento']) ? $_GET['filtroLancamento'] : '';

// Adapta a consulta para incluir o filtro
$query = "SELECT * FROM tb_produtos";
if ($filtroLancamento !== '') {
    // Supondo que lancamento está em formato YYYY-MM-DD, extraímos o mês
    $query .= " WHERE MONTH(lancamento) = '$filtroLancamento'";
}
$result = $conn->query($query);

// Cria o PDF com orientação em paisagem ('L' para landscape)
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('OrderUP');
$pdf->SetTitle('Relatório de Produtos');
$pdf->SetSubject('Relatório de Produtos');
$pdf->SetKeywords('Produtos, OrderUP, PDF');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

// Cabeçalho
$image_file = "./src/img/logoPDF.jpeg";
$pdf->Image($image_file, 10, 10, 48, 10, 'JPEG', '', '', true, 300, '', false, false, 0, false, false);
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Ln(15); // Move a posição um pouco para baixo
$pdf->Cell(0, 10, 'Relatório de Produtos - OrderUP', 0, 1, 'C');

// Tabela
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(40, 10, 'Nome', 1);
$pdf->Cell(80, 10, 'Descrição', 1);
$pdf->Cell(30, 10, 'Preço', 1);
$pdf->Cell(30, 10, 'Quantidade', 1);
$pdf->Cell(30, 10, 'Categoria', 1);
$pdf->Cell(30, 10, 'Lançamento', 1);
$pdf->Cell(30, 10, 'Vencimento', 1);
$pdf->Ln();

// Adiciona os dados dos produtos à tabela
$pdf->SetFont('helvetica', '', 12);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(40, 10, $row['nome'], 1);
        $pdf->Cell(80, 10, $row['descricao'], 1);
        $pdf->Cell(30, 10, $row['preco'], 1);
        $pdf->Cell(30, 10, $row['quantidade'], 1);
        $pdf->Cell(30, 10, $row['categoria'], 1);
        $pdf->Cell(30, 10, $row['lancamento'], 1);
        $pdf->Cell(30, 10, $row['vencimento'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'Nenhum produto encontrado', 1, 1, 'C');
}

// Saída do PDF
$pdf->Output("relatorio_produtos.pdf", 'D');
?>
