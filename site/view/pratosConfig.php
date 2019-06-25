<?php
        include_once ('functions/administradorFunc.php');
        include_once ('functions/pratosFunc.php');

        


        if(!empty($_SESSION['login'])){
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Pratos</title>
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
                                <h3 class="mt-30 mb-15">PRATOS</h3>
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
                      <strong>Selecione uma imagem valida para o produto!!</strong>
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
                                                <th scope="col">Igredientes</th>
                                                <th scope="col">Preço</th>
                                                <th scope="col">Promoção</th>
                                                <th scope="col">Categoria</th>
                                                <th scope="col">Foto</th>
                                                <th scope="col" colspan="2">Funções</th>
                                        </tr>
                                  </thead>
                                  <tbody>
                                        <?php
                                          foreach ($pratosPaginacao as $prato) {
                                                               
                                        ?>
                                        <tr>
                                                <td scope="col"><?=$prato['nome']?></td>
                                                <td scope="col"><?=$prato['ingredientes']?></td>
                                                <td scope="col">R$<?=$prato['preco']?></td>
                                                <td scope="col"><?php
                                                        promoCatch($prato);
                                                ?></td>
                                                <td scope="col"><?php
                                                        categCatch($prato);
                                                ?></td>
                                                <td scope="col">
                                                        <img src="images/pratos/<?=$prato['foto_prato']?>" class="w-40 h-auto">
                                                </td>
                                                <td>
                                                        <form method="POST">
                                                                <input name="cod" type="hidden" value="<?=$prato['cod']?>">

                                                                <button type="button" value="Apagar" class="btn btn-outline-dark" data-toggle="modal" data-target="#modalApagar"
                                                                onclick="enviarCodApagar('<?=$prato['cod']?>','<?=$prato['foto_prato']?>')">
                                                                        Apagar
                                                                </button>
                                                                                                        
                                                        </form>
                                                </td>
                                                <td>
                                                        <form method="POST">
                                                                <input name="cod" type="hidden" value="<?=$prato['cod']?>">
                                                                <button type="button" value="Editar" class="btn btn-dark" data-toggle="modal"   data-target="#modalEditar"
                                                                onclick="preencherCampos('<?=$prato['cod']?>','<?=$prato['nome']?>','<?=$prato['ingredientes']?>','<?=$prato['preco']?>','<?=$prato['cod_promocao']?>','<?=$prato['cod_categoria']?>','<?=$prato['foto_prato']?>')"

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
                        <div id="navegacao">
                            <?php
                            echo '<a href="?pagina=1">Primeira</a> | ';
                            echo "<a href=\"?pagina=$anterior\"><button class='btn btn-dark'>Anterior</button></a> | ";
                        ?>
                            <?php
                             /**
                        * O loop para exibir os valores à esquerda
                        */
                       for($i = $pagina-$exibir; $i <= $pagina-1; $i++){
                           if($i > 0)
                            echo '<a href="?pagina='.$i.'"><button class="btn btn-outline-dark"> '.$i.' </button> </a>';
                      }

                      echo '<a href="?pagina='.$pagina.'"><strong><button class="btn btn-dark">'.$pagina.'</button></strong></a>';

                      for($i = $pagina+1; $i < $pagina+$exibir; $i++){
                           if($i <= $totalPagina)
                            echo '<a href="?pagina='.$i.'"><button class="btn btn-outline-dark"> '.$i.' </button></a>';
                      }

                       /**
                        * Depois o link da página atual
                        */
                       /**
                        * O loop para exibir os valores à direita
                        */

                        ?>
                        <?php echo " | <a href=\"?pagina=$posterior\"><button class='btn btn-dark'>Próximo</button></a> | ";
                        echo "  <a href=\"?pagina=$totalPagina\">Última</a>";
                        ?>
                    </div>
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>




<!--ACOMPANHAMENTOSSS-->



<section>
    <div class="container h-100 table-responsive">

        <h4>Acompanhamentos</h4>
        <br>
        <div class="container ">
            <div class="dplay-tbl">
                <form class="mb-50 mb-sm-30 mt-sm-20 placeholder-1 form-style-1 pos-relative " method="GET">
                    <button type="button" name="acao" value="Cadastrar" class="btn btn-dark" data-toggle="modal" data-target="#modalCadastrarAc">
                        Cadastrar Novo
                    </button>
                                                                        
                                                                        

                </form>
            </div>

        </div>
                <div class="dplay-tbl ">
                        <div class="">
                                <table class="table table-hover">
                                  <thead class="thead-dark">
                                        <tr>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Preço adicional</th>
                                                <th scope="col">Foto</th>
                                                <th scope="col" colspan="2">Funções</th>
                                        </tr>
                                  </thead>
                                  <tbody>
                                        <?php
                                          foreach ($acompanhamentos as $acompanhamento) {
                                                               
                                        ?>
                                        <tr>
                                                <td scope="col"><?=$acompanhamento['nome']?></td>
                                                <td scope="col"><?=$acompanhamento['preco_adicional']?></td>
                                                <td scope="col">
                                                        <img src="images/acompanhamentos/<?=$acompanhamento['foto_acompanhamento']?>" class="w-40 h-auto">
                                                </td>
                                                <td>
                                                        <form method="POST">
                                                                <input name="cod" type="hidden" value="<?=$acompanhamento['cod']?>">
                                                                <button type="button" value="Apagar" class="btn btn-outline-dark" data-toggle="modal" data-target="#modalApagarAc"
                                                                onclick="enviarCodApagarAc('<?=$acompanhamento['cod']?>','<?=$acompanhamento['foto_acompanhamento']?>')">
                                                                        Apagar
                                                                </button>
                                                                                                        
                                                        </form>
                                                </td>
                                                <td>
                                                        <form method="POST">
                                                                <input name="codAc_editar" type="hidden" value="<?=$acompanhamento['cod']?>">
                                                                <button type="submit" value="Editar" class="btn btn-dark">
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
                                  <input type="text" class="form-control" placeholder="Nome do Prato" aria-label="Usuário" name="nome" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group mb-2">
                                  <input type="text" class="form-control" placeholder="Ingredientes" aria-label="Ingrediente" name="ingredientes" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group mb-2">
                                  <input type="text"  class="dinheiro form-control" placeholder="Preço X.XX" aria-label="Preco" name="preco" required>
                                </div>
                            </div>
                        </div>

                        <div class="col" align="center">
                            <div class="row" > <img id="mini_foto_new" class="ïmg-200x" src="images/icon_ex.png" >   
             </div>
                        </div>
                    </div>
                    <div class="row bigRow">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Promoções</label>
                            </div>
                          <select class="custom-select" id="inputGroupSelect01" name="promocao">
                            
                            <?php
                                $promos = listarPromocaos();

                                foreach($promos as $promo){
                            ?>
                            <option value="<?=$promo['cod']?>"><?=$promo['nome']?></option>
                            <?php
                                }
                            ?>
                          </select>           
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
                            </div>
                          <select class="custom-select" id="inputGroupSelect01" name="categoria">
                                                <?php
                                $categs = listarCategorias();

                                foreach($categs as $categ){
                            ?>
                            <option value="<?=$categ['cod']?>"><?=$categ['nome']?></option>
                            <?php
                                }
                            ?>
                          </select>           
                        </div>
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
            <form method="GET">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <input type="hidden" name="cod_apagar" id="cod_apagar" value="">
                <input type="hidden" name="foto_prato_apagar" id="foto_prato_apagar" value="">
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

            <form enctype="multipart/form-data" method="POST">
                <!--CODIGO DO PRODUTO-->
                <input type="hidden" name="cod_editar" id="codEdit">
                <div class="input-group mb-2 w-50">
                  <input type="text" id="nome" class="form-control" placeholder="Nome do Prato" aria-label="Usuário" name="nome_editar" required>
                </div>
                </br>
                <div class="input-group mb-2 w-50">
                  <input type="text" id="ingredientes" class="form-control" placeholder="Ingredientes" aria-label="Ingrediente" name="ingredientes_editar" required>
                </div>
                </br>
                <div class="input-group mb-2 w-50">
                  <input type="text" id="preco"  class="dinheiro form-control" placeholder="Preço X.XX" aria-label="Preco" name="preco_editar" required>
                </div>
                </br>
                <div class="input-group mb-2 w-70">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Promoções</label>
                    </div>
                  <select class="custom-select" id="promocao" name="promocao_editar">
                    
                    <?php
                        $promos = listarPromocaos();

                        foreach($promos as $promo){
                    ?>
                    <option value="<?=$promo['cod']?>"><?=$promo['nome']?></option>
                    <?php
                        }
                    ?>
                  </select>           
                </div>
                </br>
                <div class="input-group mb-2 w-70">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Categoria</label>
                    </div>
                  <select class="custom-select" id="categoria" name="categoria_editar">
                                        <?php
                        $categs = listarCategorias();

                        foreach($categs as $categ){
                    ?>
                    <option value="<?=$categ['cod']?>"><?=$categ['nome']?></option>
                    <?php
                        }
                    ?>
                  </select>           
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
              <input type="hidden" id="foto_prato_res" name="foto_prato_res" >
              <img id="exemplo_foto_editar" class="ïmg-200x" src="images/icon_ex.png" >   
              </div>
              <div class="modal-footer">
            
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                
                <button type="submit" value="cadastrar" name="acao" class="btn btn-primary">Salvar</button>
                
              </div>
            </form>
        </div>
      </div>
    </div>

<!--MODAIS PARA OS ACOMPANHAMENTOS-->

    <div class="modal fade" id="modalApagarAc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form method="GET">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <input type="hidden" name="cod_apagarAc" id="cod_apagarAc" value="">
                <input type="hidden" name="foto_acompanhamento_apagar" id="foto_acompanhamento_apagar" value="">
                <button type="submit" value="apagar" name="acao" class="btn btn-primary">Apagar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade " id="modalCadastrarAc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header color-white" style="background-color: rgb(0,123,255);">
            <h5 class="modal-title" id="exampleModalLabel">Cadastro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              
            </button>
          </div>
          <div class="modal-body">
            <form enctype="multipart/form-data" method="POST">
                <div class="container ">
                    <div class="row " >
                        <div class="col">
                            <div class="row">
                                <div class="input-group mb-2">
                                  <input type="text" class="form-control" placeholder="Nome do Acompanhamento" aria-label="Usuário" name="nomeAc" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group mb-2">
                                  <input type="text"  class="dinheiro form-control" placeholder="Preço Adicional X.XX" aria-label="Preco" name="preco_adicionalAc" required>
                                </div>
                            </div>
                            <div class="row">
                                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Pratos
                                </button>
                                <div class="collapse" id="collapseExample">
                                  <div class="card card-body">

                                    <?php
                                      foreach($pratos as $prato){
                                      ?>
                                      <div class="form-control" style="border: none;">
                                        <input type="checkbox" value="<?=$prato['cod']?>" name="p_ac<?=$aux?>"><?=ucfirst($prato['nome'])?>
                                      </div>
                                      <?php
                                      $aux++;
                                      
                                          }
                                      ?>
                                  </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col" align="center">
                            <div class="row" > <img id="mini_foto_newAc" class="ïmg-200x" src="images/icon_ex.png" ></div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="input-group mb-2">
                           <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
                           </div>
                           <div class="custom-file">
                             <input type="file" class="custom-file-input" name="arquivoAc" required id="image" onchange="readURL(this,'mini_foto_newAc');">
                             <label class="custom-file-label" for="inputGroupFile01">Escolher arquivo</label>
                           </div>
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


    <!--EDITAR ACOMPANHAMENTO-->

    <div class="modal fade " id="modalEditarAc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header color-white bg-black">
            <h5 class="modal-title" id="exampleModalLabel">Edição</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              
            </button>
          </div>
          <div class="modal-body">

            <!--FORMULÁRIO DE EDIÇÃO-->
            <?php
            foreach($acompanhamentos as $acompanhamento){
                if ($acompanhamento['cod'] == $codAc_editar) {
            ?>
            <form enctype="multipart/form-data" method="POST">
                <!--CODIGO DO PRODUTO-->
                <input type="hidden" name="codAc_editarAll" value="<?=$codAc_editar?>">
                <div class="input-group mb-2 w-50">
                  <input type="text" value="<?=$acompanhamento['nome']?>" id="nome" class="form-control" placeholder="Nome do Acompanhamento" aria-label="Usuário" name="nomeAc_editar" required>
                </div>
                <div class="input-group mb-2 w-50">
                  <input type="text" value="
                  <?=$acompanhamento['preco_adicional']?>" id="preco"  class="dinheiro form-control" placeholder="Preço X.XX" aria-label="Preco" name="precoAc_editar" required>
                </div>
                
                <div class="input-group mb-2 w-50">
                  <button class="btn" type="button" data-toggle="collapse" data-target="#collapseAc" aria-expanded="false" aria-controls="collapseAc" data-toggle="tooltip" title="Clique para ver os pratos!">
                                Pratos
                                </button>
                                <div class="collapse" id="collapseAc">
                                  <div class="card card-body">

                                    <?php
                                    
                                      foreach($pratos as $prato){
                                        if(in_array($prato['cod'], $cods)){
                                      ?>
                                      <div class="form-control" style="border: none;">
                                        <input type="checkbox" checked value="<?=$prato['cod']?>" name="p_ace<?=$aux2?>"><?=ucfirst($prato['nome'])?>
                                      </div>
                                      <?php
                                        }else{
                                        ?>  
                                        <div class="form-control" style="border: none;">
                                        <input type="checkbox" value="<?=$prato['cod']?>" name="p_ace<?=$aux2?>"><?=ucfirst($prato['nome'])?>
                                      </div>

                                        <?php
                                        }
                                      $aux2++;
                                            }
                                            
                                          
                                      ?>
                                  </div>
                                </div>
                </div>
                
                
                
                </br>
                
                    
             <div class="input-group mb-2 w-70">
               <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
               </div>
               <div class="custom-file">
                 <input type="file" id="image" class="custom-file-input" name="arquivoAc_editar"   onchange="readURL(this,'foto_ac');">
                 <label class="custom-file-label" for="inputGroupFile01">Escolher arquivo</label>
               </div>

             </div>
            
              <span>Foto</span>
              <!--VALOR UTILIZADO CASO OUTRA FOTO NÃO SEJA SELECIONADA-->
              <input type="hidden" value="<?=$acompanhamento['foto_acompanhamento']?>" name="foto_Ac_res" >
              <img id="foto_ac" class="ïmg-200x" src="images/acompanhamentos/<?=$acompanhamento['foto_acompanhamento']?>" >   
              </div>
              <div class="modal-footer">
            
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                
                <button type="submit" value="cadastrar" name="acao" class="btn btn-primary">Salvar</button>
                
              </div>
            </form>
            <?php
                }
            }
            ?>
        </div>
      </div>
    </div>

    <!--MODAL ACOMPANHAMENTO CADASTRO-->

    


<?php
        include_once ('rodape.php');
?>

<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/jquery.mask.js"></script>
<script src="plugin-frameworks/popper.min.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/swiper.js"></script>

<script src="common/scripts.js"></script>
<script type="text/javascript">
    $('.dinheiro').mask('#.##0.00', {reverse: true});


</script>
<script language="javascript" type="text/javascript">
    
    $(document).ready(function() { $('[data-toggle="tooltip"]').tooltip({'placement': 'top'}); });
    function readURL(input, id) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#'+id).attr('src', e.target.result);
           }

           reader.readAsDataURL(input.files[0]);
       }

   }

   function enviarCodApagar(cod,foto_prato){
              $("input#cod_apagar").val(cod);
              $("input#foto_prato_apagar").val(foto_prato);
            }
          function preencherCampos(cod,nome,ingredientes,preco,promocao,categoria,image) {
            
            
          $("input#codEdit").val(cod);
          $("input#nome").val(nome);
          $("input#ingredientes").val(ingredientes);
          $("input#preco").val(preco);
          $("select#promocao").val(promocao);
          $("select#categoria").val(categoria);
          $("img#exemplo_foto_editar").attr('src',"images/pratos/"+image);
          $("input#foto_prato_res").val(image);
          
          
          
          
        }

    function enviarCodApagarAc(cod,foto_acompanhamento){
              $("input#cod_apagarAc").val(cod);
              $("input#foto_acompanhamento_apagar").val(foto_acompanhamento);
            }
          function preencherCamposAc(cod,nome,preco_adicional,image) {
            
            
          $("input#codEdit").val(cod);
          $("input#nome").val(nome);
          $("input#ingredientes").val(ingredientes);
          $("input#preco").val(preco);
          $("select#promocao").val(promocao);
          $("select#categoria").val(categoria);
          $("img#exemplo_foto_editar").attr('src',"images/pratos/"+image);
          $("input#foto_prato_res").val(image);
          
          
          
          
        }

     <?php
        if(!empty($codAc_editar)){
            echo("$(document).ready(function(){
            $('#modalEditarAc').modal('show');
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