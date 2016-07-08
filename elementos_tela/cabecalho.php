<!DOCTYPE html>
<html lang="pt">
	<head>

		<?php
	require_once '/../autenticacao/usuario.php';
	require_once '/../autenticacao/sessao.php';
	require_once '/../autenticacao/autenticador.php';

	$aut = Autenticador::instanciar();

	$usuario = null;
	if ($aut -> esta_logado()) {
		$usuario = $aut -> pegar_usuario();
	} else {
		$aut -> expulsar();
	}
		?>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="emanuelle_menali" content="">

		<title>Homepage</title>
		<link href="/sistema_cotacao/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="/sistema_cotacao/assets/js/ie-emulation-modes-warning.js"></script>

		<link href="/sistema_cotacao/dashboard/dashboard.css" rel="stylesheet">
		<script src="js/ie8-responsive-file-warning.js"></script>

		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		

	</head>
	<body>
		<br/>
		<br/>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand">Cotação direta CEASA</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">

						<li>
							<a href="/sistema_cotacao/home.php">Home</a>
						</li>
						<li>
							<a href="/sistema_cotacao/busca/busca_oficial.php">Pesquisa de produtos</a>
						</li>
						<li>
							<a href="/sistema_cotacao/carrinho/carrinho.php">Lista de produtos</a>
						</li>
						<li>
							<a href="http://www.servcom.com.br/empresa-servcom.php">Sobre nós</a>
						</li>
						<li>
							<a href="/sistema_cotacao/cadastro/cliente.php">Cadastro</a>
						</li>
						<li>
							<a href="http://www.servcom.com.br/contato.php">Contato</a>
						</li>
						<li></li>
						<li></li>
						<li>
							<a href = "/sistema_cotacao/cadastro/cadastro_geral.php"><?php echo $usuario -> getNome(); ?></a>

							
						</li>
						<li>
							
								<a href="/sistema_cotacao/autenticacao/controle.php?acao=sair">Sair</a>
							
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<br/>
		<br/>
	</body>
</html>