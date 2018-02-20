<?php 
require_once("../view/cabecalho.php");
require_once("../controller/PessoaController.php");
require_once ("../config/Conexao.php");
require_once ("../model/ProfissaoDAO.php");

$pc = new PessoaController();
$p = $pc->busca();

header('Content-type: text/html; charset=ISO-8859-1');
?>
<!DOCTYPE html>
<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<div class="container">
		<h3>Atualiza Pessoa</h3>
		<form method="post" action="../controller/PessoaController.php">,
			<input type="hidden" name="method" value="atualiza">
			<input type="hidden" name="id" value="<?=$p->getPes_id()?>">
			<div class="form-group">
				<label>Nome</label>
				<input type="text" class="form-control" name="nome" required value="<?=$p->getPes_nome()?>">
			</div>
			<div class="form-group">
				<label>Data Nascimento</label>
				<input type="date" class="form-control" name="data_nascimento" required value="<?=$p->getPes_data_nascimento()?>">
			</div>
			<div class="form-group">
				<label>CPF</label>
				<input type="number" class="form-control" name="cpf" required value="<?=$p->getPes_cpf()?>">
			</div>
			<div class="form-group">
				<label>Telefone</label>
				<input type="number" class="form-control" name="telefone" value="<?=$p->getPes_telefone()?>">
			</div>
			<div class="form-group">
				<label>Profissão</label> 
    				<select class="form-control" name="profissao">
        			<?php
        			$c = new Conexao();
        			$pDao = new ProfissaoDAO($c);
        			$profissoes = $pDao->listar();
        			
        		
        			foreach($profissoes as $profissao =>$value){?>
        			
        				<option value="<?=$value['prof_id']?>" selected>
        				<?=$value['prof_nome'] ?> </option>    
        				
        			<?php 
        			}
        			?>	
                	</select>	
			</div>
			<div class="form-group">
				<label>Observacoes</label>
				<input type="text" class="form-control" name="observacoes"  value="<?=$p->getPes_observacoes()?>">
			</div>
			<button type="submit" class="btn btn-primary">Atualizar</button>
		</form>

	</div>
</body>

<script src="../view/js/jquery-3.1.1.min.js"></script>
<script src="../view/js/bootstrap.min.js"></script>

</html>