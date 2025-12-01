<?php //5026231038-Nabila Shinta Luthfia
$host = "localhost";
$user = "root";
$pass = "";
$db   = "jastipin";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
