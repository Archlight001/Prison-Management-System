
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link rel="stylesheet" href="css/loginstyle.css">
    <title>Login</title>
  </head>
  <body>
    <header>
      <h2>Irimiya's Prison</h2>
      <nav>
        <a href="index.html">Home</a>
        <a href="#">Book Visit</a>
      </nav>
    </header>


    <div class="container">
       <div class="row">
           <div class="col-lg-3 col-md-2"></div>
           <div class="col-lg-6 col-md-8 login-box">
               <div class="col-lg-12 login-title">
                  LOG IN
               </div>

               <div class="col-lg-12 login-form">
                   <div class="col-lg-12 login-form">
                       <form method="post" action="login.php" autocomplete="off">
                           <div class="form-group">
                               <label class="form-control-label">ID</label>
                               <input type="text" value="<?php if(isset($_POST['submit'])) {echo $_POST['id'];} ?>" class="form-control" name="id" required>
                           </div>
                           <div class="form-group">
                               <label class="form-control-label">PASSWORD</label>
                               <input type="password" value="<?php if(isset($_POST['submit'])) {echo $_POST['password'];} ?>" class="form-control" name="password" required>
                           </div>

                           <div class="col-lg-12 loginbttm">
                               <div class="col-lg-6 login-btm login-button">
                                   <button type="submit" class="btn btn-outline-primary" name="submit">LOGIN</button>
                                   <a href="#">forgottten password?</a>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
               <div class="col-lg-3 col-md-2"></div>
           </div>
       </div>

  </body>
</html>

<?php
  require ('mysql_connect.php');

  if(!$conn){
    echo "<script> alert('Could not Connect to Database');</script>";
  }else{
    if(isset($_POST['submit'])){
      $id= $_POST['id'];
      $password = $_POST['password'];
      $query= "SELECT * FROM `Personnel` WHERE `ID_No`='$id' AND `Password`='$password' ";
      $query_run = mysqli_query($conn,$query);
      $query_rows = mysqli_num_rows($query_run);
      if($query_rows > 0){
        $row = mysqli_fetch_assoc($query_run);
        $_SESSION['id']= $row['ID_No'];
        $_SESSION['cLevel']= $row['Clearance_Level'];
        if(isset($_SESSION['id']) && isset($_SESSION['cLevel']) ){
          header('Location:'.'adminPanel.php');
        }
      }else if($query_rows > 1){
          echo "<script> alert('Duplicate Id No found, Contact the Administrator');</script>";
      }else{
        echo "<script> alert('Invalid Username or Password');</script>";
      }

    }
  }




 ?>
