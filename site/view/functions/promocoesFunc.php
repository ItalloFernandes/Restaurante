<?php
	include_once ('../controller/promocaoDAO.php');
	include_once ('../model/promocao.php');

	$promocoes = listarPromocaosAdm();

	$promocao = new promocao;

	$pesquisa = isset($_GET['pesquisa'])?$_GET['pesquisa']:"";

	if(!empty($pesquisa)){
			$resultado = listarPromocoesPesquisa($pesquisa);
			if(!empty($resultado)){
				$promocoes = $resultado;
			}else{
				header('location:promocoesConfig.php?resultado=nao_achou');
			}	
			
		}

	$resultado = isset($_GET['resultado'])?$_GET['resultado']:"";

	$nome = isset($_POST['nome'])?$_POST['nome']:"";
	$duracao = isset($_POST['duracao'])?$_POST['duracao']:"";
	$porcentagem = isset($_POST['porcentagem'])?$_POST['porcentagem']:"";
	$texto_promocional = isset($_POST['texto_promocional'])?$_POST['texto_promocional']:"";
	$foto = isset($_FILES['arquivo'])?$_FILES['arquivo']:"";

	if(!empty($nome) AND !empty($duracao) AND !empty($porcentagem) AND !empty($foto)){
		$promocao->setNome($nome);
		$promocao->setDuracao($duracao);
		$promocao->setPorcentagem($porcentagem);
		$promocao->setTexto_promocional($texto_promocional);

		if(gerarArquivo($foto) != false){
			$promocao->setFoto_promocional(gerarArquivo($foto));
			if (move_uploaded_file($_FILES['arquivo']['tmp_name'], "images/promocoes/".$promocao->getFoto_promocional())) {
				cadastrarPromocao($promocao);
			}

		}else{
			header('location:promocoesConfig.php?erro=true');
		}


	}


	$acao = isset($_POST['acao'])?$_POST['acao']:"";
	$cod_apagar = isset($_POST['cod_apagar'])?$_POST['cod_apagar']:"";
	$foto_apagar = isset($_POST['foto_apagar'])?$_POST['foto_apagar']:"";

	if(!empty($acao) AND !empty($cod_apagar) AND !empty($foto_apagar) AND $acao == "apagar" AND is_file("images/promocoes/".$foto_apagar)){
		
		unlink("images/promocoes/".$foto_apagar);
			deletePromocao($cod_apagar);
	}

	$promocao_editar = new promocao;

	$cod_editar = isset($_POST['cod_editar'])?$_POST['cod_editar']:"";
	$nome_editar = isset($_POST['nome_editar'])?$_POST['nome_editar']:"";
	$duracao_editar = isset($_POST['duracao_editar'])?$_POST['duracao_editar']:"";
	$porcentagem_editar = isset($_POST['porcentagem_editar'])?$_POST['porcentagem_editar']:"";
	$texto_promocional_editar = isset($_POST['texto_promocional_editar'])?$_POST['texto_promocional_editar']:"";

	if(!empty($nome_editar) AND !empty($duracao_editar) AND !empty($porcentagem_editar) AND !empty($cod_editar)){
		$promocao_editar->setCod($cod_editar);
		$promocao_editar->setNome($nome_editar);
		$promocao_editar->setDuracao($duracao_editar);
		$promocao_editar->setPorcentagem($porcentagem_editar);
		$promocao_editar->setTexto_promocional($texto_promocional_editar);


		if (isset($_FILES['arquivo_editar']) AND $_FILES['arquivo_editar']['name'] !="") {
				$arquivo_editar = $_FILES['arquivo_editar'];
				if(gerarArquivo($arquivo_editar) != false){
					$promocao_editar->setFoto_promocional(gerarArquivo($arquivo_editar));
				}else{
					header('location:promocoesConfig.php?erro=true');
				}

			}else if(isset($_POST['foto_res'])){
				$arquivo_editar = $_POST['foto_res'];
				$promocao_editar->setFoto_promocional($arquivo_editar);
			}

			if($promocao_editar->getFoto_promocional() != $_POST['foto_res']){
				if(move_uploaded_file($_FILES['arquivo_editar']['tmp_name'], "images/promocoes/".$promocao_editar->getFoto_promocional())){
					unlink("images/promocoes/".$_POST['foto_res']);
					atualizarPromocao($promocao_editar);
				}
			}else{
				atualizarPromocao($promocao_editar);
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