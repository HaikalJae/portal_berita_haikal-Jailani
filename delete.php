<?php 
include 'config.php' ;

$id = $_GET["id"];

$query= "DELETE FROM tb_berita WHERE id_berita= $id";

if (!$conn->connect_error) {
    mysqli_query($conn, $query) ;
} else {
    die("connecton gagal: " . $conn->connect_error);
}
header("location:index.php") ;
?>