<?php

class Profissao{
    private $prof_id;
    private $prof_nome;
    
//     function __construct($prof_id, $prof_nome) {
//         $this->prof_id = $prof_id;
//         $this->prof_nome = $prof_nome;
//     }

    public function getProf_id(){
        return $this->prof_id;
    }

    public function getProf_nome(){
        return $this->prof_nome;
    }

    public function setProf_id($prof_id){
        $this->prof_id = $prof_id;
    }

    public function setProf_nome($prof_nome){
        $this->prof_nome = $prof_nome;
    } 
}