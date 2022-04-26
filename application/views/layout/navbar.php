<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.html">
                    <span class="align-middle">Klinik Fitria</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Pages
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= base_url() ?>">
                            <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= base_url('pasien') ?>">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Pasien</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= base_url('tindakan') ?>">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Tindakan</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= base_url('obat') ?>">
                            <i class="align-middle" data-feather="heart"></i> <span class="align-middle">Obat</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= base_url('rawat') ?>">
                            <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Rawat</span>
                        </a>
                    </li>
                    
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="<?= base_url('dashboard/graph') ?>">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Graph</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
            </nav>