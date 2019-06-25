<?php
        include_once ('functions/administradorFunc.php');
        if(!empty($_SESSION['login'])){
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Home Administrador</title>
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
include_once('cabecalhoAdm.php');
?>
<section class="bg-9 h-500x  pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                                <h5><b>Bem vindo <?=strtoupper($_SESSION['login'])?></b></h5>
                                <h3 class="mt-30 mb-15">HOME</h3>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>
<?php
    if(!empty($resultado) AND $resultado == "alterado"){
                echo("<div class='container center-text h-100 w-40 '>
                    <div class='alert alert-success alert-dismissible fade show  center-text' role='alert' >
                      <strong>Administrador alterado com sucesso!!</strong>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                </div>
                ");
    }else if(!empty($resultado) AND $resultado == "erro"){
                echo("<div class='container center-text h-100 w-40 '>
                    <div class='alert alert-danger alert-dismissible fade show  center-text' role='alert' >
                      <strong>Senha Incorreta!!Tente Novamente.</strong>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                </div>
                ");
    }            

?>
<section style="margin-top: -10%;">
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-black pt-90">
                                
                                <h3 class="mt-30 mb-15">Alterar Administrador:</h3>
                                <div style="margin-left: 30%;">
                                        <form method="POST" id="formADM">
                                                <div class="input-group mb-2 w-50">
                                                  <input type="text" id="login" class="form-control" placeholder="Novo Login" aria-label="Usuário" name="login_editar" required>
                                                </div>
                                                <br>
                                                <div class="input-group mb-2 w-50">
                                                  <input type="password" id="senha_antiga" class="form-control" placeholder="Senha Atual" aria-label="Usuário" name="senha_antiga" required>
                                                </div>
                                                <br>
                                                <div class="input-group mb-2 w-50">
                                                  <input type="password" id="senha_editar" class="form-control" placeholder="Nova Senha" aria-label="Usuário" name="senha_editar" required>
                                                </div>
                                                <br>
                                                <div class="input-group mb-2 w-50">
                                                  <button type="button" onclick="confirmar()" class="btn btn-primary" style="margin-left: 80%;">Alterar</button>
                                                </div>
                                        </form>
                                </div>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>


  <div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: rgb(0,123,255);">
          <h5 class="modal-title color-white" id="exampleModalLabel">Confirmação</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>Deseja que as modificações feitas sejam salvas?</h5>
          <form method="POST">
        </div>
        <div class="modal-footer">
          <input type="hidden" id="nomeForm">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="submeter()">Salvar mudanças</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php
        include_once ('rodape.php');
?>
<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/swiper.js"></script>
<script src="common/scripts.js"></script>
<script type="text/javascript">

        function confirmar(){
           
            if($('input#login').val() == "" || $('input#senha_antiga').val() == "" || $('input#senha_editar').val() == ""){
                alert("Preencha todos os campos");
            }else{
                $('#modalConfirmar').modal('show');
            }
        }

        function submeter(){
          document.getElementById('formADM').submit();
          
        }
</script>
</body>
</html>
<?php
}else{
    header("location:login.php");
}
?>