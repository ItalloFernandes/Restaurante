<?php
	include_once ('../model/restaurante.php');
	include_once ('../controller/restauranteDAO.php');

	$restaurante = new Restaurante;
	$config = listarRestaurante();
	
	$new_nome = isset($_POST['nome_editar'])?$_POST['nome_editar']:"";
	$new_endereco = isset($_POST['endereco_editar'])?$_POST['endereco_editar']:"";
	$new_telefoneFixo = isset($_POST['telefoneFixo_editar'])?$_POST['telefoneFixo_editar']:"";
	$new_telefoneCelular = isset($_POST['telefoneCelular_editar'])?$_POST['telefoneCelular_editar']:"";
	$new_horarioDeFuncionamento = isset($_POST['horarioDeFuncionamento_editar'])?$_POST['horarioDeFuncionamento_editar']:"";
	$new_slogan = isset($_POST['slogan_editar'])?$_POST['slogan_editar']:"";
	$new_email = isset($_POST['email_editar'])?$_POST['email_editar']:"";

	if (!empty($new_nome) AND !empty($new_endereco) AND !empty($new_telefoneFixo) AND !empty($new_telefoneCelular) AND !empty($new_horarioDeFuncionamento) AND !empty($new_slogan) AND !empty($new_email)) {
		
		$restaurante->setNome($new_nome);
		$restaurante->setEndereco($new_endereco);
		$restaurante->setFixo($new_telefoneFixo);
		$restaurante->setCelular($new_telefoneCelular);
		$restaurante->setHorarioDeFuncionamento($new_horarioDeFuncionamento);
		$restaurante->setSlogan($new_slogan);
		$restaurante->setEmail($new_email);
		$restaurante->setCod(1);

		if (isset($_FILES['arquivo_editar']) AND $_FILES['arquivo_editar']['name'] !="") {
				$arquivo_editar = $_FILES['arquivo_editar'];
				if (gerarArquivo($arquivo_editar) != false) {				
					$restaurante->setLogo(gerarArquivo($arquivo_editar));
				}else{
					header('location:restauranteConfig.php?erro=true');
				}

			}else if(isset($_POST['logo_res'])){
				$arquivo_editar = $_POST['logo_res'];
				$restaurante->setLogo($arquivo_editar);
			}

			if($restaurante->getLogo() != $_POST['logo_res']){
				if(move_uploaded_file($_FILES['arquivo_editar']['tmp_name'], "images/".$restaurante->getLogo())){
					unlink("images/".$_POST['logo_res']);
					atualizarRestaurante($restaurante);
				}
			}else{
				atualizarRestaurante($restaurante);
			}

	}


	$image_alterar_nome = isset($_POST['local'])?$_POST['local']:"";
	$image_alterar = isset($_FILES['upload_file'])?$_FILES['upload_file']:"";

	if(!empty($image_alterar_nome) AND !empty($image_alterar)){
		$ext = strchr($image_alterar['name'],'.');
		if(strstr('.jpg', $ext)){
			//unlink("images/estrutura_site".$image_alterar_nome.$ext);
			move_uploaded_file($_FILES['upload_file']['tmp_name'], "images/estrutura_site/".$image_alterar_nome.$ext);
			header('location:restauranteConfig.php?alterado=true');

		}else{
			header('location:restauranteConfig.php?erroIm=true');
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