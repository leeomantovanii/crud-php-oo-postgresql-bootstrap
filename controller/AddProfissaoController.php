<?php
require_once("../model/Profissao.php");
require_once("../config/Conexao.php");
require_once("../model/ProfissaoDAO.php");

$p = new Profissao();
$c = new Conexao();
$pDao = new ProfissaoDAO($c);

$p->setProf_nome($_POST["prof_nome"]);

if($pDao->adicionar($p)){
    header('Location:../view/lista-profissao.php');
    die();
}else{
    echo "Erro".mysqli_error($c->getConexao());}
    
    