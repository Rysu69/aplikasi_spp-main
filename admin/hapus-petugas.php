<?php
$id_petugas = $_GET['id_petugas'];

// Mendapatkan ID pengguna yang sedang login dari sesi
$id_user_logged_in = $_SESSION['id_petugas'];

// Mendapatkan ID pengguna yang akan dihapus
$id_user_to_delete = $_GET['id_petugas']; // Anda dapat menggunakan metode lain untuk mendapatkan ID ini

include '../koneksi.php';

if ($id_user_to_delete == $id_user_logged_in) {
    echo '<script language="javascript" type="text/javascript">
      alert("Anda tidak dapat menghapus pengguna yang sedang login.");</script>';
    echo "<meta http-equiv='refresh' content='0; url=admin.php?url=petugas'>";
} else {
    // Membuat query SQL untuk menghapus data
    $sql = "DELETE FROM petugas WHERE id_petugas = $id_user_to_delete";

    // Menjalankan query untuk menghapus data
    if ($koneksi->query($sql) === TRUE) {
        echo '<script language="javascript" type="text/javascript">
          alert("Data petugas berhasil dihapus.");</script>';
        echo "<meta http-equiv='refresh' content='0; url=admin.php?url=petugas'>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Menutup koneksi database
$koneksi->close();
?>