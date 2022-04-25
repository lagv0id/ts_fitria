<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Halaman Obat</h5>
                <h6 class="card-subtitle mb-2 text-muted">Data Obat Klinik Fitria</h6>

                <hr><a href="<?php echo base_url('obat/add') ?>" class="btn btn-primary">Tambah Obat</a>
                <hr>

                <table class="display" id="tabelobat">

                    <thead>
                        <tr>
                            <th>ID Obat</th>
                            <th>Nama Obat</th>
                            <th>Harga Obat</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#tabelobat').DataTable({
            responsive: true,
            "processing": true,
            "serverSide": true,
            "ajax": "<?php echo base_url('obat/proses') ?>",
            "columnDefs" : [{
                "render" : tombol,
                "data" : null,
                "targets" : [3]
            }]
        });
    });

    function tombol() {
        return `<button class="btn btn-warning edit">Edit</button><button class="btn btn-danger delete">Delete</button>`;
    }

    $('.table-datatable tbody').on('click', '.edit',function(){
        var row = $(this).closest('tr');
        var data = table.row(row).data()[0];
        document.location.href = 'obat/edit/' + data;
    })

    $('.table-datatable tbody').on('click', '.delete',function(){
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