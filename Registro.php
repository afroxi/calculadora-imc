<?php 
	require_once('autoload.php');
	class Registro extends Conexion
	{
		private $peso;
		private $altura;
		private $imc;
		private $estado;
		private $conex;

		function __construct()
		{
			$this->conex = new Conexion();
			$this->conex = $this->conex->getConex();
		}

		public function insertarDatos(float $peso, float $altura, float $imc, string $estado)
		{
			$this->peso = $peso;
			$this->altura = $altura;
			$this->imc = $imc;
			$this->estado = $estado;

			$query = "INSERT INTO usuario(peso_usuario, altura_usuario, imc_usuario, estado_usuario) VALUES (?,?,?,?)";
			$prepare = $this->conex->prepare($query);
			$arrData = [$this->peso, $this->altura, $this->imc, $this->estado];
			$result = $prepare->execute($arrData);
			$idResult = $this->conex->lastInsertId();

			return $idResult;
		}

		public function obtenerRegistros()
		{
			$query = "SELECT * FROM usuario ORDER BY imc_usuario DESC";
			$result = $this->conex->query($query);
			$rows = $result->fetchall(PDO::FETCH_ASSOC);

			return $rows;
		}
	}
?>