<?php
require_once ('Pessoa.php');
require_once ('../config/Conexao.php');

class PessoaDAO{

    private $db;

    public function PessoaDAO(Conexao $db){
        $this->db = $db;
    }

    public function adicionar(Pessoa $pessoa){
        $nome = $pessoa->getPes_nome();
        $data_nascimento = $pessoa->getPes_data_nascimento();
        $cpf = $pessoa->getPes_cpf();
        $telefone = $pessoa->getPes_telefone() ? $pessoa->getPes_telefone(): null;
        $observacoes = $pessoa->getPes_observacoes() ?  $pessoa->getPes_observacoes() : null;
        $profissao = $pessoa->getProfissao()->getProf_id() ;
        
        //Script para remover acentos e caracteres especiais:
        $nome = preg_replace("[^a-zA-Z0-9_]", "", strtr( $nome, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC"));
        $cpf = preg_replace("[^a-zA-Z0-9_]", "", strtr( $cpf, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC"));
        $telefone = preg_replace("[^a-zA-Z0-9_]", "", strtr( $telefone, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC"));
        $observacoes = preg_replace("[^a-zA-Z0-9_]", "", strtr( $observacoes, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC"));
        
        $query = "INSERT INTO pessoa(pes_nome,pes_data_nascimento,pes_cpf, pes_telefone, pes_observacoes, id_profissao)
                 VALUES('{$nome}','{$data_nascimento}','{$cpf}','{$telefone}','{$observacoes}', '{$profissao}')";
        
        return pg_query($this->db->getConexao(), $query);
    }

    public function atualizar(Pessoa $pessoa){
      
        $id = $pessoa->getPes_id();
        $nome = $pessoa->getPes_nome();
        $data_nascimento = $pessoa->getPes_data_nascimento();
        $cpf = $pessoa->getPes_cpf();
        $telefone = $pessoa->getPes_telefone() ? $pessoa->getPes_telefone() : null;
        $observacoes = $pessoa->getPes_observacoes() ? $pessoa->getPes_observacoes() : null;
        $profissao = $pessoa->getProfissao()->getProf_id();
        
        //Script para remover acentos e caracteres especiais:
        $nome = preg_replace("[^a-zA-Z0-9_]", "", strtr( $nome, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC"));
        $cpf = preg_replace("[^a-zA-Z0-9_]", "", strtr( $cpf, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC"));
        $telefone = preg_replace("[^a-zA-Z0-9_]", "", strtr( $telefone, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC"));
        $observacoes = preg_replace("[^a-zA-Z0-9_]", "", strtr( $observacoes, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC"));
        
        $query = "UPDATE pessoa set pes_nome='{$nome}',pes_data_nascimento='{$data_nascimento}', pes_cpf='{$cpf}', 
                 pes_telefone='{$telefone}', pes_observacoes='{$observacoes}', id_profissao='{$profissao}' WHERE pes_id={$id}";
        
        return pg_query($this->db->getConexao(), $query);
    }

    public function excluir(Pessoa $pessoa){
        $pes_id = $pessoa->getPes_id();
        
        $query = "DELETE FROM pessoa WHERE pes_id ={$pes_id}";
        return pg_query($this->db->getConexao(), $query);
    }

    public function buscaPessoa(Pessoa $pessoa){
        $pes_id = $pessoa->getPes_id();
        $query = "select * from pessoa where pes_id= {$pes_id}";
        $resultado = pg_query($this->db->getConexao(), $query);

        return pg_fetch_assoc($resultado);
    }

    public function listar(){
        $listaDePessoas = array();
        
        $query = "select * from pessoa";
        $resultado = pg_query($this->db->getConexao(),$query);
        
        while ($pessoa = pg_fetch_assoc($resultado)) {
            
            array_push($listaDePessoas, $pessoa);
        }
        
        return $listaDePessoas;
    }
}