<?php 

class Conexao{
	private $host = "localhost";
	private $username = "root";
	private $password ="leo251996";
	private $database = "teste";
	private $conexao = null;

	public function Conexao(){
		$this->conectar();
	}

	public function getConexao(){
		return $this->conexao;
	}

	private function conectar(){
		$this->conexao = mysqli_connect(
			$this->host,
			$this->username,
			$this->password,
			$this->database);
	}
}