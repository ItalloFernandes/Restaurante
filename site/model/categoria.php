<?php
	Class Categoria{
		private $cod;
		private $nome;

		public function getCod(){
			return $this->cod;
		}

		public function setCod($cod){
			$this->cod = $cod;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

	}

?>