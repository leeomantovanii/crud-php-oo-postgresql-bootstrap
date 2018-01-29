<?php

class Pessoa{
    private $id;
    private $nome;
    private $data_nascimento;
    private $cpf;
    private $telefone;
    private $observacoes;
   
    public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function getData_nascimento(){
        return $this->data_nascimento;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function getObservacoes(){
        return $this->observacoes;
    }
    
    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setData_nascimento($data_nascimento){
        $this->data_nascimento = $data_nascimento;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setObservacoes($observacoes){
        $this->observacoes = $observacoes;
    }   
} 

