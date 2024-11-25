<?php
include "koneksi.php";

if (isset($_GET['No_Kamar'])) {
    $stmt = $con->prepare("DELETE FROM tamu WHERE No_Kamar = ?");
    $stmt->bind_param("s", $_GET['No_Kamar']); 

    if ($stmt->execute()) {
        echo "Data Berhasil Dihapus";
    } else {
        echo "Gagal Menghapus: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No_Id parameter is missing.";
}
header("Location: index.php?module=tabeltamu");
exit();