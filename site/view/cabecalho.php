<?php
        
        include_once ('../controller/restauranteDAO.php');
        include_once ('../model/restaurante.php');

        $restauranteConfig = new Restaurante();
        $restauranteConfig = listarRestaurante();

        $phone = str_replace("-", "", $restauranteConfig[0]["celular"]);
        $phone = str_replace("(", "", $phone);
        $phone = str_replace(")", "", $phone);
        $phone = str_replace(" ", "", $phone);



?>
<header style="position: fixed;">
        <div class="container">
                <a class="logo" href="index.php"><img src="images/<?=$restauranteConfig[0]['logo']?>" alt="Logo"></a>

                <div class="right-area">
                        <h6><a class="plr-20 color-white btn-fill-primary" href="http://api.whatsapp.com/send?1=pt_BR&phone=55<?=$phone?>&text=Olá, gostaria de fazer um pedido.">PEDIDO:<?=$restauranteConfig[0]["fixo"]?></a></h6>
                </div><!-- right-area -->

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

                <ul class="main-menu font-mountainsre" id="main-menu">
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="sobreNos.php">SOBRE NÓS</a></li>
                        <li><a href="menu.php">SERVIÇOS</a></li>
                        <li><a href="promocoes.php">PROMOÇÕES</a></li>
                        <?php
                                if(!empty($_SESSION['login'])){

                        ?>
                        <li><a href="administradorControl.php">AREA DE ADIMINISTRAÇÃO</a></li>
                        <?php
                                }

                        ?>
                </ul>

                <div class="clearfix"></div>
        </div><!-- container -->
</header>