<?php
require_once ("../model/Profissao.php");
require_once ("../config/Conexao.php");
require_once ("../model/ProfissaoDAO.php");
header('Content-type: text/html; charset=ISO-8859-1');

class ProfissaoController
{

    public function insere()
    {
        $p = new Profissao();
        $c = new Conexao();
        $pDao = new ProfissaoDAO($c);
        
        $p->setProf_nome($_POST["prof_nome"]);
        
        if ($pDao->adicionar($p)) {
            echo '<script>alert("Profissão cadastrada com sucesso");</script>';
            echo '<script>window.location="../view/lista-profissao.php";</script>';
            die();
        } else {
            echo '<script>alert("Erro ao cadastrar, contate o suporte para ajuda!");</script>';
            echo '<script>window.location="../view/index.php";</script>';
//             echo "Erro" . pg_last_error($c->getConexao());
        }
    }

    public function atualiza()
    {
        $p = new Profissao();
        $c = new Conexao();
        $pDao = new ProfissaoDAO($c);
        
        $p->setProf_id($_POST["prof_id"]);
        $p->setProf_nome($_POST["prof_nome"]);
        
        if ($pDao->atualizar($p)) {
            echo '<script>alert("Profissão atualizada com sucesso");</script>';
            echo '<script>window.location="../view/lista-profissao.php";</script>';
            die();
        } else {
            echo '<script>alert("Erro ao atualizar, contate o suporte para ajuda!");</script>';
            echo '<script>window.location="../view/index.php";</script>';
            //             echo "Erro" . pg_last_error($c->getConexao());
        }
    }

    //o metodo buscar é utilizado para preencher o formulario de quando o usuario for querer alterar o objeto
    public function busca()
    {
        $c = new Conexao();
        $p = new Profissao();
        $pdao = new ProfissaoDAO($c);
        
        $p->setProf_id($_POST["prof_id"]);
        $profissaoResultado = $pdao->buscaProfissao($p);
        
        $p->setProf_nome($profissaoResultado['prof_nome']);
        return  $p;
    }

    public function delete()
    {
        $p = new Profissao();
        $p->setProf_id($_POST["prof_id"]);
        
        $c = new Conexao();
        
        $pdao = new ProfissaoDAO($c);
             
        if ($pdao->excluir($p)) {
            echo '<script>alert("Profissão deletada com sucesso");</script>';
            echo '<script>window.location="../view/lista-profissao.php";</script>';
            die();
        } else {
            echo '<script>alert("Erro ao atualizar, contate o suporte para ajuda!");</script>';
            echo '<script>window.location="../view/index.php";</script>';
//             echo "Erro" . pg_last_error($c->getConexao());
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['method'])) {
    $method = $_POST['method'];
    if (method_exists('ProfissaoController', $method)) {
        $pc = new ProfissaoController();
        $pc->$method($_POST);
    } else {
        echo 'Metodo incorreto';
    }
}