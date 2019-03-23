<?php
	require_once 'cliente.php';
	$c= new cliente();
	$dados=$c->buscarTodos();
	echo "<table>";
	echo "<tr><th>usuario</th><th>senha</th>";
	foreach($dados as $linha){
		
		
		print "</tr>";
	}
	echo "</table>";
?>