<?php
	function cadastrarFuncionario($funcionario){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "INSERT INTO funcionarios (nome, funcao, foto) VALUES (:nome, :funcao, :foto)";
			$cadastrar = $pdo->prepare($sql);

			$cadastrar->bindValue(':nome',$funcionario->getNome());
			$cadastrar->bindValue(':funcao',$funcionario->getFuncao());
			$cadastrar->bindValue(':foto',$funcionario->getFoto());
			
			

			$cadastrar->execute();
			header("location:funcionariosConfig.php?resultado=cadastrado");


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}



	}

	function listarFuncionario(){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "SELECT * FROM funcionarios";
			$listar = $pdo->prepare($sql);
			$listar->execute();
			return $listar->fetchALL(PDO::FETCH_ASSOC);
			header("location:test.php");


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function listarFuncionariosPesquisa($pesquisa){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();
			$sql = "SELECT * FROM funcionarios WHERE nome LIKE '%".$pesquisa."%'";
			$listar = $pdo->prepare($sql);
			$listar->execute();	
			return($listar->fetchALL(PDO::FETCH_ASSOC));
		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function deleteFuncionario($cod){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "DELETE FROM funcionarios WHERE cod = :cod";

			$delete = $pdo->prepare($sql);
			$delete->bindValue(":cod", $cod);
			$delete->execute();
			header("location:funcionariosConfig.php?resultado=apagado");

		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function atualizarFuncionario($funcionario){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "UPDATE funcionarios set nome=:nome, funcao=:funcao, foto=:foto WHERE cod=:cod" ;

			$atualizar = $pdo->prepare($sql);
			$atualizar->bindValue(':nome',$funcionario->getNome());
			$atualizar->bindValue(':funcao',$funcionario->getFuncao());
			$atualizar->bindValue(':foto',$funcionario->getFoto());
			$atualizar->bindValue(':cod',$funcionario->getCod());
			$atualizar->execute();
			header("location:funcionariosConfig.php?resultado=alterado");

		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

?>