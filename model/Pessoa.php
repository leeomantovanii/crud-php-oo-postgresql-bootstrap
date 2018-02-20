<?php

require_once ("Profissao.php");

class Pessoa{
    private $pes_id;
    private $pes_nome;
    private $pes_data_nascimento;
    private $pes_cpf;
    private $pes_telefone;
    private $Profissao;
    private $pes_observacoes;
    
//     function __construct($nome, $data_nascimento, $cpf, $telefone, $Profissao, $observacoes) {
//         $this->nome = $nome;
//         $this->data_nascimento = $data_nascimento;
//         $this->cpf = $cpf;
//         $this->telefone = $telefone;
//         $this->Profissao = $Profissao;
//         $this->observacoes = $observacoes;       
//     }

    public function getPes_id()
    {
        return $this->pes_id;
    }

    public function getPes_nome()
    {
        return $this->pes_nome;
    }

    public function getPes_data_nascimento()
    {
        return $this->pes_data_nascimento;
    }

    public function getPes_cpf()
    {
        return $this->pes_cpf;
    }

    public function getPes_telefone()
    {
        return $this->pes_telefone;
    }

    public function getProfissao()
    {
        return $this->Profissao;
    }

    public function getPes_observacoes()
    {
        return $this->pes_observacoes;
    }

    public function setPes_id($pes_id)
    {
        $this->pes_id = $pes_id;
    }

    public function setPes_nome($pes_nome)
    {
        $this->pes_nome = $pes_nome;
    }

    public function setPes_data_nascimento($pes_data_nascimento)
    {
        $this->pes_data_nascimento = $pes_data_nascimento;
    }

    public function setPes_cpf($pes_cpf)
    {
        $this->pes_cpf = $pes_cpf;
    }

    public function setPes_telefone($pes_telefone)
    {
        $this->pes_telefone = $pes_telefone;
    }

    public function setProfissao($Profissao)
    {
        $this->Profissao = $Profissao;
    }

    public function setPes_observacoes($pes_observacoes)
    {
        $this->pes_observacoes = $pes_observacoes;
    }

  
}
 

