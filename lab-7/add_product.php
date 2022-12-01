<?php
  session_start();
  if(isset($_POST['submit']))
  {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_description = $_POST['product_description'];
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
    $sql = "INSERT INTO products(name, description, image_path, price) values('$product_name', '$product_description',
    '$product_image', $product_price);";
    if ($conn->query($sql) === TRUE) {
      $_SESSION['adding_status'] = 'success';
      $_SESSION['message'] = 'Add product successful';
      header("Location: index.php?page=admin_page");
    } else {
      $_SESSION['adding_status'] = 'danger';
      $_SESSION['message'] = 'Add product fail';
      header("Location: add_product.php");
    }
    $conn->close();
  }
?>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add new product</title>
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
</head>
<body>
  <div class="register-form shadow mt-3 add_product">
    <form method="POST" action="add_product.php">
      <div class="mb-3">
        <label for="product_name" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="product_name">
      </div>
      <div class="mb-3">
        <label for="product_image" class="form-label">Product Image Link</label>
        <input type="text" class="form-control" name="product_image">
      </div>
      <div class="mb-3">
        <label for="product_price" class="form-label">Product Price</label>
        <input type="number" min="1" step="any" class="form-control" name="product_price">
      </div>
      <div class="mb-3">
        <label for="product_description" class="form-label">Product Description (Optional)</label>
        <textarea type="password" class="form-control" name="product_description" rows="3"></textarea>
      <button type="submit" class="btn btn-primary mt-3" name="submit" value="submit">Add Product</button>
    </form>
  </div>
</body>
</html>
