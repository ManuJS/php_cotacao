<?php


include "/../conexao/conexao.php";
Conexao();
	//$con = mysql_connect($host,$username,$password)   or die(mysql_error());
	//mysql_select_db($db_name, $con)  or die(mysql_error());

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "SELECT * FROM `produtos` where qtd_estoque > 0 and desc_prod LIKE '%" . $q . "%'";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['desc_prod'];
	echo "$cname\n";
}
//"SELECT * FROM `produtos` where qtd_estoque > 0 and desc_prod LIKE '%" . $busca . "%'
//"select DISTINCT desc_prod from produtos where nome LIKE '%$q%'"
?>


