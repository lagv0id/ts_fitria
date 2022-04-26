<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>INSERT</strong> Data Rawat Tindakan</h1>

        <div class="row">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Rawat Tindakan</h5>
                    <h6 class="card-subtitle mb-2 text-muted">lipsum</h6>

                    <form method="POST" action="<?php echo base_url('rawattindakan/insert') ?>">

                        <label for="idrawattindakan">ID Rawat Tindakan : </label><input type="text" class="form-control" name="idrawattindakan">

                        <label for="idrawat">ID Rawat : </label><select class="form-select" name="idrawat">
                            <?php foreach ($rawat as $item) { ?>
                                <option value="<?php echo $item['idrawat']; ?>"><?php echo $item['idrawat'] . ' - ' . $item['idpasien']; ?></option>
                            <?php } ?>
                        </select>

                        <label for="idtindakan">ID Tindakan : </label><select class="form-select" name="idtindakan">
                            <?php foreach ($tindakan as $item) { ?>
                                <option value="<?php echo $item['idtindakan']; ?>"><?php echo $item['idtindakan'] . ' - ' . $item['namatindakan']; ?></option>
                            <?php } ?>
                        </select>

                        <label for="namadokter">Nama Dokter : </label>
                        <select name="namadokter" id="dokter" class="form-select">
                            <option value=""></option>
                        </select>

                        <br><button type="submit" class="btn btn-primary">Tambah data</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Rawat Tindakan</h5>
                    <h6 class="card-subtitle mb-2 text-muted">lipsum</h6>
                    <table class="table">
                        <thead>
                            <th>ID Dokter</th>
                            <th>Nama Dokter</th>
                        </thead>
                        <tbody id="docDisplay">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>

<?php $this->load->view('layout/footer'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $.ajax({
        url: "https://rosihanari.net/api/api.php?get=dokter",
        type: "GET",
        dataType: "json",
        success: function(result) {

            result.forEach(element => {

                //Buat tabel
                const docRow = document.createElement("tr");

                const docID = document.createElement("td");
                docID.innerHTML = element.iddokter;
                docRow.appendChild(docID);

                const docName = document.createElement("td");
                docName.innerHTML = element.namadokter;
                docRow.appendChild(docName);

                document.getElementById("docDisplay").appendChild(docRow);

                //Buat drop down
                const dokter = document.getElementById("dokter");

                const option = document.createElement("option");

                option.innerText = element.namadokter;
                option.value = element.namadokter;

                dokter.appendChild(option);
            })
        }
    })
</script>

</body>

</html>