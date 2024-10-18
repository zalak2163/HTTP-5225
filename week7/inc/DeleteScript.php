<?php
  if(isset($_GET['deleteScript'])){
    $id = $_GET['id'];
    
    include('../reusables/connect.php');

    $query = "DELETE FROM public_school_contact_list_may2024_en WHERE `id` = '$id'";
    $school = mysqli_query($connect, $query);

    if($school){
      header('Location: ../index.php');
    }
    else{
      echo mysqli_error($connect);
    }
  }else{
    echo "You should not be here!";
  }





  