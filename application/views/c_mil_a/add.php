<?php $this->load->view('layout/sidebar'); ?>
<!-- Main Content -->
<div id="content">
    <?php $this->load->view('layout/navbar'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('c_mil_a'); ?>">Comando Militar de Área</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
            </ol>
        </nav>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
               
            </div>
            <div class="card-body">
                <form method="POST" name="form_add">
                    <div class="form-group d-flex justify-content-center">
                        <div class="col-md-4">
                            <label>Comando Militar de Área:</label>
                            <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?>" placeholder="Comando Militar de Área">
                            <?php echo form_error('name', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                        <div class="col-md-4">
                            <label>Sigla:</label>
                            <input type="text" class="form-control" name="sigla" value="<?php echo set_value('sigla'); ?>" placeholder="Sigla">
                            <?php echo form_error('sigla', '<small class="form-text text-danger">', '</small>') ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-sm mr-3">Salvar</button>
                    <a href="<?php echo base_url('c_mil_a/'); ?>" title="Voltar" class="btn btn-success btn-sm">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->