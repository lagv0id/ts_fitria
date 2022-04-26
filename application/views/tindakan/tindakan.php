<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tabel Tindakan</h5>
                    <hr>
                    <a href="Tindakan/add_Tindakan" class="btn btn-primary">Tambah Tindakan</a>
                    <hr>
                    <table class="display text-center" id="tabelbuku">

                        <thead>
                            <tr>
                                <th>ID Tindakan</th>
                                <th>Nama Tindakan</th>
                                <th>Biaya Tindakan</th>
                                <th class="text-center" style="width:20%;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($list as $item) { ?>
                                <tr>
                                    <td><?php echo $item['idtindakan'] ?></td>
                                    <td><?php echo $item['namatindakan'] ?></td>
                                    <td><?php echo $item['biaya'] ?></td>
                                    <td class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a href="Tindakan/edit_Tindakan/<?php echo $item['idtindakan']; ?>" class="btn btn-warning">Edit</a>
                                        <a href="Tindakan/delete/<?php echo $item['idtindakan']; ?>" onclick="return confirm('Data ini akan dihapus. Anda yakin?')" class="btn btn-danger">Hapus</a>
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
        $('#tabelbuku').DataTable();
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