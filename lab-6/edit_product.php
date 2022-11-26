<?php
  session_start();
  if(isset($_POST['submit']))
  {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_description = $_POST['product_description'];
    $product_id = $_POST['product_id'];
    $servername = "127.0.0.1";
    $username = "root";
    $db_password = "12345678";
    $dbName = 'web_programming_lab';
    $conn = new mysqli($servername, $username, $db_password, $dbName);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE products SET name='$product_name',
    price=$product_price,
    description='$product_description',
    image_path='$product_image',
    WHERE id=$product_id;";
    if ($conn->query($sql) === TRUE) {
      $_SESSION['adding_status'] = 'success';
      $_SESSION['message'] = 'Edit product successful';
      header("Location: index.php?page=admin_page");
    } else {
      $_SESSION['adding_status'] = 'danger';
      $_SESSION['message'] = 'Add product fail';
      header("Location: edit_delete_action.php");
    }
    $conn->close();
  }
?>