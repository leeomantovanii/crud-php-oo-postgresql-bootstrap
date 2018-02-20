<?php 

class Conexao{
	private $host = "localhost";
	private $username = "postgres";
	private $password ="leonardo";
	private $database = "crud";
	private $conexao = null;
	


	public function Conexao(){
		$this->conectar();
	}

	public function getConexao(){
		return $this->conexao;
	}

	private function conectar(){
	    $this->conexao = pg_connect("host=localhost port=5432 dbname=crud user=postgres password=leonardo") or die('Could not connect: ' . pg_last_error());
	}
}