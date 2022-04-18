<?php $this->load->view('layout/header'); ?>

<div class="container mt-4">
    <div class="row">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Rawat Tindakan</h5>
                <h6 class="card-subtitle mb-2 text-muted">lipsum</h6>

                <form action="">

                    <label for="">ID Rawat Tindakan : </label><input type="text" class="form-control" name="idrawattindakan">
                    <label for="">ID Rawat : </label><input type="text" class="form-control" name="idrawat">
                    <label for="">ID Tindakan : </label><input type="text" class="form-control" name="idtindakan"><br>

                    <select id="dokter" class="form-select">
                        <option value=""></option>
                    </select>

                    <label for=""></label><input type="text" name="biaya" class="form-control"><br>

                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Rawat Tindakan</h5>
                <h6 class="card-subtitle mb-2 text-muted">lipsum</h6>
                <table>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $.ajax({
        url: "https://rosihanari.net/api/api.php?get=dokter",
        type: "GET",
        dataType: "json",
        success: function(result) {
            console.log(result);
            result.forEach(element => {

                const docRow = document.createElement("tr");

                const docID = document.createElement("td");
                docID.innerHTML = element.iddokter;
                docRow.appendChild(docID);

                const docName = document.createElement("td");
                docName.innerHTML = element.namadokter;
                docRow.appendChild(docName);

                document.getElementById("docDisplay").appendChild(docRow);
            })
        }
    })
</script>

<script>
    // api url
    const api_url =
        "https://rosihanari.net/api/api.php?get=dokter";

    // Defining async function
    async function getapi(url) {

        // Storing response
        const response = await fetch(url);

        // Storing data in form of JSON
        var data = await response.json();

        data.forEach(element => {

            const dokter = document.getElementById("dokter");

            const option = document.createElement("option");
            option.innerText = element.namadokter;
            option.value = element.namadokter;

            dokter.appendChild(option);

        });
    }
    // Calling that async function
    getapi(api_url);
</script>

<?php $this->load->view('layout/footer'); ?>