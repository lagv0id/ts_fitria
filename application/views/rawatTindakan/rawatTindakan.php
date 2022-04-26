<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="card">
            <div class="card-body">

                <?php if ($this->session->flashdata('pesan') != '') { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('pesan'); ?>
                    </div>
                <?php } ?>

                <h5 class="card-title">Halaman Rawat-Tindakan</h5>
                <h6 class="card-subtitle mb-2 text-muted">Data Tindakan per ID Rawat</h6>

                <hr><a href="<?php echo base_url('rawatTindakan/add') ?>" class="btn btn-primary">Tambah Data Tindakan-Rawat</a>
                <hr>

                <table class="display text-center" id="tabelrawat">

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
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tabelrawat').DataTable({
            responsive: true
        });
    });
</script>

</body>

</html>