<?php

$ID = $_POST["ID"];
$ModalFname =  $_POST["FirstName"];
$ModalLname =  $_POST["LastName"];
$ModalEmail =  $_POST["Email"];
$ModalPhone =  $_POST["Phone"];
$ModalSelect =  $_POST["sel"];
$ModalComments =  $_POST["comment"];

$con=mysqli_connect("localhost","Admin","admin","informationtable");
 
mysqli_select_db($con,"informationtable");

 mysqli_query($con,"UPDATE projectdata SET Num= '$ID', FirstName= '$ModalFname' ,LastName= '$ModalLname' ,Email= '$ModalEmail',Phone= '$ModalPhone' ,Bridge= '$ModalSelect',Comments= '$ModalComments' WHERE Num = $ID ");

$result = mysqli_query($con,"SELECT * FROM projectdata");
  while ($row=mysqli_fetch_array($result))
 {
 	 
 	echo "<tr>";
 	// echo "<td> ".$counter."</td>";
 	echo "<td class='Num'>".$row['Num'] ."</td>";
 	echo "<td class='FirstName'>".$row['FirstName'] ."</td>";
 	echo "<td class='LastName'>".$row['LastName'] ."</td>";
 	echo "<td class='Email'>".$row['Email']  ."</td>";
 	echo "<td class='Phone'>".$row['Phone']  ."</td>";
 	echo "<td class='Bridge'>".$row['Bridge']  ."</td>";
 	echo "<td class='Comments'>".$row['Comments']."</td>";
 	echo "<td> <button type='button' class='btn btn-primary edit'>Edit</button></td>";
 	echo "</tr>";
  
  }
 
mysqli_close($con);

?>


 