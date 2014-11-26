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
if(empty($_POST['bname']))
{
$flag = 1;
}
else
{
$bname = $_POST['bname'];
}
if(empty($_POST['dtype']))
{
$flag = 1;
}
else
{
$dtype = $_POST['dtype'];
}
if(empty($_POST['wstype']))
{
$flag = 1;
}
else
{
$wstype = $_POST['wstype'];
}
if(empty($_POST['wdtype']))
{
$flag = 1;
}
else
{
$wdtype = $_POST['wdtype'];
}
if(empty($_POST['wcolor']))
{
$flag = 1;
}
else
{
$wcolor = $_POST['wcolor'];
}
if($flag == 1)
{
	$message = "All Fields are necessary";
}
else
{
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
$post = $user->watch_post_tkt($uid,$dt,$bname, $dtype,$wstype,$wdtype,$wcolor,$tkt_bt);
if ($post) 
{
// Ticket Posted succeccfully
echo "<br>";
$message = "Your Ticket has been posted successfully";
$user1->match_watch($uid,$bname, $dtype,$wstype,$wdtype,$wcolor);
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
	<h2> Enter Watch Specifications...</h2>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<img src="w2.jpg" width="500" height="300">
	<table><tr><td>
	<b><?php echo $message; ?></b>
	<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<br>Date:<br>
<input type="date" name="dt">
<br><br>Brand Name:<br>
<select Type="wcompany" name="bname">
<option value="titan">Titan</option>
<option value="fastrack">Fastrack</option>
<option value="maxima">Maxima</option>
<option value="fossil">Fossil</option>
<option value="casio">Casio</option>
</select>
<br><br>Dial Type:<br>
<select Type="dtype" name="dtype">
<option value="analog">Analog</option>
<option value="digital">Digital</option>
<option value="smart watch">Smart Watch</option>
</select>
<br><br>Strap Type:<br>
<select Type="wstype" name="wstype">
<option value="chain">Chain</option>
<option value="leather">Leather</option>
<option value="plastic">Plastic</option>
</select>
<br><br>Dial Shape:<br>
<select Type="wdtype" name="wdtype">
<option value="oval">Oval</option>
<option value="rectangle">Rectangle</option>
<option value="round">Round</option>
<option value="square">Square</option>
<option value="triangle">Triangle</option>
</select>
<br><br>Color:<br>
<input type="color" name="wcolor"><br><br>
<input type="submit" name="submit" value="Proceed..">
</form>
</td></tr></table>
	</div> 
	
</div>

</body>
</html>




