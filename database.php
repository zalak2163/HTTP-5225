<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>colors</title>
</head>
<body>
    <?php
        $connect = mysqli_connect('localhost', 'root', 'root', 'http_5225');
        if (!$connect) {
            echo 'Error code: ' . mysqli_connect_errno();
            echo 'Error Message: ' . mysqli_connect_error();
            exit;
        }

        $query = 'SELECT `Name`, `Hex` FROM colors';
        $results = mysqli_query($connect, $query);
        if (!$results) {
            echo 'Error Message: ' . mysqli_error($connect);
        } else {
            echo 'The query found: ' . mysqli_num_rows($results);
            $count = mysqli_num_rows($results);
        }

        foreach ($results as $result) {
                $Name = $result['Name'];
                $hex = $result['Hex'];
                echo "<div style='background-color: $hex;'> $Name </div>";
            }  
        
       
    ?>
</body>
</html>
