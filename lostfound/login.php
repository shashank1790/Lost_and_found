
<html>
<body style = "background-color:grey;text-color:black;">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<h1>Login to Lost and Post Website....</h1>
User_id:<input type = "text" name="id"><br><br>
Password:<input type="password" name="pswd"><br><br>
<input type = "submit" name = "submit" value = "login">
</form><br><br>
<form method="post" action="test.php" method="post" align="center">
If you are not registered click here....<br><br>
<input type="submit" name="signup" value="Sign Up">
</form>
</body>
</html>


<?php
$con=mysql_connect("localhost","root","311309") or die(mysql_error());
mysql_select_db("lost_and_found") or die(mysql_error());
$id = $_POST["id"];
$pswd = $_POST["pswd"];
$result = mysql_query("select * from users ")or die(mysql_error());
$flag = 0;
while($row=mysql_fetch_array($result))
{
if($id==$row['id']&& $pswd==$row['pswd'])
{
$flag = 1;
header('Location:post_tkt.php');
}
}
//if($flag==0)
//echo "wrong username or password";
mysql_close($con);
?>
