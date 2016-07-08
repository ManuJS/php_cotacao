<?php

// Incluimos a classe PHPExcel
include  '../PHPJasperXML-master/Class/PHPExcel.php';

// Instanciamos a classe
$objPHPExcel = new PHPExcel();

// Definimos o estilo da fonte
$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

// Criamos as colunas
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', "Nome" )
            ->setCellValue('B1', "Sobrenome" )
            ->setCellValue("C1", "Email" );
          

// Podemos configurar diferentes larguras paras as colunas como padr�o
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);

// Tamb�m podemos escolher a posi��o exata aonde o dado ser� inserido (coluna, linha, dado);
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 2, "Fulano");
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 2, " da Silva");
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 2, "fulano@exemplo.com.br");

$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, 3, "Fulano");
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, 3, " da Silva");
$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, 3, "fulano@exemplo.com.br");




// Podemos renomear o nome das planilha atual, lembrando que um �nico arquivo pode ter v�rias planilhas
$objPHPExcel->getActiveSheet()->setTitle('Credenciamento para o Evento');

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