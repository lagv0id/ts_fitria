<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>INSERT</strong> Data Rawat</h1>

        <div class="row">
            <div class="card pt-3">
                <div class="card-body">
                    <h5 class="card-title">Tambah data rawat</h5>
                    <h6 class="card-subtitle mt-2 mb-2 text-muted">Tolong masukkan data dengan benar.</h6>
                    <hr>
                    <form method="POST" action="<?php echo base_url('rawat/insert') ?>">
                        <label for="idrawat">ID Rawat : </label><input type="text" name="idrawat" class="form-control" placeholder="Format: R0XX" required>
                        <label for="tglrawat">Tanggal Rawat : </label><input type="date" name="tglrawat" class="form-control" required>
                        <label for="uangmuka">Uang muka : </label><input type="number" name="uangmuka" class="form-control" required>
                        <label for="idpasien">ID Pasien : </label><select class="form-select" name="idpasien">
                            <?php foreach ($list as $item) { ?>
                                <option value="<?php echo $item['idpasien']; ?>"><?php echo $item['idpasien']; ?></option>
                            <?php } ?>
                        </select>
                        <button class="btn btn-primary mt-4" type="submit">Tambah data rawat</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</main>

<?php $this->load->view('layout/footer'); ?>

</body>

</html>