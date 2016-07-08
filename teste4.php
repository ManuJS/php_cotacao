<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#menu a").click(function( e ){
			e.preventDefault();
			var href = $( this ).attr('href');
			$("#content").load( href +" #content");
		});
	});
	</script>
</head>
<body>
	<ul id="menu">
		<li><a href="index.html">Home</a></li>
		<li><a href="fotos.html">Fotos</a></li>
		<li><a href="contato.html">Contato</a></li>
	</ul><!-- /menu -->
	<div id="content">
		<h1>Bem Vindo!</h1>
		<p>Essa eh a home desse nome pseudo-site.</p>
	</div><!-- /content -->
</body>
</html>