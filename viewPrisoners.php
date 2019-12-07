<?php
include 'adminPanel.php';
require 'mysql_connect.php';

echo "<head>";
echo "<meta charset='utf-8'>";
echo "<link rel='stylesheet' href='css/adminHome.css'>";
echo "<link rel='stylesheet' href='css/viewPrisoners.css'>";
echo "<title>Home</title>";
echo "</head>";
echo "<body>";
$showingvalue = "";
$query = mysqli_query($conn, "SELECT * FROM Prisonners");

if (isset($_POST['view'])) {

    $viewGender = $_POST['byGender'];
    $viewAge = $_POST['byAge'];
    $viewMonth = $_POST['byMonth'];
    $viewYear = $_POST['byYear'];
    $viewCellNumber = $_POST['byCellNumber'];

    if ($viewAge == "Age" && $viewGender == "Gender" && $viewMonth == "Month of Entry" && $viewYear == "Year of Entry" && $viewCellNumber == "Cell Number") {
        echo "<script>alert('Select a Valid View Parameter');</script>";
        $showingvalue = "Showing all Prisoners...";
    } else {
        if ($viewAge != "Age" && $viewGender == "Gender" && $viewMonth == "Month of Entry" && $viewYear == "Year of Entry" && $viewCellNumber == "Cell Number") {
            $showingvalue = "Showing all Prisoners with Age " . $viewAge;
            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Age`='$viewAge'");

        } elseif ($viewGender != "Gender" && $viewAge == "Age" && $viewMonth == "Month of Entry" && $viewYear == "Year of Entry" && $viewCellNumber == "Cell Number") {
            $showingvalue = "Showing all " . $viewGender . " Prisoners";
            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Gender`='$viewGender'");

        } elseif ($viewMonth != "Month of Entry" && $viewAge == "Age" && $viewGender == "Gender" && $viewYear == "Year of Entry" && $viewCellNumber == "Cell Number") {
            $dateObj = DateTime::createFromFormat('!m', $viewMonth);
            $monthName = $dateObj->format('F');
            $showingvalue = "Showing all Prisoners admitted in the month of " . $monthName;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Month Entered`='$viewMonth'");

        } elseif ($viewYear != "Year of Entry" && $viewMonth == "Month of Entry" && $viewAge == "Age" && $viewGender == "Gender" && $viewCellNumber == "Cell Number") {
            $showingvalue = "Showing all Prisoners admitted in the year " . $viewYear;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Year Entered`='$viewYear'");

        } elseif ($viewCellNumber != "Cell Number" && $viewYear == "Year of Entry" && $viewMonth == "Month of Entry" && $viewAge == "Age" && $viewGender == "Gender") {
            $showingvalue = "Showing all Prisoners in Cell Number " . $viewCellNumber;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Cell Number`='$viewCellNumber'");

        } elseif ($viewAge != "Age" && $viewGender != "Gender" && $viewMonth == "Month of Entry" && $viewYear == "Year of Entry" && $viewCellNumber == "Cell Number") {
            $showingvalue = "Showing all " . $viewGender . " " . $viewAge . " year old Prisonners";

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Age`='$viewAge' AND `Gender`='$viewGender'");

        } elseif ($viewAge != "Age" && $viewGender == "Gender" && $viewMonth != "Month of Entry" && $viewYear == "Year of Entry" && $viewCellNumber == "Cell Number") {
            $dateObj = DateTime::createFromFormat('!m', $viewMonth);
            $monthName = $dateObj->format('F');

            $showingvalue = "Showing all " . $viewAge . " year old Prisonners admitted in the month of " . $monthName;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Age`='$viewAge' AND `Month Entered`='$viewMonth'");

        } elseif ($viewAge != "Age" && $viewGender == "Gender" && $viewMonth == "Month of Entry" && $viewYear != "Year of Entry" && $viewCellNumber == "Cell Number") {
            $showingvalue = "Showing all " . $viewAge . " year old Prisonners admitted in the year " . $viewYear;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Age`='$viewAge' AND `Year Entered`='$viewYear'");

        } elseif ($viewAge != "Age" && $viewGender == "Gender" && $viewMonth == "Month of Entry" && $viewYear != "Year of Entry" && $viewCellNumber != "Cell Number") {
            $showingvalue = "Showing all " . $viewAge . " year old Prisonners in Cell Number " . $viewCellNumber;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Age`='$viewAge' AND `Cell Number`='$viewCellNumber'");

        } elseif ($viewAge != "Age" && $viewGender != "Gender" && $viewMonth != "Month of Entry" && $viewYear == "Year of Entry" && $viewCellNumber == "Cell Number") {
            $dateObj = DateTime::createFromFormat('!m', $viewMonth);
            $monthName = $dateObj->format('F');

            $showingvalue = "Showing all " . $viewGender . " " . $viewAge . " year old Prisonners admitted in the month of " . $monthName;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Age`='$viewAge' AND `Gender`='$viewGender' AND `Month Entered`='$viewMonth'");

        } elseif ($viewAge != "Age" && $viewGender != "Gender" && $viewMonth == "Month of Entry" && $viewYear != "Year of Entry" && $viewCellNumber == "Cell Number") {
            $showingvalue = "Showing all " . $viewGender . " " . $viewAge . " year old Prisonners admitted in the year " . $viewYear;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Age`='$viewAge' AND `Gender`='$viewGender' AND `Year Entered`='viewYear'");

        } elseif ($viewAge != "Age" && $viewGender != "Gender" && $viewMonth == "Month of Entry" && $viewYear == "Year of Entry" && $viewCellNumber != "Cell Number") {
            $showingvalue = "Showing all " . $viewGender . " " . $viewAge . " year old Prisonners in Cell Number " . $viewCellNumber;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Age`='$viewAge' AND `Gender`='$viewGender' AND `Cell Number`='$viewCellNumber'");

        } elseif ($viewAge != "Age" && $viewGender != "Gender" && $viewMonth != "Month of Entry" && $viewYear != "Year of Entry" && $viewCellNumber == "Cell Number") {
            $dateObj = DateTime::createFromFormat('!m', $viewMonth);
            $monthName = $dateObj->format('F');

            $showingvalue = "Showing all " . $viewGender . " " . $viewAge . " year old Prisonners admitted in the Month of " . $monthName . " year " . $viewYear;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Age`='$viewAge' AND `Gender`='$viewGender' AND `Month Entered`='$viewMonth' && `Year Entered` = '$viewYear'");

        } elseif ($viewAge != "Age" && $viewGender != "Gender" && $viewMonth != "Month of Entry" && $viewYear == "Year of Entry" && $viewCellNumber != "Cell Number") {
            $dateObj = DateTime::createFromFormat('!m', $viewMonth);
            $monthName = $dateObj->format('F');

            $showingvalue = "Showing all " . $viewGender . " " . $viewAge . " year old Prisonners admitted in the month of " . $monthName . " in Cell Number " . $viewCellNumber;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Age`='$viewAge' AND `Gender`='$viewGender' AND `Month Entered`='$viewMonth' AND `Cell Number`='$viewCellNumber'");

        } elseif ($viewGender != "Gender" && $viewMonth != "Month of Entry" && $viewYear == "Year of Entry" && $viewAge == "Age" && $viewCellNumber == "Cell Number") {
            $dateObj = DateTime::createFromFormat('!m', $viewMonth);
            $monthName = $dateObj->format('F');

            $showingvalue = "Showing all " . $viewGender . " admitted in the month of " . $monthName;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Month Entered`='$viewMonth' AND `Gender`='$viewGender'");

        } elseif ($viewGender != "Gender" && $viewMonth == "Month of Entry" && $viewYear != "Year of Entry" && $viewAge == "Age" && $viewCellNumber == "Cell Number") {
            $showingvalue = "Showing all " . $viewGender . " admitted in the year " . $viewYear;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Year Entered`='$viewYear' AND `Gender`='$viewGender'");

        } elseif ($viewGender != "Gender" && $viewMonth == "Month of Entry" && $viewYear == "Year of Entry" && $viewAge == "Age" && $viewCellNumber != "Cell Number") {
            $showingvalue = "Showing all " . $viewGender . " in Cell Number " . $viewCellNumber;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Cell Number`='$cellNumber' AND `Gender`='$viewGender'");

        } elseif ($viewGender != "Gender" && $viewMonth != "Month of Entry" && $viewYear != "Year of Entry" && $viewAge == "Age" && $viewCellNumber == "Cell Number") {
            $dateObj = DateTime::createFromFormat('!m', $viewMonth);
            $monthName = $dateObj->format('F');

            $showingvalue = "Showing all " . $viewGender . "admitted in the month of " . $monthName . " and year " . $viewYear;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Month Entered`='$viewMonth' AND `Gender`='$viewGender' AND `Year Entered`='$viewYear'");

        } elseif ($viewGender != "Gender" && $viewMonth != "Month of Entry" && $viewYear == "Year of Entry" && $viewAge == "Age" && $viewCellNumber != "Cell Number") {
            $dateObj = DateTime::createFromFormat('!m', $viewMonth);
            $monthName = $dateObj->format('F');

            $showingvalue = "Showing all " . $viewGender . "admitted in the month of " . $monthName . " in Cell Number " . $viewCellNumber;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Month Entered`='$viewMonth' AND `Gender`='$viewGender' AND `Cell Number`='$viewCellNumber'");

        } elseif ($viewMonth != "Month of Entry" && $viewYear != "Year of Entry" && $viewAge == "Age" && $viewGender == "Gender" && $viewCellNumber == "Cell Number") {
            $dateObj = DateTime::createFromFormat('!m', $viewMonth);
            $monthName = $dateObj->format('F');

            $showingvalue = "Showing all Prisonners admitted in the month of " . $monthName . " and year " . $viewYear;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Year Entered`='$viewYear' AND `Month Entered`='$viewMonth'");

        } elseif ($viewMonth != "Month of Entry" && $viewYear == "Year of Entry" && $viewAge == "Age" && $viewGender == "Gender" && $viewCellNumber != "Cell Number") {
            $dateObj = DateTime::createFromFormat('!m', $viewMonth);
            $monthName = $dateObj->format('F');

            $showingvalue = "Showing all Prisonners admitted in the month of " . $monthName . " in Cell Number " . $viewCellNumber;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Cell Number`='$viewCellNumber' AND `Month Entered`='$viewMonth'");

        } elseif ($viewYear != "Year of Entry" && $viewMonth == "Month of Entry" && $viewAge == "Age" && $viewGender == "Gender" && $viewCellNumber != "Cell Number") {

            $showingvalue = "Showing all Prisonners admitted in the year " . $viewYear . " in Cell Number " . $viewCellNumber;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Cell Number`='$viewCellNumber' AND `Year Entered`='$viewYear'");

        } elseif ($viewAge != "Age" && $viewGender != "Gender" && $viewMonth != "Month of Entry" && $viewYear != "Year of Entry" && $viewCellNumber != "Cell Number") {
            $dateObj = DateTime::createFromFormat('!m', $viewMonth);
            $monthName = $dateObj->format('F');

            $showingvalue = "Showing all " . $viewGender . " " . $viewAge . " year old Prisonners in Cell Number ".$viewCellNumber." admitted in the month of " . $monthName . " and year " . $viewYear;

            $query = mysqli_query($conn, "SELECT * FROM `Prisonners` WHERE `Age`='$viewAge' AND `Gender`='$viewGender' AND `Year Entered`='$viewYear' AND `Month Entered`='$viewMonth' AND `Cell Number`='$viewCellNumber' ");
        }
    }

} else {
    $showingvalue = "Showing all Prisoners...";
}

