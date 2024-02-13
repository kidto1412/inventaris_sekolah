<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$sql = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username= '$username' AND password='$password'");
$data = mysqli_fetch_array($sql);
$cek = mysqli_num_rows($sql);
if ($cek > 0) {
    if ($data['id_level'] == "1") {  //databases akses
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "ADMIN";
        $_SESSION['id_petugas'] = $data[0]; //database id
        header("location:../admin/index.php");
    } else if ($data['id_level'] == "2") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "PETUGAS";
        $_SESSION['id_petugas'] = $data[0];
        header("location:../admin/index.php");
    }
} else {
    ?>
    <script type="text/javascript">
        alert('Akun anda ada yang salah');
        window.location = "../index.php";
    </script>
<?php
}
?>