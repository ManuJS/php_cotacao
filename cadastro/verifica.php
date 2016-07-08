<?php

$nome = isset($_POST['nome']) ? $_POST['nome'] : '' ; 
$email = isset($_POST['email']) ? $_POST['email'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
$comentarios = isset($_POST['comentarios']) ? $_POST['comentarios'] : '';
$erro = 0;

//verifica se o campo ome nao esta em branco

if (empty($nome) OR strstr ($nome, ' ') == false){
	echo "Favor digitar o dado solicitado1.<br>"; $erro = 1;}
if (strlen($email)<8 || strstr ($email, '@') == false){
	echo "Favor digitar o dado solicitad2o.<br>"; $erro = 1;}
if (empty($cidade)){
	echo "Favor digitar o dado solicitado3.<br>"; $erro = 1;}
if (strlen($estado) != 2){
	echo "Favor digitar o dado solicitado corretamente.<br>"; $erro = 1;}
if (empty($comentarios)){
	echo "Favor digitar o dado solicitado5.<br>"; $erro = 1;}
	
if ($erro == 0){
		echo "todos os campos foram preenchidos corretamente";
		
		include "insere.inc";
		
		}
	?>
