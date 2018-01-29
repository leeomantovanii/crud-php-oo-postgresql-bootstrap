<?php 
require_once("../view/cabecalho.php");
require_once("../controller/CarregaPessoaController.php");
?>
<!DOCTYPE html>
<html>
<head>	
</head>
<body>
	<div class="container">
		<h3>Atualiza Pessoa</h3>
		<form method="post" action="../controller/UpdPessoaController.php">,
			<input type="hidden" name="id" value="<?=$p->getId()?>">
			<div class="form-group">
				<label>Nome</label>
				<input type="text" class="form-control" name="nome" required value="<?=$p->getNome()?>">
			</div>
			<div class="form-group">
				<label>Data Nascimento</label>
				<input type="date" class="form-control" name="data_nascimento" required value="<?=$p->getData_nascimento()?>">
			</div>
			<div class="form-group">
				<label>CPF</label>
				<input type="number" class="form-control" name="cpf" required value="<?=$p->getCpf()?>">
			</div>
			<div class="form-group">
				<label>Telefone</label>
				<input type="number" class="form-control" name="telefone" required value="<?=$p->getTelefone()?>">
			</div>
			<div class="form-group">
				<label>Observacoes</label>
				<input type="text" class="form-control" name="observacoes" required value="<?=$p->getObservacoes()?>">
			</div>
			<button type="submit" class="btn btn-primary">Atualizar</button>
		</form>

	</div>
</body>

<script src="../view/js/jquery-3.1.1.min.js"></script>
<script src="../view/js/bootstrap.min.js"></script>

</html>