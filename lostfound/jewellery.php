<?php
session_start();
$flag = 0;
$message = "";
//session_start();
include("check2.php");
$user = new User();

$uid = $_SESSION['uid'];

if (!$user->get_session())
{
header("location:new_login.php");
}
if (isset($_GET['q']) == 'logout') 
{
$user->user_logout();
header("location:new_login.php");
}
if (isset($_POST['submit']))
{
//include("check2.php");
$user = new ticket();
$user1 = new match();
$tkt_bt = $_SESSION['tkt_bit'];
$uid = $_SESSION['uid'];
if(empty($_POST['dt']))
{
$flag = 1;
}
else
{
$dt = $_POST['dt'];
}
if(empty($_POST['gtype']))
{
$flag = 1;
}
else
{
$gtype = $_POST['gtype'];
}
if(empty($_POST['dtype']))
{
$flag = 1;
}
else
{
$dtype = $_POST['dtype'];
}

if($flag == 1)
{
	$message = "All Fields are necessary";
}
else
{
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
$post = $user->jewellery_post_tkt($uid,$dt,$gtype,$dtype,$tkt_bt);
if ($post) 
{
// Ticket Posted succeccfully
echo "<br>";
$message = "Your Ticket has been posted successfully";
$user1->match_jewellery($uid,$gtype,$dtype);
}
}
}
}
?>


<!Doctype html>
<html>
<head>
<link href='style1.css' rel='stylesheet' type='text/css' />
<style>
table{
float:left;
}
img{

}
</style>
</head>

<body>
<div class=templateholder>
	<div class=Layout23_header> 
	
	</div>
	<div class=Layout23_1 ><br /><br />
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b><a href='home.php'>HOME</a></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b><a href="?q=logout">LOGOUT</a></b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	
	</div>
	<div  class=Layout23_2 >
	<h2> Enter Details of Item..</h2>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<img src="acc1.jpg" width="500" height="300">
	<table><tr><td>
	<b><?php echo $message; ?></b>
	<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<br>Date:<br>
<input type="date" name="dt">
<br><br>Jewellery Type:<br>
<select Type="gtype" name="gtype">
<option value="Earring">Earrings</option>
<option value="Ring">Ring</option>
<option value="Chain">Chain</option>
<option value="Bracelet">Bracelet</option>
</select>
<br><br> Item Type:<br>
<select Type="dtype" name="dtype">
<option value="Gold">Gold</option>
<option value="Silver">Silver</option>
<option value="Diamond">Diamond</option>
<option value="Pearl">Pearl</option>
</select>
<br><br>
<input type="submit" name="submit" value="Proceed..">
</form>
</td></tr></table>
	</div> 
	
</div>

</body>
</html>




