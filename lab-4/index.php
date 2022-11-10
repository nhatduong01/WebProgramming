<html lang="en">
  <?php include('templates/header.php'); ?>
  <?php 
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      include("$page.php");
    }
  ?>
  <?php include('templates/footer.php'); ?>
</html>
