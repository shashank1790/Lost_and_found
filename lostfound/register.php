<html>
<head>
<link href='style1.css' rel='stylesheet' type='text/css' />
<style>
.error {color: #FF0000;}
table{
background-color:#C2EBFF;
float:right;
right-margin:20px;
}
</style>
</head>
<body>



<div class=templateholder>
	<div class=Layout14_header> 
	
	</div>
	<div class=Layout14_3>
	<h1> <marquee> LOST AND FOUND WEBSITE </marquee></h1>
	<b><a href = "new_login.php">HOME</a></b>
	</div>
	<div  class=Layout14_2 >
	
	<br /><br />
	<?php
session_start();
include("check2.php");
$user = new User();
//$uid = $_POST['id'];
$nameErr = $emailErr = $idErr = $phoneErr = $pswdErr= "";
$name = $email = $phone= $id =$pswd ="";
 //Checking for user logged in or not

if(isset($_POST['submit']))
{
 if ($user->get_session())
{
header("location:home.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	// define variables and set to empty values

 if (empty($_POST["name"]))
     {$nameErr = "Name is required";
		
	 }
   else
     {$name = test_input($_POST["name"]);}
   
   if (empty($_POST["email"]))
     {$emailErr = "Email is required";
	 
	 }
   else
     {
     $email = test_input($_POST["email"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
       {
       $emailErr = "Invalid email format"; 
     
	   }
     }
    
   if (empty($_POST["phone"]))
     {$phoneErr = "Phone number is required";
	
	 }
   else
     {
	 if (is_numeric($_POST["phone"])) 
	 {$phone= $_POST["phone"];
	 }
	 else
	 {$phoneErr="Phone Number should be numeric";
	
	 }
		
	}
		
		
   if (empty($_POST["id"]))
     {$idErr = "User id is required";
	
	 }
   else
     {$id = test_input($_POST["id"]);}
     
   if (empty($_POST["pswd"]))
     {$pswdErr = "Password is required";
	 
	 }
   
   




if ($nameErr =="" && $emailErr =="" && $idErr =="" && $phoneErr =="" && $pswdErr== "" )
{

$register = $user->register($_POST['id'], $_POST['name'],$_POST['email'],$_POST['phone'], $_POST['pswd']);
if ($register) 
{
// Registration Success
echo '<b>Registration successful <a href="new_login.php">Click here</a> to login</b>';
} else 
{
// Registration Failed
echo '<b>Registration failed. Email or Username already exits please try again</b>';
}
}
}
}
function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}

?>

	 
	
	<table border="3"style="width:400px">
	<tr>
	<td>
	<form  method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name='reg' >
	<br />
	&nbsp &nbsp &nbsp <img src="reg3.jpg" alt="Registration" width="60" height="60">
		&nbsp &nbsp&nbsp	&nbsp&nbsp&nbsp	&nbsp&nbsp&nbsp<b><u>REGISTER</u></b><br/><br />

		&nbsp&nbsp Full Name:&nbsp&nbsp&nbsp <input type="text" name="name"> <span class="error">* <?php echo $nameErr;?></span><br /><br /></pre>
		 &nbsp&nbsp User Id:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type="text" name="id"><span class="error">* <?php echo $idErr;?></span><br /><br /> 
		&nbsp&nbsp Email:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type = "text" name="email"> <span class="error">* <?php echo $emailErr;?></span><br /><br />
		&nbsp&nbsp Phone:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<input type = "text" name = "phone" > <span class="error">* <?php echo $phoneErr;?></span><br /><br />
		 &nbsp&nbsp Password:&nbsp&nbsp&nbsp
		<input type="password" name="pswd"><span class="error">* <?php echo $pswdErr;?></span><br /><br />
		&nbsp&nbsp
		<input type="submit" value="Register" name="submit"><br /><br />
	
	</form>
	</td>
	</tr>
	</table>
	
	
	</div> 
	
</div>















</body>
</html>
