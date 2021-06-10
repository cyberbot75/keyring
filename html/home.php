<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: skyblue;
}
</style>
</head>
<body>

<ul>
  <li><a class="active" href="home.php">Home</a></li>
  <li><a href="control.php">Control</a></li>
  <li><a href="about.php">About</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

</body>
</html>

<?php
session_start();
if(isset($_SESSION['name']))
{
	$servername = "localhost";
	$username = "root";
	$password = "sqluserrootpassw0r4";
	$database = "users";

	$conn = mysqli_connect($servername, $username, $password, $database);

	echo "welcome ".$_SESSION['name'];

	$name = $_SESSION['name'];
	$date =  date('Y-m-d H:i:s');

	$sql = "insert into log (name , page_visited , date_time) values ('$name','home','$date')";

	if(mysqli_query($conn,$sql))
		{
			echo "<br><br>";
			echo "Date & Time : ".$date;
		}
}
else
{
	header('Location: index.php');
}
?>
