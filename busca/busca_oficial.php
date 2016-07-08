<!DOCTYPE >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<style type="text/css">
			@import url("../estilos/estilo_tabela.css");
		</style>

		<title>Pesquisa de produtos</title>
		<link href="/sistema_cotacao/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="/sistema_cotacao/assets/js/ie-emulation-modes-warning.js"></script>

		<link href="/sistema_cotacao/dashboard/dashboard.css" rel="stylesheet">
		<script src="js/ie8-responsive-file-warning.js"></script>

		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	</head>

	<body>
		<?php
		include "/../elementos_tela/cabecalho.php";
		?>
		<header>
			<div id = "titulo" align="center" >
				<h1>Pesquisa de produtos</h1>
			</div>
		</header>
		
		<br/>
		
	
			
				<div class="col-sm-3 col-md-2 sidebar">
					<div  id= "busca_fornec" align="center">
	<?php $link = mysql_connect('localhost', 'root', '123456');
						$baseDeDados = mysql_select_db('sistema_cotacao');

						#seleciona os dados da tabela produto
						$query = mysql_query("SELECT id, descricao FROM fornecedors");

						# abaixo montamos um formulário em html
						# e preenchemos o select com dados
	?>
<form name="fornecedor" method="post" action="">
 <label for="">Selecione um fornecedor</label>
 <select>
 <option>Selecione...</option>
 
 <?php while($prod = mysql_fetch_array($query)) { ?>
 <option id="fornecedor" value="<?php echo $prod['id'] ?>"><?php echo $prod['descricao'] ?></option>
 <?php } ?>
 
 </select>
</form>
	</div>
	</div>
	
	<div class="row placeholders">
		<div id = "campo_busca" align="center">
			<form method="GET">
				<label for="consulta"></label>
				<input type="search"  size="60px" id="consulta" name="consulta" maxlength="255"
				placeholder="Procure por produto ou fornecedor" autofocus required/>
				
			</form>
		</div>
		
	</div>
		
			</br>
			</br>

<div class="margem3">	
	<?php
	

	include "/../carrinho/produtos.php";
	//controlador das pesquisas do banco e add no carrinho
	include "/../busca/busca.php";
	//codigo pra fazer o autocomplete com dados do banco
		?>
</div>
</body>
</html>