<?php
$flag = 0;
$message = '';
	session_start();
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
			$bname=$_POST['bname'];
		}
		if(empty($_POST['ktype']))
		{
			$flag = 1;
		}
		else
		{
			$ktype =  $_POST['ktype'];
		}
		if(empty($_POST['osname']))
		{
			$flag = 1;
		}
		else
		{
			$osname = $_POST['osname'];
		}
		if(empty($_POST['color']))
		{
			$flag = 1;
		}
		else
		{
			$color = $_POST['color'];
		}
		if(empty($_POST['sname']))
		{
			$flag = 1;
		}
		else
		{
			$sname = $_POST['sname'];
		} 
		if(empty($_POST['imei']))
		{
			$flag = 1;
		}
		else
		{
			$imei = $_POST['imei'];
		}
		if($flag == 1)
		{
			$message = "All Fields are neccessary";
		}
		else
		{
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		$post = $user->mobile_post_tkt($uid,$dt,$bname, $ktype,$osname,$color,$sname,$imei,$tkt_bt);
			if ($post) 
			{
				// Ticket Posted succeccfully
				echo "<br>";
				$message = "Your Ticket has been posted successfully";
				$user1->match_mobile($uid,$bname, $ktype,$osname,$color,$sname,$imei);

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
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b><a href="?q=logout">LOGOUT</a></b>;&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	
	</div>
	<div  class=Layout23_2 >
	<h2> Enter Mobile Details...</h2>
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<img src="mob3.jpg" width="400" height="300">
	<table><tr><td>
	<b><?php echo $message; ?></b>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<br>Date:<br>
<input type="date" name="dt">
<br><br>Brand Name:<br>
<select Type="bname" name="bname">
<option value="motorola">Motorola</option>
<option value="samsung">Samsung</option>
<option value="nokia">Nokia</option>
<option value="apple">Apple</option>
<option value="sony">Sony</option>
<option value="micromax">Micromax</option>
<option value="blackbery">blackberry</option>
<option value="reliance">Reliance</option>
</select>
<br><br>Type:<br>
<select Type="ktype" name="ktype">
<option value="simple">Simple Keypad</option>
<option value="qwerty">Qwerty Keypad</option>
<option value="touch_&_type">Touch & Type</option>
<option value="touch">Touch Screen</option>
</select>
<br><br>Operating System:<br>
<select Type="company" name="osname">
<option value="simbian">Simbian</option>
<option value="android">Android</option>
<option value="windows">Windows</option>
<option value="mac">Mac</option>
<option value="bb">Blackberry OS</option>
</select>
<br><br>Color:<br>
<input type="color" name="color">
<br><br>Sim Type:<br>
<select Type="company" name="sname">
<option value="single">Single</option>
<option value="double">Double</option>
</select>
<br><br>IMEI Number:<br>
<input type="text" name="imei">
<br><br>
<input type="submit" name="submit" value="Proceed..">
</form>

</td></tr></table>
	</div> 
	
</div>

</body>
</html>


