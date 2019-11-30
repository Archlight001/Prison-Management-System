<?php

include 'adminPanel.php';
require('mysql_connect.php');

if(isset($_SESSION['caseNumber']) || isset($_GET['pID'])){
  if(isset($_SESSION['caseNumber'])){
    $value = $_SESSION['caseNumber'];
    $query = mysqli_query($conn,"SELECT * FROM `Prisonners` WHERE `Case Number`='$value'");
  }else if(isset($_GET['pID'])){
    $value = $_GET['pID'];
    $query = mysqli_query($conn,"SELECT * FROM `Prisonners` WHERE `Prisonners_ID`='$value'");
  }
  $query_rows = mysqli_num_rows($query);
  if($query_rows > 0){
    $row = mysqli_fetch_assoc($query);
    $name = $row['First Name']." ".$row['Middle Name']. " ".$row['Surname'];
    $age = $row['Age'];
    $gender = $row['Gender'];
    $maritalStatus = $row['Marital Status'];
    $educationLevel = $row['Education Level'];
    $homeAddress = $row['Home Address'];
    $nextOfKin = $row['Next of Kin Number'];
    $caseNumber = $row['Case Number'];
    $dateofEntry = $row['Day Entered']."/ ".$row['Month Entered']."/ ".$row['Year Entered'];
    $cellNumber = $row['Cell Number'];
    $imageurl = $row['Photograph'];


    echo "<head>";
    echo "<meta charset='utf-8'>";
    echo "<title>View Prisoner</title>";
    echo "<link rel='stylesheet' href='css/viewPrisoner.css'>";
    echo "</head>";
    echo "<body>";
    echo "<div class='mainPrisonerProfile'>";
      echo "<h2>PRISONER PROFILE</h2>";
        echo "<div class='main-content'>";

        echo "<div class='sub-content'>";

        echo "<div class='content'>";
        echo "<label>Name:     </label>";
        echo "<p> $name   </p>";
        echo "</div>";

        echo "<div class='content'>";
        echo "<label>Age:    </label>";
        echo "<p>$age</p>";
        echo "</div>";

        echo "<div class='content'>";
        echo "<label>Gender:     </label>";
        echo "<p>$gender</p>";
      echo "</div>";

      echo "<div class='content'>";
        echo "<label>Marital Status:     </label>";
        echo "<p>$maritalStatus</p>";
        echo "</div>";

        echo "<div class='content'>";
        echo "<label>Education Level:    </label>";
        echo "<p>$educationLevel</p>";
        echo "</div>";

        echo "<div class='content'>";
        echo "<label>Home Address:     </label>";
        echo "<p>$homeAddress</p>";
        echo "</div>";

        echo "<div class='content'>";
        echo "<label>Next of Kin Number:     </label>";
        echo "<p>$nextOfKin</p>";
        echo "</div>";

        echo "<div class='content'>";
        echo "<label>Case Number:    </label>";
        echo "<p>$caseNumber</p>";
        echo "</div>";

        echo "<div class='content'>";
        echo "<label>Date of Entry:    </label>";
        echo "<p>$dateofEntry</p>";
        echo "</div>";

        echo "<div class='content'>";
        echo "<label>Cell Number:    </label>";
        echo "<p>$cellNumber</p>";
        echo "</div>";

        echo "</div>";
          echo "<img src='$imageurl' alt='No Image'>";
        echo "</div>";
    echo "</div>";
  echo "</body>";
  }
}else{
  echo "<script>alert(\"Value Not set\");</script>";
}
?>
