<?php
include '../koneksi.php';

// Get data from form or input
$id_petugas = $_GET['id_petugas']; // Assuming you have a user_id to identify the user you want to update
$username = $_POST['username'];
$nama_petugas = $_POST['nama_petugas'];
$level = $_POST['level'];

// Check if password is provided in the form
if(!empty($_POST['password'])) {
    // Update password using md5 encryption
    $password = md5($_POST['password']);
    $sql = "UPDATE petugas SET username='$username', password='$password', nama_petugas='$nama_petugas', level='$level' WHERE id_petugas=$id_petugas";
} else {
    // Do not update the password if it is not provided in the form
    $sql = "UPDATE petugas SET username='$username', nama_petugas='$nama_petugas', level='$level' WHERE id_petugas=$id_petugas";
}

if ($koneksi->query($sql) === TRUE) {
    echo '<script language="javascript" type="text/javascript">
      alert("Record updated successfully");</script>';
    echo "<meta http-equiv='refresh' content='0; url=admin.php?url=petugas'>";
} else {
    echo "Error updating record: " . $koneksi->error;
}

// Close
$koneksi->close();
?>