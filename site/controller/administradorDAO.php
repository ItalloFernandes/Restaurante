<?php
	function atualizarAdministrador($administrador){
		try{
			include_once("../config/conexao.php");
			$conexao = new Conexao();
			$pdo = $conexao->conecta();

			$sql = "UPDATE administrador set login=:login, senha=:senha 
			WHERE cod=:cod";
			$atualizar = $pdo->prepare($sql);
			$atualizar->bindValue(':login',$administrador->getLogin());
			$atualizar->bindValue(':senha',$administrador->getSenha());
			$atualizar->bindValue(':cod',$administrador->getCod());
			$atualizar->execute();
			$_SESSION['login'] = $administrador->getLogin();
			$_SESSION['senha'] = $administrador->getSenha();
			header("location:administradorControl.php?resultado=alterado");

		}catch(PDOException $e){
			echo("erro: ".$e->getMenssage());
		}
	}

	function logar($administrador){
	try{
	include_once("../config/Conexao.php");
	$conexao = new Conexao();
	$pdo = $conexao->conecta();

	$sql = "SELECT * FROM administrador WHERE login = :login AND senha = :senha";
	$logar = $pdo->prepare($sql);
	$logar->bindValue(':login',$administrador->getLogin());
	$logar->bindValue(':senha',$administrador->getSenha());
	$logar->execute();
	return $logar->fetchALL(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		echo 'Erro:' . $e->getMenssage();
	}
	
}


?>