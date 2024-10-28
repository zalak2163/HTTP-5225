<?php
if (isset($_POST['addCity'])) {
    $city = $_POST['city'];
    $country = $_POST['country'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    require('../reusables/connect.php');

    $query = "INSERT INTO spotify_stream_analytics_data (city, country, latitude, longitude) 
              VALUES (
                  '" . mysqli_real_escape_string($connect, $city) . "',
                  '" . mysqli_real_escape_string($connect, $country) . "',
                  '" . mysqli_real_escape_string($connect, $latitude) . "',
                  '" . mysqli_real_escape_string($connect, $longitude) . "'
              )";

    if (mysqli_query($connect, $query)) {
        header("Location: ../index.php");
    } else {
        echo "Error adding city: " . mysqli_error($connect);
    }
}
?>
