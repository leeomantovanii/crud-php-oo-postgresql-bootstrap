<?php
//classe usada para preencher os campos do formulario da tela de atualizar pessoa
require_once ("../model/Pessoa.php");
require_once ("../model/PessoaDAO.php");
require_once ("../config/Conexao.php");

$c = new Conexao();
$p = new Pessoa();
$pdao = new PessoaDAO($c);

$p->setId($_POST["id"]);

$pessoaResultado = $pdao->buscaPessoa($p);

$p->setNome($pessoaResultado['nome']);
$p->setData_nascimento($pessoaResultado['data_nascimento']);
$p->setCpf($pessoaResultado['cpf']);
$p->setTelefone($pessoaResultado['telefone']);
$p->setObservacoes($pessoaResultado['observacoes']);




