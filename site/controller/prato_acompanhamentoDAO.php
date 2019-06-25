<?php
	function cadastrarPrato_acompanhamento($cod_prato,$cod_acompanhamento){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "INSERT INTO prato_possui_acompanhamento (cod_prato, cod_acompanhamento) VALUES (:cod_prato, :cod_acompanhamento)";
			$cadastrar = $pdo->prepare($sql);

			$cadastrar->bindValue(':cod_prato',$cod_prato);
			$cadastrar->bindValue(':cod_acompanhamento',$cod_acompanhamento);
			$cadastrar->execute();
			


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}



	}

	function listarPrato_acompanhamento($cod){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "SELECT * FROM prato_possui_acompanhamento WHERE cod_acompanhamento = :cod";
			$listar = $pdo->prepare($sql);
			$listar->bindValue(':cod',$cod);
			$listar->execute();
			return $listar->fetchALL(PDO::FETCH_ASSOC);
			


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function listarPrato_acompanhamentoView(){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "SELECT * FROM prato_possui_acompanhamento";
			$listar = $pdo->prepare($sql);
			$listar->execute();
			return $listar->fetchALL(PDO::FETCH_ASSOC);
			


		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}



	function deletePrato_acompanhamento($cod){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "DELETE FROM prato_possui_acompanhamento WHERE cod = :cod";

			$delete = $pdo->prepare($sql);
			$delete->bindValue(":cod", $cod);
			$delete->execute();
			header("location:test.php");

		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function atualizarPrato_acompanhamento($cod,$pratosCod){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql1 = "SELECT * FROM prato_possui_acompanhamento WHERE cod_acompanhamento = :cod";
			$take_pratos = $pdo->prepare($sql1);
			$take_pratos->bindValue(':cod',$cod);
			$take_pratos->execute();

			$pratos_Ac = $take_pratos->fetchALL(PDO::FETCH_ASSOC); 

			if(!empty($pratosCod)){
				$test = "false";
				



				foreach($pratos_Ac as $prato_ac){

					$pes = $prato_ac['cod_prato'];


					if(in_array($prato_ac['cod_prato'], $pratosCod)){
						$key = array_search($pes, $pratosCod);
						unset($pratosCod[$key]);
						
							
						
					}else{
						
						$test = "true";
					}
					
					if($test == "true"){
						$sql2 = "DELETE FROM prato_possui_acompanhamento WHERE cod_prato = :cod_prato AND cod_acompanhamento = :cod_acompanhamento";
						$req1 = $pdo->prepare($sql2);
						$req1->bindValue(':cod_prato',$prato_ac['cod_prato']);
						$req1->bindValue(':cod_acompanhamento',$cod);
						$req1->execute();

					}

					
				}
				

			}else{
				$slq3 = "DELETE FROM prato_possui_acompanhamento WHERE cod_acompanhamento = :cod_acompanhamento";
				$erase_all = $pdo->prepare($slq3);
				$erase_all->bindValue(":cod_acompanhamento",$cod);
				$erase_all->execute();
			}
			
			if(!empty($pratosCod)){
				/*for($i = 0;$i<count($pratosCod);$i++){
					
				}*/

				foreach($pratosCod as $pratoCodC){
					cadastrarPrato_acompanhamento($pratoCodC,$cod);
					
				}
				
			}

			header("location:pratosConfig.php?resultado=alterado");
			/*$sql = "UPDATE prato_possui_acompanhamento set cod_prato=:cod_prato, cod_acompanhamento=:cod_acompanhamento WHERE cod=:cod" ;

			$atualizar = $pdo->prepare($sql);
			$atualizar->bindValue(':cod_prato',$prato_acompanhamento->getCod_prato());
			$atualizar->bindValue(':cod_acompanhamento',$prato_acompanhamento->getCod_acompanhamento());
			

			
			$atualizar->bindValue(':cod',$prato_acompanhamento->getCod());
			$atualizar->execute();
			header("location:test.php");
			*/
		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

?>