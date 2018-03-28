
<!DOCTYPE html>
<html>
<head>
	<title>Busca</title>
	<meta charset="utf-8">

	<?php
	require_once('model/Conexao.class.php');
	require_once('model/PaisesDAO.class.php');

	$paisesDAO = new PaisesDAO();

	$pagina=isset($_GET['pag'])?$_GET['pag']:1;
	$filtro = isset($_GET['q'])?$_GET['q']:'';
	$resultados = 10;

	$lista = $paisesDAO->listar($filtro,$pagina,$resultados);
	$total = $paisesDAO->rowCount($filtro);
	?>
</head>
<body>
	<form method="get">
		<input type="text" name="q" placeholder="Pesquisa" value="<?=$filtro?>">
		<button>Pesquisar</button>
	</form>

	<?php

	for ($i=0; $i < ceil($total/$resultados); $i++) { 
		if($i!=($pagina-1)){
			echo '<a href="?pag='.($i+1).'&q='.$filtro.'">'.($i+1).'</a>';
		} else {
			echo ($i+1);
		}
		echo ' ';
	}

	echo '<pre>';
	print_r($lista);
	echo '<pre>';
	?>
</body>
</html>