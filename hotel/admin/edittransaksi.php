<?php 
include 'koneksi.php';

// Check if No_Faktur is set
$id = isset($_GET['No_Faktur']) ? $_GET['No_Faktur'] : '';
$sql = mysqli_query($con, "SELECT * FROM transaksi WHERE No_Faktur='$id'");
$data = mysqli_fetch_array($sql);
?>
<html lang="en">

<head>
    <title>Form Entri Transaksi</title>
</head>

<body>
    <table border="1" align="center" class="table table-bordered table-striped">
        <form action="" method="POST">
            <tr style="color: black;">
                <td>No Faktur</td>
                <td>:</td>
                <td><input type="text" name="No_Faktur" value="<?php echo htmlspecialchars($data['No_Faktur']); ?>">
                </td>
            </tr>
            <tr style="color: black;">
                <td>No Kamar</td>
                <td>:</td>
                <td><input type="text" name="No_Kamar" value="<?php echo htmlspecialchars($data['No_Kamar']); ?>"></td>
            </tr>
            <tr style="color: black;">
                <td>No Id</td>
                <td>:</td>
                <td><input type="text" name="id_pelanggan"
                        value="<?php echo htmlspecialchars($data['id_pelanggan']); ?>"></td>
            </tr>
            <tr style="color: black;">
                <td>Tanggal Masuk</td>
                <td>:</td>
                <td><input type="date" name="tgl_masuk" value="<?php echo htmlspecialchars($data['tgl_masuk']); ?>">
                </td>
            </tr>
            <tr style="color: black;">
                <td>Tanggal Keluar</td>
                <td>:</td>
                <td><input type="date" name="tgl_keluar" value="<?php echo htmlspecialchars($data['tgl_keluar']); ?>">
                </td>
            </tr>
            <tr style="color: black;">
                <td>Lama Menginap</td>
                <td>:</td>
                <td><input type="text" name="lama_menginap"
                        value="<?php echo htmlspecialchars($data['lama_menginap']); ?>"></td>
            </tr>
            <tr style="color: black;">
                <td>Tarif</td>
                <td>:</td>
                <td><input type="text" name="Tarif" value="<?php echo htmlspecialchars($data['Tarif']); ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="submit" name="submit" class="btn btn-success" value="SIMPAN">
                    <input type="reset" name="reset" class="btn btn-danger" value="RESET">
                </td>
            </tr>
        </form>
    </table>

    <?php
    if (isset($_POST['submit'])) {
        // Prepare the update statement
        $stmt = $con->prepare("UPDATE transaksi SET No_Kamar=?, id_pelanggan=?, tgl_masuk=?, tgl_keluar=?, lama_menginap=?, Tarif=? WHERE No_Faktur=?");
        $stmt->bind_param("sssssss", $_POST['No_Kamar'], $_POST['id_pelanggan'], $_POST['tgl_masuk'], $_POST['tgl_keluar'], $_POST['lama_menginap'], $_POST['Tarif'], $_POST['No_Faktur']);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Data Berhasil Disimpan'); window.location.href='index.php?module=tabeltransaksi';</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan! " . $stmt->error . "'); window.location.href='index.php?module=tabeltransaksi';</script>";
        }

        // Close the statement
        $stmt->close();
    }
    ?>
</body>

</html>