<?php 

session_start();
require_once("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = md5($_POST["password"]); // Menggunakan MD5 untuk hash password

    $query = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['login_type'] = "login";
        $_SESSION["id_petugas"] = $row["id_petugas"];
        $_SESSION["nama_petugas"] = $row["nama_petugas"];
        $_SESSION["level"] = $row["level"];

        echo '<script language="javascript" type="text/javascript">
            alert("Selamat Datang '.$_SESSION["nama_petugas"].', Anda Berhasil Login!");</script>';

        if ($row["level"] == "admin") {
            echo "<meta http-equiv='refresh' content='0; url=admin/admin.php'>"; // Redirect ke halaman admin
        } elseif ($row["level"] == "petugas") {
            echo "<meta http-equiv='refresh' content='0; url=petugas/petugas.php'>"; // Redirect ke halaman petugas
        }
        exit();
    } else {
        echo '<script language="javascript" type="text/javascript">
            alert("Maaf Username dan Password Salah.!");</script>';
        echo "<meta http-equiv='refresh' content='0; url=index.php'>";
    }
}
?>
