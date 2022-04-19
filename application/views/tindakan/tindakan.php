<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container mt-4">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Halaman Tindakan</h5>
                <h6 class="card-subtitle mb-2 text-muted">Data Tindakan Pasien Klinik Fitria</h6>
                <hr>
                <a href="Tindakan/add_Tindakan" class="btn btn-primary">Tambah Tindakan</a>
                <hr>
                <table class="display" id="tabelbuku">

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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tabelbuku').DataTable();
    });
</script>

</body>

</html>