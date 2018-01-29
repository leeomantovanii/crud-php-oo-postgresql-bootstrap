<?php 
require_once("../model/Pessoa.php");
require_once("../config/Conexao.php");
require_once("../model/PessoaDAO.php");

 $p = new Pessoa();
 $c = new Conexao();
 $pDao = new PessoaDAO($c);

$p->setNome($_POST["nome"]);
$p->setData_nascimento($_POST["data_nascimento"]);
$p->setCpf($_POST["cpf"]);
$p->setTelefone($_POST["telefone"]);
$p->setObservacoes($_POST["observacoes"]);

if($pDao->adicionar($p)){
	header('Location:../view/lista-pessoa.php');
 	die();
}else{
	echo "Erro".mysqli_error($c->getConexao());}

