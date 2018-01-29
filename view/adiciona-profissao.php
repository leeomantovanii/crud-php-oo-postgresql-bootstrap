<?php require_once("cabecalho.php");?>

		<h3>Adicionar Profissao</h3>
		<form method="post" action="../controller/AddProfissaoController.php">
			<div class="form-group">
				<label>Nome da Profissao</label>
				<input type="text" class="form-control" name="prof_nome" required>
			</div>
			<button type="submit" class="btn btn-primary">Adicionar</button>
		</form>

<?php require_once("rodape.php");?>