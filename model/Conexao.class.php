<?php

class Conexao {
	const host = 'localhost';
	const porta = '';
	const banco = 'test';
	const usuario = 'root';
	const senha = '';

	public $conexao;

	public function __construct($host = self::host, $porta = self::porta, $banco = self::banco, $usuario = self::usuario, $senha = self::senha)
	{
		if($this->conexao == null)
		{
			$this->conexao = new PDO("mysql:host=$host;port=$porta;dbname=$banco", "$usuario", "$senha");
		}
	}

	public function __destruct()
	{
		if($this->conexao != null)
		{
			$this->conexao = null;
		}
	}
}
?>
