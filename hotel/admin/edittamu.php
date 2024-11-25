<?php 
include 'koneksi.php'; // Make sure to include your database connection

$id = $_GET['id_pelanggan']; // Get the ID from the URL parameter

// Prepare the SQL statement
$stmt = $con->prepare("SELECT * FROM tamu WHERE id_pelanggan = ?");
$stmt->bind_param("i", $id);// Bind the parameter as an integer
$stmt->execute(); // Execute the statement

// Get the result
$result = $stmt->get_result();
$data = $result->fetch_assoc(); // Fetch the data
$stmt->close(); // Close the statement
?>
<html lang="en">

<head>
    <title>Form Entri Tamu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Tamu</h2>
        <div class="alert alert-info">FORM ENTRI TAMU</div>
        <form action="" method="POST">
            <table class="table table-bordered table-striped">
                <tr style="color: black;">
                    <td>ID Tamu</td>
                    <td>:</td>
                    <td><input type="text" name="id_pelanggan"
                            value="<?php echo htmlspecialchars($data['id_pelanggan']); ?>" class="form-control"
                            readonly></td>
                </tr>
                <tr style="color: black;">
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="Nama" value="<?php echo htmlspecialchars($data['Nama']); ?>"
                            class="form-control"></td>
                </tr>
                <tr style="color: black;">
                    <td>Alamat</td>
                    <td>:</td>
                    <td><textarea name="Alamat" cols="20" rows="5"
                            class="form-control"><?php echo htmlspecialchars($data['Alamat']); ?></textarea></td>
                </tr>
                <tr style="color: black;">
                    <td>Asal</td>
                    <td>:</td>
                    <td><input type="text" name="Asal" value="<?php echo htmlspecialchars($data['Asal']); ?>"
                            class="form-control"></td>
                </tr>
                <tr style="color: black;">
                    <td>No Telpon</td>
                    <td>:</td>
                    <td><input type="text" name="NoTlp" value="<?php echo htmlspecialchars($data['NoTlp']); ?>"
                            class="form-control"></td>
                </tr>
                <tr style="color: black;">
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <select name="jk" class="form-control">
                            <option value="">-pilih-</option>
                            <option value="Laki Laki" <?php if ($data['jk'] == 'Laki Laki') echo 'selected'; ?>>
                                Laki-Laki</option>
                            <option value="Perempuan" <?php if ($data['jk'] == 'Perempuan') echo 'selected'; ?>>
                                Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" class="btn btn-success" value="SIMPAN">
                        <input type="reset" name="reset" class="btn btn-danger" value="RESET">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        // Prepare and bind
        $id_pelanggan = $_POST['id_tamu']; // This should be readonly
        $Nama = $_POST['Nama'];
        $Alamat = $_POST['Alamat'];
        $Asal = $_POST['Asal'];
        $NoTlp = $_POST['NoTlp'];
        $jk = $_POST['jk'];

        // Prepare the update statement
        $stmt = $con->prepare("UPDATE tamu SET Nama=?, Alamat=?, Asal=?, NoTlp=?, jk=? WHERE id_tamu=?");
        $stmt->bind_param("sssssi", $Nama, $Alamat, $Asal, $NoTlp, $jk, $id_tamu); // Bind parameters

        // Execute the update
        if ($stmt->execute()) {
            echo "<script>alert('Data Berhasil Disimpan'); window.location.href='index.php?module=tabeltamu';</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan!'); window.location.href='index.php?module=tabeltamu';</script>";
        }
        $stmt->close(); // Close the statement
    }
    ?>
</body>

</html>