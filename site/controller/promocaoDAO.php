<?php
	function cadastrarPromocao($promocao){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "INSERT INTO promocao (nome, duracao,  texto_promocional, foto_promocional, porcentagem) VALUES (:nome, :duracao, :texto_promocional, :foto_promocional, :porcentagem)";
			$cadastrar = $pdo->prepare($sql);

			$cadastrar->bindValue(':nome',$promocao->getNome());

			$cadastrar->bindValue(':duracao',$promocao->getDuracao());

			$cadastrar->bindValue(':texto_promocional',$promocao->getTexto_promocional());
			$cadastrar->bindValue(':foto_promocional',$promocao->getFoto_promocional());
			$cadastrar->bindValue(':porcentagem',$promocao->getPorcentagem());
			

			$cadastrar->execute();
			header("location:promocoesConfig.php?resultado=cadastrado");


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}



	}

	function listarPromocaos(){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "SELECT * FROM promocao";
			$listar = $pdo->prepare($sql);
			$listar->execute();
			return $listar->fetchALL(PDO::FETCH_ASSOC);
			header("location:index.php");


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function listarPromocaosAdm(){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "SELECT * FROM promocao WHERE cod != 2";
			$listar = $pdo->prepare($sql);
			$listar->execute();
			return $listar->fetchALL(PDO::FETCH_ASSOC);
			header("location:index.php");


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function listarPromocoesPesquisa($pesquisa){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();
			$sql = "SELECT * FROM promocao WHERE cod !=2 AND nome LIKE '%".$pesquisa."%'";
			$listar = $pdo->prepare($sql);
			$listar->execute();	
			return($listar->fetchALL(PDO::FETCH_ASSOC));
		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function deletePromocao($cod){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql1 = "UPDATE prato set cod_promocao=:promocao WHERE cod_promocao = :cod";
			$alterar = $pdo->prepare($sql1);
			$alterar->bindValue(":cod", $cod);
			$alterar->bindValue(":promocao", 2);
			$alterar->execute();


			$sql = "DELETE FROM promocao WHERE cod = :cod";

			$delete = $pdo->prepare($sql);
			$delete->bindValue(":cod", $cod);
			$delete->execute();
			header("location:promocoesConfig.php?resultado=apagar");

		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function atualizarPromocao($promocao){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "UPDATE promocao set nome=:nome, duracao=:duracao, texto_promocional=:texto_promocional, foto_promocional=:foto_promocional, porcentagem=:porcentagem WHERE cod=:cod" ;

			$atualizar = $pdo->prepare($sql);
			$atualizar->bindValue(':nome',$promocao->getNome());
			$atualizar->bindValue(':duracao',$promocao->getDuracao());
			$atualizar->bindValue(':texto_promocional',$promocao->getTexto_promocional());
			$atualizar->bindValue(':foto_promocional',$promocao->getFoto_promocional());
			$atualizar->bindValue(':porcentagem',$promocao->getPorcentagem());
			$atualizar->bindValue(':cod',$promocao->getCod());
			$atualizar->execute();
			header("location:promocoesConfig.php?resultado=alterado");

		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}



?>