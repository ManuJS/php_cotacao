<!DOCTYPE >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
@import url("../estilos/estilo_tabela.css");
</style>
<link href="/sistema_cotacao/dist/css/bootstrap.min.css"
	rel="stylesheet">
<script src="/sistema_cotacao/assets/js/ie-emulation-modes-warning.js"></script>

<link href="/sistema_cotacao/dashboard/dashboard.css" rel="stylesheet">
<script src="js/ie8-responsive-file-warning.js"></script>

<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script
	src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<title>Produtos escolhidos</title>

</head>

<body>
		<?php
		
		include "/../elementos_tela/cabecalho.php";
		?>
		<header>
		<div id="titulo" align="center">
			<h1>Lista</h1>
		</div>
	</header>

		<?php
		session_start();
		if (empty ( $_GET )) {
			
			$_GET ['id'] = 0; //ID É O ID DO PRODUTO
			$_GET ['acao'] = '';
		}
		function AdicionaCarrinho() {
			if (empty ( $_SESSION ['carrinho'] )) { // SE NAO EXISTIR INDICE PREENCHIDO
				$_SESSION ['carrinho'] = array (); // cria o array do carrinho
			}
			
			if (isset ( $_GET ['acao'] )) { // verifica se o valor de $_GET é acao
				
				if ($_GET ['acao'] === 'add') { // SE O VALOR PEGO EM ACAO FOR ADD
					
					$id = intval ( $_GET ['id'] ); // A VARIAVEL ID RECEBE O VALOR INTEIRO CONTIDO EM ID
									
				if (empty ( $_SESSION ['carrinho'] [$id] )) { // se vazia,
					
						$_SESSION ['carrinho'] [$id] = 1; // insere o primeiro indice?
						
					} else { // caso cheia,
						$_SESSION ['carrinho'] [$id] += 1; // incrementa os proximos indices
							                                 
						// ultima posição preenchida
					}
				}
			} // end adiciona carrinho...
	
		}
		
		function RemoveCarrinho() {
			
			// REMOVER CARRINHO...
			if (empty ( $_GET ['id'] )) {
				
				$_GET ['id'] = 0;
			} else {
				if ($_GET ['acao'] === 'del') {
					
					$id = intval ( $_GET ['id'] );
					if (isset ( $_SESSION ['carrinho'] [$id] )) {
						unset ( $_SESSION ['carrinho'] [$id] );
					}
				}
			}
		} // end remove carrinho...
		function AlteraQuantidade() {
			if ($_GET ['acao'] === 'up') {
				
				if (is_array ( $_POST ['quantidade'] )) {
					foreach ( $_POST ['quantidade'] as $id => $quantidade ) {
						
						$id = intval ( $id );
						
						$quantidade = intval ( $quantidade );
						
						if (! empty ( $quantidade ) || $quantidade > 0) {
							$_SESSION ['carrinho'] [$id] = $quantidade;
						} else {
							unset ( $_SESSION ['carrinho'] [$id] );
						}
					}
				}
			}
		}
		// end altera quantidade...
		
		AdicionaCarrinho (); // aciona as funcoes
		RemoveCarrinho ();
		AlteraQuantidade ();
		?>
<br />
	<br />
	<table>
		<tr class="table-topo">
			<td width="20%">Produto</td>
			<td width="10%">Distribuidor</td>
			<td width="15%">Quantidade</td>
			<td width="10%">Unidade</td>
			<td width="15%">Preço</td>
			<td width="15%">Sub Total</td>
			<td width="15%">Remover</td>
		</tr>

		<form action="?acao=up" method="post">

				<?php
				
				include "/../conexao/conexao.php"; // chama classe de conexao
				Conexao (); // instancia metodo de conexao;
				$total = 0.0; // inicia um valor para total
				$quantidade = 0; // inicia um valor para quantidade
				$i = '';
				$lista = array ();
				
				if (count ( $_SESSION ['carrinho'] ) === 0) { // conta se em session há indices
					echo "<script type=\"text/javascript\">alert('Não há produtos no carrinho');
				</script>"; // exibe alerta
				} 

				else {
					foreach ( $_SESSION ['carrinho'] as $id => $quantidade ) {
						
						$selecao = "SELECT * FROM produto WHERE cod_reg = '$id'";
						// id contem o cod_reg do index para procurar o produto selecionado.
						
						$query = mysql_query ( $selecao ) or die ( mysql_error () );
						$linha = mysql_fetch_array ( $query );
						///////////////////////////////////////////////////////////////////////////////////////////
						$nome = $linha ['desc_prod'];
						$distribuidor = $linha ['distribuidor'];
						$unidade = $linha['unidade'];
						$preco = $linha ['preco_cx_fechada'];
						////////////////////////////////////////////////////////////////////////////////////////////					
						$subTotal = null;
						if ($quantidade > 0) {
							$subTotal = $linha ['preco_cx_fechada'] * $quantidade;
						}
						$total += $subTotal;
						echo '
								<tr>
								<td>' . utf8_encode ( $nome ) . '</td>
								<td>' . utf8_encode ( $distribuidor ) . '</td>
								<td>
								<input type="number" name="quantidade[' . $id . ']" value="' . $quantidade . '"/>
								<span>  </span></td>
								<td>'.($unidade).'</td>
								<td> R$ ' . number_format ( $preco, 2, ', ', '.' ) . '</td>
								<td> R$ ' . number_format ( $subTotal, 2, ', ', '.' ) . '</td>
								<td><a class="deletar" href="?acao=del&id=' . $id . '">Remover</a></td>
								</tr>';
						// }
						
						$i ++; // indice do vetor
						      // adiciona nome e distribuidor ao array lista no indice i
						$lista [$i] = $nome . "; " . $distribuidor . "; " . $id;
					} // fecha foreach
				} // fecha else
				
				if (isset ( $total )) {
					
					echo '
							<tr class="total">
							
							<td colspan="6" align = "right"
							class="text-total" >Total R$ ' . number_format ( $total, 2, ', ', '.' ) . '</td>
							</tr>';
				}
				
				echo'<a href="?acao=export " > extrair</a>';
				
				function exportaLista() {
					if ($_GET ['acao'] === 'export') {
					
					// tá fora do foreach
					$n; // indice pro for que vai ler os valores dentro de lista[]
					     // echo $i ,'<br/>';//imprime o valor total do indice i
					
					$fp = fopen ( "bloco1.txt", "w" );
					
					for($n = 1; $n <= $i; $n ++) { // inicia o laço de repeticao que vai percorrer lista
						echo $i;
						$escreve = fwrite ( $fp, ($lista [$n]), "<br/>" ); // imprime o valor de lista na posicao n
						
						echo '<br/>';
						
						fclose ( $fp );
					}
					'<br/>';
				}
				}
				// agora faz saporra pra exportar a lista
			
				?>

				<tr>
				<td colspan="3" align="left"><a
					href="/sistema_cotacao/busca/busca_oficial.php"> Continuar
						comprando</a></td>

				<td colspan="3" align="right">
					<button type="submit">Atualizar Carrinho</button>
				</td>

			</tr>


		</form>

	</table>

	</br>

	</br>
	</br>

</body>
</html>