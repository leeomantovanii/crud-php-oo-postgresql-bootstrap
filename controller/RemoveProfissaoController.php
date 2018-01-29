<?php

require_once("../model/Profissao.php");
require_once("../model/ProfissaoDAO.php");
require_once("../config/Conexao.php");

$p = new Profissao();
$p->setProf_id($_POST["prof_id"]);

$c = new Conexao();

$pdao = new ProfissaoDAO($c);

if($pdao->excluir($p)){
    header("Location:../view/lista-profissao.php");
    die();
}else{
    echo "Erro".mysqli_error($c->getConexao());
}