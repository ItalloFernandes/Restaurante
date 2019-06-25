<?php
		include_once('../model/administrador.php');
		include_once('../controller/administradorDAO.php');
		$administrador = new Administrador;
		session_start();

		
		$resultado = isset($_GET['resultado'])?$_GET['resultado']:"";

        $logout = isset($_POST['logout'])?$_POST['logout']:"";

        if (!empty($logout) AND $logout == "logout") {
                session_unset();             
                session_destroy();

        }

        $login_editar = isset($_POST['login_editar'])?$_POST['login_editar']:"";
        $senha_editar = isset($_POST['senha_editar'])?$_POST['senha_editar']:"";
        $senha_antiga = isset($_POST['senha_antiga'])?$_POST['senha_antiga']:"";

        if(!empty($login_editar) AND !empty($senha_editar) AND !empty($senha_antiga)){
        	if ($senha_antiga == $_SESSION['senha']) {
        		$administrador->setLogin($login_editar);
        		$administrador->setSenha($senha_editar);
        		$administrador->setCod(1);
        		
        		atualizarAdministrador($administrador);

        	}else{
                        header("location:administradorControl.php?resultado=erro");
                }

        }


?>  