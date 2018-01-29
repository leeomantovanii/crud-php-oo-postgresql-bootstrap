<?php
require_once ('Pessoa.php');
require_once ('../config/Conexao.php');

class PessoaDAO{

    private $db;

    public function PessoaDAO(Conexao $db){
        $this->db = $db;
    }

    public function adicionar(Pessoa $pessoa){
        $nome = $pessoa->getNome();
        $data_nascimento = $pessoa->getData_nascimento();
        $cpf = $pessoa->getCpf();
        $telefone = $pessoa->getTelefone();
        $observacoes = $pessoa->getObservacoes();
        
        $query = "INSERT INTO pessoa(nome,data_nascimento,cpf, telefone,observacoes)
                 VALUES('{$nome}','{$data_nascimento}','{$cpf}','{$telefone}','{$observacoes}')";
        
        return mysqli_query($this->db->getConexao(), $query);
    }

    public function atualizar(Pessoa $pessoa){
        print_r ($pessoa);
        
        $id = $pessoa->getId();
        $nome = $pessoa->getNome();
        $data_nascimento = $pessoa->getData_nascimento();
        $cpf = $pessoa->getCpf();
        $telefone = $pessoa->getTelefone();
        $observacoes = $pessoa->getObservacoes();
        
        $query = "UPDATE pessoa set nome='{$nome}',data_nascimento={$data_nascimento},cpf='{$cpf}', 
                 telefone='{$telefone}', observacoes='{$observacoes}' WHERE id={$id}";
       
        return mysqli_query($this->db->getConexao(), $query);
    }

    public function excluir(Pessoa $pessoa){
        $id = $pessoa->getId();
        
        $query = "DELETE FROM pessoa WHERE id ={$id}";
        return mysqli_query($this->db->getConexao(), $query);
    }

    public function buscaPessoa(Pessoa $pessoa){
        $id = $pessoa->getId();
        $query = "select * from pessoa where id= {$id}";
        $resultado = mysqli_query($this->db->getConexao(), $query);
        return mysqli_fetch_assoc($resultado);
    }

    public function listar(){
        $listaDePessoas = array();
        
        $query = "select * from pessoa";
        $resultado = mysqli_query($this->db->getConexao(), $query);
        
        while ($pessoa = mysqli_fetch_assoc($resultado)) {
            
            array_push($listaDePessoas, $pessoa);
        }
        
        return $listaDePessoas;
    }
}