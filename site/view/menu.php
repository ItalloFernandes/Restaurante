<?php
        session_start();
        include_once ('../controller/categoriaDAO.php');
        include_once ('../model/categoria.php');

        include_once ('../controller/pratoDAO.php');
        include_once ('../model/prato.php');

        include_once ('../controller/acompanhamentoDAO.php');
        include_once ('../model/acompanhamento.php');

        include_once ('../controller/prato_acompanhamentoDAO.php');
        include_once ('../model/prato_acompanhamento.php');

        $categorias = new Categoria();
        $categorias = listarCategorias();

        $pratos = new Prato();
        $pratos = listarPratos();

        $acompanhamentos = new Acompanhamento();
        $acompanhamentos = listarAcompanhamento();

        $pratos_acompanhamentos = listarPrato_acompanhamentoView();
?>


<!DOCTYPE html>
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


<section class="bg-5 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                                <h5><b></b></h5>
                                <h2 class="mt-30 mb-15">Menu</h2>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>



<section class="bg-lite-blue">
        <div class="container">
                <div class="row">
                        <?php
                                foreach($pratos as $prato){

                        ?>
                        <div class="col-md-6">
                                <div class="sided-90x mb-30 ">
                                        <div class="s-left"><img class="br-3" src="images/pratos/<?=$prato['foto_prato']?>" alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b><?=$prato['nome']?></b><b class="color-primary float-right">R$<?=$prato['preco']?></b></h5>
                                                <p class="pr-70"><?=$prato['ingredientes']?> </p>
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->
                        <?php
                                }
                        ?>                        
                </div><!-- row -->
        </div><!-- container -->
</section>


<section class="story-area bg-seller color-white pos-relative" style="background-attachment: fixed;">
        <div class="pos-bottom triangle-up"></div>
        <div class="pos-top triangle-bottom"></div>
        <div class="container">
                <h4 class="font-30 font-sm-20  center-text mb-25"><?=$restauranteConfig[0]['slogan']?></h4>
        </div><!-- container -->
</section>


<section>
        <div class="container">
                <div class="heading mb-sm-10"><h3>Acompanhamentos</h3></div>
                
                <div class="row">

                <?php
                        $cont = 0;
                        foreach ($acompanhamentos as $acompanhamento) {
                                
                                

                        ?>

                        <div class="col-md-6">
                                <div class="sided-90x mb-30">
                                        <div class="s-left"><img class="br-3" src="images/acompanhamentos/<?=$acompanhamento['foto_acompanhamento']?>" alt="Menu Image"></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b><?=ucfirst($acompanhamento['nome'])?></b></h5>
                                                <p class="pr-70">O preço adicional é: 
                                                        <b class="color-primary float-right">R$<?=$acompanhamento['preco_adicional']?></b>
                                                </p>
                                                <button class="btn" style="font-size: 2vh;"  type="button" data-toggle="collapse" data-target="#collapseExample<?=$cont?>" aria-expanded="false" aria-controls="collapseExample">
                                                   Mostrar Mais
                                                  </button>
                                                </p>
                                                <div class="collapse" id="collapseExample<?=$cont?>">
                                                  <div class="card card-body">
                                                    Pratos que possuem esse acompanhamento:
                                                    <ul class="list-group list-group-flush">
                                                    <?php
                                                        foreach($pratos_acompanhamentos as $p_a){
                                                                if($p_a['cod_acompanhamento'] == $acompanhamento['cod']){
                                                                        foreach($pratos as $prato){
                                                                                if($prato['cod'] == $p_a['cod_prato']){
                                                    ?>
                                                    <h5>
                                                        <li class="list-group-item ">
                                                                <p style="font-size: 1.8vh;">
                                                                        <?=ucfirst($prato['nome'])?>
                                                                        <span class="badge badge-primary badge-pill">Preço:R$<?=$prato['preco']?></span>
                                                                </p>
                                                        </li>
                                                    </h5>
                                                    <?php
                                                                        }
                                                                    }    
                                                                }
                                                        }
                                                    ?>
                                                    </ul>
                                                  </div>
                                                </div>
                                        </div><!--s-right-->

                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->
                        <?php
                        $cont++;
                                }

                        ?>
                       

                      

                        
                </div><!-- row -->
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