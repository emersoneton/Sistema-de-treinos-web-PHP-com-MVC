<?php
include '../Controller/fpdf182/fpdf.php';
require_once '../Modal/CrudRefeicao.php';
require_once '../Modal/CrudAlimento.php';

$id_refeicao = $_GET['id'];

$resultado1=buscarTodoRefeicaoId($id_refeicao);
$pdf= new FPDF();

$pdf->AddPage();
$pdf->Image('../../images/Logo-Sistema.png',75,10,15,0,'PNG');
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Dieta'),0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(60,7,"Nome da Dieta:",1,0,"C");
$pdf->Cell(120,7,utf8_decode($resultado1[0]),1,0,"C");
$pdf->Ln();
$pdf->SetFont("Arial","I",10);
$pdf->Cell(60,7,utf8_decode("Descrição da Dieta:"),1,0,"C");
$pdf->Cell(120,7,utf8_decode($resultado1[1]),1,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(60,7,"Alimento:",1,0,"C");
$pdf->Cell(60,7,"Quantidade:",1,0,"C");
$pdf->Cell(60,7,utf8_decode("Horario:"),1,0,"C");
$pdf->Ln();

$resultado2 = buscarTodosAlimentos($id_refeicao);
if(isset($resultado2) && $resultado2 != null) {
    foreach ($resultado2 as $linhas) {
        $pdf->Cell(60, 7, utf8_decode($linhas['alimento']), 1, 0, "C");
        $pdf->Cell(60, 7, utf8_decode($linhas['quantidade']), 1, 0, "C");
        $pdf->Cell(60, 7, utf8_decode($linhas['horario_refeicao']), 1, 0, "C");
        $pdf->Ln();
    }
}
$pdf->Output();







