<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<body>
    <div class="container mt-3">
        <div class="row mb-3">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <center><h4 class="card-title">Grafik Penjualan Obat</h4></center>
                        <div class="chart-container" style="position: relative; width:300px; height:300px">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                    <center><h4 class="card-title">Grafik Workload Dokter</h4></center>
                        <div class="chart-container" style="position: relative; width:300px; height:300px">
                            <canvas id="PieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <center><h4 class="card-title">Grafik Tindakan Per Tanggal</h4></center>
                        <div class="chart-container" style="position: relative; width:300px; height:300px">
                            <canvas id="BarChart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                    <center><h4 class="card-title">Grafik Obat Per Tanggal</h4></center>
                        <div class="chart-container" style="position: relative; width:300px; height:300px">
                            <canvas id="BarChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

</div>

<?php $this->load->view('layout/footer'); ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('/dashboard/get_total_obat') ?>",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    chartSetup1(response);
                },
                error: function(jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    console.log(msg);
                },
            });
        });
    });

        function chartSetup1(input) {
            const data1 = {
                labels: input.idobat,
                datasets: [{
                    label: 'My First Dataset',
                    data: input.total,
                    backgroundColor: [
                        'rgb(255,179,186)',
                        'rgb(224,187,228)',
                        'rgb(186,225,255)',
                    ],
                    hoverOffset: 4
                }]
            };

            const config1 = {
                type: 'doughnut',
                data: data1,
            }

            var ctx1 = $('#myChart');
            const myChart = new Chart(ctx1, config1);
        }
    </script>

    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('/dashboard/get_total_tindakan') ?>",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    chartSetup2(response);
                },
                error: function(jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    console.log(msg);
                },
            });
        });

        function chartSetup2(input) {
            const data2 = {
                labels: input.namadokter,
                datasets: [{
                    label: 'My First Dataset',
                    data: input.total,
                    backgroundColor: [
                        'rgb(255,179,186)',
                        'rgb(224,187,228)',
                        'rgb(186,225,255)',
                    ],
                    hoverOffset: 4
                }]
            };

            const config2 = {
                type: 'doughnut',
                data: data2,
            }

            var ctx2 = $('#PieChart');
            const PieChart = new Chart(ctx2, config2);
        }
     </script>

    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('/dashboard/get_total_tindakan_bytgl') ?>",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    chartSetup3(response);
                },
                error: function(jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    console.log(msg);
                },
            });
        });

        function chartSetup3(input) {
            const data3 = {
                labels: input.tglrawat,
                datasets: [{
                    label: 'Jumlah Tindakan per Tanggal',
                    data: input.jumlahRawat,
                    backgroundColor: [
                        'rgb(186,225,255)'
                    ],
                    hoverOffset: 4
                }]
            };

            const config3 = {
                type: 'bar',
                data: data3,
            }

            var ctx3 = $('#BarChart1');
            const BarChart1 = new Chart(ctx3, config3);
        }
     </script>

    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('/dashboard/get_total_obat_bytgl') ?>",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    chartSetup4(response);
                },
                error: function(jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    console.log(msg);
                },
            });
        });

        function chartSetup4(input) {
            const data4 = {
                labels: input.tglrawat,
                datasets: [{
                    label: 'Jumlah Obat per Tanggal',
                    data: input.jumlahObat,
                    backgroundColor: [
                        'rgb(186,225,255)'
                    ],
                    hoverOffset: 4
                }]
            };

            const config4 = {
                type: 'bar',
                data: data4,
            }

            var ctx4 = $('#BarChart2');
            const BarChart2 = new Chart(ctx4, config4);
        }
     </script>

</body>

</html>