<?php
        include_once ('functions/administradorFunc.php');
        include_once ('functions/categoriaFunc.php');

        


        if(!empty($_SESSION['login'])){
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Categorias</title>
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

        <style type="text/css">
            .bigRow{
                max-width: 500px;
                margin-right: auto; 
                margin-left: auto;
            }
            img{
                max-width: 130px;
                max-height: 130px;
                margin-right: auto; 
                margin-left: auto;
            }
            .containerModal{
                max-width: 600px;
            }

        </style>
        <script type="text/javascript">
  
        </script>    



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
                                <h5><b></b></h5>
                                <h3 class="mt-30 mb-15">CATEGORIAS</h3>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>

<section >
        <div class="container h-100 w-40">
            <div class="dplay-tbl">
                <form class="mb-50 mb-sm-30 mt-sm-20 placeholder-1 form-style-1 pos-relative " method="GET">

                        <input class="pr-15 " type="text" placeholder="Pesquisar Nome" name="pesquisa">
                        <button class="abs-tbr plr-20" type="submit"><i class="ion-android-search"></i></button>

                </form>
            </div>

        </div>
        <div class="container ">
            <div class="dplay-tbl">
                <form class="mb-50 mb-sm-30 mt-sm-20 placeholder-1 form-style-1 pos-relative " method="GET">
                    <button type="button" name="acao" value="Cadastrar" class="btn btn-dark" data-toggle="modal" data-target="#modalCadastrar">
                        Cadastrar Novo
                    </button>
                                                                        
                                                                        

                </form>
            </div>

        </div>
        <?php
            if(!empty($resultado) AND $resultado == "apagado"){
                echo("<div class='container center-text h-100 w-40 '>
                    <div class='alert alert-success alert-dismissible fade show  center-text' role='alert' >
                      <strong>Categoria Apagada com sucesso!!</strong>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                </div>
                ");
            }else if(!empty($resultado) AND $resultado == "cadastrado"){
                echo("<div class='container center-text h-100 w-40 '>
                    <div class='alert alert-success alert-dismissible fade show  center-text' role='alert' >
                      <strong>Categoria cadastrada com sucesso!!</strong>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                </div>
                ");
            }else if(!empty($resultado) AND $resultado == "alterado"){
                echo("<div class='container center-text h-100 w-40 '>
                    <div class='alert alert-info alert-dismissible fade show  center-text' role='alert' >
                      <strong>Categoria alterada com sucesso!!</strong>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                </div>
                ");
            }else if(!empty($_GET['erro']) AND $_GET['erro'] == "true"){
                echo("<div class='container center-text h-100 w-40 '>
                    <div class='alert alert-danger alert-dismissible fade show  center-text' role='alert' >
                      <strong>Selecione uma imagem valida para o funcionario!!</strong>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                </div>
                ");
            }else if(!empty($resultado) AND $resultado == "nao_achou"){
                echo("<div class='container center-text h-100 w-40 '>
                    <div class='alert alert-danger alert-dismissible fade show  center-text' role='alert' >
                      <strong>Nenhum resultado encontrado para a pesquisa!!</strong>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                </div>
                ");
            }   

        ?>
        <div class="container h-100 table-responsive">
                <div class="dplay-tbl ">
                        <div class="">
                                <table class="table table-hover">
                                  <thead class="thead-dark">
                                        <tr>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Pratos</th>                     
                                                <th scope="col" colspan="2">Funções</th>
                                        </tr>
                                  </thead>
                                  <tbody>
                                        <?php
                                          foreach ($categorias as $categoria) {
                                                               
                                        ?>
                                        <tr>
                                                <td scope="col"><?=$categoria['nome']?></td>
                                                <td scope="col">
                                                <?php
                                                  foreach ($pratos as $prato) {
                                                    if($prato['cod_categoria'] == $categoria['cod']){
                                                      echo(ucfirst(($prato['nome'])).", ");
                                                    }
                                                  }

                                                ?>  
                                                </td>
                                                <td>
                                                        <input name="cod" type="hidden" value="<?=$categoria['cod']?>">
                                                        <button type="button" value="Apagar" class="btn btn-outline-dark" data-toggle="modal" data-target="#modalApagar"
                                                        onclick="coletar(<?=$categoria['cod']?>)">Apagar
                                                        </button>
                                                                                                        
                                                </td>
                                                <td>
                                                        <form method="POST" id="coletar_dados">
                                                                <input name="funcao_cod_editar" type="hidden" value="true">
                                                                <input name="cod_editar_modal" type="hidden" value="<?=$categoria['cod']?>">
                                                                <input name="nome_editar_modal" type="hidden" value="<?=$categoria['nome']?>">
                                                                <button type="submit" value="Editar" class="btn btn-dark" data-toggle="modal"   data-target="#modalEditar" 
                                                                onclick="preencherCampos('<?=$categoria['cod']?>','<?=$categoria['nome']?>')"

                                                                >
                                                                        Editar
                                                                </button>
                                                        </form>
                                                </td>
                                        </tr>
                                        <?php
                                          }
                                        ?>  
                                  </tbody>
                                </table>
                        </div>
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>
<!--Modal para Cadastrar-->
<section>
    <div class="modal fade " id="modalCadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header color-white" style="background-color: rgb(0,123,255);">
            <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              
            </button>
          </div>
          <div class="modal-body">
            <form enctype="multipart/form-data" method="POST">
                <div class="container ">
                    <div class="row bigRow" >
                        <div class="col">
                            <div class="row">
                                <div class="input-group mb-2">
                                  <input type="text" class="form-control" placeholder="Nome da categoria" aria-label="Usuário" name="nome" required>
                                </div>
                            </div>
                            <div class="row">
                                
                                  <label>Pratos</label>
                                  <?php
                                  foreach($pratos as $prato){
                                    
                                  ?>
                                  <div class="form-control" style="border: none;">
                                    <input type="checkbox" value="<?=$prato['cod']?>" name="p<?=$aux?>"><?=ucfirst($prato['nome'])?>
                                  </div>
                                  <?php
                                  $aux++;
                                      }
                                  ?>
                                        
                                  
                            </div>                            
                        </div>
                    </br>
                    </div>
                    <div class="row bigRow" style="float: right">
                        <div class="modal-footer">
            
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        
                        <button type="submit" value="cadastrar" name="acao" class="btn btn-primary">Cadastrar</button>
                        
                      </div>
                    </div>
                    
                </div>
            </form>    
        </div>
      </div>
    </div>
</section>

<!--Modal para Apagar-->
<section>
    <div class="modal fade" id="modalApagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header color-white" style="background-color: rgb(0,123,255);">
            <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              
            </button>
          </div>
          <div class="modal-body">
            <span>Deseja realmente deletar este item?</span>
          </div>
          <div class="modal-footer">
            <form method="POST">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <input type="hidden" name="cod_apagar" id="cod_apagar" value="">
                <button type="submit" value="apagar" name="acao" class="btn btn-primary">Apagar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>

<!--Modal para Editar-->
<section>
    <div class="modal fade " id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header color-white bg-black">
            <h5 class="modal-title" id="exampleModalLabel">Edição</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              
            </button>
          </div>
          <div class="modal-body">

            <!--FORMULÁRIO DE EDIÇÃO-->

            <form enctype="multipart/form-data" method="POST">
                <!--CODIGO DO PRODUTO-->
                <input type="hidden" name="cod_editar" value="<?=!empty($cod_editar_modal)?$cod_editar_modal:''?>" id="codEdit">
                <div class="input-group mb-2 w-50">
                  <input type="text" id="nome" class="form-control" placeholder="Nome da Categoria" aria-label="Usuário" name="nome_editar" value="<?=!empty($nome_editar_modal)?$nome_editar_modal:''?>" required>
                </div>
                </br>
                <div class="row">
                  <label>Pratos</label>
                  <?php
                                  foreach($pratos as $prato){
                                    if($prato['cod_categoria'] == $cod_editar_modal){
                                  ?>
                                  <div class="form-control" style="border: none;">
                                    <input type="checkbox" checked value="<?=$prato['cod']?>" name="p_e<?=$aux2?>"><?=ucfirst($prato['nome'])?>
                                  </div>
                                  <?php
                                  }else{
                                  ?>
                                  <div class="form-control" style="border: none;">
                                    <input type="checkbox" value="<?=$prato['cod']?>" name="p_e<?=$aux2?>"><?=ucfirst($prato['nome'])?>
                                  </div>
                                  <?php  
                                  }
                                  $aux2++;
                                      }
                                  ?>
                </div>
                </br>
                    
             
              <div class="modal-footer">
            
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                
                <button type="submit" value="cadastrar" name="acao" class="btn btn-primary">Salvar</button>
                
              </div>
            </form>
        </div>
      </div>
    </div>
</section>


<?php
        include_once ('rodape.php');
?>

<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/jquery.mask.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/swiper.js"></script>
<script src="common/scripts.js"></script>
<script type="text/javascript">
    $('.dinheiro').mask('#.##0.00', {reverse: true});


</script>
<script language="javascript" type="text/javascript">
    function readURL(input, id) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#'+id).attr('src', e.target.result);
           }

           reader.readAsDataURL(input.files[0]);
       }

   }

    function coletar(cod,foto){
        $("input#cod_apagar").val(cod);
      
    } 
            
    function preencherCampos(cod,nome) {       
            $("input#codEdit").val(cod);
            $("input#nome").val(nome);    
    }
      
    <?php
      if(!empty($funcao_cod_editar) AND $funcao_cod_editar == "true"){
        echo("$(document).ready(function(){
            $('#modalEditar').modal('show');
          });");
      }
    ?>
    

</script>


</body>
</html>

<?php
        }
        else{
                header("location:login.php");
        }

?>