<?php
// Memulai sesi
session_start();

// Konfigurasi koneksi database
include '../koneksi.php';

// Mendapatkan ID pengguna yang sedang login dari sesi
$id_user_logged_in = $_SESSION['id_user'];

// Mendapatkan ID pengguna yang akan dihapus
$id_user_to_delete = $_GET['id']; // Anda dapat menggunakan metode lain untuk mendapatkan ID ini

// Periksa apakah pengguna yang sedang login mencoba menghapus dirinya sendiri
if ($id_user_to_delete == $id_user_logged_in) {
    echo '<script language="javascript" type="text/javascript">
      alert("Anda tidak dapat menghapus pengguna yang sedang login.");</script>';
    echo "<meta http-equiv='refresh' content='0; url=user.php'>";
} else {
    // Membuat query SQL untuk menghapus data
    $sql = "DELETE FROM tb_user WHERE id_user = $id_user_to_delete";

    // Menjalankan query untuk menghapus data
    if ($koneksi->query($sql) === TRUE) {
        echo '<script language="javascript" type="text/javascript">
          alert("Data user berhasil dihapus.");</script>';
        echo "<meta http-equiv='refresh' content='0; url=user.php'>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// Menutup koneksi database
$koneksi->close();
?>