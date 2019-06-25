<?php
    session_start();
    include_once ('../controller/funcionarioDAO.php');
    include_once ('../model/funcionario.php');

    $funcionarios = listarFuncionario();



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


<section class="bg-4 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                                <h5><b><?=strtoupper($restauranteConfig[0]['slogan'])?></b></h5>
                                <h2 class="mt-30 mb-15">Sobre nossa Empresa</h2>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>


<section class="story-area left-text center-sm-text">
        <div class="container">

                <div class="row">
                        <div class="col-md-6"><img style="max-height: 400px;max-width: 600px" class="mb-30" src="images/estrutura_site/sobre_nos1.jpg" alt=""></div>
                        <div class="col-md-6"><img class="mb-30" style="max-height: 400px;max-width: 600px" src="images/estrutura_site/sobre_nos2.jpg" alt=""></div>
                        <div class="col-md-12">
                                <div class="mt-50 mt-sm-30 mb-50 mb-sm-30 center-text"> <h2>O que é o <?= $restauranteConfig[0]['nome']?></h2> </div>

                                <h5 class="center-text mb-50 mb-sm-30 plr-25"><?= $restauranteConfig[0]['slogan']?></h5>
                        </div>
                        <div class="col-md-6">
                                <p class="mb-15">Nós somos o <?= $restauranteConfig[0]['nome']?>, estamos localizados na <?= $restauranteConfig[0]['endereco']?>. Funcionamos no horario de <?= $restauranteConfig[0]['horarioDeFuncionamento']?>.</p>
                        </div><!-- col-md-6 -->
                        <div class="col-md-6">
                                <p class="mb-15">Nossos numeros para contato são <?= $restauranteConfig[0]['fixo']?> para fixo e o <?= $restauranteConfig[0]['celular']?> para celular.</p>
                        </div><!-- col-md-6 -->

                       
                </div><!-- row -->

                <h6 class="center-text mt-40 mt-sm-30 mb-20">
                        <a href="index.php#menu" class="btn-primaryc plr-25 mb-10 mlr-5"><b>MENU</b></a>
                        <a href="http://api.whatsapp.com/send?1=pt_BR&phone=55<?=$phone?>&text=Olá, gostaria de fazer um pedido." class="btn-primaryc secondary plr-50 mlr-5 mb-10"><b>PEDIR AGORA</b></a>
                </h6>

        </div><!-- container -->
</section>

<section class="story-area bg-seller color-white pos-relative" style="background-attachment: fixed;">
        <div class="pos-bottom triangle-up"></div>
        <div class="pos-top triangle-bottom"></div>
        <div class="container">
                <div class="heading">
                        <img class="heading-img" src="images/heading_logo.png" alt="">
                        <h2>Funcionários</h2>
                </div>

                <div class="swiper-container" data-slide-effect="slide" data-autoheight="false" data-swiper-speed="500" data-swiper-margin="25" data-swiper-slides-per-view="3"
                     data-swiper-breakpoints="true" data-scrollbar="true" data-swiper-loop="true" data-swpr-responsive="[1, 2, 2, 2]">

                        <div class="swiper-wrapper pb-90 pb-sm-60 left-text center-sm-text">
                            <?php
                                foreach($funcionarios as $funcionario){
                            ?>
                                <div class="swiper-slide">
                                        <h3><?=ucfirst($funcionario['funcao'])?></h3>
                                        <p class="color-ash mb-50 mb-sm-30 mt-20"><img style="width: 200px;height: 250px;" src="images/funcionarios/<?=$funcionario['foto']?>"></p>         
                                        <h4 class="pb-90">
                                            <?=ucfirst($funcionario['nome'])?>
                                        </h4>
                                </div><!-- swiper-slide -->
                            <?php
                                }
                            ?>
                                
                        </div><!-- swiper-wrapper -->

                        <div class="swiper-pagination"></div>
                </div><!-- swiper-container -->
        </div><!-- container -->
</section>

<section class="counter-section section center-text" id="counter">
        <div class="container">
                <div class="row">
                        
                </div><!-- row-->
        </div><!-- container-->
</section><!-- counter-->






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