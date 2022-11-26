<?php
  session_start();

  $servername = "127.0.0.1";
  $username = "root";
  $password = "12345678";
  $dbName = 'web_programming_lab';
  $conn = new mysqli($servername, $username, $password, $dbName);

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  function validate_password($password)
  {
    if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password))
    {
      header("Location: ../index.php?page=login&error=Password must be at least 8 character longs and contains numbers and letters and at least one uppercase letter");
      exit();
    }
  }
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else
  {
    $email = validate($_POST['email']);
    $user_password = validate($_POST['password']);
    validate_password($user_password);
    echo "email is $email";
    echo "email is $user_password";
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$user_password';";

    $result = $conn->query($sql);
    if(mysqli_num_rows($result) >= 1)
    {
      // Create session
      $row = mysqli_fetch_assoc($result);
      $_SESSION['email'] = $row['email'];
      $_SESSION['id'] = $row['id'];
      $_SESSION['status'] = "Sign in succesfully! Welcome back $email";
      // Create cookie
      $cookie_name = "user";
      setcookie($cookie_name, $row['email'], time() + (86400 * 30), "/");
      if($row['email'] == 'admin@gmail.com')
      {
        header("Location: ../index.php?page=admin_page");
        exit();
      }
      header("Location: ../index.php?page=home");
      exit();
    }
    else
    {
      header("Location: ../index.php?page=login&error=Wrong password combination");
      exit();
    }
  }
  $conn->close();

?>