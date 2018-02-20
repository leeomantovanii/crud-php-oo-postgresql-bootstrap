<?php
require_once ("../model/Pessoa.php");
require_once ("../config/Conexao.php");
require_once ("../model/PessoaDAO.php");
header('Content-type: text/html; charset=ISO-8859-1');

class PessoaController
{

    public function insere()
    {
        if ($this->validaCPF($_POST["cpf"])) {
            $prof = new Profissao();
            $prof->setProf_id($_POST["profissao"]);
            
            $p = new Pessoa();
            $c = new Conexao();
            $pDao = new PessoaDAO($c);
            
            $p->setPes_nome($_POST["nome"]);
            $p->setPes_data_nascimento($_POST["data_nascimento"]);
            $p->setPes_cpf($_POST["cpf"]);
            $p->setPes_telefone($_POST["telefone"]);
            $p->setPes_observacoes($_POST["observacoes"]);
            $p->setProfissao($prof);
            
            if ($pDao->adicionar($p)) {
                echo '<script>alert("Pessoa cadastrada com sucesso");</script>';
                echo '<script>window.location="../view/lista-pessoa.php";</script>';
                die();
            } else {
                echo '<script>alert("Erro ao cadastrar, contate o suporte para ajuda!");</script>';
                echo '<script>window.location="../view/lista-pessoa.php";</script>';
//                 echo "Erro" . pg_last_error($c->getConexao());
            }
        } else {
            echo '<script>alert("Digite um CPF válido");</script>';
            echo '<script>window.location="../view/adiciona-pessoa.php";</script>';
        }
    }

    public function atualiza()
    {
        $prof = new Profissao();
        $prof->setProf_id($_POST["profissao"]);
        
        $p = new Pessoa();
        $c = new Conexao();
        $pDao = new PessoaDAO($c);
        
        $p->setPes_id($_POST["id"]);
        $p->setPes_nome($_POST["nome"]);
        $p->setPes_data_nascimento($_POST["data_nascimento"]);
        $p->setPes_cpf($_POST["cpf"]);
        $p->setPes_telefone($_POST["telefone"]);
        $p->setPes_observacoes($_POST["observacoes"]);
        $p->setProfissao($prof);
        
        if ($pDao->atualizar($p)) {
            echo '<script>alert("Pessoa atualizada com sucesso");</script>';
            echo '<script>window.location="../view/lista-pessoa.php";</script>';
            die();
        } else {
            echo '<script>alert("Erro ao atualizar, contate o suporte para ajuda!");</script>';
            echo '<script>window.location="../view/lista-pessoa.php";</script>';
//             echo "Erro" . pg_last_error($c->getConexao());
        }
    }

    // o metodo buscar é utilizado para preencher o formulario de quando o usuario for querer alterar o objeto
    public function busca()
    {
        $c = new Conexao();
        $p = new Pessoa();
        $pdao = new PessoaDAO($c);
        
        $p->setPes_id($_POST["pes_id"]);
        
        $pessoaResultado = $pdao->buscaPessoa($p);
        
        $p->setPes_nome($pessoaResultado['pes_nome']);
        $p->setPes_data_nascimento($pessoaResultado['pes_data_nascimento']);
        $p->setPes_cpf($pessoaResultado['pes_cpf']);
        $p->setPes_telefone($pessoaResultado['pes_telefone']);
        $p->setPes_observacoes($pessoaResultado['pes_observacoes']);
        
        return $p;
    }

    public function delete()
    {
        $p = new Pessoa();
        $p->setPes_id($_POST["pes_id"]);
        
        $c = new Conexao();
        
        $pdao = new PessoaDAO($c);
        
        if ($pdao->excluir($p)) {
            echo '<script>alert("Pessoa deletada com sucesso");</script>';
            echo '<script>window.location="../view/lista-pessoa.php";</script>';
            die();
        } else {
            echo '<script>alert("Erro ao deletar, contate o suporte para ajuda!");</script>';
            echo '<script>window.location="../view/lista-pessoa.php";</script>';
//             echo "Erro" . pg_last_error($c->getConexao());
        }
    }

    public function validaCPF($cpf)
    {
        // Verifica se um número foi informado
        if (empty($cpf)) {
            return false;
        }
        
        // Elimina possivel mascara
        $cpf = preg_replace('[^0-9]', '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
        
        // Verifica se o numero de digitos informados é igual a 11
        if (strlen($cpf) != 11) {
            return false;
        } // Verifica se nenhuma das sequências invalidas abaixo
          // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {
            for ($t = 9; $t < 11; $t ++) {
                for ($d = 0, $c = 0; $c < $t; $c ++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
            return true;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['method'])) {
    $method = $_POST['method'];
    if (method_exists('PessoaController', $method)) {
        $pc = new PessoaController();
        $pc->$method($_POST);
    } else {
        echo 'Metodo incorreto';
    }
}