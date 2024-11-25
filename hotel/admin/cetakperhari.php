<?php 
include "koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Per-hari</title>
    <style type="text/css">
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    h3 {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    .total {
        font-weight: bold;
    }
    </style>
    <script type="text/javascript">
    function printPage() {
        window.print();
    }
    </script>
</head>

<body onLoad="printPage()">
    <div class="panel-heading">
        <h3>Cetak Data Per-hari</h3>
    </div>
    <table>
        <tr>
            <th>No</th>
            <th>No Faktur</th>
            <th>No Kamar</th>
            <th>No ID</th>
            <th>Nama</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>Lama Menginap</th>
            <th>Tarif</th>
            <th>Total</th>
        </tr>
        <?php  
        // Get today's date
        $hari_ini = date("Y-m-d");
        // Use prepared statements to prevent SQL injection
        $stmt = $con->prepare("SELECT transaksi.*, kamar.No_Kamar, kamar.Tarif, tamu.Nama 
                                FROM transaksi 
                                INNER JOIN kamar ON kamar.No_Kamar = transaksi.No_Kamar 
                                INNER JOIN tamu ON tamu.id_pelanggan = transaksi.id_pelanggan 
                                WHERE transaksi.tgl_masuk = ?");
        $stmt->bind_param("s", $hari_ini);
        $stmt->execute();
        $result = $stmt->get_result();
        $no = 1;
        
        while ($row = $result->fetch_assoc()) {
            $total = $row['lama_menginap'] * $row['Tarif'];
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo htmlspecialchars($row['No_Faktur']); ?></td>
            <td><?php echo htmlspecialchars($row['No_Kamar']); ?></td>
            <td><?php echo htmlspecialchars($row['id_pelanggan']); ?></td>
            <td><?php echo htmlspecialchars($row['Nama']); ?></td>
            <td><?php echo htmlspecialchars($row['tgl_masuk']); ?></td>
            <td><?php echo htmlspecialchars($row['tgl_keluar']); ?></td>
            <td><?php echo htmlspecialchars($row['lama_menginap']); ?></td>
            <td>Rp. <?php echo number_format($row['Tarif'], 0, ',', '.'); ?></td>
            <td>Rp. <?php echo number_format($total, 0, ',', '.'); ?></td>
        </tr>
        <?php 
            $no++;
        }
        $stmt->close();
        ?>
    </table>
    <div align="right" style="margin-top: 20px;">
        <?php 
        $tanggal = date('d M Y');
        echo "$tanggal<br />Pemilik<br><br><br>(Kelompok 7)<br>";
        ?>
    </div>
</body>

</html>