<!-- sidebar -->
<?php $this->load->view('layout/sidebar'); ?>
<!-- Main Content -->
<div id="content">
    <?php $this->load->view('layout/navbar'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('/'); ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
            </ol>
        </nav>
        <?php if ($menssage = $this->session->flashdata('sucesso')) : ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><i class="far fa-smile-wink">&nbsp;&nbsp;</i><?php echo $menssage; ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($menssage = $this->session->flashdata('error')) : ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="fas fa-exclamation-triangle">&nbsp;&nbsp;</i><?php echo $menssage; ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?php echo base_url('c_mil_a/add'); ?>" title="Cadastrar novo Comando Militar" class="btn btn-success btn-sm float-right"><i class="fas fa-user-plus"></i>&nbsp;Novo</a>
                <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Sigla</th>
                                <th>Comando Militar de Área</th>
                                <th class="no-sort pr-4">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($c_mil_a as $comando) : ?>
                                <tr class="text-center">
                                    <td><?php echo $comando->id_c_a_mil; ?></td>
                                    <td><?php echo $comando->sigla; ?></td>
                                    <td><?php echo $comando->name; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" title="Editar" href=<?php echo base_url('c_mil_a/edit/' . $comando->id_c_a_mil); ?>><i class="fas fa-user-edit"></i>&nbsp;Editar</a>
                                        <a href="javascript(void)" data-toggle="modal" data-target="#comando-<?php echo $comando->id_c_a_mil; ?>" title="Excluir" class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i>&nbsp;Excluir</a>
                                    </td>
                                </tr>
                                <!-- Modal function for del -->
                                <div class="modal fade" id="comando-<?php echo $comando->id_c_a_mil; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tem certeza da que deseja excluir o &nbsp;<strong><?php echo $comando->name; ?></strong>?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Para excluir o registro clique em <strong>Sim</strong></div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
                                                <a class="btn btn-danger btn-sm" href="<?php echo base_url('c_mil_a/del/' . $comando->id_c_a_mil); ?>">Sim</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  End Modal for del -->
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->