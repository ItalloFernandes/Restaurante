<?php
        session_start();
        include_once('../model/administrador.php');
        include_once('../controller/administradorDAO.php');

        $administrador = new Administrador;
        $aux = "";
        $login = isset($_POST['login'])?$_POST['login']:"";
        $senha = isset($_POST['senha'])?$_POST['senha']:"";
        
        if (!empty($login) AND !empty($senha)) {
                $administrador->setLogin($login);
                $administrador->setSenha($senha);
                $resultado = logar($administrador);

                if(!empty($resultado)){
                        $_SESSION['login'] = $resultado[0]['login'];
                        $_SESSION['senha'] =$resultado[0]['senha'];
                        header("location:administradorControl.php");
                }else{
                        $aux = "false";
                }
        }

        if(empty($_SESSION['login'])){
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Login</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">

        <!-- Font -->
        
        <link rel="stylesheet" href="fonts/beyond_the_mountains-webfont.css" type="text/css"/>

        <!-- Stylesheets -->
        <link href="plugin-frameworks/bootstrap.min.css" rel="stylesheet">
        <link href="plugin-frameworks/swiper.css" rel="stylesheet">
        <link href="fonts/ionicons.css" rel="stylesheet">
        <link href="common/styles.css" rel="stylesheet">
        <script type="text/javascript">

                <?php
                        if(!empty($aux) AND $aux == "false"){
                                echo("alert('Login ou Senha incorretos!!!')");
                        }
                ?>

        </script>

</head>
<body>

<section class="bg-6 h-700x main-slider pos-relative">
        
        <div class="container h-100">
                <div class="heading">
                        <img class="heading-img" src="images/heading_logo.png" alt="">
                        <h2 class="color-white">Login</h2>
                        <h5 class="mt-10 mb-40 color-white">Área de administração</h5>
                       
                </div>
                <form class="form-style-1 placeholder-1" method="POST">
                        <div class="row">
                                <div class="col-md-6"> <input class="mb-20" type="text" placeholder="Login" name="login">  </div>
                               
                        </div>
                        <div class="row">
                                
                                <div class="col-md-6"> <input class="mb-20" type="password" placeholder="Senha" name="senha">  </div>
                                
                        </div><!-- row -->
                        <h6 class="left-text mtb-40"><button type="submit" class="btn-primaryc plr-40 font-12"><b>Login</b></h6>
                </form>





                </div><!-- dplay-tbl -->
        </div><!-- container -->
       
</section>









<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/swiper.js"></script>
<script src="common/scripts.js"></script>

</body>
</html>

<?php
        }
        else{
                header("location:administradorControl.php");
        }


?>