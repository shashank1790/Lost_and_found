<?php
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
?>

<html>
<body>



</body>
</html>

<html>
<head>
<link href='style1.css' rel='stylesheet' type='text/css' />
<style>
img{
float:right;
}
</style>
</head>
<body>
<div class=templateholder>
	<div class=Layout2_header>
	
	</div>
	<div class=Layout2_1 >
		<br />
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <input type="button" value="Post Lost Item" onclick="location='lost_tkt.php'"/><br /><br />
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <input type="button" value="Post Found Item" onclick="location='found_tkt.php'"/><br /><br />
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="button" value="Delete Ticket" onclick="location='post_tkt.php' "/><br /><br />
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b><a href="?q=logout">LOGOUT</a></b>
	</div>
	<div  class=Layout2_2 >
	<h1> Hello <?php $user->get_fullname($uid); ?></h1>
	<h1><center>View Your Tickets</center> </h1>
		<?php
		//<label> <a href = "post_tkt.php">Click here </a> to see Your Posts...</label>
		$user1= new ticket();
		$uid = $_SESSION['uid'];
		//echo "You have posted following tickets on this website";
		$user1->pmobile_display($uid,0);
		$user1->pmobile_display($uid,1);
		$user1->patm_display($uid,0);
		$user1->patm_display($uid,1);
		$user1->pdisplay($uid,0);
		$user1->pdisplay($uid,1);
		$user1->pjeweldisplay($uid,0);
		$user1->pjeweldisplay($uid,1);
		$user1->pwatch_display($uid,0);
		$user1->pwatch_display($uid,1);
		?>
	
	</div>
	
</div>
</body>
</html>

