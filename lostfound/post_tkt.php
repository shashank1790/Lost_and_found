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
<head>
<link href='style1.css' rel='stylesheet' type='text/css' />
</head>
<body>
<div class=templateholder>
	<div class=Layout2_header>
		
		
	</div>
	<div class=Layout2_1 >
		<form method="post" action="">
<h3> To Delete a Ticket Please Enter the Item Details</h3>
<h5>Select Item Name:
<select  id="pt"  name="category">
<option value="calculator">Calculator</option>
<option value="mobile">Mobile</option>
<option value="watch">Watch</option>
<option value="atm">ATM</option>
<option value="jewellery">Jewellery</option>
</select><br /></h5>
<h5>Ticket Id :<input type = "text" name="id" ><br /></h5>
<h5>Select Ticket Type:
<select  id="rt"  name="r_type">
<option value="0">LOST</option>
<option value="1">FOUND</option><br /></h5>
<input type="submit" name='submit' value="Delete"><br />
</form>
<?php
//session_start();
//include("check2.php");
$name ="";
$tkt_id = "";
$tkt_bit="";
if(isset($_POST['submit']))
{

$user = new User();
$user1= new ticket();
$uid = $_SESSION['uid'];
$name = $_POST['category'];
$tkt_id = $_POST['id'];
$tkt_bit = $_POST['r_type'];
if(($name=="")||($tkt_id=="")||($tkt_bit==""))
{
echo "<h3>"."Fill in all the fields"."<h3>";
}
else
{
$user1->delete_ticket($name,$tkt_id,$uid,$tkt_bit);
}
}


	echo "</div>";
	echo "<div  class=Layout2_2 >";
	echo "<br />";
	echo "&nbsp&nbsp&nbsp&nbsp"; 
	echo "<b><a href='home.php'>HOME</a></b>"; 
	echo "&nbsp&nbsp&nbsp&nbsp";
	echo '<b><a href="?q=logout">LOGOUT</a></b>';
	
	echo "<h1><center>View Your Tickets</center> </h1>";
		//<?php
		//session_start();
		//include("check2.php");
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


























