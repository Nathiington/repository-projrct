<?php
  include_once 'db_connect.php';

  $Title = $_POST['Title'];
  $Author = $_POST['Author'];
  $Abstract = $_POST['abstract'];
  $Area = $_POST['area'];
  $Number_of_instances = $_POST['instances'];
  $Number_of_attributes = $_POST['Atribute'];
  $Relevant_Information = $_POST['relevant'];
  $File = $_POST['select'];

  $sql = "INSERT INTO data(Title,Author,Abstract,Area,Number_of_instances,Number_of_attributes,Relevant_Information,File) VALUES('$Title','$Author','$Abstract','$Area','$Number_of_instances','$Number_of_attributes','$Relevant_Information','$File');";
  mysqli_query($conn,$sql);
  // Turn off all error reporting
  error_reporting(0);
