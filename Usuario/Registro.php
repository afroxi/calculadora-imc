<?php 
	require_once('Core/autoload.php');
	class Registro extends Conexion
	{
		private $peso;
		private $altura;
		private $imc;
		private $estado;

		function __construct()
		{
			parent::__construct();
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
			$query = "SELECT peso_usuario, altura_usuario, imc_usuario FROM usuario ORDER BY imc_usuario DESC";
			$result = $this->conex->query($query);
			$rows = $result->fetchall(PDO::FETCH_ASSOC);
			if (count($rows) > 0) {
				return $rows;
			} else {
				return "No se han encontrado datos";
			}
		}
	}
?>