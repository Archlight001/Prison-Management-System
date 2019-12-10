<?php
require 'adminPanel.php';
require 'mysql_connect.php';

echo "<head>";
echo "<meta charset='utf-8'>";
echo "<link rel='stylesheet' href='css/checkAvailableCells.css'>";
echo "<title>Home</title>";
echo "</head>";
echo "<body>";

$getCellNumbers = mysqli_query($conn, "SELECT * FROM `Cells`");

$totalmaleCellNumber = "";
$totalfemaleCellNumber = "";

$malefreeCell = "";
$femalefreeCell = "";

$maleoccupiedCell = "";
$femaleoccupiedCell = "";

while($row = mysqli_fetch_assoc($getCellNumbers)){
for ($i = 0; $i < 2; $i++) {
    if ($totalmaleCellNumber == "") {
        $totalmaleCellNumber = $row['Total Cells'];
        $malefreeCell = $row['Free Cells'] - $row['Occupied Cells'];
        $maleoccupiedCell = $occupiedCell = $row['Occupied Cells'];

    } else {
        $totalfemaleCellNumber = $row['Total Cells'];
        $femalefreeCell = $row['Free Cells'] - $row['Occupied Cells'];
        $femaleoccupiedCell = $occupiedCell = $row['Occupied Cells'];

    }

}
}

$gettotalPrisoners = mysqli_query($conn, "SELECT `Prisonners_ID` FROM `Prisonners`");
$totalPrisoners = mysqli_num_rows($gettotalPrisoners);

$getfemalePrisoners = mysqli_query($conn, "SELECT `Prisonners_ID` FROM `Prisonners` WHERE `Gender`='Female'");
$totalfemalePrisoners = mysqli_num_rows($getfemalePrisoners);


$getmalePrisoners = mysqli_query($conn, "SELECT `Prisonners_ID` FROM `Prisonners` WHERE `Gender`='Male'");
$totalmalePrisoners = mysqli_num_rows($getmalePrisoners);


echo "<div class='cellContainer'>";

echo "<h2>PRISON CELL DATA</h2>";
echo "<p>TOTAL NUMBER OF MALE CELLS : $totalmaleCellNumber </p>";
echo "<p>TOTAL NUMBER OF FEMALE CELLS : $totalfemaleCellNumber </p>";

echo "<p>OCCUPIED MALE CELLS : $maleoccupiedCell</p>";
echo "<p>OCCUPIED FEMALE CELLS : $femaleoccupiedCell</p>";

echo "<p>EMPTY MALE CELLS : $malefreeCell</p>";
echo "<p>EMPTY FEMALE CELLS : $femalefreeCell</p>";


echo "<p>TOTAL NUMBER OF PRISONERS : $totalPrisoners</p>";
echo "<p>TOTAL NUMBER OF MALE PRISONERS : $totalmalePrisoners</p>";
echo "<p>TOTAL NUMBER OF FEMALE PRISONERS : $totalfemalePrisoners</p>";

echo "</div>";
