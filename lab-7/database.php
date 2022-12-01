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

  // Create table: users
  $sql = "CREATE TABLE  users (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              username VARCHAR(30) NULL,
              email VARCHAR(50) NOT NULL,
              password VARCHAR(50) NOT NULL,
              user_level INT(5) DEFAULT 0
          )";
  if (!$conn->query($sql)) {
      echo "Error creating table: " . $conn->error;
  }
  // Create product tables
  $sql = "CREATE TABLE products(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description VARCHAR(100) NULL,
    image_path VARCHAR(200) NULL,
    price FLOAT
  )";
  if (!$conn->query($sql)) {
      echo "Error creating table: " . $conn->error;
  }
  $conn->close();

?>