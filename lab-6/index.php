<?php
$page = ''; 
$flash_messages = array('signUp' => '', 'login' => '');
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
    case 'login':
      include('login.php');
      break;
    case 'register':
      include('register.php');
      break;
    case 'products':
      include('products.php');
      break;
    case 'admin_login':
      include('admin_login.php');
      break;
    case 'admin_page':
      include('templates/admin_page.php');
      break;
    case 'home':
    include('templates/header.php');  
    include('home.php');
    include('templates/footer.php');
      break;
    default:
  }
}
else
{
  include('templates/header.php');  
  include('home.php');
  include('templates/footer.php');
}
?>
