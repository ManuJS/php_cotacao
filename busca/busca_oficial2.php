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
	
		<div id = "campo_busca" align="center">
			<form method="GET">
				<label for="consulta"></label>
				<input type="search"  size="60px" id="consulta" name="consulta" maxlength="255"
				placeholder="Procure por produto ou fornecedor" autofocus required/>
				
			</form>
		</div>
		
	
			
			</br>
			</br>

	
	<?php
		session_start();
		include "/../carrinho/produtos.php";//controlador das pesquisas do banco e add no carrinho
		include "/../busca/busca.php";//codigo pra fazer o autocomplete com dados do banco

		?>

</body>
</html>