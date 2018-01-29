<?php
//classe usada para preencher os campos do formulario da tela de atualizar profissao
require_once ("../model/Profissao.php");
require_once ("../model/ProfissaoDAO.php");
require_once ("../config/Conexao.php");

$c = new Conexao();
$p = new Profissao();
$pdao = new ProfissaoDAO($c);

$p->setProf_id($_POST["prof_id"]);
$profissaoResultado = $pdao->buscaProfissao($p);

$p->setProf_nome($profissaoResultado['prof_nome']);





