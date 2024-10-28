<?php
if (isset($_POST['updateCity'])) {
    $id = $_POST['id'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    require('../reusables/connect.php');

    $query = "UPDATE spotify_stream_analytics_data 
              SET city = '" . mysqli_real_escape_string($connect, $city) . "', 
                  country = '" . mysqli_real_escape_string($connect, $country) . "', 
                  latitude = '" . mysqli_real_escape_string($connect, $latitude) . "', 
                  longitude = '" . mysqli_real_escape_string($connect, $longitude) . "' 
              WHERE id = $id";

    if (mysqli_query($connect, $query)) {
        header("Location: ../index.php");
    } else {
        echo "Error updating city: " . mysqli_error($connect);
    }
}
?>
