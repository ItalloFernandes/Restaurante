<?php
        session_start();
        include_once('functions/promocoesViewFunc.php');
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


<section class="bg-7 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                                <h5><b><?=strtoupper($restauranteConfig[0]['slogan'])?></b></h5>
                                <h3 class="mt-30 mb-15">Promoções</h3>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>


<section class="story-area left-text center-sm-text">
        <div class="container">
                <div class="row">
                                <?php
                                        foreach($promocoes as $promocao){
                                                $cod = $promocao['cod'];
                                                if(in_array($cod, $cod_promocoes_used)){
                                ?>
                        <?php
                        if($test == "true"){
                        ?>
                        <div class="col-md-3 col-lg-6">
                        <?php
                        }else{
                        ?>
                        <div class="col-md-2 col-lg-4">
                        <?php
                        }
                        ?>
                                <div class="mb-50 mb-sm-30 pos-relative">
                                        <h4><a href="#"><b><?=ucfirst($promocao['nome'])?></b></a></h4>
                                        
                                        <div class="pos-relative mb-30 pt-15 oflow-hidden">
                                                <div class="bg-trinagle-primary w-40"></div>
                                                <img style="max-height: 200px" src="images/promocoes/<?=$promocao['foto_promocional']?>" alt="">
                                                <div class="abs-bl font-18 color-white p-30 z-1">
                                                        <h5 class="lh-1"><?=$promocao['porcentagem']?>%</h5>
                                                        <h5 class="lh-1">off</h5>
                                                </div>
                                        </div>
                                        
                                        
                                        <p class="mt-30 color-ash" style="text-align: justify-all;">
                                                <?=ucfirst($promocao['texto_promocional'])?>
                                        </p>
                                        <br>
                                        <h5>Duração:
                                            <p class="color-ash" style="text-align: justify-all;">
                                                <?=ucfirst($promocao['duracao'])?>
                                        </p>
                                        </h5>   
                                        <div class="mb-50 mb-sm-30">
                                                <h5>Pratos Em promoção:</h5>
                                                <ul class="list-group list-group-flush">
                                                        <?php
                                                                foreach($pratos as $prato){
                                                                        if ($prato['cod_promocao'] == $promocao['cod']) {
                                                                                
                                                                        
                                                        ?>
                                                                <h5><li class="list-group-item "><?=ucfirst($prato['nome'])?>
                                                                        <span class="badge badge-primary badge-pill">Preço: <s>R$<?=$prato['preco']?></s> R$<?=newPreco($prato['preco'],$promocao['porcentagem'])?></span>

                                                                </li></h5>
                                                        <?php
                                                                        }
                                                                    }    
                                                                }

                                                        ?>        
                                                </ul>
                                        </div>
                                </div><!--mb-30-->

                        </div><!--col-md-8-->   
                                <?php
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