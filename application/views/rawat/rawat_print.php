<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Nota</title>
    <style>
            #table {
                border-collapse: collapse;
                width: 100%;
            }

            #table td, #table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #table tr:nth-child(even){background-color: #f2f2f2;}

            #table th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: left;
                color: black;
            }
        </style>
</head>
<body>
    <h4>NOTA RAWAT JALAN</h4>
    <h4>KLINIK FITRIA</h4>
    Jl. Metro Kota No 130, Metro, Lampung <br>
    <br>
    <table width=30%>
        <tr>
            <td>No Rawat</td>
            <td>:</td>
            <td><?php echo $detail['idrawat']?></td>
        </tr>
        <tr>
            <td>Tgl Rawat</td>
            <td>:</td>
            <td><?php echo $detail['tglrawat']?></td>
        </tr>
        <tr>
            <td>No RM</td>
            <td>:</td>
            <td><?php echo $detail['idpasien']?></td>
        </tr>
        <tr>
            <td>Nama Pasien</td>
            <td>:</td>
            <td><?php echo $detail['nama']?></td>
        </tr>
        </table>
    <h4>DAFTAR TINDAKAN PASIEN</h4>
    <table id="table"> 
        <tr>
            <th>TINDAKAN</th>
            <th>DOKTER</th>
            <th>BIAYA</th>
        </tr>
        <?php foreach ($rt as $item) {?>
        <tr>
            <td><?php echo $item['idtindakan']?></td>
            <td><?php echo $item['namadokter'] ?></td>
            <td><?php echo $item['biaya']?></td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <p style="text-align:right;">TOTAL TINDAKAN : Rp. <?php echo $detail['totaltindakan']?></p>
    <h4>DAFTAR OBAT PASIEN</h4>
    <table id="table"> 
        <tr>
            <th>KODE/NAMA OBAT</th>
            <th>JUMLAH</th>
            <th>HARGA</th>
        </tr>
        <?php foreach ($ro as $item) {?>
        <tr>
            <?php if(isset($item['idobat'])): ?>
            <td><?php echo $item['idobat']?></td>
            <td><?php echo $item['jumlah']?></td>
            <?php else: ?>
                <td>null</td>    
                <td>null</td>
            <?php endif; ?>
            <td><?php echo $item['harga']?></td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <p style="text-align:right;">TOTAL OBAT : Rp. <?php echo $detail['totalobat']?></p>
    
    <table width=35%>
        <tr>
            <td>TOTAL TINDAKAN</td>
            <td>(Rp)</td>
            <td>:</td>
            <td><?php echo $detail['totaltindakan']?></td>
        </tr>
        <tr>
            <td>TOTAL OBAT</td>
            <td>(Rp)</td>
            <td>:</td>
            <td><?php echo $detail['totalobat']?></td>
        </tr>
        <tr>
            <td>BIAYA TOTAL</td>
            <td>(Rp)</td>
            <td>:</td>
            <td><?php echo $detail['totalharga']?></td>
        </tr>
        <tr>
            <td>UANG MUKA</td>
            <td>(Rp)</td>
            <td>:</td>
            <td><?php echo $detail['uangmuka']?></td>
        </tr>
        <tr>
            <td>KEKURANGAN</td>
            <td>(Rp)</td>
            <td>:</td>
            <td><?php echo $detail['kurang']?></td>
        </tr>
    </table>
    <br>
    <center>***TERIMA KASIH***</center>
</body>
</html>