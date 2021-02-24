<?php
  try 
  {
    require "config.php";
    $connection = new mysqli($host, $username, $password, $dbname);
    
    $title = $_POST['title'];
    $blog = $_POST['blog'];

    $sql = "UPDATE post SET blog ='$blog', title = '$title' WHERE id=2";
    mysqli_query($connection, $sql);
  }

  catch(PDOException $error) 
  {
    echo $sql . "<br>" . $error->getMessage();
  }
?>