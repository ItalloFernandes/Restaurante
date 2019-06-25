<?php
	function cadastrarAcompanhamento($acompanhamento,$pratos){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "INSERT INTO acompanhamento (nome, preco_adicional, foto_acompanhamento) VALUES (:nome, :preco_adicional, :foto_acompanhamento)";
			$cadastrar1 = $pdo->prepare($sql);

			$cadastrar1->bindValue(':nome',$acompanhamento->getNome());
			$cadastrar1->bindValue(':preco_adicional',$acompanhamento->getPreco_adicional());
			$cadastrar1->bindValue(':foto_acompanhamento',$acompanhamento->getFoto_acompanhamento());
			$cadastrar1->execute();

			$sql ="SELECT MAX(cod) FROM acompanhamento";
			$coisa = $pdo->prepare($sql);
			$coisa->execute();
			$a = $coisa->fetchALL(PDO::FETCH_ASSOC);
			$cod_coletado = $a[0]["MAX(cod)"];


			for ($i=0; $i < count($pratos); $i++) { 
				$sql = "INSERT INTO prato_possui_acompanhamento (cod_prato,cod_acompanhamento) VALUES (:cod_prato,:cod_acompanhamento)";
				$cadastrar2 = $pdo->prepare($sql);
				$cadastrar2->bindValue(':cod_prato',$pratos[$i]);
				$cadastrar2->bindValue(':cod_acompanhamento',$cod_coletado);
				$cadastrar2->execute();
			}

			header("location:pratosConfig.php?resultado=cadastrado");


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}



	}

	function listarAcompanhamento(){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "SELECT * FROM acompanhamento";
			$listar = $pdo->prepare($sql);
			$listar->execute();
			return $listar->fetchALL(PDO::FETCH_ASSOC);
			header("location:test.php");


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function deleteAcompanhamento($cod){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql1 = "DELETE FROM prato_possui_acompanhamento WHERE cod_acompanhamento = :cod";
			$delete1 = $pdo->prepare($sql1);
			$delete1->bindValue(':cod',$cod);
			$delete1->execute();

			$sql = "DELETE FROM acompanhamento WHERE cod = :cod";

			$delete = $pdo->prepare($sql);
			$delete->bindValue(":cod", $cod);
			$delete->execute();
			header("location:pratosConfig.php?resultado=apagar");

		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function atualizarAcompanhamento($acompanhamento,$pratosCod){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "UPDATE acompanhamento set nome=:nome, preco_adicional=:preco_adicional, foto_acompanhamento=:foto_acompanhamento WHERE cod=:cod" ;

			$atualizar = $pdo->prepare($sql);
			$atualizar->bindValue(':nome',$acompanhamento->getNome());
			$atualizar->bindValue(':preco_adicional',$acompanhamento->getPreco_adicional());
			$atualizar->bindValue(':foto_acompanhamento',$acompanhamento->getFoto_acompanhamento());
			
			$atualizar->bindValue(':cod',$acompanhamento->getCod());
			$atualizar->execute();

			atualizarPrato_acompanhamento($acompanhamento->getCod(),$pratosCod);
			

		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

?>