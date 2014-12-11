<?php 


	/**
	* 
	*/
	class Usuario
	{
		
		private $nome;
		private $email;
		private $sexo;
		private $senha;
		private $altura;
		private $peso;
		private $idade;
		private $objetivo;


		function __construct($nome = "", $email = "", $sexo="", $senha = "", $altura= "", $peso="", $idade="", $objetivo="")
		{
			$this->nome = $nome;
			$this->email = $email;
			$this->sexo = $sexo;
			$this->senha = $senha;
			$this->altura = $altura;
			$this->peso = $peso;
			$this->idade = $idade;
			$this->objetivo = $objetivo;
			
				
		}

		function __get($atributo){

			return $this->$atributo;
		}

		function __set($atributo, $prop){

			return $this->$atributo = $prop;
		}
	}





 ?>