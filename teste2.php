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
		<link href="/sistema_cotacao/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="estilos/estilo_tabela.css" >
		<link href="/sistema_cotacao/dashboard/dashboard.css" rel="stylesheet">
		
		<script type="text/javascript">
		 $().ready(function() {
		$("#menu a").click(function( e ){
			e.preventDefault();
			var href = $( this ).attr('href');
			$("#conteudo").load( href +" #conteudo");
		});
	});
	</script>


	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
				<a class="navbar-brand">Cotação direta CEASA</a>
				</div>

			<!--menu superior a direita-->
			<div id="menu" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="index.php">Página Inicial</a>
					</li>
					<li>
						<a href="cadastro/cadastro_geral.php">Cofigurações</a>
					</li>
					<li>
						<a href="#">Profile</a>
					</li>
					<li>
						<a href="#">Help</a>
					</li>
				</ul>
				<!--input do campo de busca do site-->
				<form class="navbar-form navbar-right">
					<input type="text" class="form-control" placeholder="Search...">
				</form>
			</div>
			</div>
		</nav>
		
		
		<div class="container-fluid">
			<div class="row">
				<div id = 'menu' class="col-sm-3 col-md-2 sidebar">
					<ul class="nav nav-sidebar">
						<li class="active">
							<a href="teste3.php"
							id='teste'>Busca de produtos</a>
							</li>
						<li class="active">
							<a href=""
							id='teste'>Carrinho</a>
						</li>
						<li class="active">
							<a href=""
							id='teste'>Lista de compras</a>
							</li>
						<li class="active">
							<a href=""
							id='teste'>Busca de produtos</a>
							</li>
							
							<li class="active">
							<a><p><input type="button" value="Carregar conteúdo" /></p></a>
							</li>
					</ul>
						
				</div>
				
			</div> <!--encerra class row-->
		</div> <!--encerra container fluid-->
		
		<div id = "conteudo" class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					
				</div>

						<!-- Bootstrap core JavaScript
						================================================== -->
						<!-- Placed at the end of the document so the pages load faster -->
						<script src="/sistema_cotacao/bootstrap/js/jquery.min.js"></script>
						<script src="/sistema_cotacao/bootstrap/js/bootstrap.min.js"></script>
						<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
						<script src="/sistema_cotacao/assets/js/vendor/holder.min.js"></script>
						<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
						<script src="/sistema_cotacao/assets/js/ie10-viewport-bug-workaround.js"></script>
						</body>
						</html>
