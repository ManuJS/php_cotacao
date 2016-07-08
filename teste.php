<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="emanuelle_menali" content="">
		

		<title>Homepage</title>

		<!-- Bootstrap core CSS -->
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">
		
		<link rel="stylesheet" href="estilos/estilo_tabela.css" >

		<!-- Custom styles for this template -->
		<link href="dashboard/dashboard.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="assets/js/ie-emulation-modes-warning.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<?php
		include 'elementos_tela/cabecalho2.php';
		?>
		<script type="text/javascript" src="busca/js/jquery-1.4.2.js"></script>
        <script type='text/javascript' src="busca/js/jquery.autocomplete.js"></script>
        <link rel="stylesheet" type="text/css" href="busca/js/jquery.autocomplete.css" />
        <script type="text/javascript">
            $().ready(function() {
                $("#consulta").autocomplete("busca/autoComplete.php", {
                    width: 260,
                    matchContains: true,
                    //mustMatch: true,
                    //minChars: 0,
                    //multiple: true,
                    //highlight: false,
                    //multipleSeparator: ",",
                    selectFirst: false
                });
            });
        </script>
		

	</head>

	<body>

		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<li class="active">
							<a href="#">Overview <span class="sr-only">(current)</span></a>
						</li>
						<li>
							<a href="#">Reports</a>
						</li>
						<li>
							<a href="#">Analytics</a>
						</li>
						<li>
							<a href="#">Export</a>
						</li>
					</ul>
					<ul class="nav nav-sidebar">
						<li>
							<a href="">Nav item</a>
						</li>
						<li>
							<a href="">Nav item again</a>
						</li>
						<li>
							<a href="">One more nav</a>
						</li>
						<li>
							<a href="">Another nav item</a>
						</li>
						<li>
							<a href="">More navigation</a>
						</li>
					</ul>
					
				</div>
				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<h1 class="page-header">Busca</h1>

					<div class="row placeholders">
						<div id = "campo_busca" align="center">
							<form method="GET">
								<label for="consulta">Buscar:</label>
								<input type="search"  size="60px" id="consulta" name="consulta" maxlength="255"
								placeholder="Procure por produto ou fornecedor" autofocus required/>
								<input type="submit" value="OK" />
							</form>
						</div>
					</div>

					<h2 class="sub-header">resultado</h2>
					<div class="table-responsive">
						<?php //resultado carrinho

						include "conexao/conexao.php";
						Conexao();

						//include '/../busca/busca.php';
						//include '/../busca/busca_oficial.php';

						function ListagemProdutos() {//declara a função de listgem

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
						}

						}

						ListagemProdutos();
						//aciona a funcao de listagem

						function ListagemFornecedor(){

						if (isset($_GET['']));

						}
					?>
						</div>
						</div>
						</div>
						</div>

						<!-- Bootstrap core JavaScript
						================================================== -->
						<!-- Placed at the end of the document so the pages load faster -->
						<script src="../bootstrap/js/jquery.min.js"></script>
						<script src="../dist/js/bootstrap.min.js"></script>
						<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
						<script src="../assets/js/vendor/holder.min.js"></script>
						<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
						<script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
						</body>
						</html>
