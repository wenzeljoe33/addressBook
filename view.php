<?php 
  include("database.php");
?>

<?php 
  include("inc/header.php")
?>

<?php 
  include("inc/footer.php")
?>

<div class="container">
  <div class="row">
    <div class="col-md-8">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Address</th>
              <th>Phone Number</th>
              <th>Email</th>
              <th>Alternate Address</th>
            </tr>
          </thead>
            <tbody>
              <?php 
                $query = "SELECT * FROM info";
                $result_info = mysqli_query($conn,$query);

                while($row = mysqli_fetch_array($result_info)){ ?>
                  <tr>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['last_name'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['phone_number'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['alt_address'] ?></td>
                  </tr>


                <?php } ?>
              
            </tbody>

        </table>

      </div>
  </div>
</div>

