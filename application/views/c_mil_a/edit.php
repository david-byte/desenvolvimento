<!-- sidebar -->
<?php $this->load->view('layout/sidebar'); ?>
<!-- Main Content -->
<div id="content">
    <?php $this->load->view('layout/navbar'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('c_mil_a') ?>">Comando Militar de Área</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">

            </div>
            <div class="card-body">
                <form method="POST" name="form_edit">
                    <div class="form-group d-flex justify-content-center">
                        <div class="col-md-4">
                            <label>Comando Militar de Área:</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $c_mil_a->name; ?>" placeholder="Nome do C Mil A">
                            <?php echo form_error('sigla', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-2">
                            <label>Sigla:</label>
                            <input type="text" class="form-control" name="sigla" value="<?php echo $c_mil_a->sigla;?>" placeholder="Sigla">
                            <?php echo form_error('sigla', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <!-- pegando o id do usuario -->
                    <input type="hidden" name="id_c_a_mil" value="<?php echo $c_mil_a->id_c_a_mil; ?>">

                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-sm mr-3">Salvar</button>
                        <a href="<?php echo base_url('c_mil_a/'); ?>" title="Voltar" class="btn btn-success btn-sm">Voltar</a>
                    </div>
                </form>
            </div>



        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->