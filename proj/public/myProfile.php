<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="w3-container">
    <link rel='stylesheet' type='text/css' href='pro.css'>
<?php
include_once "../core/init.php";
$email = $_SESSION['email'];
$res=mysqli_query($db,"SELECT * FROM `users` WHERE email = '$email'");
$_SESSION['users'] = mysqli_num_rows($res);
if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);

{
    



echo "<link rel='stylesheet' type='text/css' href='pro.css'>";
echo "<table class='table table-bordered table-striped' style='margin: 300px auto;'>";
echo "<thead><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr></thead>";
echo "<tbody>";


    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["firstname"] . "</td>";
    echo "<td>" . $row["lastname"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "</tr>";
    
}

echo "<td class='text-center'><a href='home.php'>Back to Home</a></td>";
echo "</tbody>";
echo "</table>";

}

?>
</div>

   
</body>

</html>
