<h2>Tabel Transaksi</h2>
<div class="alert alert-info">TABEL DATA TRANSAKSI</div>
<a href="index.php?module=inputtransaksi" class="btn btn-primary">Tambah Data</a>

<form method="POST" action="" style="margin-bottom: 20px;">
    <table width="100%">
        <tr>
            <td>-Pilih Tanggal-</td>
            <td><input type="date" name="hari_ini" required></td>
            <td><button type="submit" name="cari" style="background-color: red;">Cari</button></td>
        </tr>
    </table>
</form>

<table width="100%" border="1" class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>No Faktur</th>
        <th>No Kamar</th>
        <th>ID Pelanggan</th>
        <th>Tanggal Masuk</th>
        <th>Tanggal Keluar</th>
        <th>Lama Menginap</th>
        <th>Tarif</th>
        <th>Aksi</th>
    </tr>
    <?php  
    include "koneksi.php";

    if (isset($_POST['cari'])) {
        $hari_ini = $_POST['hari_ini'];
        $stmt = $con->prepare("SELECT * FROM transaksi WHERE tgl_masuk = ?");
        $stmt->bind_param("s", $hari_ini);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $result = mysqli_query($con, "SELECT * FROM transaksi");
    }

    $no = 1;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $total = $row['lama_menginap'] * $row['Tarif'];
    ?>
    <tr>
        <td align="center"><?php echo $no; ?></td>
        <td align="center"><?php echo htmlspecialchars($row['No_Faktur']); ?></td>
        <td align="center"><?php echo htmlspecialchars($row['No_Kamar']); ?></td>
        <td align="center"><?php echo htmlspecialchars($row['id_pelanggan']); ?></td>
        <td align="center"><?php echo htmlspecialchars($row['tgl_masuk']); ?></td>
        <td align="center"><?php echo htmlspecialchars($row['tgl_keluar']); ?></td>
        <td align="center"><?php echo htmlspecialchars($row['lama_menginap']); ?></td>
        <td align="center"><?php echo htmlspecialchars($row['Tarif']); ?></td>
        <td align="center">
            <a href="index.php?module=edittransaksi&No_Faktur=<?php echo htmlspecialchars($row['No_Faktur']); ?>"
                class="btn btn-success">Edit</a>
            <a href="index.php?module=hapustransaksi&No_Faktur=<?php echo htmlspecialchars($row['No_Faktur']); ?>"
                class="btn btn-danger">Hapus</a>
        </td>
    </tr>
    <?php 
            $no++;
        }
    } else {
        echo "<tr><td colspan='9' align='center'>Tidak ada data transaksi untuk tanggal yang dipilih.</td></tr>";
    }
    ?>
</table>