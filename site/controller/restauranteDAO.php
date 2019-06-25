<?php

	function atualizarRestaurante($restaurante){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "UPDATE restaurante set nome=:nome, endereco=:endereco, email=:email, horarioDeFuncionamento=:horarioDeFuncionamento, logo=:logo, slogan=:slogan, fixo = :fixo, celular=:celular WHERE cod=:cod" ;
			
			$atualizarRestaurante = $pdo->prepare($sql);
			$atualizarRestaurante->bindValue(':nome',$restaurante->getNome());
			$atualizarRestaurante->bindValue(':endereco',$restaurante->getEndereco());
			$atualizarRestaurante->bindValue(':email',$restaurante->getEmail());
			$atualizarRestaurante->bindValue(':horarioDeFuncionamento',$restaurante->getHorarioDeFuncionamento());
			$atualizarRestaurante->bindValue(':logo',$restaurante->getLogo());
			$atualizarRestaurante->bindValue(':slogan',$restaurante->getSlogan());
			$atualizarRestaurante->bindValue(':fixo',$restaurante->getFixo());
			$atualizarRestaurante->bindValue(':celular',$restaurante->getCelular());

			$atualizarRestaurante->bindValue(':cod',$restaurante->getCod());
			$atualizarRestaurante->execute();
			header("location:restauranteConfig.php?alterado=true");

		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function listarRestaurante(){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "SELECT * FROM restaurante";
			$listar = $pdo->prepare($sql);
			$listar->execute();
			return $listar->fetchALL(PDO::FETCH_ASSOC);
			


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

?>