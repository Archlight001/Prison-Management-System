<?php
include 'adminPanel.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">

  <link rel="stylesheet" href="css/admitPrisoners.css">
  <title>Admit Prisoner</title>
</head>

<body>
  <div class="container-fluid">
    <h2 class="heading-2-name">Admit New Prisoner</h3>
      <div class="form-div">
        <form action="admitPrisoners.php" method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label class=".col-form-label-sm">First Name</label>
              <input type="text" class="form-control form-control-sm" name="fName" required autofocus>
            </div>
            <div class="form-group col-md-12">
              <label class=".col-form-label-sm">Middle Name</label>
              <input type="text" class="form-control form-control-sm" name="mName">
            </div>
            <div class="form-group col-md-12">
              <label class=".col-form-label-sm">Surname</label>
              <input type="text" class="form-control form-control-sm" name="sName" required>
            </div>
            <div class="form-group col-md-12">
              <label class=".col-form-label-sm">Age</label>
              <input type="number" name="age" class="form-control form-control-sm numvalidaton" maxlength="2" required>
            </div>
            <div class="form-group col-md-12">
              <label class=".col-form-label-sm">Gender</label>
              <select name="gender" class="form-control form-control-sm" required>
                <option value="" selected="selected"></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label class=".col-form-label-sm">Marital Status</label>
              <select name="marital_status" class="form-control form-control-sm" required>
                <option value="" selected="selected"></option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label class=".col-form-label-sm">Education Level</label>
              <select name="education_level" class="form-control form-control-sm" required>
                <option value="" selected="selected"></option>
                <option value="Primary">Primary Education</option>
                <option value="Junior Secondary">Junior Secondary School</option>
                <option value="Senior Secondary">Senior Secondary School</option>
                <option value="Tertiary">Tertiary Education</option>
                <option value="None">None</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label class=".col-form-label-sm">Home Address</label>
              <input type="number" name="homeAddress" class="form-control form-control-sm noknumvalidaton" required>
            </div>
            <div class="form-group col-md-12">
              <label class=".col-form-label-sm">Next of Kin Number</label>
              <input type="number" name="nokNumber" class="form-control form-control-sm noknumvalidaton" maxlength="11" required>
            </div>

            <div class="form-group col-md-12">
              <label class=".col-form-label-sm">Case Number</label>
              <input type="number" name="caseNumber" class="form-control form-control-sm noknumvalidaton" maxlength="20" required>
            </div>

            <div class="form-group col-md-12">
              <label for="files" class=".col-form-label-sm">Select Image</label>
              <!-- <p class="imagename" style="display:inline;">No Image Selected</p> -->
              <input id="files" class="form-control form-control-sm" type="file" name="files" accept="image/*" style="padding:2px 10px;" required>
            </div>

            <input type="submit" name="submit" value="Submit" id="submit" class="center-button btn btn-danger ">

          </div>
        </form>
      </div>
  </div>
</body>

</html>



<?php
require('mysql_connect.php');
require_once('compressImage.php');

if(isset($_POST['submit'])){

  $firstName = $_POST['fname'];
  $middleName = $_POST['mname'];
  $surname = $_POST['sname'];
  $age = $_POST['age'];
  $gender= $_POST['gender'];
  $maritalStatus = $_POST['marital_status'];
  $educationLevel = $_POST['education_level'];
  $homeAddress = $_POST['homeAddress'];
  $nextOfKin = $_POST['nokNumber'];
  $caseNumber = $_POST['caseNumber'];
  $day = date("d");
  $month = date("m");
  $year = date("Y");
  $image = $_FILES['files']['name'];
  $image_extension = strtolower(substr($image,strpos($image,'.')+1));
  $target_dir = "uploads/";
  $target_file = $target_dir. $firstName.$surname.".".$image_extension;
  $uploadImagePath = "localhost/projectLiti/".$target_file;


  

}


?>
