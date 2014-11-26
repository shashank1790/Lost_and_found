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
	$flag =1;
}
else{
$dt =$_POST['dt'] ;
}
if(empty($_POST['company']))
{
	$flag =1;
}
else{
$company = $_POST['company'];
}
if(empty($_POST['calc_typ']))
{
	$flag =1;
}
else
{
$calc_typ = $_POST['calc_typ'];
}
if(empty($_POST['model']))
{
	$flag = 1;
}
else
{
$model = $_POST['model'];
}
if(empty($_POST['disp']))
{
	$flag = 1;
}
else
{
$disp = $_POST['disp'];
}
if($flag == 1)
{
	$message =  "All Fields are Required";
}
if($flag == 0)
{
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$post = $user->calci_post_tkt($uid,$dt,$company,$calc_typ,$model, $disp,$tkt_bt);
		if ($post) 
		{
		// Ticket Posted successfully
		echo "<br>";
		$message= "Your Ticket has been posted successfully";
		$user1->match_calculator($uid, $company,$calc_typ,$model, $disp);
		}
	}
}
/*echo "$disp";
echo "$model";
echo "$calc_typ";
echo "$company";
echo "$dt";
echo "$flag"; */
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
	<h2> Enter Calculator Specifications...</h2>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<img src="lostcalc.jpg" width="500" height="300">
	<table><tr><td>
	<b><?php echo $message; ?></b>
<form method="POST" action="">
<br>Date:<br>
<input type="date" name="dt">
<br><br>Brand Name:<br>
<select Type="company" name="company">
<option value="Casio">Casio</option>
<option value="texas">Texas Instruments</option>
<option value="orpat">Orpat</option>
<option value="cello">Cello</option>
<option value="Casio">Casio</option>
</select>
<br><br>Type:<br>
<select Type="typ" name="calc_typ">
<option value="scientific">Scientific Calculator</option>
<option value="basic">Basic Calculator</option>
</select>
<br><br>Model No:<br>
<input type="text" name="model">
<br><br>Display(digits):<br>
<input type="text" name="disp"><br><br>
<input type="submit" name="submit" value="Proceed..">

</form>
</td></tr></table>
	</div> 
	
</div>

</body>
</html>



