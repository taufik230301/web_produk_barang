<!DOCTYPE html>
<html>

<head>
    <style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
    }
    </style>
</head>

<body>

    <h1>Laporan Produk Barang</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga Produk</th>
            <th>Diskon</th>
            <th>Jumlah Produk</th>
            <th>Tanggal Kadaluarsa</th>
            <th>Tanggal Produksi</th>
            <th>Deskripsi Produk</th>
        </tr>
        <?php 
                                            $no = 0;
                                            foreach($produk as $i):
                                                $no++;
                                                $id_produk = $i['id_produk'];
                                                $nama_produk = $i['nama_produk'];
                                                $gambar_produk = $i['gambar_produk'];
                                                $harga_produk = $i['harga_produk'];
                                                $diskon = $i['diskon'];
                                                $jumlah_produk = $i['jumlah_produk'];
                                                $tanggal_kadaluarsa = $i['tanggal_kadaluarsa'];
                                                $tanggal_produksi = $i['tanggal_produksi'];
                                                $deskripsi_produk = $i['deskripsi_produk'];
                                                ?>
        <tr>

            <td><?=$no?></td>
            <td><?=$nama_produk?></td>
            <td><?=$harga_produk?></td>
            <td><?=$diskon?></td>
            <td><?=$jumlah_produk?></td>
            <td><?=$tanggal_kadaluarsa?></td>
            <td><?=$tanggal_produksi?></td>
            <td><?=$deskripsi_produk?></td>

        </tr>
        <?php endforeach;?>

    </table>

</body>

</html>