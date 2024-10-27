<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify Stream Analytics</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Spotify Data</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add.php">Add City Data</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    
    <div class="container">
        <h1 class="display-2">Canadian Cities</h1>
        <div class="row">
            <?php 
            require('reusables/connect.php');
            $query  = 'SELECT * FROM spotify_stream_analytics_data';
            $cities = mysqli_query($connect, $query);

            foreach ($cities as $city) {
                echo '<div class="card col-md-4 mb-2">
                    <div class="card-body">
                        <h5 class="card-title">' . htmlspecialchars($city['city']) . '</h5>
                        <p class="card-text">Country: ' . htmlspecialchars($city['country']) . '</p>
                        <p class="card-text">Latitude: ' . htmlspecialchars($city['latitude']) . '</p>
                        <p class="card-text">Longitude: ' . htmlspecialchars($city['longitude']) . '</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <form method="GET" action="update.php">
                                    <input type="hidden" name="id" value="' . $city['id'] . '">
                                    <button class="btn btn-sm btn-primary">Update</button>
                                </form>
                            </div>
                            <div class="col text-end">
                                <form action="inc/deleteCity.php" method="GET">
                                    <input type="hidden" name="id" value="' . $city['id'] . '">
                                    <button type="submit" name="deleteCity" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this city?\');">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
