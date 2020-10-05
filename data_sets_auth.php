<!DOCTYPE html>
<?php
// Turn off all error reporting
error_reporting(0);
?>
<html lang="en" dir="ltr" <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css"
    href="css/table_style.css">
  </head>
  <header>
      <div class="main">
          <div class = "logo">
              <img src="biust_logo_white.png" alt="biust_logo" width="225dp" height="100dp">
          </div>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li class="active"><a href="data_sets.php">Data Sets</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contactus.html">Contact Us</a></li>
            <li><a href="citationpolicy.html">Citation Policy</a></li>
            <li> <form method="get" class="srch-btn" action="data_sets.php">
              <input type="text" name="srch" placeholder="Search" >
              <input type="submit" name="submit">
              <?php
            // displays searchbar results
            include 'db_connect.php';
              $set = $_GET['srch'];
              if ($set) {
                $show ="SELECT * FROM data WHERE (Title OR Author OR Abstract OR Area OR Number_of_instances OR Number_of_attributes OR Relevant_Information OR File) = '$set'";
                $result=mysqli_query($conn,$show);
                while($rows = mysqli_query_fetch_array($result)){
                   ?>
                  <div class="c">
                  <table width = '100%'>
                    <div class="table">
                      <th>Title</th>
                      <th>Author</th>
                      <th>Abstract</th>
                      <th>Area</th>
                      <th>Number of Instances</th>
                      <th>Number of Attributes</th>
                      <th>Relevant Information</th>
                      <th>Files</th>
                        <?php
                      $conn->close();
              require_once 'db_connect.php';
                  echo "<tr><td>".$row["Title"]."</td><td>".$row["Author"]."</td><td>".$row["Abstract"]."</td><td>".$row["Area"]."</td><td>".$row["Number_of_instances"]."</td><td>".$row["Number_of_attributes"]."</td><td>".$row["Relevant_Information"]."</td><td>".$row["File"].
                  "</td></tr>";
                }
                }

            ?>
            </form>
            </li>
            </ul>
      </div>
        </header>
  <body>
    <br>
    <br>
    <br>
    <br>
    <a href="data_donation_form.php">
      <div class="float">
        <p>+</p>
      </div>
    </a>
    <!-- displays database table-->
    <div class="c">
    <table width = '100%'>
      <div class="table">
        <th>Title</th>
        <th>Author</th>
        <th>Abstract</th>
        <th>Area</th>
        <th>Number_of_instances</th>
        <th>Number_of_attributes</th>
        <th>Relevant_Information</th>
        <th>Files</th>
<?php
require_once 'db_connect.php';
$sql = "SELECT * FROM data ";
$results = $conn-> query($sql);

if($results-> num_rows > 0)
{
  while($row = $results-> fetch_assoc())
  {
    echo "<tr><td>".$row["Title"]."</td><td>".$row["Author"]."</td><td>".$row["Abstract"]."</td><td>".$row["Area"]."</td><td>".$row["Number_of_instances"]."</td><td>".$row["Number_of_attributes"]."</td><td>".$row["Relevant_Information"]."</td><td>".$row["File"].
    "</td></tr>";
  }
  }
  ?>
  <?php


$conn->close();
 ?>
 </div>
</table>
  </div>

</body>
</html>
