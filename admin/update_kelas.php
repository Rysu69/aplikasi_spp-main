<?php
include'../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nisn = $_POST['nisn'];

    // Fetch the current class of the student
    $sql = "SELECT id_kelas FROM siswa WHERE nisn = '$nisn'";
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($result);
    $current_kelas = $data['id_kelas'];

    // Increment the class by one
    $new_kelas = $current_kelas + 1;

    // Update the class in the database
    $sql = "UPDATE siswa SET id_kelas = '$new_kelas' WHERE nisn = '$nisn'";
    if (mysqli_query($koneksi, $sql)) {
         header("Location:?url=siswa");
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }

    // Redirect back to the students page
    header('admin/siswa.php');
    exit;
}
?>
