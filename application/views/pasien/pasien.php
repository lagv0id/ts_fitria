<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Halaman Pasien</h5>
                <h6 class="card-subtitle mb-2 text-muted">Data Pasien Klinik Fitria</h6>
                <hr>
                <a href="Pasien/add" class="btn btn-primary">Tambah Pasien</a>
                <hr>
                <table class="table" id="tabelpasien">
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tabelpasien').DataTable({
            responsive: true
        });
    });
</script>

</body>

</html>