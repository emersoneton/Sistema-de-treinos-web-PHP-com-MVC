<?php
include '../Controller/fpdf182/fpdf.php';
require_once '../Modal/CrudExercicio.php';
require_once '../Modal/CrudTreino.php';

$id_treino = $_GET['id'];

$resultado1=buscarTreinoId($id_treino);
$pdf= new FPDF();

$pdf->AddPage();
$pdf->Image('../../images/Logo-Sistema.png',75,10,15,0,'PNG');
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Treino'),0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(50,7,"Nome do Treino:",1,0,"C");
$pdf->Cell(130,7,utf8_decode($resultado1[0]),1,0,"C");
$pdf->Ln();
$pdf->SetFont("Arial","I",10);
$pdf->Cell(50,7,utf8_decode("Descrição do Treino:"),1,0,"C");
$pdf->Cell(130,7,utf8_decode($resultado1[1]),1,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(50,7,"Nome",1,0,"C");
$pdf->Cell(40,7,"Serie",1,0,"C");
$pdf->Cell(40,7,utf8_decode("Refetição"),1,0,"C");
$pdf->Cell(50,7,utf8_decode("Descrição"),1,0,"C");
$pdf->Ln();

$resultado2=buscarTodosExercicio($id_treino);
if(isset($resultado2) && $resultado2!= null){
foreach ($resultado2 as $linhas){
    $pdf->Cell(50,7,utf8_decode($linhas['nome_exercicio']),1,0,"C");
    $pdf->Cell(40,7,utf8_decode($linhas['serie']),1,0,"C");
    $pdf->Cell(40,7,utf8_decode($linhas['repeticao']),1,0,"C");
    $pdf->Cell(50,7,utf8_decode($linhas['descricao_exercicio']),1,0,"C");
    $pdf->Ln();
}
}
$pdf->Output();






