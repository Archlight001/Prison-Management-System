<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['cLevel'])){
}else{
  header('Location:'.'login.php');
}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
      <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminPanel.css">
  </head>
  <body>
    <div class="navigationbar">
    <p style="float:left;">ADMIN PANEL</p>

      <a href="logout.php" name="logout">Log Out</a>
      <a href="#">Send Report</a>
      <div class="ddown">
        <a class="dbtn" style="color:#fff;">Prisoners
          <i class="fa fa-caret-down"></i>
        </a>
        <div class="ddown-content">
          <a href="admitPrisoners.php">Admit New Prisoners</a>
          <a href="#">Release Prisoners</a>
          <a href="viewPrisoners.php">View Prisoners</a>
        </div>
      </div>
  <a href="#">Check Available Cells</a>
  <a href="#news">Visitors Log</a>
  <a href="adminHome.php">Home</a>
</div>
  </body>
</html>
