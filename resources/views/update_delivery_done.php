<?php //5026231038-Nabila Shinta Luthfia
include 'koneksi.php';

$id = $_POST['id']; // IDPengantaran dari checkbox

$sql = "UPDATE pengantaran 
        SET statusPengantaran = 'Delivered' 
        WHERE IDPengantaran = $id";

mysqli_query($conn, $sql);

echo "success";
?>
