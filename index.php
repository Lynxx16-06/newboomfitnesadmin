<?php
    session_start();
    include "koneksi/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Username</title>
</head>

<?php
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = mysqli_query($koneksi, "SELECT * FROM main WHERE username='$username' and password='$password'");

        if(mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_array($query);
            $_SESSION['main'] = $data;
            echo '<script>location.href="Halaman_Member.php";</script>';
        } else {
            echo '<script>alert("Username/password tidak sesuai.");</script>';
        }
    }

?>

<?php
    include "Halaman_Login.php"
?>