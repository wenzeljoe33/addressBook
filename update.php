<?php
include("database.php");
$first_name = '';
$last_name = '';
$address= '';
$phone_number= '';
$email= '';
$alt_address= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM info WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $address = $row['address'];
    $phone_number = $row['phone_number'];
    $email = $row['email'];
    $alt_address = $row['alt_address'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $first_name= $_POST['first_name'];
  $last_name= $_POST['last_name'];
  $address = $_POST['address'];
  $phone_number = $_POST['phone_number'];
  $email = $_POST['email'];
  $alt_address = $_POST['alt_address'];

  $query = "UPDATE info set first_name = '$first_name', last_name = '$last_name', address = '$address', phone_number = '$phone_number', email = '$email', alt_address = '$alt_address' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Person Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('inc/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="update.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="first_name" type="text" class="form-control" value="<?php echo $first_name; ?>" placeholder="Update First Name">
        </div>
        <div class="form-group">
          <input name="last_name" type="text" class="form-control" value="<?php echo $last_name; ?>" placeholder="Update Last Name">
        </div>
        <div class="form-group">
        <textarea name="address" class="form-control" cols="30" rows="10"><?php echo $address;?></textarea>
        </div>
        <div class="form-group">
           <input name="phone_number" type="text" class="form-control" value="<?php echo $phone_number; ?>" placeholder="Update Phone Number">
        </div>
        <div class="form-group">
           <input name="email" type="text" class="form-control" value="<?php echo $email; ?>" placeholder="Update Email">
        </div>
        <div class="form-group">
           <input name="alt_address" type="text" class="form-control" value="<?php echo $alt_address; ?>" placeholder="Update Alternate Address">
        </div>

        <button class="btn btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('inc/footer.php'); ?>