<?php
        include_once ('functions/administradorFunc.php');
        include_once ('functions/restauranteFunc.php');


        if(!empty($_SESSION['login'])){
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Configurações Gerais</title>
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
          .lowWidth{width: 95%;}
          .textoForm{
            font-size: 0.8em;
          }
          .tdWidth{width: 50%;}
        </style>

        <script type="text/javascript">
        
        </script>
</head>
<body>

<?php
include_once('cabecalhoAdm.php');
?>
<section class="bg-9 h-500x  pos-relative" style="background-image: url('images/estrutura_site/bgAdm.png');">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">                                
                                <h3 class="mt-30 mb-15">Configurações do Restaurante</h3>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>

<?php
  if(isset($_GET['alterado']) AND $_GET['alterado'] == 'true'){
    echo("
<div class='container center-text h-100 w-40 '>
                    <div class='alert alert-info alert-dismissible fade show  center-text' role='alert' >
                      <strong>Valores do restaurante alterado com sucesso!!</strong>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                </div>
");
  } else if(!empty($_GET['erro']) AND $_GET['erro'] == "true"){
                echo("<div class='container center-text h-100 w-40 '>
                    <div class='alert alert-danger alert-dismissible fade show  center-text' role='alert' >
                      <strong>Selecione uma imagem valida para a ação!!</strong>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                </div>
                ");
            }else if(!empty($_GET['erroIm']) AND $_GET['erroIm'] == "true"){
                echo("<div class='container center-text h-100 w-40 '>
                    <div class='alert alert-danger alert-dismissible fade show  center-text' role='alert' >
                      <strong>Selecione uma imagem valida para a ação(Somente .jpg)!!</strong>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                    </div>
                </div>
                ");
            }
  ?>
<section class="">
        <div class="container h-90">
          <div class="card">
            <div class="card-header">
              <h4>Configurações</h4>
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <div class="row" style="margin-bottom: 2%">
                    <div class="col col-sm-2 col-lg-2"></div>
                    <div class="col col-sm-8 col-lg-8 textoForm"><b><i><?=$config[0]['slogan']?></i></b></div>
                    <div class="col col-sm-2 col-lg-2"></div>
                </div>
                <div class="row ">
                  <div class="col col-sm-4 col-lg-4">
                        <div class="row">
                                <p class="textoForm"><strong>Nome:</strong> <?=$config[0]['nome']?></p>
                        </div>
                        <br>
                        <div class="row">
                                <p class="textoForm" ><strong>Endereço:</strong> <?=$config[0]['endereco']?></p>
                        </div>
                        <br>
                        <div class="row">
                                <p class="textoForm"><strong>Telefone fixo:</strong> <?=$config[0]['fixo']?></p>
                        </div>
                  </div>
                  <div class="col  col-sm-4 col-lg-4">
                        <div class="row">
                                <p class="textoForm"><strong>Email:</strong> <?=$config[0]['email']?></p>
                        </div>
                        <br>
                        <div class="row"> 
                                <p class="textoForm"><strong>Horario de Funcionamento:</strong> <?=$config[0]['horarioDeFuncionamento']?></p>
                        </div>
                        <br>
                        <div class="row">
                                <p class="textoForm"><strong>Celular:</strong><?=$config[0]['celular']?></p>
                        </div>
                  </div>
                  <div class="col  col-sm-4 col-lg-4"  >
                    <div class="row">
                      <img  style="max-height: 30vh; max-width: 30vh; margin: 0 auto;" src="images/<?=$config[0]['logo']?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col col-sm-5 col-lg-5"></div>
                      <button  class="btn btn-primary plr-50 mlr-5 mb-10" data-toggle="modal"   data-target="#modalAlterar" onclick="preencherCampos('<?=$config[0]['nome']?>','<?=$config[0]['endereco']?>','<?=$config[0]['email']?>','<?=$config[0]['horarioDeFuncionamento']?>','<?=$config[0]['logo']?>','<?=$config[0]['slogan']?>','<?=$config[0]['fixo']?>','<?=$config[0]['celular']?>')">Alterar</button> 
                  <div class="col col-sm-5 col-lg-5"></div>  
                </div>
              </blockquote>
            </div>
          </div>
        </div><!-- container -->
</section>
<section class="w-100">
  <div class="container h-100 w-100">
    <div class="card">
      <div class="card-header">
        <h4>Imagens do Site</h4>
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <table class="table table-hover" >
          <thead class="thead-dark">
            <tr>
              <th scope="col" class="tdWidth">Local da Imagem</th>
              <th scope="col">Imagem</th>
              <th scope="col">Função</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="col" class="tdWidth">Home</td>
              <td scope="col" class="tdWidth"><img src="images/estrutura_site/slider_home.jpg" style="max-width: 40%;max-height: auto;"></td>
              <td scope="col">
                <form method="POST" enctype="multipart/form-data" id="formHome">
                  <input type="hidden" name="local" value="slider_home">
                  <input type="file" id="upload_file_home" name="upload_file" style="width:0.1px;height:0.1px;opacity:0;overflow:hidden;position:absolute;z-index:-1;" onchange="confirmar('formHome')">
                  <label id="upload_btn" for="upload_file_home"><div class ="btn btn-primary">Alterar</div></label>
                </form>
              </td>
            </tr>
            <tr>
              <td scope="col" class="tdWidth">Sobre nós</td>
              <td scope="col" class="tdWidth"><img src="images/estrutura_site/slider_sobre_nos.jpg" style="max-width: 40%;max-height: auto;"></td>
              <td scope="col">
                <form method="POST" enctype="multipart/form-data" id="formSobreNos">
                  <input type="hidden" name="local" value="slider_sobre_nos">
                  <input type="file" id="upload_file_sbNos" name="upload_file" style="width:0.1px;height:0.1px;opacity:0;overflow:hidden;position:absolute;z-index:-1;" onchange="confirmar('formSobreNos')">
                  <label id="upload_btn" for="upload_file_sbNos"><div class ="btn btn-primary">Alterar</div></label>
                </form>
              </td>
            </tr>
            </tr>
            <tr>
              <td scope="col" class="tdWidth">Serviços</td>
              <td scope="col" class="tdWidth"><img src="images/estrutura_site/slider_servicos.jpg" style="max-width: 40%;max-height: auto;"></td>
              <td scope="col">
                <form method="POST" enctype="multipart/form-data" id="formServicos">
                  <input type="hidden" name="local" value="slider_servicos">
                  <input type="file" id="upload_file_servicos" name="upload_file" style="width:0.1px;height:0.1px;opacity:0;overflow:hidden;position:absolute;z-index:-1;" onchange="confirmar('formServicos')">
                  <label id="upload_btn" for="upload_file_servicos"><div class ="btn btn-primary">Alterar</div></label>
                </form>
              </td>
            </tr>
            <tr>
              <td scope="col" class="tdWidth">Promoções</td>
              <td scope="col" class="tdWidth"><img src="images/estrutura_site/slider_promocoes.jpg" style="max-width: 40%;max-height: auto;"></td>
              <td scope="col">
                <form method="POST" enctype="multipart/form-data" id="formPromocoes">
                  <input type="hidden" name="local" value="slider_promocoes">
                  <input type="file" id="upload_file_promocoes" name="upload_file" style="width:0.1px;height:0.1px;opacity:0;overflow:hidden;position:absolute;z-index:-1;" onchange="confirmar('formPromocoes')">
                  <label id="upload_btn" for="upload_file_promocoes"><div class ="btn btn-primary">Alterar</div></label>
                </form>
              </td>
            </tr>
            <tr>
              <td scope="col" class="tdWidth">Sobre nós/equipe 1</td>
              <td scope="col" class="tdWidth"><img src="images/estrutura_site/sobre_nos1.jpg" style="max-width: 40%;max-height: auto;"></td>
              <td scope="col">
                <form method="POST" enctype="multipart/form-data" id="formSobreNos1">
                  <input type="hidden" name="local" value="sobre_nos1">
                  <input type="file" id="upload_file_sbNos1" name="upload_file" style="width:0.1px;height:0.1px;opacity:0;overflow:hidden;position:absolute;z-index:-1;" onchange="confirmar('formSobreNos1')">
                  <label id="upload_btn" for="upload_file_sbNos1"><div class ="btn btn-primary">Alterar</div></label>
                </form>
              </td>
            </tr>
            <tr>
              <td scope="col" class="tdWidth">Sobre nós/equipe 2</td>
              <td scope="col" class="tdWidth"><img src="images/estrutura_site/sobre_nos2.jpg" style="max-width: 40%;max-height: auto;"></td>
              <td scope="col">
                <form method="POST" enctype="multipart/form-data" id="formSobreNos2">
                  <input type="hidden" name="local" value="sobre_nos2">
                  <input type="file" id="upload_file_sbNos2" name="upload_file" style="width:0.1px;height:0.1px;opacity:0;overflow:hidden;position:absolute;z-index:-1;" onchange="confirmar('formSobreNos2')">
                  <label id="upload_btn" for="upload_file_sbNos2"><div class ="btn btn-primary">Alterar</div></label>
                </form>
              </td>
            </tr>
            <tr>
              <td scope="col" class="tdWidth">Rodapé</td>
              <td scope="col" class="tdWidth"><img src="images/estrutura_site/rodape.jpg" style="max-width: 40%;max-height: auto;"></td>
              <td scope="col">
                <form method="POST" enctype="multipart/form-data" id="formRodape">
                  <input type="hidden" name="local" value="rodape">
                  <input type="file" id="upload_file_rodape" name="upload_file" style="width:0.1px;height:0.1px;opacity:0;overflow:hidden;position:absolute;z-index:-1;" onchange="confirmar('formRodape')">
                  <label id="upload_btn" for="upload_file_rodape"><div class ="btn btn-primary">Alterar</div></label>
                </form>
              </td>
            </tr>
          </tbody>
        </table>    
        </blockquote>
      </div>
    </div>
      
  </div>
</section>


<section class="">
    <div class="modal fade " id="modalAlterar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header color-white bg-black">
            <h5 class="modal-title" id="exampleModalLabel">Alterar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              
            </button>
          </div>
          <div class="modal-body">

            <!--FORMULÁRIO DE EDIÇÃO-->

            <form enctype="multipart/form-data" method="POST">
                <!--CODIGO DO PRODUTO-->
                <div class="row" style="margin-left: 1%;">
                        <div class="col">
                                <div class="row">
                                        <div class="input-group mb-2 lowWidth">
                                          <input type="text" id="nome" class="form-control"  placeholder="Nome do Restaurante:" aria-label="Usuário" name="nome_editar" required>
                                        </div>
                                </div>
                                <br>
                                <div class="row">
                                        <div class="input-group mb-2 lowWidth">
                                          <input type="text" id="endereco" class="form-control"  placeholder="Endereço:" aria-label="Ingrediente" name="endereco_editar" required>
                                        </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="input-group mb-2 lowWidth">
                                    <input type="text" id="fixo"  class="form-control phone"  placeholder="Telefone Fixo" aria-label="Preco" name="telefoneFixo_editar" required>
                                  </div>
                                </div> 
                        </div>
                        <div class="col">
                          <div class="row">
                              <div class="input-group mb-2 lowWidth">
                                <input type="text" id="horarioDeFuncionamento"  class="form-control"  placeholder="horario De Funcionamento:" aria-label="Preco" name="horarioDeFuncionamento_editar" required>
                              </div>    
                          </div>
                          <br>
                          <div class="row">
                            <div class="input-group mb-2 lowWidth">
                              <input type="text" id="email"  class="form-control"  placeholder="Email:" aria-label="Preco" name="email_editar" required>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="input-group mb-2 lowWidth">
                              <input type="text"  id="celular"  class="form-control phone"  placeholder="Telefone Celular" aria-label="Preco" name="telefoneCelular_editar" required>
                            </div>
                          </div>              
                        </div>
                </div>      
                </br>
                <div class="input-group mb-2">
                  <input type="text"  id="slogan"  class="form-control"  placeholder="Slogan:" aria-label="Slogan" name="slogan_editar" required>
                </div>
                </br>
                         
             <div class="input-group mb-2 w-40">
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
              <input type="hidden" id="logo_res" name="logo_res" value="<?=$config[0]['logo']?>">
              <img id="exemplo_foto_editar" style="width: 100px;height: 100px" >   
              </div>
              <div class="modal-footer">
            
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                
                <button type="submit" value="cadastrar" name="acao" class="btn btn-primary">Salvar</button>
                
              </div>
            </form>
        </div>
      </div>
    </div>
</section>

<section>
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
</section>




<?php
        include_once ('rodape.php');
?>

<!-- SCIPTS -->
<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
<script src="plugin-frameworks/bootstrap.min.js"></script>
<script src="plugin-frameworks/jquery.mask.js"></script>
<script src="plugin-frameworks/swiper.js"></script>
<script src="common/scripts.js"></script>
<script type="text/javascript">
      function preencherCampos(nome,endereco,email,horarioDeFuncionamento,logo,slogan,fixo,celular){
        $("input#nome").val(nome);
        $("input#endereco").val(endereco);
        $("input#email").val(email);
        $("input#horarioDeFuncionamento").val(horarioDeFuncionamento);
        $("input#slogan").val(slogan);
        $("input#fixo").val(fixo);
        $("input#celular").val(celular);
        $("img#exemplo_foto_editar").attr('src',"images/"+logo);

      }  



        function readURL(input, id) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#'+id).attr('src', e.target.result);
           }

           reader.readAsDataURL(input.files[0]);
       }

   }

        var behavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        options = {
            onKeyPress: function (val, e, field, options) {
                field.mask(behavior.apply({}, arguments), options);
            }
        };

        $('.phone').mask(behavior, options);


        var form;
        function confirmar(form){
          $('#nomeForm').val(form);
          $('#modalConfirmar').modal('show');
        }

        function submeter(){
          form =$('#nomeForm').val();
          document.getElementById(form).submit();
          
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