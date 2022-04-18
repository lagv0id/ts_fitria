<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tindakan</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Tambah Tindakan</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="<?php echo base_url('Tindakan/insert') ?>" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="idtindakan" class="form-label">ID Tindakan</label>
                                        <input type="text" name="idtindakan" class="form-control" id="idtindakan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="namatindakan" class="form-label">Nama Tindakan</label>
                                        <input type="text" name="namatindakan" class="form-control" id="namatindakan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="biaya" class="form-label">Biaya</label>
                                        <input type="text" name="biaya" class="form-control" id="biaya">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?= base_url('Tindakan'); ?>" class="btn btn-danger btn-md">Kembali</a>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- <script src="<?php echo base_url('assets/css/bootstrap.min.js'); ?>" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>