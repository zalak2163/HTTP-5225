<?php
  $connect = mysqli_connect(
    'localhost', 
    'root', 
    'root', 
    'publicschool' 
  );

  if(!$connect){
    echo "Connection Failed: " . mysqli_connect_error();
  }


?>