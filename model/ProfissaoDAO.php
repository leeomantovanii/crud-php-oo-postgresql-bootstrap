<?php
require_once ('Profissao.php');
require_once ('../config/Conexao.php');

class ProfissaoDAO{
    
    private $db;
    
    public function ProfissaoDAO(Conexao $db){
        $this->db = $db;
    }
    
    public function adicionar(Profissao $profissao){
        $prof_nome = $profissao->getProf_nome();
 
        $query = "INSERT INTO profissao(prof_nome)VALUES('{$prof_nome}')";
        
        return mysqli_query($this->db->getConexao(), $query);
    }
    
    public function atualizar(Profissao $profissao){
        $prof_id = $profissao->getProf_id();
        $prof_nome = $profissao->getProf_nome();
      
        $query = "UPDATE profissao set prof_nome='{$prof_nome}'WHERE prof_id={$prof_id}";
     
        return mysqli_query($this->db->getConexao(), $query);
    }
    
    public function excluir(Profissao $profissao){
        $prof_id = $profissao->getProf_id();
        
        $query = "DELETE FROM profissao WHERE prof_id ={$prof_id}";
        return mysqli_query($this->db->getConexao(), $query);
    }
    
    public function buscaProfissao(Profissao $profissao){
        $prof_id = $profissao->getProf_id();
        $query = "select * from profissao where prof_id= {$prof_id}";
        $resultado = mysqli_query($this->db->getConexao(), $query);
        return mysqli_fetch_assoc($resultado);
    }
    
    public function listar(){
        $listaDeProfissoes = array();
        
        $query = "select * from profissao";
        $resultado = mysqli_query($this->db->getConexao(), $query);
        
        while ($profissao = mysqli_fetch_assoc($resultado)) {
            
            array_push($listaDeProfissoes, $profissao);
        }
        
        return $listaDeProfissoes;
    }
}