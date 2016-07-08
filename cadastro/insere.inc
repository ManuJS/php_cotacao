<?php

include "../conexao/conexao.php";

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$nomeempresa = $_POST['empresa'];
$endereco = $_POST['endereco'];
$uf = $_POST['uf'] ;
$cpfcnpj = $_POST['cpf/cnpj'];

$sql = "INSERT INTO cadastro VALUES";
$sql .= "('$nome', '$senha', '$email','$nomeempresa,'$endereco', '$cpfcnpj, '$uf')";
$resultado = mysql_query ($sql);

echo "usuario incluido com suscesso";

mysql_close($conexao);
?>

