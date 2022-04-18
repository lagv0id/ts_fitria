<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Klinik Fitria</title>
    <!-- Load style dari bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Cek apakah ada var $css_files yang didapat dari Grocery Crud -->
    <?php if (!empty($css_files)) {

        /** Loading style untuk Grocery CRUD 
         * 
         * Dari output Grocery CRUD didapat array $css_files dan $js_files yang
         * digunakan untuk mengatur tampilan dari tabel. Kode dibawah cuma agar
         * tidak terlalu banyak baris <link rel="stylesheet"> yang harus dipanggil
         */

        foreach ($css_files as $file) : ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>

        <?php foreach ($js_files as $file) : ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>

    <?php } ?>
</head>

<body>