<?php
include "koneksi.php";

// Check if No_Faktur is set
if (isset($_GET['No_Faktur'])) {
    // Prepare the SQL statement to prevent SQL injection
    $stmt = $con->prepare("DELETE FROM transaksi WHERE No_Faktur = ?");
    $stmt->bind_param("s", $_GET['No_Faktur']); // Assuming No_Faktur is a string

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data Berhasil Dihapus";
    } else {
        echo "Gagal Menghapus: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No_Faktur parameter tidak ada.";
}

// Redirect to the table
header("Location: index.php?module=tabeltransaksi");
exit(); // Ensure no further code is executed
?>