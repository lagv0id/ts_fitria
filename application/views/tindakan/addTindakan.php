<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Tambah Tindakan</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="<?php echo base_url('Tindakan/insert') ?>" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="idtindakan" class="form-label">ID Tindakan</label>
                                        <input type="text" name="idtindakan" class="form-control" id="idtindakan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="namatindakan" class="form-label">Nama Tindakan</label>
                                        <input type="text" name="namatindakan" class="form-control" id="namatindakan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="biaya" class="form-label">Biaya</label>
                                        <input type="text" name="biaya" class="form-control" id="biaya">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?= base_url('Tindakan'); ?>" class="btn btn-danger btn-md">Kembali</a>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<?php $this->load->view('layout/footer'); ?>

</body>

</html>