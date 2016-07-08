<!DOCTYPE html>
<html lang="pt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Cadastro de Cliente</title>

<?php include '../elementos_tela/cabecalho.php';?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="emanuelle_menali" content="">

<link href="/sistema_cotacao/dist/css/bootstrap.min.css"
	rel="stylesheet">
<script src="/sistema_cotacao/assets/js/ie-emulation-modes-warning.js"></script>

<link href="/sistema_cotacao/dashboard/dashboard.css" rel="stylesheet">
<script src="js/ie8-responsive-file-warning.js"></script>

<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script
	src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

</head>

<body>

	<h1>Novo usuario</h1>
	<br />
	<form action="" method="post">
		<!--programa php que verifica se os campos estão vazios e adiciona ao banco de dados-->

		<p>
			Insira as informações para efetuar o cadastro </br> </br>
		
		
		<table>

			<tr>
				<td>Nome:</td>
				<td><input type="text" size="35" maxlength="20" name="nome" /></br>
					</br></td>
			</tr>

			<tr>
				<td>Senha:</td>
				<td><input type="password" size="35" maxlength="6" name="senha" /></br>
					</br></td>
			</tr>
			<tr>
				<td>E-mail:</td>
				<td><input type="text" size="35" maxlength="30" name="email" /></br>
					</br></td>
			</tr>
			<tr>
				<td>Endereço:</td>
				<td><input type="text" size="35" maxlength="30" name="cidade" /></br>
					</br></td>
			</tr>

			<tr>
				<td>Nome da empresa:</td>
				<td><input type="text" size="35" maxlength="30" name="cidade" /></br>
					</br></td>
			</tr>
			<tr>
				<td>CPF/CNPJ:</td>
				<td><input type="text" size="35" maxlength="15" name="cidade" /></br>
					</br></td>
			</tr>


			<tr>
				<td>Estado:</td>
				<td><select size="1" maxlength="2" name="uf" /></br></td>
	
				
				
				
			</tr>
			<tr>
				<td></br> </br> </br> <input type="submit" value="Efetuar Cadastro"
					name="enviar" /></td>
			</tr>
			
			<?php include'insere.inc'?>
			</br>
			</br>
			</br>
		</table>

	</form>
</body>

</html>