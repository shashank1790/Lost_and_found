<html>
<head>
<link href='style1.css' rel='stylesheet' type='text/css' />
<script>
function goToPage( id ) {

  var node = document.getElementById( id );
if( node &&
    node.tagName == "SELECT" ) {

    // Go to web page defined by the VALUE attribute of the OPTION element

    window.location.href = node.options[node.selectedIndex].value;
    
  } // endif
  
  
}
</script>
<style>
table{
background-color:white;
width:100%
}

</style>
</head>



<div class=templateholder>
	<div class=Layout17_header> 
	</div>
	<div  class=Layout17_4 ><h3>
	&nbsp&nbsp&nbsp <b> <a href="home.php">HOME</a> </b> &nbsp&nbsp&nbsp
	&nbsp&nbsp&nbsp <b><a href="?q=logout">LOGOUT</a></b>
	<center><b><u>Select Item From Given Categories</u></b></center></h3>
	</div>
	<div class=Layout17_1 ><br />
	&nbsp&nbsp&nbsp <img src="calculator.png" width="360" height="100">
	<h2>
	
&nbsp&nbsp&nbsp<label for="e1"><b><u>Electronics:</u></b></label>
<select  id="e1" onchange="goToPage('e1')">
<option value="found_tkt.php" >Choose Item</option>
<option value="calculator.php">Calculator</option>
<option value="mobile.php">MObile</option>
</select>

</h2>
	</div>
	</div>
	<div  class=Layout17_2 ><br />
	&nbsp&nbsp&nbsp <img src="watch.jpg" width="360" height="100">
	<h2>
&nbsp&nbsp&nbsp<label for="a1"><b><u>Accesssories:</b></u> </label>
<select Item Type="acessories" name="accessories" id="a1" onchange="goToPage('a1')">
<option value="found_tkt.php" >Choose Item</option>
<option value="watch.php">Watch</option>
<option value="jewellery.php">Jewellery</option>
</select>

</h2>

	</div>
	<div  class=Layout17_3 ><br />
	&nbsp&nbsp&nbsp <img src="card1.jpg" width="360" height="100">
	<h2>
&nbsp&nbsp&nbsp<label for="c1"><b><u>Cards:</b></u> </label>
<select Item Type="cards" name="cards" id="c1"  onchange="goToPage('c1')">
<option value="found_tkt.php" >Choose Item</option>
<option value="card.php">ATM</option>
</select>


</h2>
</div>
	
	<div >
	<br />
	<br/>
	<center><h2 ><b><u>Note:</u></b>This is an Automated System. So Please try to Enter all the details Accurately!!</h2></center>
	
	</div>
</body>
</html>
<?php
session_start();
$_SESSION['tkt_bit'] = 1;

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
?>
