<?php // authenticate.php
  require "config.php";
  $connection = new mysqli($host, $username, $password, $dbname);
  
  if ($connection->connect_error) die($connection->connect_error);

  $username = $_POST['username'];
  $password = $_POST['password'];

  $salt1 = "qm&h*";
  $salt2 = "pg!@";
  $token = hash('ripemd128', "$salt1$password$salt2");

  $un_temp = mysql_entities_fix_string($connection, $username);
  $pw_temp = mysql_entities_fix_string($connection, $password);

  $query  = "SELECT * FROM users WHERE username='$un_temp'";
  $result = $connection->query($query);
  if (!$result) die($connection->error);
  elseif ($result->num_rows)
  {
      $row = $result->fetch_array(MYSQLI_NUM);

      $result->close();

      $salt1 = "qm&h*";
      $salt2 = "pg!@";
      $token = hash('ripemd128', "$salt1$pw_temp$salt2");
      
      if ($token == $row[2])
      {
           session_start();
           $_SESSION['username'] = $un_temp;
           $_SESSION['password'] = $token;
           echo "true";
      }
      else 
      {
        echo "false";
      };
  }
  else die("Bad Connection");
  
  $connection->close();

  function mysql_entities_fix_string($connection, $string)
  {
    return htmlentities(mysql_fix_string($connection, $string));
  }

  function mysql_fix_string($connection, $string)
  {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return $connection->real_escape_string($string);
  }
  
?>