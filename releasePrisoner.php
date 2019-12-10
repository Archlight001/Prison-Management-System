<?php
require 'adminPanel.php';
require 'mysql_connect.php';
echo "<head>";
echo "<meta charset='utf-8'>";
echo "<link rel='stylesheet' href='css/releasePrisoner.css'>";
echo "<title>Home</title>";
echo "</head>";
echo "<body>";

echo "<h2>RELEASE PRISONER</h2>";

$input = "";
if (isset($_POST['prisonerName'])) {
    $input = $_POST['prisonerName'];
}

echo "<form action='releasePrisoner.php' method='POST' class='formdecor form-group'>";
echo "<input type='text' placeholder='ENTER THE NAME OF THE PRISONER HERE' name='prisonerName' class='form-control' value='$input' id='prisonerName' required/>";
echo "<button type='submit' class='btn btn-danger' name='search'>Search</button>";
echo "</form>";

$resetterr = "";

if (isset($_POST['search']) || isset($_POST['release'])) {
    $resetterr = "something is inside";
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
                $maritalStatus = $row['Marital Status'];
                
                $prisonnerID = $row['Prisonners_ID'];
                $cellNumber = $row['Cell Number'];

                $caseNumber = $row['Case Number'];
    
                $oldimageurl = $row['Photograph'];

                echo "<div class='mainPrisonerProfile'>";
                echo "<div class='main-content'>";
                echo "<div class='sub-content'>";

                echo "<div class='content'>";
                echo "<label>Name:     </label>";
                echo "<p> $name   </p>";
                echo "</div>";

                echo "<div class='content'>";
                echo "<label>Age:    </label>";
                echo "<p> $age</p>";
                echo "</div>";

                echo "<div class='content'>";
                echo "<label>Gender:     </label>";
                echo "<p> $gender</p>";
                echo "</div>";

                echo "<div class='content'>";
                echo "<label>Marital Status:     </label>";
                echo "<p> $maritalStatus</p>";
                echo "</div>";

                echo "<div class='content'>";
                echo "<label>Case Number:    </label>";
                echo "<p> $caseNumber</p>";
                echo "</div>";

                echo "<div class='content'>";
                echo "<label>Cell Number:    </label>";
                echo "<p> $cellNumber</p>";
                echo "</div>";

                echo "<div class='content'>";
                echo "<a href='viewPrisoner.php?pID=$prisonnerID'> More details..</a>";
                echo "</div>";

                echo "</div>";
                echo "<div class='image-content'>";
                echo "<img src='$oldimageurl' alt='No Image'>";

                echo "<form action='releasePrisoner.php' method='post' class='form-group'>";
                echo "<input type='number' name='personnelID' class='form-control' placeholder='Enter ID' required>";
                echo "<input type='hidden' name='prisonerName' value='$input'>";
                echo "<input type='hidden' name='prisonnerID' value='$prisonnerID'>";
                echo "<button type='submit' class='btn btn-danger' name='release'>Release</button>";

                echo "</form>";

                echo "</div>";

                echo "</div>";
                echo "</div>";

            }
        } else if ($query_num_rows == 0 && isset($_POST['search'])) {
            echo "<script>alert('Prisonner Not Found or Has been Released Already');</script>";
        }
    } else {
        echo "<script>alert('Name Field is Empty');</script>";
    }
}

if (isset($_POST['personnelID']) && $resetterr != "") {
    $id = trim($_POST['personnelID']);
    $value = $_SESSION['id'];
    if ($id == $value) {

        $prisonnerID = $_POST['prisonnerID'];
    
        $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Prisonners_ID`=$prisonnerID");
        $row = mysqli_fetch_assoc($query);

        $firstName = $row['First Name'];
        $middleName = $row['Middle Name'];
        $surname = $row['Surname'];
        $age = $row['Age'];
        $gender = $row['Gender'];
        $maritalStatus = $row['Marital Status'];
        $homeAddress = $row['Home Address'];

        $nextOfKinUniqueID = $row['Next of Kin UniqueID'];
        $query_nextofKin = mysqli_query($conn, "SELECT * FROM `Next of Kin` WHERE `UniqueID`='$nextOfKinUniqueID'");
        $query_rows2 = mysqli_num_rows($query_nextofKin);
        $row2 = mysqli_fetch_assoc($query_nextofKin);

        $cellNumber = $row['Cell Number'];

        $nextofKinName = $row2['Name'];
        $nextofKinNumber = $row2['Phone Number'];
        $caseNumber = $row['Case Number'];
        $dayEntered = $row['Day Entered'];
        $monthEntered = $row['Month Entered'];
        $yearEntered = $row['Year Entered'];

        $releaseDay = date("d");
        $releaseMonth = date("m");
        $releaseYear = date("Y");

        $oldimageurl = $row['Photograph'];
        $imagename = basename($oldimageurl);

        $newimageurl = "history/" . $imagename;

        if (rename($oldimageurl, $newimageurl)) {
            $transferquery = mysqli_query($conn, "INSERT INTO `Prisonner History` (`ID`, `First Name`, `Middle Name`, `Surname`, `Age`, `Gender`,
                                        `Marital Status`, `Home Address`,`Next of Kin Name`, `Next of Kin Phone Number`, `Case Number`, `Day Entered`,
                                        `Month Entered`, `Year Entered`, `Release Day`, `Release Month`, `Release Year`, `Photograph`)
                                         VALUES (NULL, '$firstName', '$middleName', '$surname', '$age', '$gender', '$maritalStatus', '$homeAddress',
                                          '$nextofKinName', '$nextofKinNumber', '$caseNumber', '$dayEntered', '$monthEntered', '$yearEntered', '$releaseDay',
                                            '$releaseMonth', '$releaseYear', '$newimageurl')");

            $deleteprisonerquery = mysqli_query($conn, "DELETE FROM `Prisonners` WHERE `Prisonners_ID`= '$prisonnerID'");
            $deletenextofkinquery = mysqli_query($conn, "DELETE FROM `Next of Kin` WHERE `UniqueID`= '$nextOfKinUniqueID'");
            
            if ($transferquery && $deleteprisonerquery && $deletenextofkinquery) {
                echo "<script>alert('Release Procedured Finished Successfully'); window.location.replace(\"releasePrisoner.php\"); </script>";
            } else {
                echo "<script>alert('Something went wrong somewhere');</script>";
            }

        } else if ($oldimageurl != "") {
            echo "<script>alert('Error moving image');</script>";
        }} else {
        echo "<script>alert('Invalid Input ID');</script>";
    }

}

?>