<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Rawat Obat</h5>
                <h6 class="card-subtitle mb-2 text-muted">lipsum</h6>

                <form method="POST" action="<?php echo base_url('rawatobat/insert') ?>">

                    <label for="idrawatobat">ID Rawat Obat : </label><input type="text" class="form-control" name="idrawatobat" placeholder="Format ID : MR0XX">

                    <label for="idrawat">ID Rawat : </label><select class="form-select" name="idrawat">
                        <?php foreach ($rawat as $item) { ?>
                            <option value="<?php echo $item['idrawat']; ?>"><?php echo $item['idrawat']; ?></option>
                        <?php } ?>
                    </select>

                    <label for="idobat">ID Obat : </label><select class="form-select" name="idobat">
                        <?php foreach ($obat as $item) { ?>
                            <option value="<?php echo $item['idobat']; ?>"><?php echo $item['idobat']; ?></option>
                        <?php } ?>
                    </select>

                    <label for="jumlah">Jumlah : </label><input type="number" class="form-control" name="jumlah">

                    <br><button type="submit" class="btn btn-primary">Tambah data</button>
                </form>
            </div>
        </div>
    </div>

</div>

<?php $this->load->view('layout/footer'); ?> -->