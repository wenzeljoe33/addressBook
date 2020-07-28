<?php 

  session_start();

  $conn = mysqli_connect(
    'localhost',
    'root',
    'C@ppell@33',
    'php_crud'
  );

  // if (isset($conn)){
  //   echo "Database is connected";
  // }

 $sql =  "CREATE TABLE info(
    id INT NOT NULL AUTO_INCREMENT,first_name VARCHAR(255),last_name VARCHAR(255),address VARCHAR(255),phone_number VARCHAR(255),email VARCHAR(255),alt_address(255))";

  

?>