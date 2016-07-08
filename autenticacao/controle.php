<?php
session_start();
session_destroy();
require_once 'usuario.php';
require_once 'autenticador.php';
require_once 'sessao.php';


//é aqui que muda de pagina
switch ($_REQUEST['acao']) {
	case 'logar':{
		
		
		print "<h1>Tem alguem querendo logar com:</h1>";
		print "<p><h1>Email {$_REQUEST['email']}</h1></p>";
		print "<p><h1>Senha {$_REQUEST['senha']}</h1></p>";
		
		$aut = Autenticador::instanciar();
		
		if ($aut->logar($_REQUEST['email'], $_REQUEST['senha'])){
			header('location: /sistema_cotacao/home.php');
		}
		else{
			header('location: /sistema_cotacao/autenticacao/controle.php');
		}
		
}
		break;
		
	case 'sair':{
		
		header('location: /sistema_cotacao/index.php');
		
	}break;
	
}

?>