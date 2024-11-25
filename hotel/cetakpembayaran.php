<?php 
session_start();
include "koneksi.php"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Pembayaran</title>
    <style type="text/css">
    .style5 {
        font-size: 24px;
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
        <table width="100%">
            <tr>
                <td>
                    <div align="center">
                        <h3><label>HOTEL SEVEN</label></h3>
                        <label>Jl. Raya Pd. Petir</label><br>
                        <label>Kota Depok, Jawa Barat</label><br>
                        <label>Telp: (0821) 99999</label><br>
                        <label>Email: info@kelompok7.com</label><br>
                        <div align="center">Cetak Pembayaran</div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <table width="100%" border="1" class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>ID Konfirmasi</th>
            <th>ID Pelanggan</th>
            <th>Bank</th>
            <th>Jumlah Transfer</th>
        </tr>
        <?php 
        // Use prepared statements to prevent SQL injection
        if (isset($_GET['id_konfirmasi'])) {
            $id_konfirmasi = $_GET['id_konfirmasi'];
            $stmt = $conn->prepare("SELECT * FROM konfirmasi WHERE id_konfirmasi = ? AND status = 'Y'");
            $stmt->bind_param("s", $id_konfirmasi);
            $stmt->execute();
            $result = $stmt->get_result();
            $no = 1;

            while ($data = $result->fetch_assoc()) {
        ?>
        <tr>
            <td align="center"><?php echo $no; ?></td>
            <td align="center"><?php echo htmlspecialchars($data['id_konfirmasi']); ?></td>
            <td align="center"><?php echo htmlspecialchars($data['id_pelanggan']); ?></td>
            <td align="center"><?php echo htmlspecialchars($data['bank']); ?></td>
            <td align="center"><?php echo htmlspecialchars($data['jumlah_transfer']); ?></td>
        </tr>
        <?php 
                $no++;
            }
            $stmt->close();
        }
        ?>
    </table>
    <div align="right">
        <?php 
        $tanggal = date('d M Y');
        echo "$tanggal<br/>Pemilik<br><br><br>(Rhafly Andika)<br>";
        ?>
    </div>
</body>

</html>