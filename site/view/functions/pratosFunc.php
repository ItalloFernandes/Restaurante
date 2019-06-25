<?php
		include_once ("../model/prato.php");
		include_once ("../controller/pratoDAO.php");

		include_once ("../model/promocao.php");
		include_once ("../controller/promocaoDAO.php");

		include_once ("../model/categoria.php");
		include_once ("../controller/categoriaDAO.php");

		include_once ("../model/acompanhamento.php");
		include_once ("../controller/acompanhamentoDAO.php");

		include_once ("../model/acompanhamento.php");
		include_once ("../controller/acompanhamentoDAO.php");

		include_once ("../model/prato_acompanhamento.php");
		include_once ("../controller/prato_acompanhamentoDAO.php");

		$pesquisa = isset($_GET['pesquisa'])?$_GET['pesquisa']:"";
		
		$pratos = listarPratos();


		//PAGINAÇÃO

		$quantidade = 4;
		$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;

		$inicio = ($quantidade * $pagina) - $quantidade;

		$pratosPaginacao = listarPratosPaginacao($inicio,$quantidade);

		$qrtotal = listarPratosPaginacaoTotal();
		$numTotal   = $qrtotal;
		$totalPagina= ceil($numTotal/$quantidade);

		$exibir = 3;

		$anterior  = (($pagina - 1) == 0) ? 1 : $pagina - 1;
		$posterior = (($pagina+1) >= $totalPagina) ? $totalPagina : $pagina+1;


		if(!empty($pesquisa)){
			$resultado = listarPratosPesquisa($pesquisa);
			if(!empty($resultado)){
				$pratosPaginacao = $resultado;
			}else{
				header('location:pratosConfig.php?resultado=nao_achou');
			}	
			
		}

		function promoCatch($prato){
			$promocoes = listarPromocaos();
			if(!empty($promocoes)){
				foreach ($promocoes as $promocao) {
					if($prato['cod_promocao'] == $promocao['cod']){
						if(!is_null($promocao['porcentagem'])){
							echo($promocao['nome']." ".$promocao['porcentagem']."%");
						}else{
							echo($promocao['nome']." ".$promocao['porcentagem']);
						}
						break;
					}else{
						
					}
				}
			}
			else{
				echo("Sem promoção");
			}	
		}

		function categCatch($prato){
			$categorias = listarCategorias();

			if(!empty($categorias)){
				foreach ($categorias as $categoria) {
					if($prato['cod_categoria'] == $categoria['cod']){
						echo($categoria['nome']);
					}else{
						echo("");
					}
				}
			}
			else{
				echo("Sem categoria");
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

		//Area para Apagar
		$acao = isset($_GET['acao'])?$_GET['acao']:"";
		$cod_apagar = isset($_GET['cod_apagar'])?$_GET['cod_apagar']:"";
		$foto_prato_apagar = isset($_GET['foto_prato_apagar'])?$_GET['foto_prato_apagar']:"";
		$resultado = isset($_GET['resultado'])?$_GET['resultado']:"";

		if(!empty($acao) AND $acao == "apagar" AND !empty($cod_apagar) AND !empty($foto_prato_apagar) AND is_file("images/pratos/".$foto_prato_apagar)){
			
			unlink("images/pratos/".$foto_prato_apagar);
			deletePrato($cod_apagar);

		}

		//Area para Cadastrar
		$nome = isset($_POST['nome'])?$_POST['nome']:"";
		$ingredientes = isset($_POST['ingredientes'])?$_POST['ingredientes']:"";
		$preco = isset($_POST['preco'])?floatval($_POST['preco']):"";
		$promocao = isset($_POST['promocao'])?intval($_POST['promocao']):"";
		$categoria = isset($_POST['categoria'])?intval($_POST['categoria']):"";
		$arquivo = isset($_FILES['arquivo'])?$_FILES['arquivo']:"";

		if(!empty($nome) AND !empty($ingredientes) AND !empty($preco) AND !empty($promocao) AND !empty($categoria) AND !empty($arquivo)){
			$prato = new Prato();

			$prato->setNome($nome);
			$prato->setIngredientes($ingredientes);
			$prato->setPreco($preco);
			$prato->setCod_promocao($promocao);
			$prato->setCod_categoria($categoria);
			if(gerarArquivo($arquivo) != false){
				$prato->setFoto_prato(gerarArquivo($arquivo));
			
				if (move_uploaded_file($_FILES['arquivo']['tmp_name'], "images/pratos/".$prato->getFoto_prato())) {
					cadastrarPrato($prato);
				}
			}else{
				header('location:pratosConfig.php?erro=true');
			}
			

		}

		//Area para editar
		
		$cod_editar = isset($_POST['cod_editar'])?$_POST['cod_editar']:"";
		$nome_editar = isset($_POST['nome_editar'])?$_POST['nome_editar']:"";
		$ingredientes_editar = isset($_POST['ingredientes_editar'])?$_POST['ingredientes_editar']:"";
		$preco_editar = isset($_POST['preco_editar'])?floatval($_POST['preco_editar']):"";
		$promocao_editar = isset($_POST['promocao_editar'])?intval($_POST['promocao_editar']):"";
		$categoria_editar = isset($_POST['categoria_editar'])?intval($_POST['categoria_editar']):"";

		

		if (!empty($cod_editar) AND !empty($nome_editar) AND !empty($ingredientes_editar) AND !empty($preco_editar) AND !empty($promocao_editar) AND !empty($categoria_editar)) {

			$prato_Edit = new Prato();
			$prato_Edit->setCod($cod_editar);
			$prato_Edit->setNome($nome_editar);
			$prato_Edit->setIngredientes($ingredientes_editar);
			$prato_Edit->setPreco($preco_editar);
			$prato_Edit->setCod_promocao($promocao_editar);
			$prato_Edit->setCod_categoria($categoria_editar);



			if (isset($_FILES['arquivo_editar']) AND $_FILES['arquivo_editar']['name'] !="") {
				$arquivo_editar = $_FILES['arquivo_editar'];
				if(gerarArquivo($arquivo_editar) != false){
					$prato_Edit->setFoto_prato(gerarArquivo($arquivo_editar));
				}else{
					header('location:pratosConfig.php?erro=true');
				}

			}else if(isset($_POST['foto_prato_res'])){
				$arquivo_editar = $_POST['foto_prato_res'];
				$prato_Edit->setFoto_prato($arquivo_editar);
			}

			if($prato_Edit->getFoto_prato() != $_POST['foto_prato_res']){
				if(move_uploaded_file($_FILES['arquivo_editar']['tmp_name'], "images/pratos/".$prato_Edit->getFoto_prato())){
					unlink("images/pratos/".$_POST['foto_prato_res']);
					atualizarPrato($prato_Edit);
				}
			}else{
				atualizarPrato($prato_Edit);
			}
		}



		//AREA DOS ACOMPANHAMENTOS
		$acompanhamentos = listarAcompanhamento();
		$aux = 0;
		$aux2 = 0;
		
		$nomeAc = isset($_POST['nomeAc'])?$_POST['nomeAc']:"";
		$preco_adicionalAc = isset($_POST['preco_adicionalAc'])?$_POST['preco_adicionalAc']:"";
		$foto_acompanhamento = isset($_FILES['arquivoAc'])?$_FILES['arquivoAc']:"";
		$acompanhamento = new Acompanhamento;
		$pratoSelectAc = array();
			for($i = 0;$i < sizeof($pratos);$i++){
				$codigo = isset($_POST['p_ac'.$i])?$_POST['p_ac'.$i]:"";
				if(!empty($codigo)){
					$pratoSelectAc[] = $codigo;
				}
			}

		if(!empty($nomeAc) AND !empty($preco_adicionalAc) AND !empty($foto_acompanhamento)){
			$acompanhamento->setNome($nomeAc);
			$acompanhamento->setPreco_adicional($preco_adicionalAc);
			if(gerarArquivo($foto_acompanhamento) != false){
				$acompanhamento->setFoto_acompanhamento(gerarArquivo($foto_acompanhamento));
				if (move_uploaded_file($_FILES['arquivoAc']['tmp_name'], "images/acompanhamentos/".$acompanhamento->getFoto_acompanhamento())) {
					cadastrarAcompanhamento($acompanhamento,$pratoSelectAc);
				}
			}
		}

		$cod_apagarAc = isset($_GET['cod_apagarAc'])?$_GET['cod_apagarAc']:"";
		$foto_acompanhamento_apagar = isset($_GET['foto_acompanhamento_apagar'])?$_GET['foto_acompanhamento_apagar']:"";

		if(!empty($cod_apagarAc) AND !empty($foto_acompanhamento_apagar) AND is_file("images/acompanhamentos/".$foto_acompanhamento_apagar)){
			unlink("images/acompanhamentos/".$foto_acompanhamento_apagar);
			deleteAcompanhamento($cod_apagarAc);
		}


		$codAc_editar = isset($_POST['codAc_editar'])?$_POST['codAc_editar']:"";
		$cods  = array();
		if(!empty($codAc_editar)){

			$pratos_acompanhamentos = listarPrato_acompanhamento($codAc_editar);
			foreach($pratos_acompanhamentos as $pt_a){
				$cods[] = $pt_a['cod_prato'];
			}
			
		}




		$codAc_editarAll = isset($_POST['codAc_editarAll'])?$_POST['codAc_editarAll']:"";
		$nomeAc_editar = isset($_POST['nomeAc_editar'])?$_POST['nomeAc_editar']:"";
		$precoAc_editar = isset($_POST['precoAc_editar'])?$_POST['precoAc_editar']:"";
		
		
		$pratoSelectAc_editar = array();
		for($i = 0;$i < sizeof($pratos);$i++){
			$codigo = isset($_POST['p_ace'.$i])?$_POST['p_ace'.$i]:"";
				if(!empty($codigo)){
					$pratoSelectAc_editar[] = $codigo;
				}
		}

		if(!empty($nomeAc_editar) AND !empty($precoAc_editar)){
			$acompanhamento_edit = new Acompanhamento;
			$acompanhamento_edit->setCod($codAc_editarAll);
			$acompanhamento_edit->setNome($nomeAc_editar);
			$acompanhamento_edit->setPreco_adicional($precoAc_editar);

			if(isset($_FILES['arquivoAc_editar']) AND $_FILES['arquivoAc_editar']['name'] !=""){
				$fotoAc_editar = isset($_FILES['arquivoAc_editar'])?$_FILES['arquivoAc_editar']:"";
				if(gerarArquivo($fotoAc_editar) != false){
					$acompanhamento_edit->setFoto_acompanhamento(gerarArquivo($fotoAc_editar));
				}else{
					header('location:pratosConfig.php?erro=true');
				}
			}else if (isset($_POST['foto_Ac_res'])){
				$acompanhamento_edit->setFoto_acompanhamento($_POST['foto_Ac_res']);
			}


			if($acompanhamento_edit->getFoto_acompanhamento() != $_POST['foto_Ac_res']){
				if(move_uploaded_file($_FILES['arquivoAc_editar']['tmp_name'], "images/acompanhamentos/".$acompanhamento_edit->getFoto_acompanhamento())){
					unlink("images/acompanhamentos/".$_POST['foto_Ac_res']);
					atualizarAcompanhamento($acompanhamento_edit,$pratoSelectAc_editar);
				}
			}else{
				atualizarAcompanhamento($acompanhamento_edit,$pratoSelectAc_editar);
			}


		}



?>