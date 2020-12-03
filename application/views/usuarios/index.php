<!-- sidebar -->
<?php $this->load->view('layout/sidebar'); ?>
<!-- Main Content -->
<div id="content">
    <?php $this->load->view('layout/navbar'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Usuários Cadastrados</li>
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
                <a href="<?php echo base_url('usuarios/add'); ?>" title="Cadastrar novo usuário" class="btn btn-success btn-sm float-right"><i class="fas fa-user-plus"></i>&nbsp;Novo</a>
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Usuário</th>
                                <th>Login</th>
                                <th>Perfil</th>
                                <th>Ativo</th>
                                <th>Contato</th>
                                </th>
                                <th class="text-center no-sort">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?php echo $user->id; ?></td>
                                    <!-- username = email -->
                                    <td><?php echo $user->first_name; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo ($this->ion_auth->is_admin($user->id) ? 'Administrador' : 'Comum'); ?> </td>
                                    <td class="text-center pr-4"><?php echo ($user->active == 1 ? '<span class="badge badge-info btn-sm">Sim</span>' : '<span class="badge badge-danger btn-sm">Não</span>'); ?></td>
                                    <td><?php echo $user->phone; ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-primary" title="Editar" href=<?php echo base_url('usuarios/edit/' . $user->id); ?>><i class="fas fa-user-edit"></i>&nbsp;Editar</a>
                                        <a href="javascript(void)" data-toggle="modal" data-target="#user-<?php echo $user->id; ?>" title="Excluir" class="btn btn-sm btn-danger"><i class="fas fa-user-times"></i>&nbsp;Excluir</a>
                                    </td>
                                </tr>
                                <?php if ($this->ion_auth->is_admin($user->id) != 'Administrador') : ?>
                                    <!-- Modal function for del -->
                                    <div class="modal fade" id="user-<?php echo $user->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza da que deseja excluir o usuário&nbsp;<strong><?php echo $user->first_name ?></strong>?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">Para excluir o registro clique em <strong>Sim</strong></div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Não</button>
                                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('usuarios/del/' . $user->id); ?>">Sim</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->ion_auth->is_admin($user->id) == 'Administrador') : ?>
                                    <div class="modal fade" id="user-<?php echo $user->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"><strong>Ação não permitida!</strong></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Você não tem permição para excluir um administrador</p>
                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fechar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
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