<?php require '../inc/_global/config.php'; ?>
<?php require '../inc/backend/config_prof.php'; ?>

<?php

  require_once ('../dao/DaoNoticia.php');
    $noticiasDao = new DaoNoticia();

  ?>



<?php require '../inc/_global/views/head_start.php'; ?>

<?php $cb->get_css('js/plugins/select2/css/select2.css'); ?>
<?php $cb->get_css('js/plugins/sweetalert2/sweetalert2.min.css'); ?>


<?php require '../inc/_global/views/head_end.php'; ?>
<?php require '../inc/_global/views/page_start.php'; ?>


<!-- Page Content -->




    <style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(255, 255, 255, .8) url('../assets/loading.gif') 50% 50% no-repeat;
    }

    /* enquanto estiver carregando, o scroll da página estará desativado */
    body.loading {
        overflow: hidden;
    }

    /* a partir do momento em que o body estiver com a classe loading,  o modal aparecerá */
    body.loading .modal {
        display: block;
    }
    </style>


    <style>
    .error {
      color: red;

    }

    </style>


    <div class="content">
        <div class="my-50 text-center">
            <h2 class="font-w700 text-black mb-10">
                <i class="fa fa-plus text-muted mr-5 text-primary"></i> Cadastro de notícias </h2>





            <h3 class="h5 text-muted mb-0">
                Preencha as informaçães abaixo e clique em adicionar
            </h3>
        </div>




        <div class="block block-rounded block-fx-shadow">
            <div class="block-content">
                <form class="js-validation-noticia" id="form-cadastrar-noticia" method="POST"  >
                    <input type="hidden" name="acao" value="adicionar">




                    <h2 class="content-heading text-black">Dados da notícia</h2>
                    <div class="form-group row">
                    <div class="col-lg-4">
                            <p class="text-muted">
                                Títilo da notícia
                            </p>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="titulo" name="titulo">
                                <label for="titulo">Título</label>
                            </div>
                        </div>
                    </div>




                    <div class="form-group row">
                    <div class="col-lg-4">
                            <p class="text-muted">
                               Notícia para o curso
                            </p>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-material">

                               <select required class="js-select2 form-control" style="width: 100%;" id="curso" name="curso" data-placeholder="Selecione o curso">
                                 <option> </option>

                               <?php

                                $busca=$noticiasDao->runQuery("Select * From curso") ;
                                $busca->execute();

                                 echo "";

                                 while($array=$busca->fetch(PDO::FETCH_ASSOC)){

                                    echo "<option name='curso' value='$array[idCurso]'> $array[nomeCurso]
                                      </option>";
                                       }

                                       echo "";

                                 ?>
                                 </select>
                            </div>
                            </div>
                        </div>







                    <div class="form-group row">
                    <div class="col-lg-4">
                            <p class="text-muted">
                               Descreva a notícia
                            </p>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-material floating">
                                <textarea required  class="form-control form-control-lg text-secondary" id="descricao" name="descricao"  placeholder="Descreva">
</textarea>
                            </div>
                        </div>
                    </div>

                     </div>


             <BR>

            <!-- Form Submission -->
            <div class="form-group row">
                <div class="mx-auto">
                    <div class="form-group">
                        <button type="submit" id="button-cadastrar-noticia" class="btn btn-alt-primary">
                            <i class="fa fa-plus mr-5"></i>
                            Adicionar
                        </button>
                    </div>
                </div>
            </div>
            <!-- END Form Submission -->





            </form>
        </div>
    </div>
    </div>
    <div class="modal"><!-- Place at bottom of page --></div>
         <div id="page-loader" class="show"></div>



<!-- END Page Content -->


<?php require '../inc/_global/views/page_end.php'; ?>
<?php require '../inc/_global/views/footer_start.php'; ?>

<?php $cb->get_js('/js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $cb->get_js('/js/plugins/sweetalert2/sweetalert2.min.js'); ?>
<?php $cb->get_js('js/plugins/masked-inputs/jquery.maskedinput.min.js'); ?>
<?php $cb->get_js('js/plugins/select2/js/select2.full.min.js'); ?>

<script type="text/javascript">
	$(document).ready(function());
</script>


<script>
jQuery(function() {
    Codebase.helpers('select2');
});
</script>

<?php $cb->get_js('/js/custom/noticia.js'); ?>
<script>jQuery(function(){ Codebase.helpers(['masked-inputs']); });</script>


<?php require '../inc/_global/views/footer_end.php'; ?>




























