<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="sistema de cotacao">
		<meta name="author" content="emanuelle menali">

		<link href="/sistema_cotacao/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="/sistema_cotacao/autenticacao/signin.css" rel="stylesheet">
		<script src="/sistema_cotacao/assets/js/ie-emulation-modes-warning.js"></script>

	</head>

	<body>

		<div class="container">

			<form action="/sistema_cotacao/autenticacao/controle.php" method="post" target="_self" class="form-signin">
				<h2 class="form-signin-heading">Login</h2>
				<label for="email" class="sr-only">E-mail</label><br/>
				<input type="email" name= "email" id="email" class="form-control" value= "" placeholder="email@email.com" 
				required autofocus>
				<br/>
				<label for="inputPassword" class="sr-only">Senha</label>
				<input type="password" id="senha"  name = "senha" class="form-control" value = ""placeholder="Senha" 
				required>
				<div class="checkbox">
					<label>
						<input type="checkbox" value="remember-me">
						Lembrar senha </label>
				</div>
				<button  class="btn btn-lg btn-primary btn-block" id="acao" name="acao" type="submit" value="logar">
					Entrar
				</button>
			</form>

		</div>
		<script src="/sistema_cotacao/assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
