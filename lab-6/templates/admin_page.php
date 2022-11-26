<?php
  session_start();
 ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/styles/login.css" />
    <link rel="icon" type="image/x-icon" href="../assets/styles/login.css" />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script>
      function toggleToastMessage()
      {
        const toastMessage = document.getElementById('toastMessage')
        toastMessage.classList.toggle('show')
      }
</script>
</head>
<body class="loginPage">
  <nav class="navbar navbar-light bg-light" style="">
    <form class="container-fluid justify-content-end" method="POST" action="add_product.php">
        <button class="btn btn-outline-success me-2" type="submit">Add products</button>
    </form>
  </nav>
</body>
<?php if(isset($_SESSION['adding_status'])) {?>
<div class="toast align-items-center show toastMessage bg-<?php echo $_SESSION['adding_status'];?> mt-3" role="alert" aria-live="assertive" aria-atomic="true" id="toastMessage">
  <div class="d-flex">
    <div class="toast-body">
    <?php
      echo $_SESSION['message'];
      unset($_SESSION['adding_status']);
      unset($_SESSION['message']);
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
            <p class="card-text price-tag"> <strong><?php echo $row['price']; ?>đ</strong></p>
            <a href="edit_delete_action.php?id=<?php echo $row['id']; ?>&action=edit" class="btn btn-info">Edit</a>
            <a href="edit_delete_action.php?id=<?php echo $row['id']; ?>&action=delete" class="btn btn-danger">Delete</a>
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
</html>
