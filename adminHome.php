
<?php
include 'adminPanel.php';
require 'mysql_connect.php';

echo "<head>";
echo "<meta charset='utf-8'>";
echo "<link rel='stylesheet' href='css/adminHome.css'>";
echo "<title>Home</title>";
echo "</head>";
echo "<body>";

$value = $_SESSION['id'];
$query_getName = mysqli_query($conn, "SELECT * FROM `Personnel` WHERE `ID_No`='$value'");

if (mysqli_num_rows($query_getName) > 0) {
    $query_rowValue = mysqli_fetch_assoc($query_getName);
    $personnelName = $query_rowValue['First Name'] . " " . $query_rowValue['Middle Name'] . " " . $query_rowValue['Surname'];
    echo "<h2>WELCOME, " . $personnelName . "</h2>";
}

echo "<form action='adminHome.php' method='POST' class='formdecor form-group'>";
echo "<input type='text' placeholder='ENTER THE NAME OF THE PRISONER HERE' name='prisonerName' class='form-control' id='prisonerName' required/>";
echo "<button type='submit' class='btn btn-danger' name='search'>Search</button>";
echo "</form>";

if (isset($_POST['search'])) {
    $name = trim($_POST['prisonerName']);
    if ($name !== "") {
        $query = "SELECT * FROM `Prisonners` WHERE Concat(`First Name`,' ',`Middle Name`,' ',`Surname`) LIKE '%$name%' OR Concat(`First Name`,' ',`Surname`) LIKE '%$name%'
    OR Concat(`Middle Name`,' ',`Surname`) LIKE '%$name%' OR Concat(`First Name`,' ',`Middle Name`) LIKE '%$name%'";
        $query_run = mysqli_query($conn, $query);
        $query_num_rows = mysqli_num_rows($query_run);
        if ($query_num_rows != 0) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                $name = $row['First Name'] . " " . $row['Middle Name'] . " " . $row['Surname'];
                $age = $row['Age'];
                $gender = $row['Gender'];
                $prisonerID = $row['Prisonners_ID'];

                echo "<div class='prisonerInfo'>";
                echo "<div>";
                echo "<label>NAME</label>";
                echo "<p>$name</p>";
                echo "</div>";

                echo "<div>";
                echo "<label>AGE</label>";
                echo "<p>$age</p>";
                echo "</div>";
                echo "<div>";
                echo "<label>GENDER</label>";
                echo "<p>$gender</p>";
                echo "</div>";

                echo "<a href='viewPrisoner.php?pID=$prisonerID'>Click here for more details</a>";

                echo "</div>";
                echo "</body>";
            }
        } else {
            echo "<script>alert('Prisonner Not Found');</script>";
        }
    } else {
        echo "<script>alert('Name Field is Empty');</script>";
    }
}

?>
