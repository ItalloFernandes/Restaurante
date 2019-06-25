<?php
	class Funcionario{
		private $cod;
		private $nome;
		private $funcao;
		private $foto;
	

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

		public function getFuncao(){
			return $this->funcao;
		}

		public function setFuncao($funcao){
			$this->funcao = $funcao;
		}

		public function getFoto(){
			return $this->foto;
		}

		public function setFoto($foto){
			$this->foto = $foto;
		}
		


	}	
?>