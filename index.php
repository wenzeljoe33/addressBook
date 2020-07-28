<?php 
  include("database.php");
?>

<?php 
  include("inc/header.php")
?>

<?php 
  include("inc/footer.php")
?>

<link rel="stylesheet" href="style.css">



<?php if(isset($_SESSION['message'])) { ?>
          <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
      <?php session_unset(); } ?>

<div class="container">
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">ADDRESS BOOK</h1>
      
    </div>
</div>

</div>



    <!-- List -->
    <div class="container p-4">
      <div class="row">
        <div col-md-4>
        <div class="list-group">
          
          <a href="addForm.php" class="list-group-item list-group-item-action">ADD</a>
          <a href="delete.php" class="list-group-item list-group-item-action">DELETE</a>
          <a href="addForm.php" class="list-group-item list-group-item-action">UPDATE</a>
          <a href="view.php" class="list-group-item list-group-item-action ">VIEW</a>
        </div>
        </div>

        
        
      </div>
    </div>

    <div class="welcome">
          <h1>WELCOME <br> TO <br> MY ADDRESS <br>BOOK</h1>
        </div>


    <div class="container">
      <div class="col-md-8">
      <form action="search.php" method="POST" >
          
          <input type="text" name="search" placeholder="Search by Last Name">
          <input type="submit" name="submit" value="Search">
        </form>

        <div class="container p-4">
          

        </div>

        

        
        
      </div>
    </div>

  
    

  

<?php 
  include("inc/footer.php");
?>
  
