<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/formstyle.css">
<head>
	<title>Donate_data</title>
</head>
<header>
		<div class="main">
				<div class = "logo">
						<img src="biust_logo_white.png" alt="biust_logo" width="225dp" height="100dp">
				</div>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="data_sets.php">Data Sets</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="contactus.html">Contact Us</a></li>
					<li><a href="citationpolicy.html">Citation Policy</a></li>
				</ul>
		</div>
			</header>
<body>
	<body>
		<br>
		<br>

	<div class="about">
  <!--data form-->
 <div class="containerrr">
<form action="data_donation_form.php" method="post">
<h1>DONATION FORM</h1>
 <!--Introduction paragraph-->

<p style="">The best way to donate data sets is to fill out our web form which will allow you to upload your data file into our repository.If you have any problems feel free to <a href="#">Contact us</a>. Thanks for your contribution.</p>

	<!--baisic data description-->
	<label><b>Data set Name:</b></label><br>
	<input type="text" name="title"><br>
  <label><b>Author:</b></label><br>
	<input type="text" name="auth"><br>
	<label><b>Abstract:</b></label><br>
	<textarea cols="50" rows="10" name="abst"></textarea><br>
    <label>Area:</label><br>
    <textarea cols="50" rows="10" name="ar"></textarea><br>



    <!--data instances-->

    <label>Number of instances(records in your data set):</label>
    <input type="text" name="inst"><br>

    <label>Number of attributes(feilds within each record:</label>
     <input type="text" name="atri"><br>
    <hr>

   <!--additional information-->
	<div class="wrapper">
	<label><b>Relevant Information:</b></label><br>
	<textarea cols="50" rows="10" name="rele"></textarea><br>

	<hr>

	<!-- upload file-->
	<input type="file" name="sele">
	<input type="submit" name="Donate_data">
</form>
	</div>
</div>
<?php
error_reporting(0);
if (isset($_POST['Donate_data']))
{
include_once 'db_connect.php';

  $Title = $_POST['title'];
  $Author = $_POST['auth'];
  $Abstract = $_POST['abst'];
  $Area = $_POST['ar'];
  $Number_of_instances = $_POST['ins'];
  $Number_of_attributes = $_POST['atri'];
  $Relevant_Information = $_POST['rele'];
  $File = $_POST['sele'];

  $sql = "INSERT INTO data (Title,Author,Abstract,Area,Number_of_instances,Number_of_attributes,Relevant_Information,File) VALUES('$Title','$Author','$Abstract','$Area','$Number_of_instances','$Number_of_attributes','$Relevant_Information','$File');";
  mysqli_query($conn,$sql);
  header("location: data_sets_auth.php");
}
?>
</body>
</html>
