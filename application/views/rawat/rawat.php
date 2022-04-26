<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>DATA</strong> Rawat</h1>

        <div class="row">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Tabel Rawat</h5> 

                    <hr>
                    <a href="<?php echo base_url('rawat/add') ?>" class="btn btn-primary">Tambah Data Rawat</a>
                    <hr>

                    <table class="display text-center" id="tabelrawat">

                        <thead>
                            <tr>
                                <th>ID Rawat</th>
                                <th>Tanggal Rawat</th>
                                <th>ID Pasien</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($list as $item) { ?>
                                <tr>
                                    <td><?php echo $item['idrawat'] ?></td>
                                    <td><?php echo $item['tglrawat'] ?></td>
                                    <td><?php echo $item['idpasien'] ?></td>
                                    <td>
                                        <a href="<?php echo base_url() ?>rawat/print/<?php echo $item['idrawat']; ?>" class="btn btn-success">Cetak</a>
                                        <a href="<?php echo base_url() ?>rawat/edit/<?php echo $item['idrawat']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="rawat/delete/<?php echo $item['idrawat']; ?>" onclick="return confirm('Data ini akan dihapus. Anda yakin?')" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Tabel Rawat-Tindakan</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Data Tindakan per ID Rawat</h6>

                    <hr><a href="<?php echo base_url('rawatTindakan/add') ?>" class="btn btn-primary">Tambah Data Tindakan-Rawat</a>
                    <hr>

                    <table class="display text-center" id="tabelrawattindakan">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID Rawat</th>
                                <th>ID Tindakan</th>
                                <th>Nama Dokter</th>
                                <th>Biaya</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($rtlist as $item) { ?>
                                <tr>
                                    <td><?php echo $item['idrawattindakan'] ?></td>
                                    <td><?php echo $item['idrawat'] ?></td>
                                    <td><?php echo $item['idtindakan'] ?></td>
                                    <td><?php echo $item['namadokter'] ?></td>
                                    <td><?php echo $item['biaya'] ?></td>

                                    <td>
                                        <a href="rawattindakan/edit/<?php echo $item['idrawattindakan']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="rawattindakan/delete/<?php echo $item['idrawattindakan']; ?>" onclick="return confirm('Data ini akan dihapus. Anda yakin?')" class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="row">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Tabel Rawat-Obat</h5>
                <h6 class="card-subtitle mb-2 text-muted">Data Obat per ID Rawat</h6>

                <hr><a href="<?php echo base_url('rawatObat/add') ?>" class="btn btn-primary">Tambah Data Tindakan-Obat</a>
                <hr>

                <table class="display text-center" id="tabelrawatobat">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Rawat</th>
                            <th>ID Obat</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($rolist as $item) { ?>
                            <tr>
                                <td><?php echo $item['idrawatobat'] ?></td>
                                <td><?php echo $item['idrawat'] ?></td>
                                <td><?php echo $item['idobat'] ?></td>
                                <td><?php echo $item['jumlah'] ?></td>
                                <td><?php echo $item['harga'] ?></td>

                                <td>
                                    <a href="rawatobat/edit/<?php echo $item['idrawatobat']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="rawatobat/delete/<?php echo $item['idrawatobat']; ?>" onclick="return confirm('Data ini akan dihapus. Anda yakin?')" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    </div>
</main>

<?php $this->load->view('layout/footer'); ?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#tabelrawat').DataTable({
            responsive: true
        });

        $('#tabelrawattindakan').DataTable({
            responsive: true
        });
        
        $('#tabelrawatobat').DataTable({
            responsive: true
        });
    });

    <?php if ($this->session->flashdata('pesan') != '') { ?>
        Swal.fire({
            icon: 'success',
            title: 'SUCCESS',
            text: 'Whatever you did it was successful idk',
            confirmButtonText: 'OK Cool'
        })
    <?php } elseif ($this->session->flashdata('gagal') != '') { ?>
        Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: 'Eror i piye?',
            confirmButtonText: 'Selow mas'
        })
    <?php } ?>
</script>

</body>

</html>