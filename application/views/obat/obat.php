<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>DATA</strong> Obat</h1>

        <div class="row">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Halaman Obat</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Data Obat Klinik Fitria</h6>

                    <hr><a href="<?php echo base_url('obat/add') ?>" class="btn btn-primary">Tambah Obat</a>
                    <hr>

                    <table class="display text-center" id="tabelobat">

                        <thead>
                            <tr>
                                <th>ID Obat</th>
                                <th>Nama Obat</th>
                                <th>Harga Obat</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($list as $item) { ?>
                                <tr>
                                    <td><?php echo $item['idobat'] ?></td>
                                    <td><?php echo $item['nama'] ?></td>
                                    <td><?php echo $item['harga'] ?></td>
                                    <td>
                                        <a href="obat/edit/<?php echo $item['idobat']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="obat/delete/<?php echo $item['idobat']; ?>" onclick="return confirm('Data ini akan dihapus. Anda yakin?')" class="btn btn-danger">Delete</a>
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
        $('#tabelobat').DataTable({
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