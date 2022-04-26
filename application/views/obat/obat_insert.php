<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>INSERT</strong> Data Obat</h1>

        <div class="row">
            <div class="card pt-3">
                <div class="card-body">
                    <h5 class="card-title">Tambah data obat</h5>
                    <h6 class="card-subtitle mt-2 mb-2 text-muted">Tolong masukkan data dengan benar.</h6>
                    <hr>
                    <form method="POST" action="<?php echo base_url('obat/insert') ?>">
                        <label for="idobat">ID Obat : </label><input type="text" name="idobat" class="form-control" placeholder="Format: M0XX" required>
                        <label for="namaobat">Nama Obat : </label><input type="text" name="namaobat" class="form-control" placeholder="Masukkan nama obat..." required>
                        <label for="hargaobat">Harga : </label><input type="number" name="hargaobat" class="form-control" placeholder="Masukkan angka harga obat..." required>
                        <button class="btn btn-primary mt-4" type="submit">Tambah data obat</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>

<?php $this->load->view('layout/footer'); ?>

</body>

</html>