<?php
	Class prato_acompanhamento{
		private $cod;
		private $cod_prato;
		private $cod_acompanhamento;


		public function getCod(){
			return $this->cod;
		}

		public function setCod($cod){
			$this->cod = $cod;
		}

		public function getCod_prato(){
			return $this->cod_prato;
		}

		public function setCod_prato($cod_prato){
			$this->cod_prato = $cod_prato;
		}

		public function getCod_acompanhamento(){
			return $this->cod_acompanhamento;
		}

		public function setCod_acompanhamento($cod_acompanhamento){
			$this->cod_acompanhamento = $cod_acompanhamento;
		}
	}
	
?>