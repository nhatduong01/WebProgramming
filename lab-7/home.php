<?php if(isset($_SESSION['status'])) {?>
<div class="toast align-items-center show toastMessage bg-success" role="alert" aria-live="assertive" aria-atomic="true" id="toastMessage">
  <div class="d-flex">
    <div class="toast-body">
    <?php
      echo $_SESSION['status'];
      unset($_SESSION['status']);
     ?>
   </div>
    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close" onClick='toggleToastMessage()'></button>
  </div>
</div>
<?php } ?>
<?php 
  $servername = "127.0.0.1";
  $username = "root";
  $db_password = "12345678";
  $dbName = 'web_programming_lab';
  $conn = new mysqli($servername, $username, $db_password, $dbName);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
  }
  $sql = "SELECT * FROM products;";
  $result = $conn->query($sql);
  if($result->num_rows > 0)
  {
?>
<div class="product-list">
  <?php
      while($row = $result->fetch_assoc()) 
      {
        ?>  
        <div class="card mb-3" style="width: 18rem;">
          <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="loading">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row["name"]; ?></h5>
            <p class="card-text price-tag"> <strong><?php echo $row['price']; ?>$</strong></p>
            <a href="?page=product_detail&id=<?php echo $row['id']; ?>" class="btn btn-info">View Details</a>
          </div>
        </div>
  <?php
      }
  ?>
</div>
<?php
  }
  $conn->close();
?>