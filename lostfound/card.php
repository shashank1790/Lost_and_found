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
if(empty($_POST['bcard']))
{
	$flag = 1;
}
else
{
$bcard = $_POST['bcard'];
}
if(empty($_POST['cnumber']))
{
	$flag = 1;
}
else
{
$cnumber = $_POST['cnumber'];
}
if(empty($_POST['ctype']))
{
	$flag = 1;
}
else
{
$ctype = $_POST['ctype'];
}
$cname = $_POST['cname'];

if($flag == 1)
{
	$message = "Fields Marked With * are necessary";
}
else
{
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
$post = $user->atm_post_tkt($uid,$dt,$bcard, $cnumber,$ctype,$cname,$tkt_bt);
if ($post) 
{
// Ticket Posted successfully
echo "<br>";
$message= "Your Ticket has been posted successfully";
$user1->match_atm($uid,$bcard, $cnumber,$ctype,$cname);
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
	<h2> Enter Card Details...</h2>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<img src="download.jpg" width="500" height="300">
	<table><tr><td>
	<b><?php echo $message; ?></b>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<br>Date:<br>
<input type="date" name="dt">*
<br><br>Bank Name:<br>
<select Type="bcard" name="bcard">
<option value="sbi">SBI</option>
<option value="icici">ICICI</option>
<option value="pnb">PNB</option>
<option value="boi">Bank of India</option>
<option value="bob">Bank of Baroda</option>
</select>*
<br><br>Card Number:<br>
<input type="text" name="cnumber">*
<br><br>Card Type:<br>
<select Type="ctype" name="ctype">
<option value="debit">Debit</option>
<option value="credit">Credit</option>
<option value="maestro">Maestro</option>
<option value="master">Master</option>
<option value="visa">Visa</option>
</select>*
<br><br>Name:<br>
<input type="text" name="cname"><br><br>
<input type="submit" name="submit" value="Proceed..">
</form>

</td></tr></table>
	</div> 
	
</div>

</body>
</html>

