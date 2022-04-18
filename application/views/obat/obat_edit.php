<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="card pt-3">

            <?php if ($this->session->flashdata('pesan') != '') { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('pesan'); ?>
                </div>
            <?php } ?>

            <div class="card-body">
                <h5 class="card-title">Edit data obat</h5>
                <h6 class="card-subtitle mt-2 mb-2 text-muted">Ubah data obat.</h6>
                <hr>
                <form method="POST" action="<?php echo base_url('obat/update/' . $detail['idobat']) ?>">
                    <label for="idobat">ID Obat : </label><input type="text" name="idobat" class="form-control" value="<?php echo $detail['idobat'] ?>" placeholder="Format: M0XX" required>
                    <label for="namaobat">Nama Obat : </label><input type="text" name="namaobat" class="form-control" value="<?php echo $detail['nama'] ?>" placeholder="Masukkan nama obat..." required>
                    <label for="hargaobat">Harga : </label><input type="number" name="hargaobat" class="form-control" value="<?php echo $detail['harga'] ?>" placeholder="Masukkan angka harga obat..." required>
                    <button class="btn btn-primary mt-4" type="submit">Update data obat</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layout/footer'); ?>