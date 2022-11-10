<html lang="en">
  <?php include('templates/header.php'); ?>
  <?php 
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      header("Location: http://localhost/labs/lab-5/$page.php");
      exit();
    }
  ?>
  <?php include('templates/footer.php'); ?>
</html>
