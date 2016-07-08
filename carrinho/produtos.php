<?php

include "/../conexao/conexao.php";
Conexao();

//include '/../busca/busca.php';
//include '/../busca/busca_oficial.php';

function ListagemProdutos() {//declara a funcao de listgem

	if (isset($_GET['consulta'])) {
		$busca = mysql_real_escape_string($_GET['consulta']);

		// ============================================
		// Monta outra consulta MySQL para a busca
		$sql = "SELECT * FROM `produtos` where qtd_estoque > 0 and desc_prod LIKE '%" . $busca . "%' 
				or distribuidor like '%" . $busca . "%' 
				or cod_prod like '%" . $busca . "%'
				order by desc_prod ";
		// Executa a consulta
		$query = mysql_query($sql);

		echo $tabela = '<div class="row placeholders">
		<table width="900px" border="1" 
				cellspacing="0" cellpadding="10">';
//imprime o cabecalho da tabela de resultados

echo $tabela = '<tr class="table-topo ">
	   
				<td width="30%" align="center">
				<topic>Produto</topic>
                 </td>
                 <td width="10%" align="center">
				<topic>Fornecedor</topic>
                 </td>
                  <td width="10%" align="center">
                 <topic>Qtd Estoque</topic>
                 </td>
		 	 <td width="10%" align="center">
                 <topic>Unidade</topic>
                 </td>
                
                 <td width="15%" align="center">
                 <topic>Pre�o caixa</topic>
                 </td>
                 <td width="25%" align="center">
                 <topic>Colocar no carrinho</topic>
                 </td>
                

	   </tr>';
		//monta a tabela

		echo '<section id= "produto">';
	
		//  $selecao = "SELECT * FROM produto"; //atribui aà variavel $selecao a query a ser realizada
		//  $query = mysql_query( $selecao ) or die( mysql_error() ); //atribui à variavel $query o comando que executa a query da variavel $selecao
		
		while ($linha = mysql_fetch_array($query)) {//enquanto houver resultado na query
			//serão inmpressas linhas com

			
			//echo $tabela = '<table width="900px" border="1" align="center" cellspacing="0" cellpadding="0">';
			echo $tabela = '<tr>';
			echo $tabela = '<td align="center">' . utf8_encode($linha['desc_prod']) . '</td>';
			echo $tabela = '<td  align="center">' . utf8_encode($linha['distribuidor']) . '</td>';
			echo $tabela = '<td  align="center">' . utf8_encode($linha['qtd_estoque']) . '</td>';
			echo $tabela = '<td  align="center">' . utf8_encode($linha['unidade']) . '</td>';
			
			echo $tabela = '<td  align="center"> R$ ' . number_format($linha['preco_cx_fechada'], 2, ', ', '.') . '</td>';
			//passa a $id  contendo o codigo do produto para adicao no carrinho de compras
			echo $tabela = '<td width="25%" align="center">
					 <a href="/sistema_cotacao/carrinho/carrinho.php?acao=add&id=' . $linha['cod_reg'] . '">
					 
					 Colocar no Carrinho</a></td>';
					 
					// $quantidade_estoque = $linha['qtd_estoque'];
					// $quantidade_disponivel = $quantidade_desejada - quantidade_estoque;

			echo $tabela = '</tr>';
			echo '</section>';
			
		
			

		}// end while...

		echo $tabela = '</table></div>';
	}

}

ListagemProdutos();//aciona funcao de listagem


	
		?>
