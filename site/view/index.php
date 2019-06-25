<?php
    session_start();
        include_once ('../controller/restauranteDAO.php');
        include_once ('../model/restaurante.php');

        include_once ('../controller/categoriaDAO.php');
        include_once ('../model/categoria.php');

        include_once ('../controller/pratoDAO.php');
        include_once ('../model/prato.php');


        $restauranteConfig = new Restaurante();
        $restauranteConfig = listarRestaurante();

        $categorias = new Categoria();
        $categorias = listarCategorias();

        $pratos = new Prato();
        $pratos = listarPratos();

        


?>
<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Site</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css"/>

        <!-- Stylesheets -->
        <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
        <link href="plugin-frameworks/swiper.css" rel="stylesheet">
        <link href="fonts/ionicons.css" rel="stylesheet">
        <link href="common/styles.css" rel="stylesheet">
        
</head>
<body>

<?php
        include_once ('cabecalho.php');
?>


<section class="bg-1 h-900x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white">

                                <h5><b><?=strtoupper($restauranteConfig[0]['slogan'])?></b></h5>
                                <h1 class="mt-30 mb-15"><?=$restauranteConfig[0]['nome']?></h1>
                                <h5><a href="#menu" class="btn-primaryc plr-25"><b>NOSSO MENU</b></a></h5>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>




<section id="menu">
        <div class="container">
                <div class="heading">
                        <img class="heading-img" src="images/heading_logo.png" alt="">
                        <h2>Nosso Menu</h2>
                </div>

                <div class="row">
                        <div class="col-sm-12">
                                <ul class="selecton brdr-b-primary mb-70">
                                        <li><a class="active" href="#" data-select="*"><b>TODOS</b></a></li>                                        
                                        <?php
                                                foreach($categorias as $categoria){
                                        ?>
                                        <li><a href="#" data-select="<?=$categoria['nome']?>"><b><?=$categoria['nome']?></b></a></li>
                                        <?php
                                                }
                                        ?>
                                </ul>
                        </div><!--col-sm-12-->
                </div><!--row-->

                <div class="row">
                        <?php
                                 foreach($pratos as $prato){
                                        foreach($categorias as $categoria){
                                                if($prato['cod_categoria'] == $categoria['cod']){

                                                        $categoriaPrato = $categoria['nome'];


                                                //$categoriaPrato = $categorias[$prato['cod_categoria']]['nome'];

                        ?>

                        <div class="col-md-6 food-menu <?=$categoriaPrato?>">
                                <div class="sided-90x mb-30 ">
                                        <div class="s-left"><img class="br-3 img-thumbnail" src="images/pratos/<?=$prato['foto_prato']?>" alt="Menu Image"></div><!--s-left-->


                                        <div class="s-right">
                                                <h5 class="mb-10"><b><?=$prato['nome']?></b><b class="color-primary float-right">R$<?=$prato['preco']?></b></h5>
                                                <p class="pr-70"><?=$prato['ingredientes']?></p>
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->
                        <?php
                                                }
                                        }

                                }

                        ?>

                        
                </div><!-- row -->

                <h6 class="center-text mt-40 mt-sm-20 mb-30"><a href="#" class="btn-primaryc plr-25"><b>VOLTAR AO HOME</b></a></h6>
        </div><!-- container -->
</section>

<?php
        include_once ('rodape.php');
?>

<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/swiper.js"></script>
<script src="common/scripts.js"></script>

</body>
</html>