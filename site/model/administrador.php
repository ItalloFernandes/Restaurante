<?php
	Class Administrador{
		private $cod;
		private $login;
		private $senha;


		public function getCod(){
			return $this->cod;
		}

		public function setCod($cod){
			$this->cod = $cod;
		}

		public function getLogin(){
			return $this->login;
		}

		public function setLogin($login){
			$this->login = $login;
		}

		public function getSenha(){
			return $this->senha;
		}

		public function setSenha($senha){
			$this->senha = $senha;
		}

	}
	
?>