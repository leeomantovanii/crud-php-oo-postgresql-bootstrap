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
        
        //Script para remover acentos e caracteres especiais:
        $prof_nome = preg_replace("[^a-zA-Z0-9_]", "", strtr( $prof_nome, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC"));
 
        $query = "INSERT INTO profissao(prof_nome)VALUES('{$prof_nome}')";

        return pg_query($this->db->getConexao(), $query);
        
    }
    
    public function atualizar(Profissao $profissao){
        $prof_id = $profissao->getProf_id();
        $prof_nome = $profissao->getProf_nome();
        
        $prof_nome = preg_replace("[^a-zA-Z0-9_]", "", strtr( $prof_nome, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC"));
      
        $query = "UPDATE profissao set prof_nome='{$prof_nome}'WHERE prof_id={$prof_id}";
     
        return pg_query($this->db->getConexao(), $query);
    }
    
    public function excluir(Profissao $profissao){
        $prof_id = $profissao->getProf_id();
        
        $query = "DELETE FROM profissao WHERE prof_id ={$prof_id}";
        return pg_query($this->db->getConexao(), $query);
    }
    
    public function buscaProfissao(Profissao $profissao){
        $prof_id = $profissao->getProf_id();
        $query = "select * from profissao where prof_id= {$prof_id}";
        $resultado = pg_query($this->db->getConexao(), $query);
        
        return pg_fetch_assoc($resultado);
       
    }
    
    public function listar(){
        $listaDeProfissoes = array();
        
        $query = "select * from profissao";
        $resultado = pg_query($this->db->getConexao(), $query);
        
        while ($profissao = pg_fetch_assoc($resultado)) {
            
            array_push($listaDeProfissoes, $profissao);
        }
        
        return $listaDeProfissoes;
    }
}