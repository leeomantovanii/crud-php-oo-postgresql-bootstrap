<?php require_once("cabecalho.php");?>

		<h3>Adicionar Pessoa</h3>
		<form method="post" action="../controller/AddPessoaController.php">
			<div class="form-group">
				<label>Nome</label>
				<input type="text" class="form-control" name="nome" required>
			</div>
			<div class="form-group">
				<label>Data Nascimento</label>
				<input type="date" class="form-control" name="data_nascimento" required>
			</div>
			<div class="form-group">
				<label>CPF</label>
				<input type="number" class="form-control" name="cpf" required>
			</div>
			<div class="form-group">
				<label>Telefone</label>
				<input type="number" class="form-control" name="telefone" required>
			</div>
			<div class="form-group">
				<label>Profissao</label>
				<select name="profissao" class="form-control">
  					<option value="volvo">Volvo</option>
  					<option value="saab">Saab</option>
  					<option value="opel">Opel</option>
  					<option value="audi">Audi</option>
				</select>
			</div>
			<div class="form-group">
				<label>Observacoes</label>
				<input type="text" class="form-control" name="observacoes">
			</div>
			<button type="submit" class="btn btn-primary">Adicionar</button>
		</form>

<?php require_once("rodape.php");?>