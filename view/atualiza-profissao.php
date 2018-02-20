<?php
require_once("../view/cabecalho.php");
require_once("../controller/ProfissaoController.php");

$pc = new ProfissaoController();
$p = $pc->busca();

header('Content-type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html>
<html>
<head>	
</head>
<body>
	<div class="container">
		<h3>Atualiza Profissão</h3>
		<form method="post" action="../controller/ProfissaoController.php">
			<input type="hidden" name="method" value="atualiza">
			<input type="hidden" name="prof_id" value="<?=$p->getProf_id()?>">
			<div class="form-group">
				<label>Nome</label>
				<input type="text" class="form-control" name="prof_nome" required value="<?=$p->getProf_nome()?>">
			</div>
			<button type="submit" class="btn btn-primary">Atualizar</button>
		</form>

	</div>
</body>

<script src="../view/js/jquery-3.1.1.min.js"></script>
<script src="../view/js/bootstrap.min.js"></script>

</html>