<?php
include 'adminPanel.php';
require 'mysql_connect.php';
require_once 'compressImage.php';

if (isset($_POST['submit'])) {

    $firstName = trim($_POST['fName']);
    $middleName = trim($_POST['mName']);
    $surname = trim($_POST['sName']);
    $age = trim($_POST['age']);
    $gender = trim($_POST['gender']);
    $maritalStatus = trim($_POST['marital_status']);
    $educationLevel = trim($_POST['education_level']);
    $homeAddress = trim($_POST['homeAddress']);
    $nextOfKinName = trim($_POST['nokName']);
    $nextOfKinNumber = trim($_POST['nokNumber']);
    $nextOfKinEmail = trim($_POST['nokEmail']);
    $caseNumber = trim($_POST['caseNumber']);
    $day = date("d");
    $month = date("m");
    $year = date("Y");
    $image = $_FILES["files"]["name"];
    $image_extension = strtolower(substr($image, strpos($image, '.') + 1));
    $target_dir = "uploads/";
    $target_file = $target_dir . $firstName . $surname . "." . $image_extension;
    $uploadImagePath = "localhost/projectLiti/" . $target_file;

    $query = mysqli_query($conn, "SELECT `Free Cells` FROM Cells ");
    $row = mysqli_fetch_assoc($query);
    $total_cell = $row['Free Cells'];

    if ($total_cell != 0) {

        $prisoner_cellno = rand(1, $total_cell);
        $nextofKinUniqueID = rand(100001, 199999);

        $x = 2;

        if ($gender == "Male") {
            $prisoner_cellno = "M-" . $prisoner_cellno;
        } else if ($gender == "Female") {
            $prisoner_cellno = "F-" . $prisoner_cellno;
        }

        //CHECK FOR DUPLICATE CELL NUMBER IN THE EXISTING TABLE
        do {
            $query2 = mysqli_query($conn, "SELECT `Cell Number` FROM `Prisonners` WHERE `Cell Number`='$prisoner_cellno'");
            $query_num_rows = mysqli_num_rows($query2);
            if (!($query_num_rows > 1)) {
                break;
            } else {
                $prisoner_cellno = rand(1, $total_cell);
            }

        } while ($x = 2);

        //CHECK FOR DUPLICATE NEXT OF KIN UNIQUE ID IN THE EXISTING TABLE
        do {
            $query2 = mysqli_query($conn, "SELECT `Next of Kin UniqueID` FROM `Prisonners` WHERE `Next of Kin UniqueID`='$nextofKinUniqueID'");
            $query_num_rows = mysqli_num_rows($query2);
            if (!($query_num_rows > 1)) {
                break;
            } else {
                $nextofKinUniqueID = rand(100001, 199999);
            }

        } while ($x = 2);

        if ("" != $firstName && "" != $surname && "" != $age && "" != $gender && "" != $maritalStatus && "" != $educationLevel
            && "" != $homeAddress && "" != $nextOfKinName && "" != $nextOfKinNumber && "" != $nextOfKinEmail && "" != $caseNumber) {
            $query_check_duplicate = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `First Name` = '$firstName'
       AND `Middle Name` = '$middleName' AND `Surname` = '$surname' AND `Age` = '$age' AND `Gender` = '$gender'
        AND `Marital Status` = '$maritalStatus' AND `Education Level` = '$educationLevel' AND `Home Address` = '$homeAddress'
        AND `Case Number` = '$caseNumber'");

            if (mysqli_num_rows($query_check_duplicate) > 0) {
                echo "<script>alert('Duplicate Data Exists');</script>";
            } else if ($_FILES["files"]["size"] > 819200) {
                echo "<script>alert('Image Size is too Large');</script>";
            } else if (compress($_FILES["files"]["tmp_name"], $target_file, 50)) {
                //Insert Query here
                $query_insert = mysqli_query($conn, "INSERT INTO `Prisonners` (`Prisonners_ID`, `First Name`, `Middle Name`, `Surname`, `Age`, `Gender`, `Marital Status`, `Education Level`, `Home Address`, `Next of Kin UniqueID`,
          `Case Number`, `Day Entered`, `Month Entered`, `Year Entered`, `Cell Number`, `Photograph`) VALUES (NULL,
            '$firstName', '$middleName', '$surname', '$age', '$gender', '$maritalStatus', '$educationLevel', '$homeAddress', '$nextofKinUniqueID',
            '$caseNumber', '$day', '$month', '$year', '$prisoner_cellno', '$target_file')");

            //Insert Next of Kin Query Here

              $query_insert_nextofKin = mysqli_query($conn, "INSERT INTO `Next of Kin` (`UniqueID`, `Name`, `Phone Number`, `Email Address`) VALUES (
            '$nextofKinUniqueID', '$nextOfKinName', '$nextOfKinNumber', '$nextOfKinEmail')");


                if ($query_insert && $query_insert_nextofKin) {
                    $query3 = mysqli_query($conn, "SELECT `Cell Number` FROM `Prisonners` WHERE `Cell Number`='$prisoner_cellno'");
                    $query_num_rows = mysqli_num_rows($query3);

                    if ($query_num_rows > 1) {
                        if ($gender == "Male") {
                            mysqli_query($conn, "UPDATE `Cells` SET `Free Cells`=`Free Cells` -1 WHERE `Gender`='Males'");
                        } elseif ($gender == "Female") {
                            mysqli_query($conn, "UPDATE `Cells` SET `Free Cells`=`Free Cells` -1 WHERE `Gender`='Females'");
                        }

                    } else {
                        if ($gender == "Male") {
                            mysqli_query($conn, "UPDATE `Cells` SET `Occupied Cells`=`Occupied Cells` + 1 WHERE `Gender`='Males'");

                        } elseif ($gender == "Female") {
                            mysqli_query($conn, "UPDATE `Cells` SET `Occupied Cells`=`Occupied Cells` + 1 WHERE `Gender`='Females'");
                        }

                    }
                    $_SESSION['caseNumber'] = $caseNumber;
                    echo "<script >
              alert('Data Successfully Inserted');
              window.location.replace(\"viewPrisoner.php\");
              </script>";
                } else {
                    echo "<script>alert('An Error has occured While Inserting Data');</script>";
                }

            } else {
                echo "<script>alert('An Error has occured While Performing the Operation');</script>";
            }

        }

    } else {
        echo "<script>alert('No Available Cell to Insert the Prisoner');</script>";
    }

}

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
              <input type="text" name="homeAddress" class="form-control form-control-sm noknumvalidaton" required>
            </div>
             <div class="form-group col-md-12">
              <label class=".col-form-label-sm">Next of Kin Full Name</label>
              <input type="text" name="nokName" class="form-control form-control-sm noknumvalidaton" required>
            </div>
            <div class="form-group col-md-12">
              <label class=".col-form-label-sm">Next of Kin Phone Number</label>
              <input type="number" name="nokNumber" class="form-control form-control-sm noknumvalidaton" maxlength="11" required>
            </div>
             <div class="form-group col-md-12">
              <label class=".col-form-label-sm">Next of Kin Email Address</label>
              <input type="email" name="nokEmail" class="form-control form-control-sm noknumvalidaton" required>
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
