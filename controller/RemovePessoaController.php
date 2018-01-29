<?php 

require_once("../model/Pessoa.php");
require_once("../model/PessoaDAO.php");
require_once("../config/Conexao.php");

$p = new Pessoa();
$p->setId($_POST["id"]);

$c = new Conexao();

$pdao = new PessoaDAO($c);

if($pdao->excluir($p)){
	header("Location:../view/lista-pessoa.php");
	die();
}else{
	echo "Erro".mysqli_error($c->getConexao());
}