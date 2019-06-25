<?php
	Class promocao {
		private $cod;
		private $nome;
		private $duracao;
		private $texto_promocional;
		private $foto_promocional;
		private $porcentagem;

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

		public function getDuracao(){
			return $this->duracao;
		}

		public function setDuracao($duracao){
			$this->duracao = $duracao;
		}

		public function getTexto_promocional(){
			return $this->texto_promocional;
		}

		public function setTexto_promocional($texto_promocional){
			$this->texto_promocional = $texto_promocional;
		}

		public function getFoto_promocional(){
			return $this->foto_promocional;
		}

		public function setFoto_promocional($foto_promocional){
			$this->foto_promocional = $foto_promocional;
		}

		public function getPorcentagem(){
			return $this->porcentagem;
		}

		public function setPorcentagem($porcentagem){
			$this->porcentagem = $porcentagem;
		}
	}

?>