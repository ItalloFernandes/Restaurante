<?php
	function cadastrarCategoria($categoria,$pratos){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();


			$sql = "INSERT INTO categoria (nome) VALUES (:nome)";
			$cadastrar = $pdo->prepare($sql);
			$cadastrar->bindValue(':nome',$categoria->getNome());
			$cadastrar->execute();

			$sql ="SELECT MAX(cod) FROM categoria";
			$coisa = $pdo->prepare($sql);
			$coisa->execute();
			$a = $coisa->fetchALL(PDO::FETCH_ASSOC);
			$cod_coletado = $a[0]["MAX(cod)"];
			
			
			

			
			for ($i=0; $i < count($pratos); $i++) { 
				$sql = "UPDATE prato SET cod_categoria = :cod_categoria WHERE cod = :cod";
				$alterar = $pdo->prepare($sql);
				$alterar->bindValue(':cod_categoria',$cod_coletado);
				$alterar->bindValue(':cod',$pratos[$i]);
				$alterar->execute();
			

			}

			
			header("location:categoriaConfig.php?resultado=cadastrado");


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}


	}

	function listarCategorias(){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "SELECT * FROM categoria";
			$listar = $pdo->prepare($sql);
			$listar->execute();
			return $listar->fetchALL(PDO::FETCH_ASSOC);
			header("location:test.php");


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function listarCategoriasPesquisa($pesquisa){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "SELECT * FROM categoria WHERE nome = :nome";
			$listar = $pdo->prepare($sql);
			$listar->bindValue(':nome',$pesquisa);
			$listar->execute();
			return $listar->fetchALL(PDO::FETCH_ASSOC);
			header("location:categoriaConfig.php");


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function deleteCategoria($cod){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "UPDATE prato SET cod_categoria = NULL WHERE cod_categoria=:cod";
			$pegarPratos = $pdo->prepare($sql);
			$pegarPratos->bindValue(":cod",$cod);
			$pegarPratos->execute();

			$sql = "DELETE FROM categoria WHERE cod = :cod";

			$delete = $pdo->prepare($sql);
			$delete->bindValue(":cod", $cod);
			$delete->execute();
			header("location:categoriaConfig.php?resultado=apagado");

		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function atualizarCategoria($categoria,$pratos){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();
			$sql1 = "SELECT * FROM prato WHERE cod_categoria = :cod_categoria";
			$req1 = $pdo->prepare($sql1);
			$req1->bindValue(':cod_categoria',$categoria->getCod());
			$req1->execute();
			$pratosBD = $req1->fetchALL(PDO::FETCH_ASSOC);

			if(!empty($pratos)){
				$test = "false";
				foreach ($pratosBD as $pratoBD) {
					
						if(in_array($pratoBD['cod'], $pratos)){
								
						}else{
							$test = "true";
							/*
							break;*/
						}
					
					
					if($test == "true"){
						$sql2 = "UPDATE prato SET cod_categoria = NULL WHERE cod = :cod";
						$req2 = $pdo->prepare($sql2);
						$req2->bindValue(":cod",$pratoBD['cod']);
						$req2->execute();
						$test = "false";
					}
				}		
			}
			else{
				$sql5 = "UPDATE prato SET cod_categoria = NULL WHERE cod_categoria = :cod_categoria";
					$req5 = $pdo->prepare($sql5);
					$req5->bindValue(':cod_categoria',$categoria->getCod());
					$req5->execute();
			}

			for($i = 0;$i < count($pratos);$i++){
					$sql3 = "UPDATE prato SET cod_categoria = :cod_categoria WHERE cod = :cod";
					$req3 = $pdo->prepare($sql3);
					$req3->bindValue(':cod_categoria',$categoria->getCod());
					$req3->bindValue(':cod',$pratos[$i]);
					$req3->execute();
			}	



			$sql4 = "UPDATE categoria set nome=:nome WHERE cod=:cod" ;
			
			$req4 = $pdo->prepare($sql4);
			$req4->bindValue(':nome',$categoria->getNome());
			$req4->bindValue(':cod',$categoria->getCod());
			$req4->execute();
			

			header("location:categoriaConfig.php?resultado=alterado");

		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

?>