<?php
	 class Prato{
	 	private $cod;
	 	private $nome;
	 	private $ingredientes;
	 	private $preco;
	 	private $cod_promocao;
	 	private $foto_prato;
	 	private $cod_categoria;


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

		public function getIngredientes(){
			return $this->ingredientes;
		}

		public function setIngredientes($ingredientes){
			$this->ingredientes = $ingredientes;
		}

		public function getPreco(){
			return $this->preco;
		}

		public function setPreco($preco){
			$this->preco = $preco;
		}

		public function getCod_promocao(){
			return $this->cod_promocao;
		}

		public function setCod_promocao($cod_promocao){
			$this->cod_promocao = $cod_promocao;
		}

		public function getFoto_prato(){
			return $this->foto_prato;
		}

		public function setFoto_prato($foto_prato){
			$this->foto_prato = $foto_prato;
		}

		public function getCod_categoria(){
			return $this->cod_categoria;
		}

		public function setCod_categoria($cod_categoria){
			$this->cod_categoria = $cod_categoria;
		}


	}

?>