echo "<div class='viewTitle'>";

echo "<form action='viewPrisoners.php' method='POST' enctype='multipart/form-data'>";
echo "<div class='viewParameters'>";
echo "<h5>Show Prisoners by: </h5>";
echo "<select name='byAge'>";
echo "<option>Age</option>";
echo "<option>18</option>";
echo "<option>19</option>";
echo "<option>20</option>";
echo "<option>21</option>";
echo "<option>22</option>";
echo "<option>23</option>";
echo "<option>24</option>";
echo "<option>25</option>";
echo "<option>26</option>";
echo "<option>27</option>";
echo "<option>28</option>";
echo "<option>29</option>";
echo "<option>30</option>";
echo "<option>31</option>";
echo "<option>32</option>";
echo "<option>33</option>";
echo "<option>34</option>";
echo "<option>35</option>";
echo "<option>36</option>";
echo "<option>37</option>";
echo "<option>38</option>";
echo "<option>39</option>";
echo "<option>40</option>";
echo "<option>41</option>";
echo "<option>42</option>";
echo "<option>43</option>";
echo "<option>44</option>";
echo "<option>45</option>";
echo "<option>46</option>";
echo "<option>47</option>";
echo "<option>48</option>";
echo "<option>49</option>";
echo "<option>50</option>";
echo "<option>51</option>";
echo "<option>52</option>";
echo "<option>53</option>";
echo "<option>54</option>";
echo "<option>55</option>";
echo "<option>56</option>";
echo "<option>57</option>";
echo "<option>58</option>";
echo "<option>59</option>";
echo "<option>60</option>";
echo "</select>";
echo "<select name='byGender'>";
echo "<option>Gender</option>";
echo "<option>Male</option>";
echo "<option>Female</option>";
echo "</select>";
echo "<select name='byMonth'>";
echo "<option>Month of Entry</option>";
echo "<option value='1'>January</option>";
echo "<option value='2'>February</option>";
echo "<option value='3'>March</option>";
echo "<option value='4'>April</option>";
echo "<option value='5'>May</option>";
echo "<option value='6'>June</option>";
echo "<option value='7'>July</option>";
echo "<option value='8'>August</option>";
echo "<option value='9'>September</option>";
echo "<option value='10'>October</option>";
echo "<option value='11'>November</option>";
echo "<option value='12'>December</option>";
echo "</select>";
echo "<select name='byYear'>";
echo "<option>Year of Entry</option>";
echo "<option>2015</option>";
echo "<option>2016</option>";
echo "<option>2017</option>";
echo "<option>2018</option>";
echo "<option>2019</option>";
echo "<option>2020</option>";
echo "<option>2021</option>";
echo "<option>2022</option>";
echo "<option>2023</option>";
echo "</select>";

$getCellNumbers = mysqli_query($conn, "SELECT `Total Cells` FROM `Cells`");
$row = mysqli_fetch_assoc($getCellNumbers);
$totalCellNumber = $row['Total Cells'];
$count = 1;
echo "<select name='byCellNumber'>";
echo "<option>Cell Number</option>";
while ($count <= $totalCellNumber) {
    echo "<option>" . $count . "</option>";
    $count++;
}
echo "</select>";

echo "<input type='submit' value='View' name='view'>";
echo "<input type='submit' value='Show All' name='showAll'>";
echo "</div>";
echo "</form>";

echo "<div class='showingTitle'>";
echo "<h4>" . $showingvalue . "</h4>";
echo "</div>";

echo "</div>";

echo "</body>";

$query_run = mysqli_num_rows($query);
if ($query_run > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
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
    echo "<h3 style='text-align:center;'>No Prisoners found</h3>";
}
