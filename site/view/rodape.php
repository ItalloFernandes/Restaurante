<?php
        include_once ('../controller/restauranteDAO.php');
        include_once ('../model/restaurante.php');

        $restauranteConfig = new Restaurante();
        $restauranteConfig = listarRestaurante();

?>

<footer class="pb-50  pt-70 pos-relative" style="background-attachment: fixed;">
        <div class="pos-top triangle-bottom"></div>
        <div class="container-fluid">
                

                <div class="pt-30">
                        <p class="underline-secondary"><b>Endereço:</b></p>
                        <p><?=$restauranteConfig[0]["endereco"]?></p>
                </div>

                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b>Telefone fixo:</b></p>
                        <p><?=$restauranteConfig[0]["fixo"]?> </p>
                </div>

                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b>Celular:</b></p>
                        <?=$restauranteConfig[0]["celular"]?>
                </div>

                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b>Email:</b></p>
                        <?=$restauranteConfig[0]["email"]?>
                </div>

            

                <p class="color-light font-9 mt-50 mt-sm-30"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Criadores: Jonas Miguel e Ítallo Henrique
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div><!-- container -->
</footer>