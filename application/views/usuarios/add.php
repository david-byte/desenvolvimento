<?php $this->load->view('layout/sidebar'); ?>
<!-- Main Content -->
<div id="content">
    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('usuarios'); ?>">Usuários</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
            </ol>
        </nav>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="<?php echo base_url('usuarios/'); ?>" title="Voltar" class="btn btn-success btn-sm float-right"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
            </div>
            <div class="card-body">
                <form method="POST" name="form_add">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>Nome Completo:</label>
                            <input type="text" class="form-control" name="first_name" value="<?php echo set_value('first_name'); ?>" placeholder="Nome Completo">
                            <?php echo form_error('first_name', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-4">
                            <label>Nome de Guerra:</label>
                            <input type="text" class="form-control" name="nome_guerra" value="<?php echo set_value('nome_guerra'); ?>" placeholder="Nome de Guerra">
                            <?php echo form_error('nome_guerra', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-4">
                            <label>Posto&nbsp;|&nbsp;Graduação:</label>
                            <input type="text" class="form-control" name="fk_id_posto_graduacao" value="<?php echo set_value('fk_id_posto_graduacao'); ?>" placeholder="Posto/Graduação">
                            <?php echo form_error('fk_id_posto_graduacao', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label>OM:</label>
                            <input type="text" class="form-control" name="fk_om_id_om" value="<?php echo set_value('fk_om_id_om'); ?>" placeholder="OM">
                            <?php echo form_error('fk_om_id_om', '<small class="form-text text-danger">', '</small>') ?>
                        </div>

                        <div class="col-md-4">
                            <label>E-mail:</label>
                            <input type="email" class="form-control" name="email" value="<?php echo set_value('email') ?>" placeholder="Seu Telefone">
                            <?php echo form_error('email', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-4">
                            <label>Telefone:</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Seu Telefone">
                            <?php echo form_error('phone', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Perfil de Acesso:</label>
                            <select class="form-control" name="profile_user">
                                <option value="2">Comum</option>
                                <option value="1">Administrador</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Ativo:</label>
                            <select class="form-control" name="active">
                                <option value="2">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Senha:</label>
                            <input type="password" class="form-control" name="password" placeholder="Sua senha">
                            <?php echo form_error('password', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-6">
                            <label>Confimar senha:</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confime sua senha">
                            <?php echo form_error('confirm_password', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->