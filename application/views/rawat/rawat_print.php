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
            <th>TANGGAL</th>
            <th>TINDAKAN</th>
            <th>DOKTER</th>
            <th>BIAYA</th>
        </tr>
        <tr>
            <td><?php echo $detail['tglrawat']?></td>
            <td></td>
            <td></td>
            <td><?php echo $detail['totaltindakan']?></td>
        </tr>
    </table>
    <h4>DAFTAR OBAT PASIEN</h4>
    <table id="table"> 
        <tr>
            <th>TANGGAL</th>
            <th>KODE</th>
            <th>NAMA OBAT</th>
            <th>JUMLAH</th>
            <th>HARGA</th>
        </tr>
        <tr>
            <td><?php echo $detail['tglrawat']?></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $detail['totalobat']?></td>
        </tr>
    </table>
    <br>
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