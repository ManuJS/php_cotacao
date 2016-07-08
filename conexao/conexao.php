<?php

function Conexao() {

	$link = mysql_connect('localhost', 'root', '123456');
	$baseDeDados = mysql_select_db('sistema_cotacao');

	if (!$baseDeDados) {
		echo mysql_error();
	}

}
?>