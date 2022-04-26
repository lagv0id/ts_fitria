<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>INSERT</strong> Data Pasien</h1>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Pasien</h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <form action="<?php echo base_url('Pasien/insert') ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="idpasien" class="form-label">ID Pasien</label>
                            <input type="text" name="idpasien" class="form-control" id="idpasien">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                        </div>
                        <div class="mb-3">
                            <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tgllahir" class="form-control" id="tgllahir">
                        </div>
                        <div class="mb-3">
                            <label for="notelp" class="form-label">Telepon</label>
                            <input type="text" name="notelp" class="form-control" id="notelp" maxlength="12">
                        </div>
                        <!-- <input type="hidden" value="<?php echo ($edit['idpasien']); ?>" name="idpasien">                              -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>

<?php $this->load->view('layout/footer'); ?>

</body>

</html>