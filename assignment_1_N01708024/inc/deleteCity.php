<?php
if (isset($_GET['deleteCity'])) {
    $id = $_GET['id'];
    
    require('../reusables/connect.php');

    $query = "DELETE FROM spotify_stream_analytics_data WHERE id = $id";

    if (mysqli_query($connect, $query)) {
        header("Location: ../index.php");
    } else {
        echo "Error deleting city: " . mysqli_error($connect);
    }
}
?>
