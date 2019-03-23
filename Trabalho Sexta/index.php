<html>
   <head>
	<title>Trabalho</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
   <head>
   <body>
       <div class="container">
		<?php
			require_once 'cliente.php';
			$c= new cliente();
			$dados=$c->buscarTodos();
			echo "<table class='table table-bordered'>";
			echo "<tr><th>usuario</th><th>senha</th>";
			foreach($dados as $linha){
				print "<tr>";
				print "<td>".$linha['usuario']."</td>";
				print "<td>".$linha['senha']."</td>";
				
				print "</tr>";
			}
			echo "</table>";
		?>
		<script>
			$(function() {	$('#inserir').hide();	});
		</script>
		<button class="btn btn-secundary" onclick="$('#inserir').show()">Inserir</button>
		</div>
		<?php
			if(isset($_POST['usuario'])){
				$c->setusuario($_POST['usuario']);
				$c->setsenha (hash('sha256', $_POST['senha']));
				
				
				$c->inserir();
				unset($_POST['usuario']);
				header("Refresh:0");
			}
		?>
		<div usuario="inserir" class="container">
			<h2>Inserir USUARIO</h2>
			<form method="POST">
				<p>usuario: <input type="text" name="usuario"
				  placeholder="Digite seu usuario aqui" required></p>
				<p>senha: <input type="password" name="senha"></p>
				
				<p>
				<input class="btn btn-primary" type="submit" value="Inserir">
				<button class="btn btn-secundary" onclick="$('#inserir').hide()">Cancelar</button>
				</p>
			</form>
		</div>
	</body>
</html>