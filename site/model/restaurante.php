<?php
	class Restaurante{
		private $cod;
		private $nome;
		private $endereco;
		private $email;
		private $horarioDeFuncionamento;
		private $logo;
		private $slogan;
		private $fixo;
		private $celular;

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

		public function getEndereco(){
			return $this->endereco;
		}

		public function setEndereco($endereco){
			$this->endereco = $endereco;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($email){
			$this->email = $email;
		}

		public function getHorarioDeFuncionamento(){
			return $this->horarioDeFuncionamento;
		}

		public function setHorarioDeFuncionamento($horarioDeFuncionamento){
			$this->horarioDeFuncionamento = $horarioDeFuncionamento;
		}

		public function getLogo(){
			return $this->logo;
		}

		public function setLogo($logo){
			$this->logo = $logo;
		}

		public function getSlogan(){
			return $this->slogan;
		}

		public function setSlogan($slogan){
			$this->slogan = $slogan;
		}

		public function getFixo(){
			return $this->fixo;
		}

		public function setFixo($fixo){
			$this->fixo = $fixo;
		}

		public function getCelular(){
			return $this->celular;
		}

		public function setCelular($celular){
			$this->celular = $celular;
		}

	}

?>