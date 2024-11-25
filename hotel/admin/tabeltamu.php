<h2>Tabel Tamu</h2>
<div class="alert alert-info">TABEL DATA TAMU</div>
<a href="index.php?module=inputtamu" class="btn btn-primary">Tambah Data</a>
<table width="100%" border="1" class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>No ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Asal</th>
        <th>No Telpon</th>
        <th>Jenis Kelamin</th>
        <th>Aksi</th>
    </tr>
    <?php  
    include "koneksi.php"; // Ensure this file contains the correct database connection
    $sql = mysqli_query($con, "SELECT * FROM tamu");
    $no = 1;

    while ($row = mysqli_fetch_array($sql)) {
    ?>
    <tr>
        <td align="center"><?php echo $no; ?></td>
        <td align="center"><?php echo htmlspecialchars($row['id_pelanggan']); ?></td>
        <td align="center"><?php echo htmlspecialchars($row['Nama']); ?></td>
        <td align="center"><?php echo htmlspecialchars($row['Alamat']); ?></td>
        <td align="center"><?php echo htmlspecialchars($row['Asal']); ?></td>
        <td align="center"><?php echo htmlspecialchars($row['NoTlp']); ?></td>
        <td align="center"><?php echo htmlspecialchars($row['jk']); ?></td>
        <td align="center">
            <a href="index.php?module=edittamu&No_Id=<?php echo urlencode($row['id_pelanggan']); ?>"
                class="btn btn-success">Edit</a>
            <a href="index.php?module=hapustamu&No_Id=<?php echo urlencode($row['id_pelanggan']); ?>"
                class="btn btn-danger">Hapus</a>
        </td>
    </tr>
    <?php 
        $no++;
    }
    ?>
</table>