<?php


$Fname =  $_POST["FirstName"];
$Lname =  $_POST["LastName"];
$Email =  $_POST["Email"];
$Phone =  $_POST["Phone"];
$Select =  $_POST["sel"];
$Comments =  $_POST["comment"];

$con=mysqli_connect("localhost","Admin","admin","informationtable");

mysqli_select_db($con,'informationtable');

if(isset($_POST["FirstName"])&& $_POST["FirstName"] !== '' )
{

 $result = mysqli_query($con,"INSERT INTO projectdata (Num,FirstName,LastName,Email,Phone,Bridge,Comments)
                VALUES ('','$Fname','$Lname','$Email','$Phone','$Select','$Comments')");
}
 
$result = mysqli_query($con,"SELECT * FROM projectdata");
	 
 while ($row=mysqli_fetch_array($result))
 {
 	 
 	echo "<tr>";
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
