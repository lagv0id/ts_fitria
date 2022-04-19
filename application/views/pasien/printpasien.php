<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=H, initial-scale=1.0">
    <title>Document</title>
    <style>
            #table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table tr:hover {background-color: #ddd;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
</head>
<body>
        <div style="text-align:center">
            <h3>Daftar Pasien</h3>
        </div>
    <table id="table">
        <thead>
            <tr>
                <th>ID Pasien</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Telepon</th>
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
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>