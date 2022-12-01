<?php
  session_start();
  $errors = array('wrongConfirmPassword' => '', 'wrongPasswordPattern' => '');
  if(isset($_POST['submit']))
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password))
    {
      $errors['wrongPasswordPattern'] = 'Password required minimum length of 8, include numbers and letters and at least one uppercase!';
    }
    else if($password != $confirmPassword)
    {
      $errors['wrongConfirmPassword'] = 'Your confirm password is wrong!';
    }
    else
    {
      $servername = "127.0.0.1";
      $username = "root";
      $db_password = "12345678";
      $dbName = 'web_programming_lab';
      $conn = new mysqli($servername, $username, $db_password, $dbName);
  
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      else
      {
        $sql = "INSERT INTO users(email, password) values('$email', '$password');";
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
      $conn->close();
      // Create session
      $_SESSION['status'] = 'Register succesfull!!';
      $_SESSION['email'] = $email;
      // Create cookie
      $cookie_name = "user";
      setcookie($cookie_name, $row['email'], time() + (86400 * 30), "/");
      header("Location: index.php?page=home");
    }
  }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register to be our members</title>
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/styles/register.css" />
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico" />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
</head>
<body>
  <div class="register-form shadow">
    <form action="register.php" method="POST">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required value="<?php if(isset($email)) { echo $email; }?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required value="<?php if(isset($password)) { echo $password; }?>">
      </div>
      <p class="alertMessage text-warning"><?php echo $errors['wrongPasswordPattern']; ?></p>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Enter password again</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="confirmPassword" required>
      </div>
      <p class="alertMessage text-danger"><?php echo $errors['wrongConfirmPassword']; ?></p>
      <button type="submit" class="btn btn-primary" name="submit" value="submit">Register</button>
    </form>
  </div>
</body>
</html>