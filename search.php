<?php include('database.php'); ?>
<?php include('inc/header.php'); ?>
<?php include('inc/footer.php'); ?>

<?php 
  
  $output = NULL;
  

  if(isset($_POST['submit'])){
    

    $search = $conn->real_escape_string($_POST['search']);

    $resultSet = $conn->query("SELECT * FROM info WHERE last_name = '$search'");

    if($resultSet->num_rows > 0){
      while($rows = $resultSet->fetch_assoc()){

        $first_name = $rows['first_name'];
        $last_name = $rows['last_name'];
        $address = $rows['address'];
        $phone_number = $rows['phone_number'];
        $email = $rows['email'];
        $alt_address = $rows['alt_address'];

        $output = "First Name: $first_name<br>Last Name: $last_name<br>Address: $address<br>Phone Number: $phone_number<br>Email: $email<br>Alternate Address: $alt_address<br>";
      }

    }else{
      $output = "No results";
    }
    
    }

?>

<?php echo $output ?>