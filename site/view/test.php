<?php
	
	include_once("../controller/pratoDAO.php");
	include_once("../controller/categoriaDAO.php");

	include_once('../model/prato.php');
	include_once('../model/categoria.php');

	$pratot = new Prato();
	$cat = new Categoria();


	$nome = isset($_POST['nome'])?$_POST['nome']:"";
	$preco= isset($_POST['preco'])?$_POST['preco']:"";
	$ingredientes = isset($_POST['ingredientes'])?$_POST['ingredientes']:"";
	$promocao = isset($_POST['promocao'])?$_POST['promocao']:"";

	$nomeDelete = isset($_POST['nomeDelete'])?$_POST['nomeDelete']:"";

	if(!empty($nomeDelete)){
		/*$lista = listarPrato();
		foreach($lista as $prato){
			if( $prato['nome'] == $nomeDelete){
				$pratot->setCod($prato['cod']);
				deletePrato($pratot->getCod());

			}
		}*/

		$cat->setNome($nomeDelete);
		cadastrarCategoria($cat);

	}

	print_r(listarCategorias());
	if(!empty($nome)){
		$pratot->setNome($nome);
		$pratot->setIngredientes($ingredientes);
		$pratot->setpreco($preco);
		$pratot->setpromocao($promocao);
		cadastrarPrato($pratot);
	
	}

	$lista = listarPrato();
	

?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<form method="POST">
			<input type="text" name="nome" placeholder="Nome">
			<input type="number" name="preco" placeholder="Preco">
			<input type="text" name="ingredientes" placeholder="ingredientes">
			<input type="text" name="promocao" placeholder="Promocao">
			<input type="submit" value="Enviar">
		</form>

		<form method="POST">
			<input type="text" name="nomeDelete" placeholder="NomeDoPrato">
			<input type="submit" value="Enviar">
		</form>

	</body>
</html>