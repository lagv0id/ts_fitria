<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('pasien') ?>">PASIEN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('obat') ?>">OBAT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('tindakan') ?>">TINDAKAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('rawat') ?>">RAWAT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('rawattindakan') ?>">RAWAT-TINDAKAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('rawatobat') ?>">RAWAT-OBAT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>