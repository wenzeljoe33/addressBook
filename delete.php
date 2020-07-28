<?php 
  include("database.php");
?>

<?php 
  include("inc/header.php")
?>

<?php 
  include("inc/footer.php")
?>

<?php



$result = @mysqli_query($conn, "SELECT * FROM info") or die("Error: " . mysqli_error($conn));


if(isset($_POST['chk_id']))
{
    $arr = $_POST['chk_id'];
    foreach ($arr as $id) {
        @mysqli_query($conn,"DELETE FROM info WHERE id = " . $id);
    }

    $_SESSION['message'] = "Person(s) removed from address book";
    $_SESSION['message_type'] = "danger";
    header("location: index.php");
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Multiple Rows Using PHP & MySQL</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" >
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
</head>
<body>
<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="" method="post">
            <?php if (isset($_GET['msg'])) { ?>
            <p class="alert alert-success"><?php echo $_GET['msg']; ?></p>
            <?php } ?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th><input id="chk_all" name="chk_all" type="checkbox"  /></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Alternate Address</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><input name="chk_id[]" type="checkbox" class='chkbox' value="<?php echo $row['id']; ?>"/></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['alt_address']; ?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <input id="submit" name="submit" type="submit" class="btn btn-danger" value="Delete Selected Row(s)" />
            </form>
        </div>
    </div>
</div>
<script src="js/jquery-1.10.2.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#chk_all').click(function(){
        if(this.checked)
            $(".chkbox").prop("checked", true);
        else
            $(".chkbox").prop("checked", false);
    });
});

$(document).ready(function(){
    $('#delete_form').submit(function(e){
        if(!confirm("Confirm Delete?")){
            e.preventDefault();
        }
    });
});
</script>
</body>
</html>