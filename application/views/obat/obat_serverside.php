<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

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
            responsive: true,
            "processing": true,
            "serverSide": true,
            "ajax": "<?php echo base_url('obat/proses') ?>",
            "columnDefs": [{
                "render": tombol,
                "data": null,
                "targets": [3]
            }]
        });
    });

    function tombol() {
        return `<button class="btn btn-warning edit">Edit</button><button class="btn btn-danger delete">Delete</button>`;
    }

    $('.table-datatable tbody').on('click', '.edit', function() {
        var row = $(this).closest('tr');
        var data = table.row(row).data()[0];
        document.location.href = 'obat/edit/' + data;
    })

    $('.table-datatable tbody').on('click', '.delete', function() {
        var row = $(this).closest('tr');
        var data = table.row(row).data()[0];
        document.location.href = 'obat/delete/' + data;
    })

    <?php if ($this->session->flashdata('pesan') != '') { ?>
        Swal.fire({
            icon: 'success',
            title: 'SUKSES',
            text: 'Wes iso le',
            confirmButtonText: 'oke kul'
        })
    <?php } elseif ($this->session->flashdata('gagal') != '') { ?>
        Swal.fire({
            icon: 'error',
            title: 'FAIL',
            text: 'Gagal i piye????',
            confirmButtonText: 'selow mas'
        })
    <?php } ?>
</script>

</body>

</html>