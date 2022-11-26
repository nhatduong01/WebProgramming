<?php
session_start();
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url_components = parse_url($actual_link);
// Use parse_str() function to parse the
// string passed via URL
parse_str($url_components['query'], $params);
if(!isset($params['action']) || !isset($params['id']))
{
  echo "<h1>Sorry, wrong url!</h1>";
  exit();
}
$product_id = $params['id'];
$servername = "127.0.0.1";
$username = "root";
$db_password = "12345678";
$dbName = 'web_programming_lab';
$conn = new mysqli($servername, $username, $db_password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if($params['action']=='delete')
{
  $sql = "DELETE FROM products WHERE id=$product_id;";
  if ($conn->query($sql) === TRUE) {
    $_SESSION['adding_status'] = 'success';
    $_SESSION['message'] = 'Delete product successful';
    header("Location: index.php?page=admin_page");
  } else {
    $_SESSION['adding_status'] = 'danger';
    $_SESSION['message'] = 'Delete product fail';
    header("Location: index.php?page=admin_page");
  }
}
else if($params['action']=='edit')
{
  $sql = "SELECT * FROM products WHERE id=$product_id;";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $product_name = $row['name'];
  $product_price = $row['price'];
  $product_image = $row['image_path'];
  $product_description = $row['description'];
  ?>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Edit Product</title>
  </head>
  <body >
    <div class="container" style="margin-top: 5rem;">
      <div class="row no-gutters">
        <div class="col-12 col-sm-6 col-md-4">
        <div class="card mb-3" style="width: 18rem;">
          <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="loading">
          <div class="card-body">
            <h5 class="card-title text-center"><?php echo $row["name"]; ?></h5>
          </div>
        </div>
        </div>
        <div class="col-6 col-md-8">
          <div class="edit-form shadow ">
            <form method="POST" action="edit_product.php">
              <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="product_name" value="<?php echo $product_name; ?>">
              </div>
              <div class="mb-3">
                <label for="product_image" class="form-label">Product Image Link</label>
                <input type="text" class="form-control" name="product_image" value="<?php echo $product_image; ?>">
              </div>
              <div class="mb-3">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="number" min="1" step="any" class="form-control" name="product_price" 
                value="<?php echo $product_price; ?>">
              </div>
              <div class="mb-3">
                <label for="product_description" class="form-label">Product Description (Optional)</label>
                <textarea type="password" class="form-control" name="product_description" rows="3" value="<?php echo $product_description; ?>"></textarea>
                <input type="hidden" name="id" value="<?php echo $product_id; ?>">
              <button type="submit" class="btn btn-primary mt-3" name="submit" value="submit">Edit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>
<?php
}
$conn->close();

?>