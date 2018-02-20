<?php 
require_once("cabecalho.php"); 
header('Content-type: text/html; charset=ISO-8859-1');
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	 
	<h3>Adicionar Profissão</h3>
		<form method="post" action="../controller/ProfissaoController.php">
			<input type="hidden" name="method" value="insere">
			<div class="form-group">
				<label>Nome da Profissão</label>
				<input type="text" class="form-control" name="prof_nome" required>
			</div>
			<button type="submit" class="btn btn-primary">Adicionar</button>
		</form>
</body>
</html>
	

<?php require_once("rodape.php");?>