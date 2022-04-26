<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navbar'); ?>

<body>

    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Grafik penjualan obat</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent euismod at mi eu vestibulum. Vestibulum bibendum pulvinar dolor sit amet molestie. Vestibulum volutpat ante eu faucibus mollis. Phasellus quis bibendum lorem, a tincidunt nunc. Suspendisse ac urna id neque ultricies aliquet eu nec sem. Ut in molestie sem. Nullam feugiat diam eget consectetur bibendum. Pellentesque vel maximus ipsum. Aliquam luctus aliquam mi non condimentum.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; width:300px">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('/dashboard/get_total_obat') ?>",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    chartSetup(response);
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

        function chartSetup(input) {
            const data = {
                labels: input.idobat,
                datasets: [{
                    label: 'My First Dataset',
                    data: input.total,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    hoverOffset: 4
                }]
            };

            const config = {
                type: 'doughnut',
                data: data,
            };

            var ctx = $('#myChart');
            const myChart = new Chart(ctx, config);
        }
    </script>

</body>

</html>