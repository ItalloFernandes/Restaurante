<?php
	include_once ("../model/funcionario.php");
	include_once ("../controller/funcionarioDAO.php");

	$funcionarios = listarFuncionario();

	$pesquisa = isset($_GET['pesquisa'])?$_GET['pesquisa']:"";

	if(!empty($pesquisa)){
			$resultado = listarFuncionariosPesquisa($pesquisa);
			if(!empty($resultado)){
				$funcionarios = $resultado;
			}else{
				header('location:funcionariosConfig.php?resultado=nao_achou');
			}	
			
		}

	$resultado = isset($_GET['resultado'])?$_GET['resultado']:"";

	$acao = isset($_POST['acao'])?$_POST['acao']:"";
	$cod_apagar = isset($_POST['cod_apagar'])?$_POST['cod_apagar']:"";
	$foto_apagar = isset($_POST['foto_apagar'])?$_POST['foto_apagar']:"";

	if(!empty($acao) AND $acao == "apagar" AND !empty($cod_apagar) AND !empty($foto_apagar) AND is_file("images/funcionarios/".$foto_apagar)){
			
			unlink("images/funcionarios/".$foto_apagar);
			deleteFuncionario($cod_apagar);

	}

	//cadastro
	$nome = isset($_POST['nome'])?$_POST['nome']:"";
	$funcao = isset($_POST['funcao'])?$_POST['funcao']:"";
	$foto = isset($_FILES['arquivo'])?$_FILES['arquivo']:"";

	if (!empty($nome) AND !empty($funcao) AND !empty($foto)) {
		$funcionario = new Funcionario;
		$funcionario->setNome($nome);
		$funcionario->setFuncao($funcao);
		if (gerarArquivo($foto) != false) {
			$funcionario->setFoto(gerarArquivo($foto));
			if (move_uploaded_file($_FILES['arquivo']['tmp_name'], "images/funcionarios/".$funcionario->	getFoto())) {
				cadastrarFuncionario($funcionario);;
			}
		}else{
			header('location:funcionariosConfig.php?erro=true');
		}
	}

	$nome_editar = isset($_POST['nome_editar'])?$_POST['nome_editar']:"";
	$cod_editar = isset($_POST['cod_editar'])?$_POST['cod_editar']:"";
	$funcao_editar = isset($_POST['funcao_editar'])?$_POST['funcao_editar']:"";

	if(!empty($nome_editar) AND !empty($funcao_editar)){
		$funcionario_edit = new Funcionario;
		$funcionario_edit->setCod($cod_editar);
		$funcionario_edit->setNome($nome_editar);
		$funcionario_edit->setFuncao($funcao_editar);

		if (isset($_FILES['arquivo_editar']) AND $_FILES['arquivo_editar']['name'] !="") {
				$arquivo_editar = $_FILES['arquivo_editar'];
				if(gerarArquivo($arquivo_editar) != false){
					$funcionario_edit->setFoto(gerarArquivo($arquivo_editar));
				}else{
					header('location:funcionariosConfig.php?erro=true');
				}

			}else if(isset($_POST['foto_res'])){
				$arquivo_editar = $_POST['foto_res'];
				$funcionario_edit->setFoto($arquivo_editar);
			}

			if($funcionario_edit->getFoto() != $_POST['foto_res']){
				if(move_uploaded_file($_FILES['arquivo_editar']['tmp_name'], "images/funcionarios/".$funcionario_edit->getFoto())){
					unlink("images/funcionarios/".$_POST['foto_res']);
					atualizarFuncionario($funcionario_edit);
				}
			}else{
				atualizarFuncionario($funcionario_edit);
			}

	}




	function gerarArquivo($arquivo){

			$ext = strchr($arquivo['name'],'.');
			strtolower($ext);
			if(strstr('.jpg;.jpeg;.gif;.png', $ext)){
				$novo_nome=sha1(microtime()).$ext;
			//;
				return $novo_nome;
			}else{
				return false;
			}

		}
?>