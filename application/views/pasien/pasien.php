<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>DATA</strong> Pasien</h1>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tabel Pasien</h5>
                    <hr>
                    <a href="Pasien/add" class="btn btn-primary">Tambah Pasien</a>
                    <a href="Pasien/print" class="btn btn-success">Print</a>
                    <hr>
                    <table class="display text-center" id="tabelpasien">
                        <thead>
                            <tr>
                                <th>ID Pasien</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tanggal Lahir</th>
                                <th>Telepon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $item) { ?>
                                <tr>
                                    <td><?php echo $item['idpasien'] ?></td>
                                    <td><?php echo $item['nama'] ?></td>
                                    <td><?php echo $item['alamat'] ?></td>
                                    <td><?php echo $item['tgllahir'] ?></td>
                                    <td><?php echo $item['notelp'] ?></td>
                                    <td>
                                        <a href="Pasien/edit/<?php echo $item['idpasien']; ?>" type="button" class="btn btn-warning">Edit</a>
                                        <a href="Pasien/delete/<?php echo $item['idpasien']; ?>" onclick="return confirm('Apakah Anda yakin akan menghapus data?')" type="button" class="btn btn-danger">Delete</a>
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
        $('#tabelpasien').DataTable({
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