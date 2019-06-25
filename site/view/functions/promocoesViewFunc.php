<?php
	include_once ('../controller/promocaoDAO.php');
	include_once ('../controller/pratoDAO.php');

	$promocoes = listarPromocaosAdm();
	$pratos = listarPratos();
	$cod_promocoes_used = array();
	foreach ($pratos as $prato) {
		$cod_promocoes_used[] = $prato['cod_promocao'];
	}
	$quantidade = 0;
	foreach($promocoes as $promocao){
        $cod = $promocao['cod'];
        if(in_array($cod, $cod_promocoes_used)){
        	$quantidade++;
        }
    }
	
	$test = "false";

	if ($quantidade % 2 == 0) {
		$test = "true";
	}
	

	function newPreco ($preco,$porcentagem){

		$newPreco = $preco-($preco*($porcentagem/100));

		$newPreco = number_format($newPreco,2);
		return $newPreco;
	}





?>