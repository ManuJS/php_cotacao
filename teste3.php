<!DOCTYPE html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			
		</head>
		
		<body>
			
			
			<div id = "conteudo" align="center">
				<form method="GET">
					<label for="consulta">Buscar:</label>
					<input type="search"  size="60px" id="consulta" name="consulta" maxlength="255"
						placeholder="Procure por produto ou fornecedor" autofocus required/>
					<!--input type="submit" value="OK" /-->
				</form>
			
			
			
				<?php
				
				//t2.micro
				echo "sou php";
				include "conexao/conexao.php";
							Conexao();
							
						$sql = "SELECT * FROM `produtos` where desc_prod like '%".$busca."%' and
						qtd_estoque > 0 ";
							// Executa a consulta
							$query = mysql_query($sql);

								echo $tabela = '
							<table width="900px" border="1" align="center" cellspacing="0" cellpadding="10">
								';
								//imprime o cabecalho da tabela de resultados

								echo $tabela = '
								<tr class="table-topo">

									<td width="30%" align="center">
									<topic>
										Produto
									</topic></td>
									<td width="15%" align="center">
									<topic>
										Fornecedor
									</topic></td>
									<td width="15%" align="center">
									<topic>
										Estoque
									</topic></td>
									<td width="15%" align="center">
									<topic>
										Pre�o de venda
									</topic></td>
									<td width="25%" align="center">
									<topic>
										Colocar no carrinho
									</topic></td>

								</tr>';
								//monta a tabela

								echo '
								<section id= "produto">
									';
							//  $selecao = "SELECT * FROM produto"; //atribui aà variavel $selecao a query a ser realizada
							//  $query = mysql_query( $selecao ) or die( mysql_error() ); //atribui à variavel $query o comando que executa a query da variavel $selecao

							while ($linha = mysql_fetch_array($query)) {//enquanto houver resultado na query
							//serão inmpressas linhas com

							//echo $tabela = '<table width="900px" border="1" align="center" cellspacing="0" cellpadding="0">';
							echo $tabela = '<tr>';
							echo $tabela = '<td width="30%" align="center">' . utf8_encode($linha['desc_prod']) . '</td>';
							echo $tabela = '<td width="15%" align="center">' . utf8_encode($linha['distribuidor']) . '</td>';
							echo $tabela = '<td width="15%" align="center">' . utf8_encode($linha['qtd_estoque']) . '</td>';
							echo $tabela = '<td width="15%" align="center"> R$ ' . number_format($linha['prc_venda_unit'], 2, ', ', '.') . '</td>';
							//passa a $id  contendo o codigo do produto para adicao no carrinho de compras
							echo $tabela = '<td width="25%" align="center">
							<a href="/sistema_cotacao/carrinho/carrinho.php?acao=add&id=' . $linha['cod_reg'] . '">Colocar no Carrinho</a></td>';

							echo $tabela = '</tr>';
							echo '</section>';

							}// end while...

							echo $tabela = '</table>';

							ListagemProdutos();
							//aciona a funcao de listagem
						
						
				?>
				
				
				
			</div>
			
			
		</body>
	</html>