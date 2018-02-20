<?php 
require_once("cabecalho.php");
require_once ("../config/Conexao.php");
require_once ("../model/ProfissaoDAO.php");
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
 <?php 
// header('Content-type: text/html; charset=ISO-8859-1');
$c = new Conexao();
$pDao = new ProfissaoDAO($c);
$profissoes = $pDao->listar();

if (! $profissoes){
    echo '<script>alert("Primeiramente efetue o cadastro de profissão");</script>';
    echo '<script>window.location="adiciona-profissao.php";</script>';
}
?>
<h3>Adicionar Pessoa</h3>
<form method="post" action="../controller/PessoaController.php">
	<input type="hidden" name="method" value="insere">
	<div class="form-group">
		<label>Nome</label> <input type="text" class="form-control" name="nome" required>
	</div>
	<div class="form-group">
		<label>Data Nascimento</label> <input type="date" class="form-control" name="data_nascimento" required>
	</div>
	<div class="form-group">
		<label>CPF</label> 
		<input type="text" class="form-control" name="cpf"  required>
	</div>
	<div class="form-group">
		<label>Telefone</label> <input type="text" class="form-control" name="telefone">
	</div>
	<div class="form-group">
		<label>Profissão</label> 
			<select class="form-control" name="profissao">
			<?php
			$c = new Conexao();
			$pDao = new ProfissaoDAO($c);
			$profissoes = $pDao->listar();
		
			foreach($profissoes as $profissao =>$value){?>
				<option value="<?=$value['prof_id']?>"><?=$value['prof_nome']?></option>    
				
			<?php 
			}
			?>	
            </select>	
	</div>
	<div class="form-group">
		<label>Observacoes</label> <input type="text" class="form-control" 	name="observacoes">
	</div>
	<button type="submit" class="btn btn-primary">Adicionar</button>

</form>

 	
</body>


</html>

<?php require_once("rodape.php");?>