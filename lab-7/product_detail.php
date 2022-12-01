<?php
  session_start();
  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $url_components = parse_url($actual_link);
  // Use parse_str() function to parse the
  // string passed via URL
  parse_str($url_components['query'], $params);
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
  $product_id = $params['id'];
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
  <title><?php echo $product_name; ?></title>
  <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/styles/product_detail.css" />
</head>
<body>
  <section class="header-main  bg-white">
    <div class="container-fluid">
        <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
            <div class="col-md-2">
                <a href="?page=home">
                  <img  class="d-none d-md-flex" src="assets/images/icons8-bbb-100.png" width="60" height="60">
                </a>
            </div>
            <div class="col-md-8">
          <div class="d-flex form-inputs">
          <input class="form-control" type="text" placeholder="Search any product...">
          <i class="bx bx-search"></i>
          </div>
            </div>
            
            <div class="col-md-2">
                <div class="d-flex d-none d-md-flex flex-row align-items-center">
                    <span class="shop-bag">
                      <img src="assets/images/shopping-cart.png" alt="image" width="50" height="50">
                    </span>
                    <div class="d-flex flex-column ms-2">
                        <span class="qty">1 Product</span>
                        <span class="fw-bold">$27.90</span>
                    </div>    
                </div>           
            </div>
        </div>
    </div> 
  </section>
  <div class="card mb-3" style="width: 70%; margin: auto; margin-top: 2rem;">
    <div class="row g-0">
      <div class="col-md-5">
        <img src="<?php echo $product_image; ?>" class="img-fluid rounded-start" alt="image">
      </div>
      <div class="col-md-7">
        <div class="card-body">
          <h5 class="card-title" style="font-size: 2rem;"><?php echo $product_name; ?></h5>
          <h3 class="product_price"><?php echo $product_price;?>$</h3>
          <p class="card-text"><?php echo $product_description; ?></p>
          <button class="btn btn-danger add-to-card-btn">Add to Card</button>
          <form action="" method="post" class="comment-form">
            <div class="mb-3">
              <label for="comments" class="form-label">Add your comments</label>
              <textarea class="form-control" id="comments" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
    include("templates/footer.php");
  ?>
</body>
</html>