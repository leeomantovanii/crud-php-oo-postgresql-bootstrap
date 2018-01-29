<?php
require_once ("cabecalho.php");
require_once ("../config/Conexao.php");
require_once ("../model/PessoaDAO.php");
?>

<h3>Lista de Pessoas</h3>
<table class="table table-striped table-bordered table-condensed ">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Data Nascimento</th>
			<th>CPF</th>
			<th>Telefone</th>
			<th>Observacoes</th>
			<th>Alterar</th>
			<th>Excluir</th>
		</tr>
	</thead>	

<?php

$c = new Conexao();
$pDao = new PessoaDAO($c);
$pessoas = $pDao->listar();

foreach ($pessoas as $pessoa) :
?>
	<tr>
		<td><?=$pessoa['nome']?></td>
		<td><?=$pessoa['data_nascimento']?></td>
		<td><?=$pessoa['cpf']?></td>
		<td><?=$pessoa['telefone']?></td>
		<td><?=$pessoa['observacoes']?></td>

		<td>
			<form action="atualiza-pessoa.php" method="POST">
				<input type="hidden" name="id" value="<?= $pessoa['id']?>">
				<button class="btn btn-primary">
					<span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span>
				</button>
			</form>
		</td>
		<td>
			<form action="../controller/RemovePessoaController.php" method="POST">
				<input type="hidden" name="id" value="<?= $pessoa['id']?>">
				<button class="btn btn-danger">
					<span class="glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span>
				</button>
			</form>
		</td>
	</tr>


<?php
endforeach
?>


</table>
<a href="adiciona-pessoa.php"><button class="btn btn-success btn-circle btn-inverse form-control">
		<span class="glyphicon glyphicon-plus"></span>
<?php require_once("rodape.php");?>		
