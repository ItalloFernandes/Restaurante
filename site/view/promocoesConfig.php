<?php
        include_once ('functions/administradorFunc.php');
        include_once ('functions/promocoesFunc.php');

        


        if(!empty($_SESSION['login'])){
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Promoções</title>
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
                                <h3 class="mt-30 mb-15">PROMOÇÕES</h3>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>

<section >
        <div class="container h-100 w-40">
            <div class="dplay-tbl">
                <form class="mb-50 mb-sm-30 mt-sm-20 placeholder-1 form-style-1 pos-relative " method="GET">

                        <input class="pr-15 " type="text" placeholder="Pesquisar" name="pesquisa">
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
            if(!empty($resultado) AND $resultado == "apagar"){
                echo("<div class='container center-text h-100 w-40 '>
                    <div class='alert alert-success alert-dismissible fade show  center-text' role='alert' >
                      <strong>Objeto Apagado com sucesso!!</strong>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                </div>
                ");
            }else if(!empty($resultado) AND $resultado == "cadastrado"){
                echo("<div class='container center-text h-100 w-40 '>
                    <div class='alert alert-success alert-dismissible fade show  center-text' role='alert' >
                      <strong>Objeto cadastrado com sucesso!!</strong>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                </div>
                ");
            }else if(!empty($resultado) AND $resultado == "alterado"){
                echo("<div class='container center-text h-100 w-40 '>
                    <div class='alert alert-info alert-dismissible fade show  center-text' role='alert' >
                      <strong>Objeto alterado com sucesso!!</strong>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                </div>
                ");
            }else if(!empty($_GET['erro']) AND $_GET['erro'] == "true"){
                echo("<div class='container center-text h-100 w-40 '>
                    <div class='alert alert-danger alert-dismissible fade show  center-text' role='alert' >
                      <strong>Selecione uma imagem valida para a Promoção!!</strong>
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
                                                <th scope="col">Duração</th>
                                                <th scope="col">Texto Promocional</th>
                                                <th scope="col">Porcentagem</th>
                                                <th scope="col">Foto Promocional</th>                
                                                <th scope="col" colspan="2">Funções</th>
                                        </tr>
                                  </thead>
                                  <tbody>
                                        <?php
                                          foreach ($promocoes as $promocao) {
                                                               
                                        ?>
                                        <tr>
                                                <td scope="col"><?=$promocao['nome']?></td>
                                                <td scope="col"><?=$promocao['duracao']?></td>
                                                <td scope="col" style="width: 25%;"><?=$promocao['texto_promocional']?></td>
                                                <td scope="col"><?=$promocao['porcentagem']?></td>
                                                <td scope="col" style="width: 60%;">
                                                        <img style="width: 120%;" src="images/promocoes/<?=$promocao['foto_promocional']?>">
                                                </td>
                                                <td scope="col">
                                                                <button type="button" value="Apagar" class="btn btn-outline-dark" data-toggle="modal" data-target="#modalApagar" onclick="coletar(<?=$promocao['cod']?>,'<?=$promocao['foto_promocional']?>')">Apagar</button>
                                                                                                        
                                                      
                                                </td>
                                                <td scope="col">
                                                        <form method="POST">
                                                                <input name="cod" type="hidden" value="<?=$promocao['cod']?>">
                                                                <button type="button" value="Editar" class="btn btn-dark" data-toggle="modal"   data-target="#modalEditar" onclick="preencherCampos(<?=$promocao['cod']?>,'<?=$promocao['nome']?>','<?=$promocao['duracao']?>','<?=$promocao['porcentagem']?>','<?=$promocao['texto_promocional']?>','<?=$promocao['foto_promocional']?>')" 
                                                                

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
            <form enctype="multipart/form-data" method="POST" id="cadastroForm">
                <div class="container ">
                    <div class="row bigRow" >
                        <div class="col">
                            <div class="row">
                                <div class="input-group mb-2">
                                  <input type="text" class="form-control" placeholder="Nome Da Promoção" aria-label="Usuário" name="nome" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group mb-2">
                                  <input type="text" class="form-control" placeholder="Duração" aria-label="Ingrediente" name="duracao" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group mb-2">
                                  <input type="number" min="1" max="99"  class="form-control" placeholder="Porcentagem" aria-label="Preco" name="porcentagem" required>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col" align="center">
                            <div class="row" >
                                <img id="mini_foto_new" class="ïmg-200x" src="images/icon_ex.png" >   
                            </div>
                        </div>
                    </div>
                    <div class="row bigRow">
                                <div class="input-group mb-2">
                                  <textarea form="cadastroForm"  name="texto_promocional" placeholder="Texto Promocional" maxlength="500" style="height: 100px; width: 500px;resize: none;" required></textarea>
                                </div>
                            </div>
                    <div class="row bigRow">

                        <div class="input-group mb-2">
                           <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
                           </div>
                           <div class="custom-file">
                             <input type="file" class="custom-file-input" name="arquivo" required id="image" onchange="readURL(this,'mini_foto_new');">
                             <label class="custom-file-label" for="inputGroupFile01">Escolher arquivo</label>
                           </div>
                         </div>
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
                <input type="hidden" name="foto_apagar" id="foto_apagar" value="">
                <button type="submit" value="apagar" name="acao" class="btn btn-primary">Apagar</button>
            </form>
          </div>
        </div>
      </div>
    </div>


<!--Modal para Editar-->

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

            <form enctype="multipart/form-data" method="POST" id="editarForm">
                <!--CODIGO DO PRODUTO-->
                <input type="hidden" name="cod_editar" id="codEdit">
                <div class="input-group mb-2 w-50">
                  <input type="text" id="nome" class="form-control" placeholder="Nome do Prato" aria-label="Usuário" name="nome_editar" required>
                </div>
                </br>
                <div class="input-group mb-2 w-50">
                  <input type="text" id="duracao" class="form-control" placeholder="Duração" aria-label="Ingrediente" name="duracao_editar" required>
                </div>
                </br>
                <div class="input-group mb-2 w-50">
                  <input type="number" max="99" id="porcentagem"  class="form-control" placeholder="porcentagem" aria-label="Preco" name="porcentagem_editar" required>
                </div>
                </br>
                <div class="input-group mb-2 w-50">
                  <textarea form="editarForm" id="texto_promocional" name="texto_promocional_editar" placeholder="Texto Promocional" maxlength="500" style="height: 100px; width:1500px; resize: none;" required></textarea>
                </div>

                </br>    
             <div class="input-group mb-2 w-70">
               <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
               </div>
               <div class="custom-file">
                 <input type="file" id="image" class="custom-file-input" name="arquivo_editar"   onchange="readURL(this,'exemplo_foto_editar');">
                 <label class="custom-file-label" for="inputGroupFile01">Escolher arquivo</label>
               </div>

             </div>
            
              <span>Foto</span>
              <!--VALOR UTILIZADO CASO OUTRA FOTO NÃO SEJA SELECIONADA-->
              <input type="hidden" id="foto_res" name="foto_res" >
              <img id="exemplo_foto_editar"  src="images/icon_ex.png" >   
              </div>
              <div class="modal-footer">
            
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                
                <button type="submit" value="cadastrar" name="acao" class="btn btn-primary">Salvar</button>
                
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
        $("input#foto_apagar").val(foto);

    } 

  function preencherCampos(cod,nome,duracao,porcentagem,texto_promocional,image) {
    
    
  $("input#codEdit").val(cod);
  $("input#nome").val(nome);
  $("input#duracao").val(duracao);
  $("input#porcentagem").val(porcentagem);
  $("textarea#texto_promocional").val(texto_promocional);
  $("img#exemplo_foto_editar").attr('src',"images/promocoes/"+image);
  $("input#foto_res").val(image);
  
  
  
  
}


</script>


</body>
</html>

<?php
        }
        else{
                header("location:login.php");
        }

?>