<?php

// Incluimos a classe PHPExcel
include  '../phpexcel/Classes/PHPExcel.php';

// Instanciamos a classe
$objPHPExcel = new PHPExcel();

// Definimos o estilo da fonte
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

//cabe�alho da tabela
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue("A1", "Item")
->setCellValue("B1", "Descricao do produto")
->setCellValue("C1", "Quantidade")
->setCellValue("D1", "Valor unitario")
->setCellValue("E1", "Valor total");





$objPHPExcel->getActiveSheet()->setTitle('Lista de compras',getdate(), '');

// Cabe�alho do arquivo para ele baixar
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="arquivo_de_exemplo01.xls"');
header('Cache-Control: max-age=0');
// Se for o IE9, isso talvez seja necess�rio
header('Cache-Control: max-age=1');

// Acessamos o 'Writer' para poder salvar o arquivo
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

// Salva diretamente no output, poder�amos mudar arqui para um nome de arquivo em um diret�rio ,caso n�o quisessemos jogar na tela
$objWriter->save('php://output'); 

exit;

?>