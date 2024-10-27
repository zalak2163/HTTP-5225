<?php
require('reusables/connect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM spotify_stream_analytics_data WHERE id = '$id'";
    $result = mysqli_query($connect, $query);
    $city = mysqli_fetch_assoc($result);
} else {
    header("Location: index.php");
    exit();
}

if (isset($_POST['updateCity'])) {
    $cityName = $_POST['city'];
    $country = $_POST['country'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $updateQuery = "UPDATE spotify_stream_analytics_data SET 
                    city = '" . mysqli_real_escape_string($connect, $cityName) . "', 
                    country = '" . mysqli_real_escape_string($connect, $country) . "', 
                    latitude = '" . mysqli_real_escape_string($connect, $latitude) . "', 
                    longitude = '" . mysqli_real_escape_string($connect, $longitude) . "' 
                    WHERE id = '$id'";

    if (mysqli_query($connect, $updateQuery)) {
        header("Location: index.php");
    } else {
        echo "Error updating city: " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update City Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="display-4">Update City Data</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo htmlspecialchars($city['city']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="<?php echo htmlspecialchars($city['country']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo htmlspecialchars($city['latitude']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo htmlspecialchars($city['longitude']); ?>" required>
            </div>
            <button type="submit" name="updateCity" class="btn btn-primary">Update City</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
