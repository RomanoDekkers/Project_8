<?php
include './connectie/conn.php';
include './configs/functions.php';
$id = isset($_GET['ID']) ? $_GET['ID'] : '';
$sql = "DELETE FROM `gebruikers` WHERE ID = $id";
$result = mysqli_query($conn, $sql);
if($result){
    header("Location: Ledenlijst.php?msg=Record deleted successfully");
}
else {
    echo "Failed: " . mysqli_error($conn);
}
?>