<?php
	include_once ("../model/categoria.php");
	include_once ("../controller/categoriaDAO.php");
	include_once ("../controller/pratoDAO.php");

	$aux = 0;
	$aux2 = 0;
	$cod_editar_modal = isset($_POST['cod_editar_modal'])?$_POST['cod_editar_modal']:"";
	$funcao_cod_editar = isset($_POST['funcao_cod_editar'])?$_POST['funcao_cod_editar']:"";
	$nome_editar_modal = isset($_POST['nome_editar_modal'])?$_POST['nome_editar_modal']:"";

	$pratoSelect[] = "";
	$pratos = listarPratos();
	$categorias = listarCategorias();

	$resultado = isset($_GET['resultado'])?$_GET['resultado']:"";
	$pesquisa = isset($_GET['pesquisa'])?$_GET['pesquisa']:"";

	if(!empty($pesquisa)){
			$resultado = listarCategoriasPesquisa($pesquisa);
			if(!empty($resultado)){
				$categorias = $resultado;
			}else{
				header('location:categoriaConfig.php?resultado=nao_achou');
			}	
			
		}

	$nomeCadastro = isset($_POST['nome'])?$_POST['nome']:"";
	$categoria = new Categoria;
	if(!empty($nomeCadastro)){
		$categoria->setNome(strtoupper($nomeCadastro));
		for($i = 0;$i < sizeof($pratos);$i++){
			$valor = isset($_POST['p'.$i])?$_POST['p'.$i]:"";
			if(!empty($valor)){
				$pratoSelect[] = $valor;

			}
		}
		
		cadastrarCategoria($categoria,$pratoSelect);

	}

	$cod_apagar = isset($_POST['cod_apagar'])?$_POST['cod_apagar']:"";

	if(!empty($cod_apagar)){
		deleteCategoria($cod_apagar);
	}

	$cod_editar = isset($_POST['cod_editar'])?$_POST['cod_editar']:"";
	$nome_editar = isset($_POST['nome_editar'])?$_POST['nome_editar']:"";
	

	if(!empty($cod_editar) AND !empty($cod_editar)){
		$categoria->setNome(strtoupper($nome_editar));
		$categoria->setCod($cod_editar);
		$pratoSelect2 = array();
			for($i = 0;$i < sizeof($pratos);$i++){
				$codigo = isset($_POST['p_e'.$i])?$_POST['p_e'.$i]:"";
				if(!empty($codigo)){
					$pratoSelect2[] = $codigo;
					echo($codigo." ");
					print_r($pratoSelect2);
				}
			}
		
		atualizarCategoria($categoria,$pratoSelect2);
		

	}

	

	

?>