<?php
	
	function cadastrarPrato($prato){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "INSERT INTO prato (nome, ingredientes, preco, cod_promocao, foto_prato, cod_categoria) VALUES (:nome, :ingredientes, :preco, :cod_promocao, :foto_prato, :cod_categoria)";
			$cadastrar = $pdo->prepare($sql);
			$cadastrar->bindValue(':nome',$prato->getNome());
			$cadastrar->bindValue(':ingredientes',$prato->getIngredientes());
			$cadastrar->bindValue(':preco',$prato->getPreco());
			$cadastrar->bindValue(':cod_promocao',$prato->getCod_promocao());
			$cadastrar->bindValue(':foto_prato',$prato->getFoto_prato());
			$cadastrar->bindValue(':cod_categoria',$prato->getCod_categoria());
			$cadastrar->execute();
			header("location:pratosConfig.php?resultado=cadastrado");
			


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}



	}

	function listarPratos(){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "SELECT * FROM prato";
			$listar = $pdo->prepare($sql);
			$listar->execute();
			return $listar->fetchALL(PDO::FETCH_ASSOC);
			


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function listarPratosPaginacao($inicio,$quantidade){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "SELECT * FROM prato LIMIT $inicio, $quantidade";
			$listar = $pdo->prepare($sql);
			$listar->bindValue(':inicio',$inicio);
			$listar->bindValue(':quantidade',$quantidade);
			$listar->execute();
			return $listar->fetchALL(PDO::FETCH_ASSOC);
			


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function listarPratosPaginacaoTotal(){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "SELECT count(cod) FROM prato";
			$listar = $pdo->prepare($sql);
			$listar->execute();
			$total =  $listar->fetchALL(PDO::FETCH_ASSOC);
			return $total[0]['count(cod)'];
			


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}


	function listarPratosPesquisa($pesquisa){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();
			$sql = "SELECT * FROM prato WHERE nome LIKE '%".$pesquisa."%'";
			$listar = $pdo->prepare($sql);
			$listar->execute();	
			return($listar->fetchALL(PDO::FETCH_ASSOC));
		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	
	function deletePrato($cod){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql2 = "DELETE FROM prato_possui_acompanhamento WHERE cod_prato = :cod";
			$delete1 = $pdo->prepare($sql2);
			$delete1->bindValue(":cod", $cod);
			$delete1->execute();


			$sql = "DELETE FROM prato WHERE cod = :cod";

			$delete = $pdo->prepare($sql);
			$delete->bindValue(":cod", $cod);
			$delete->execute();
			header("location:pratosConfig.php?resultado=apagar");

		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function atualizarPrato($prato){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();
			
			$sql = "UPDATE prato set nome=:nome, ingredientes=:ingredientes, preco=:preco, cod_promocao=:promocao, foto_prato=:foto_prato, cod_categoria=:cod_categoria WHERE cod=:cod" ;

			$atualizar = $pdo->prepare($sql);
			$atualizar->bindValue(':nome',$prato->getNome());
			$atualizar->bindValue(':ingredientes',$prato->getIngredientes());
			$atualizar->bindValue(':preco',$prato->getPreco());
			$atualizar->bindValue(':promocao',$prato->getCod_promocao());
			$atualizar->bindValue(':foto_prato',$prato->getFoto_prato());
			$atualizar->bindValue(':cod_categoria',$prato->getCod_categoria());
			$atualizar->bindValue(':cod',$prato->getCod());
			$atualizar->execute();

			header("location:pratosConfig.php?resultado=alterado");

		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}



?>