<?php
include_once "../core/init.php";

if (isset($_POST["id_number"])) {
    $id_number = $_POST["id_number"];
    $sql = "DELETE FROM `requests` WHERE `id_number` = '$id_number'";
    if (mysqli_query($db, $sql)) {
        echo "Request deleted successfully.";
    } else {
        echo "Error deleting request: " . mysqli_error($db);
    }
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>