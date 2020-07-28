<?php 

  include("database.php");


  if(isset($_POST['add'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $alt_address = $_POST['alt_address'];
    
    $query = "INSERT INTO info(first_name, last_name, address, phone_number, email, alt_address) VALUES ('$first_name', '$last_name', '$address', '$phone_number', '$email', '$alt_address')";
    $result = mysqli_query($conn,$query);
    if(!$result){
      die("Query failed");
    }

    $_SESSION['message'] = 'Person added to Address Book';
    $_SESSION['message_type'] = 'success';


    header("location: index.php");
  }

?>