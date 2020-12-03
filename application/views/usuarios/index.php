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
                                    <td><?php echo $user->username; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo ($this->ion_auth->is_admin($user->id) ? 'Administrador' : 'Vendedor'); ?> </td>
                                    <td class="text-center pr-4"><?php echo ($user->active == 1 ? '<span class="badge badge-info btn-sm">Sim</span>' : '<span class="badge badge-danger btn-sm">Não</span>'); ?></td>
                                    <td><?php echo $user->phone; ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-sm btn-primary" title="Editar" href=<?php echo base_url('usuarios/edit/'$user->id);?>><i class="fas fa-user-edit"></i>&nbsp;Editar</a>
                                        <a class="btn btn-sm btn-danger" title="Excluir" href="<?php echo base_url('usuarios/del')?>"><i class="fas fa-user-times"></i>&nbsp;Escluir</a>
                                    </td>
                                </tr>
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