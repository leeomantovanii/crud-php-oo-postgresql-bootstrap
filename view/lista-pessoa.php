<?php
require_once ("cabecalho.php");
require_once ("../config/Conexao.php");
require_once ("../model/PessoaDAO.php");
require_once ("../model/ProfissaoDAO.php");
require_once ("../model/Profissao.php");
require_once ("../model/Pessoa.php");
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
			<th>Profissao</th>
			<th>Alterar</th>
			<th>Excluir</th>
		</tr>
	</thead>	

<?php

$c = new Conexao();
$pDao = new PessoaDAO($c);
$pessoas = $pDao->listar();

$profDAO = new ProfissaoDAO($c);

foreach ($pessoas as $pessoa) :
try{
    $profissao = new Profissao();
    $profissao->setProf_id($pessoa['id_profissao']);
    $profissao = $profDAO->buscaProfissao($profissao);
} catch(Exception $e){
    echo $e->getMessage();
}

?>


	<tr>
		<td><?=$pessoa['pes_nome']?></td>
		<td><?=$pessoa['pes_data_nascimento']?></td>
		<td><?=$pessoa['pes_cpf']?></td>
		<td><?=$pessoa['pes_telefone']?></td>
		<td><?=$pessoa['pes_observacoes']?></td>
		<td><?=$profissao['prof_nome']?></td>
		
		

		<td>
			<form action="atualiza-pessoa.php" method="POST">
				<input type="hidden" name="pes_id" value="<?= $pessoa['pes_id']?>">
				<button class="btn btn-primary">
					<span class="glyphicon glyphicon glyphicon-edit" aria-hidden="true"></span>
				</button>
			</form>
		</td>
		<td>
			<form action="../controller/PessoaController.php" method="POST">
				<input type="hidden" name="method" value="delete">
				<input type="hidden" name="pes_id" value="<?= $pessoa['pes_id']?>">
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
