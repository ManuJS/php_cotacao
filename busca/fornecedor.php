<div style='margin-top:4px; margin-bottom:5px; margin-left:50px; margin-right:7px;
alignment-adjust'>
	

<?php
#chama o arquivo de configuração com o banco
#require '../conexao/conexao.php';

#seleciona os dados da tabela produto
$query = mysql_query("SELECT id, descricao FROM fornecedors");


# abaixo montamos um formulário em html
# e preenchemos o select com dados 
?>
<form name="fornecedors" method="post" action="">
 <label for="">Selecione um forncecedor</label>
 <br/>
  <br/>
 
 <select>
 <option>Selecione...</option>
 
 <?php while($prod = mysql_fetch_array($query)) { ?>
 <option  id="consulta_combo" value="<?php  echo $prod['id'] ?>"><?php echo $prod['descricao'] ?></option>
 <?php } ?>
 
 </select>
</form>

</div>