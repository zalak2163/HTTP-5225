<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <?php
          // Function to fetch user data from the JSONPlaceholder API
          function getUsers() {
              $url = "https://jsonplaceholder.typicode.com/users";
              $data = file_get_contents($url);
              return json_decode($data, true);
          }
          
          // Get the list of users
          $users = getUsers();
          
          foreach($users as $user) {
            echo '<div class="col-md-4 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Name: ' . ($user['name']) . '</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Username: ' . ($user['username']) . '</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Email: ' . ($user['email']) . '</h6>
                        <p class="card-text">Address: ' . ($user['address']['street']) . ', ' . ($user['address']['city']) . ', ' . ($user['address']['zipcode']) . '</p>
                        <p class="card-text">Phone: ' . ($user['phone']) . '</p>
                        <p class="card-text">Company: ' . ($user['company']['name']) . ' - ' . ($user['company']['catchPhrase']) . '</p>
                      </div>
                    </div>
                  </div>';
          }
        ?>
      </div>
    </div>
  </body>
</html>
