<?php
	Class Acompanhamento{
		private $cod;
		private $nome;
		private $preco_adicional;
		private $foto_acompanhamento;


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

		public function getPreco_adicional(){
			return $this->preco_adicional;
		}

		public function setPreco_adicional($preco_adicional){
			$this->preco_adicional = $preco_adicional;
		}

		public function getFoto_acompanhamento(){
			return $this->foto_acompanhamento;
		}

		public function setFoto_acompanhamento($foto_acompanhamento){
			$this->foto_acompanhamento = $foto_acompanhamento;
		}

	}
	
?>