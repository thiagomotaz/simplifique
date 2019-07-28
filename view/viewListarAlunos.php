<?php require '../inc/_global/config.php'; ?>
<?php require '../inc/backend/config.php'; ?>
<?php require '../inc/_global/views/head_start.php'; ?>

<!-- Page JS Plugins CSS -->
<?php $cb->get_css('js/plugins/datatables/dataTables.bootstrap4.css'); ?>


<?php require '../inc/_global/views/head_end.php'; ?>
<?php require '../inc/_global/views/page_start.php'; ?>

<?php $cb->get_css('js/plugins/sweetalert2/sweetalert2.min.css'); ?>

<style>
    /* Start by setting display:none to make this hidden.
   Then we position it in relation to the viewport window
   with position:fixed. Width, height, top and left speak
   for themselves. Background we set to 80% white with
   our animation centered, and no-repeating */
.fuck {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba(255, 255, 255, .8) url('../assets/loading.gif') 50% 50% no-repeat;
}

/* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
body.loading .fuck {
    overflow: hidden;   
}

/* Anytime the body has the loading class, our
   modal element will be visible */
body.loading .fuck{
    display: block;
}
</style>

<!-- Page Content -->
<div class="content">
    <div class="my-50 text-center">
        <h2 class="font-w700 text-black mb-10">
            <i class="fa fa-eye text-muted mr-5 text-primary"></i> Listar alunos
        </h2>
        <h3 class="h5 text-muted mb-0">
            Clique em ver aluno para ver/editar seus detalhes ou exclua-o
        </h3>
    </div>

    <!-- Dynamic Table Full -->
    <div class="block block-rounded block-fx-shadow table-responsive">
        <!-- <div class="block-header block-header-default">
            <h3 class="block-title">Dynamic Table <small>Full</small></h3>
        </div> -->
        <div class="block-content block-content-full ">
            <table class="table table-bordered table-hover js-dataTable-full" cellspacing="0" width="100%"
                style="width: 100%; white-space: normal;" id="listar_alunos">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome</th>
                        <th>Cpf</th>
                        <th>Data</th>
                        <th>Email</th>
                        <th>Senha</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</form>
    <!-- END Dynamic Table Full -->

<style>
#nomeP {
  display: block;
  width: 100px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
    </style>

    <!-- <button type="button" class="btn btn-alt-info" data-toggle="modal" data-target="#verCurso">Launch Modal</button> -->
    <!-- Normal Modal -->
    <form class="form-horizontal" id="verAluno-form" method="POST">
    <input type="hidden" name="acao" value="editar">
    <div class="modal" id="verAluno" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
            <input type="hidden" name="id" id="id">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary">
                        <h3 class="block-title" id="nomeP"></h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="nome" name="nome">
                                    <label for="nome">Nome do aluno</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="cpf" name="cpf"></input>
                                    <label for="cpf">CPF do aluno</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material">
                                    <input type="text" class="js-masked-date form-control" id="data" name="data"></input>
                                    <label for="data">Data de nascimento do aluno</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="email" name="email"></input>
                                    <label for="email">Email do aluno</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material">
                                    <input type="text" class="form-control" id="senha" name="senha"></input>
                                    <label for="senha">Senha do aluno</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-alt-success" id="btnEditarAluno" data-dismiss="modal">
                        <i class="fa fa-check"></i> Salvar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Normal Modal -->
</div>
<div class="fuck"><!-- Place at bottom of page --></div>

<!-- END Page Content -->

<?php require '../inc/_global/views/page_end.php'; ?>
<?php require '../inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $cb->get_js('js/plugins/datatables/jquery.dataTables.min.js'); ?>
<?php $cb->get_js('js/plugins/datatables/dataTables.bootstrap4.min.js'); ?>
<?php $cb->get_js('/js/plugins/jquery-validation/jquery.validate.min.js'); ?>

<?php $cb->get_js('/js/plugins/sweetalert2/sweetalert2.min.js'); ?>
<style>
table.dataTable tbody td {
    word-break: break-word;
    vertical-align: top;
}

table.dataTable tbody td {
    word-break: break-word;
    vertical-align: top;
}
</style>
<script>
$(document).ready(function() {
    jQuery('.js-dataTable-full').dataTable({
        "columnDefs": [{
                "targets": [0],
                "visible": false,
            },
            {
                "targets": [1],
                "visible": true,
            },
            {
                "targets": [2],
                "visible": true,
            },
            {
                "targets": [3],
                "visible": false,
            },
            {
                "targets": [4],
                "visible": true,
            },
            {
                "targets": [5],
                "visible": false,
            },
            {
                "targets": [6],
                "visible": true,
            }
        ],
        "pagingType": "simple_numbers",
        "pageLength": 5,
        "ajax": {
            "url": "viewAjaxAlunos.php",
            "type": "POST"
        },
        "columns": [{
                "data": "idAluno"
            },
            {
                "data": "nomeAluno",
                // "width": "80%"
            },
            {
                "data": "cpfAluno",
                // "width": "80%"
            },
            {
                "data": "dataAluno",
                // "width": "80%"
            },
            {
                "data": "emailAluno",
                // "width": "80%"
            },
            {
                "data": "senhaAluno"
            },
            {
                "data": "button",
                // "width": "20%"
            }
        ],
        "order": [[ 0, "desc" ]],
        "lengthMenu": [
            [5, 10, 15, 20],
            [5, 10, 15, 20]
        ],
        "autoWidth": false,
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": " >",
                "sPrevious": "< ",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
        }
    });
});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#cpf").mask("999.999.999-99");
	});
</script>

<?php $cb->get_js('/js/custom/aluno.js'); ?>

<?php $cb->get_js('js/plugins/masked-inputs/jquery.maskedinput.min.js'); ?>
<script>jQuery(function(){ Codebase.helpers(['masked-inputs']); });</script>

<!-- Page JS Code -->

<?php require '../inc/_global/views/footer_end.php'; ?>