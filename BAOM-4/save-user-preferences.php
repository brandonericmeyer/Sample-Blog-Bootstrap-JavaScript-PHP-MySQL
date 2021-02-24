<?php
  
  try 
  {
    require "config.php";
    require "common.php";
    $connection = new PDO($dsn, $username, $password, $options);
    
    $new_template = array(
      "language" => $_POST['name']
    );

    $sql = sprintf(
        "INSERT INTO %s (%s) values (%s)",
        "customizable",
        implode(", ", array_keys($new_template)),
        ":" . implode(", :", array_keys($new_template))
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_template);
  }

  catch(PDOException $error) 
  {
    echo $sql . "<br>" . $error->getMessage();
  }
  
?>
