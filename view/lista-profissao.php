<?php
require_once ("cabecalho.php");
require_once ("../config/Conexao.php");
require_once ("../model/ProfissaoDAO.php");
?>

<h3>Lista de Profissoes</h3>
<table class="table table-striped table-bordered table-condensed ">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Alterar</th>
			<th>Excluir</th>
		</tr>
	</thead>	

<?php

$c = new Conexao();
$pDao = new ProfissaoDAO($c);
$profissoes = $pDao->listar();

foreach ($profissoes as $profissao) :
?>
	<tr>
		<td><?=$profissao['prof_nome']?></td>
		<td>
			<form action="atualiza-profissao.php" method="POST">
				<input type="hidden" name="prof_id" value="<?= $profissao['prof_id']?>">
				<button class="btn btn-primary">
					<span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span>
				</button>
			</form>
		</td>
		<td>
			<form action="../controller/RemoveProfissaoController.php" method="POST">
				<input type="hidden" name="prof_id" value="<?= $profissao['prof_id']?>">
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
<a href="adiciona-profissao.php"><button class="btn btn-success btn-circle btn-inverse form-control">
		<span class="glyphicon glyphicon-plus"></span>
<?php require_once("rodape.php");?>		
