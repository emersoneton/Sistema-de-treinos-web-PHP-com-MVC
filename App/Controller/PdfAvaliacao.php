<?php
include '../Controller/fpdf182/fpdf.php';
require_once '../Modal/CrudAvaliacao.php';

$id_avaliação = $_GET['id'];

$resultado1=buscarAvaliacaoEspecifica($id_avaliação);
$pdf= new FPDF();

$pdf->AddPage();
$pdf->Image('../../images/Logo-Sistema.png',75,10,15,0,'PNG');
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,10,utf8_decode('Avaliação'),0,0,"C");
$pdf->Ln(15);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(50,7,utf8_decode("Histórico Clinico:"),1,0,"C");
$pdf->Cell(130,7,utf8_decode($resultado1[1]),1,0,"C");
$pdf->Ln(12);
$pdf->SetFont("Arial","I",10);
$pdf->Cell(30,7,utf8_decode("Peso:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode($resultado1[2]),1,0);
$pdf->Cell(30,7,utf8_decode("Altura:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode($resultado1[3]),1,0);
$pdf->Cell(30,7,utf8_decode("IMC:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode($resultado1[4]),1,0);
$pdf->Ln(12);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(30,7,utf8_decode("Cintura:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode($resultado1[5]),1,0);
$pdf->Cell(30,7,utf8_decode("Abdomen:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode($resultado1[6]),1,0);
$pdf->Cell(30,7,utf8_decode("quadri:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode($resultado1[7]),1,0);
$pdf->Ln(12);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(60,7,utf8_decode("Antebraço Esquerdo:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode($resultado1[8]),1,0);
$pdf->Cell(60,7,utf8_decode("Antebraço Direito:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode($resultado1[9]),1,0);
$pdf->Ln(12);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(60,7,utf8_decode("Braço Esquerdo:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode($resultado1[10]),1,0);
$pdf->Cell(60,7,utf8_decode("Braço Direito:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode($resultado1[11]),1,0);
$pdf->Ln(12);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(60,7,utf8_decode("Coxa Esquerda:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode($resultado1[12]),1,0);
$pdf->Cell(60,7,utf8_decode("Coxa Direita:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode($resultado1[13]),1,0);
$pdf->Ln(12);

$pdf->SetFont("Arial","I",10);
$pdf->Cell(60,7,utf8_decode("Panturrilha Esquerda:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode($resultado1[14]),1,0);
$pdf->Cell(60,7,utf8_decode("Panturrilha Direita:"),1,0,"C");
$pdf->Cell(30,7,utf8_decode($resultado1[15]),1,0);
$pdf->Ln(12);


$pdf->Output();







