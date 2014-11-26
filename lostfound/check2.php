<?php
//session_start();
include("config.php");


class User
{
	public function __construct() 
	{
	$db = new DB_Class();
	}
	
	public function register($uid,$name,$email,$phone, $password)
	{

	
	$sql = mysql_query("SELECT id from users WHERE id = '$uid' or email = '$email'");
	$no_rows = mysql_num_rows($sql);
	if ($no_rows == 0) 
	{
	$result = mysql_query("INSERT INTO users values('$name','$uid','$email','$phone','$password')") or die(mysql_error());
	
	return $result;
	}
	else
	{
	return FALSE;
	}
	
	}

	public function check_login($id,$pswd)
	{
	
	
	$result = mysql_query("SELECT id from users WHERE id='$id' and pswd = '$pswd'");
	$user_data = mysql_fetch_array($result);
	$no_rows = mysql_num_rows($result);
	if ($no_rows == 1) 
	{
	$_SESSION['login'] = true;
	$_SESSION['uid'] = $user_data['id'];
	return TRUE;
	}
	else
	{
	return FALSE;
	}
	}
	
	public function get_fullname($uid) 
	{
	$result = mysql_query("SELECT name FROM users WHERE id = '$uid'");
	$user_data = mysql_fetch_array($result);
	echo $user_data['name'];
	}
	public function get_session() 
	{
	if(isset($_SESSION['login']))
	return $_SESSION['login'];
	}
	
	// Logout 
	public function user_logout() 
	{
	$_SESSION['login'] = FALSE;
	session_destroy();
	}
	
	public function informed($res,$uid)
	{	
			/*echo $res;
			echo "<br/>";
			echo $uid;
			echo "<br/>";*/
			$query1 = mysql_query("Select * from users where id = '$res' ");
			$row1 = mysql_fetch_assoc($query1);
			$email1 = $row1['email'];
			$phone1 = $row1['phone'];
			$name1 = $row1['name'];
			
			$query2 = mysql_query("Select * from users where  id = '$uid' ");
			$row2 = mysql_fetch_assoc($query2);
			$email2 = $row2['email'];
			$phone2 = $row2['phone'];
			$name2 = $row2['name'];
			$to1 = $email1;
			$to2 = $email2;
			
			$subject = "Lost and Found";
			$test1 = "For your Item contact ". $name2 ."<br>". $email2 .",". $phone2;
			$test2 = "For your Item contact ". $name1 ."<br>" . $email1 .",". $phone1;
			$message1 = $test1;
			$message2 = $test2;
			
			$headers = "From: nitclostfound@gmail.com\r\nReply-To: nitclostfound@gmail.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			$mail_sent1 = @mail($to1, $subject, $message1, $headers);
			$mail_sent2 = @mail($to2, $subject, $message2, $headers);
			
			//return TRUE;
			//echo "hello";
			
		
	}
	public function inform1($uid)
	{
		$result2=mysql_query("SELECT email from users where id = '$uid' ");
		$row = mysql_fetch_assoc($result2);
		$email = $row['email'];
		$to = $email;
		$subject = "Lost and Found";
		$message = "Handover the item to The Sergeant Office";
		$headers = "From: nitclostfound@gmail.com\r\nReply-To: nitclostfound@gmail.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$mail_sent1 = @mail($to, $subject, $message, $headers);
		//echo $mail_sent1;
		//echo "hello";
	}
	
	public function inform2($uid)
	{
		$result2=mysql_query("SELECT email from users where id = '$uid' ");
		$row = mysql_fetch_assoc($result2);
		$email = $row['email'];
		$to = $email;
		$subject = "Lost and Found";
		$message = "Check your item in The Seargeant Office";
		$headers = "From: nitclostfound@gmail.com\r\nReply-To: nitclostfound@gmail.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$mail_sent1 = @mail($to, $subject, $message, $headers);
	
	}
	
	
		
}



class ticket
{	//public SESSION['flag'] = 0;
	public function __construct() 
	{
	$db = new DB_Class();
	}
	public function calci_post_tkt($uid,$date, $cname, $type, $mno, $disp,$tkt_bt)
	{
	$result = mysql_query("INSERT INTO calculator values('','$uid','$date','$cname','$type','$mno','$disp','$tkt_bt',0)") or die(mysql_error());
	return $result;	
	}	

	public function atm_post_tkt($uid,$date,$bname,$cno, $ctype, $cname,$tkt_bt)
	{
	$result = mysql_query("INSERT INTO atm values('','$uid','$date','$bname','$cno','$ctype','$cname','$tkt_bt',0)") or die(mysql_error());
	return $result;	
	}

	public function mobile_post_tkt($uid,$date,$bname,$ktyp,$oname,$color, $sname,$imei,$tkt_bt)
	{
	$result = mysql_query("INSERT INTO mobile values('','$uid','$date','$bname','$ktyp','$oname','$color','$sname','$imei','$tkt_bt',0)") or die(mysql_error());

	return $result;	
	}
	
	public function watch_post_tkt($uid,$date,$bname,$wtyp,$wstype,$wdtype,$wcolor,$tkt_bt)
	{
	$result = mysql_query("INSERT INTO watch values('','$uid','$date','$bname','$wtyp','$wstype','$wdtype','$wcolor','$tkt_bt',0)") or die(mysql_error());

	return $result;	
	}
	public function jewellery_post_tkt($uid,$date,$bname,$wdtype,$tkt_bt)
	{
	$result = mysql_query("INSERT INTO jewellery values('','$uid','$date','$bname','$wdtype','$tkt_bt',0)") or die(mysql_error());

	return $result;	
	}

	public function display()
	{
	
	
	$result1=mysql_query("select * from calculator WHERE tkt_bit=0 && match_bit=0 ") or die(mysql_error());
	$no_rows = mysql_num_rows($result1);
	if ($no_rows!=0)
	{
	//echo "<br>"."<br>"."<br>"."<br>"."<br>";
	echo "<br>"."<b>LOST CALCULATORS</b>"."<br>"."<br>";
	echo "<table border = 1>";	
	echo "<tr>"."<th>";
	echo "Date when Lost"."</th>"."<th>";
	echo "Brand"."</th>"."<th>";
	echo "Calci Type"."</th>"."<th>";
	echo "Model No."."</th>"."<th>";
	echo "Display Digits"."</th>"."</tr>";
	while($row = mysql_fetch_assoc($result1))
  	{
	echo "<tr>"."<td>";
	
	echo $row['date']."</td>"."<td>";
  	echo $row['brand_name']."</td>"."<td>";
	echo $row['c_type']."</td>"."<td>";
	echo $row['model_no']."</td>"."<td>";  
	echo $row['display']."</td>"."</tr>";	
	}
	echo "</table>";

	}
	}



	public function watch_display()
	{
	
	
	$result1=mysql_query("select * from watch WHERE tkt_bit=0 && match_bit=0 ") or die(mysql_error());
	$no_rows = mysql_num_rows($result1);
	if ($no_rows!=0)
	{
	echo "<br>"."<br>"."<b>LOST WATCHES</b><br>"."<br>";
	echo "<table border = 1>";	
	echo "<tr>"."<th>";
	echo "Date when Lost"."</th>"."<th>";
	echo "Brand"."</th>"."<th>";
	echo "Dial Type"."</th>"."<th>";
	echo "Strap Type"."</th>"."<th>";
	echo "Dial Shape"."</th>";
	//echo "Color"."</th>"."</tr>";
	while($row = mysql_fetch_assoc($result1))
  	{
	echo "<tr>"."<td>";
	
	echo $row['date']."</td>"."<td>";
  	echo $row['bname']."</td>"."<td>";
	echo $row['type']."</td>"."<td>";
	echo $row['strap_type']."</td>"."<td>";  
	echo $row['dialshape']."</td>";
	//echo $row['color']."</td>"."</tr>";	
	}
	echo "</table>";
	}
	}
	public function jewellery_display()
	{
	
	
	$result1=mysql_query("select * from jewellery WHERE ticket_bit=0 && match_bit=0 ") or die(mysql_error());
	$no_rows = mysql_num_rows($result1);
	if ($no_rows!=0)
	{
	echo "<br>"."<br>"."<b>LOST JEWELLERY</b><br>"."<br>";
	echo "<table border = 1>";	
	echo "<tr>"."<th>";
	echo "Date when Lost"."</th>"."<th>";
	echo "Kind"."</th>"."<th>";
	echo "Type"."</th>";
	echo "</tr>";
	while($row = mysql_fetch_assoc($result1))
  	{
	echo "<tr>"."<td>";
	
	echo $row['date']."</td>"."<td>";
  	echo $row['gtype']."</td>"."<td>";
	echo $row['dtype']."</td>"."</tr>";
	
	}
	echo "</table>";
	}
	}



	public function atm_display()
	{
	
	
	$result1=mysql_query("select * from atm WHERE tkt_bit=0 && match_bit=0") or die(mysql_error());
	$no_rows = mysql_num_rows($result1);
	if ($no_rows!=0)
	{
	echo "<br>"."<br>"."<b>LOST ATM CARDS</b>"."<br>"."<br>";
	echo "<table border = 1>";	
	echo "<tr>"."<th>";
	echo "Date when Lost"."</th>"."<th>";
	echo "Bank name"."</th>"."<th>";
	echo "Card Number"."</th>"."<th>";
	echo "Card Type"."</th>"."<th>";
	echo "Name on card"."</th>"."</tr>";
	while($row = mysql_fetch_assoc($result1))
  	{
	echo "<tr>"."<td>";
	
	echo $row['date']."</td>"."<td>";
  	echo $row['bank_name']."</td>"."<td>";
	echo $row['card_no']."</td>"."<td>";
	echo $row['card_type']."</td>"."<td>";  
	echo $row['name']."</td>"."</tr>";
	}
	echo "</table>";

	}
	}

	public function mobile_display()
	{
	
	
	$result1=mysql_query("select * from mobile WHERE tkt_bit=0 && match_bit=0") or die(mysql_error());
	$no_rows = mysql_num_rows($result1);
	if ($no_rows!=0)
	{
	echo "<br>"."<br>"."<b>LOST MOBILE PHONES.</b>"."<br>"."<br>";
	echo "<table border = 1>";	
	echo "<tr>"."<th>";
	echo "Date when Lost"."</th>"."<th>";
	echo "Brand name"."</th>"."<th>";
	echo "Card Number"."</th>"."<th>";
	echo "Operating System"."</th>"."<th>";
	//echo "Color"."</th>"."<th>";
	echo "No. of Sim"."</th>"."<th>";
	echo "IMEI no."."</th>"."</tr>";
	while($row = mysql_fetch_assoc($result1))
  	{
	echo "<tr>"."<td>";
	
	echo $row['date']."</td>"."<td>";
  	echo $row['mb_name']."</td>"."<td>";
	echo $row['type']."</td>"."<td>";
	echo $row['os']."</td>"."<td>";  
	//echo $row['color']."</td>"."<td>";
	echo $row['sim_type']."</td>"."<td>";  
	echo $row['imei']."</td>"."</tr>";
	}
	echo "</table>";

	}
	}

	public function pjeweldisplay($uid,$tkt_bit)
	{
	
	$result1=mysql_query("select * from jewellery WHERE ticket_bit=$tkt_bit && user_id='$uid' && match_bit=0") or die(mysql_error());
	$no_rows = mysql_num_rows($result1);
	if ($no_rows!=0)
	{
	//public SESSION['flag'] = 1;
	if ($tkt_bit==0)
	{
	echo "<br>"."<br>"."LOST JEWELLERY TICKETS."."<br>"."<br>";
	}
	else
	{
	echo "<br>"."<br>"."FOUND JEWELLERY TICKETS."."<br>"."<br>";
	}
	echo "<table border = 1>";	
	echo "<tr>"."<th>";
	echo "Ticket Id"."</th>"."<th>";
	echo "Date when Lost"."</th>"."<th>";
	echo "Kind"."</th>"."<th>";
	echo "Type"."</th>";
	
	while($row = mysql_fetch_assoc($result1))
  	{
	echo "<tr>"."<td>";
	echo $row['tkt_id']."</td>"."<td>";
	echo $row['date']."</td>"."<td>";
  	echo $row['gtype']."</td>"."<td>";
	echo $row['dtype']."</td>";
	echo "</tr>";	
	}
	echo "</table>";

	}
	}
	public function pdisplay($uid,$tkt_bit)
	{
	
	$result1=mysql_query("select * from calculator WHERE tkt_bit=$tkt_bit && user_id='$uid' && match_bit=0") or die(mysql_error());
	$no_rows = mysql_num_rows($result1);
	if ($no_rows!=0)
	{
	//public SESSION['flag'] = 1;
	if ($tkt_bit==0)
	{
	echo "<br>"."<br>"."CALCULATOR LOST TICKETS"."<br>"."<br>";
	}
	else
	{
	echo "<br>"."<br>"."CALCULATOR FOUND TICKETS"."<br>"."<br>";
	}
	echo "<table border = 1>";	
	echo "<tr>"."<th>";
	echo "Ticket Id"."</th>"."<th>";
	echo "Date when Lost"."</th>"."<th>";
	echo "Brand"."</th>"."<th>";
	echo "Calci Type"."</th>"."<th>";
	echo "Model No."."</th>"."<th>";
	echo "Display Digits"."</th>"."</tr>";
	while($row = mysql_fetch_assoc($result1))
  	{
	echo "<tr>"."<td>";
	echo $row['tkt_id']."</td>"."<td>";
	echo $row['date']."</td>"."<td>";
  	echo $row['brand_name']."</td>"."<td>";
	echo $row['c_type']."</td>"."<td>";
	echo $row['model_no']."</td>"."<td>";  
	echo $row['display']."</td>"."</tr>";	
	}
	echo "</table>";

	}
	}



	public function pwatch_display($uid,$tkt_bit)
	{
	
	
	$result1=mysql_query("select * from watch WHERE tkt_bit=$tkt_bit && user_id='$uid' && match_bit=0") or die(mysql_error());
	$no_rows = mysql_num_rows($result1);
	if ($no_rows!=0)
	{
	//public SESSION['flag'] = 1;
	if ($tkt_bit==0)
	{
	echo "<br>"."<br>"."WATCH LOST TICKETS"."<br>"."<br>";
	}
	else
	{
	echo "<br>"."<br>"."WATCH FOUND TICKETS."."<br>"."<br>";
	}
	echo "<table border = 1>";	
	echo "<tr>"."<th>";
	echo "Ticket Id"."</th>"."<th>";
	echo "Date when Lost"."</th>"."<th>";
	echo "Brand"."</th>"."<th>";
	echo "Dial Type"."</th>"."<th>";
	echo "Strap Type"."</th>"."<th>";
	echo "Dial Shape"."</th>";
	//echo "Color"."</th>";
	echo"</tr>";
	while($row = mysql_fetch_assoc($result1))
  	{
	echo "<tr>"."<td>";
	echo $row['tkt_id']."</td>"."<td>";
	echo $row['date']."</td>"."<td>";
  	echo $row['bname']."</td>"."<td>";
	echo $row['type']."</td>"."<td>";
	echo $row['strap_type']."</td>"."<td>";  
	echo $row['dialshape']."</td>";
	//echo $row['color']."</td>"."</tr>";
		echo"</tr>";
	}
	echo "</table>";
	}
	}


	public function patm_display($uid,$tkt_bit)
	{
	
	
	$result1=mysql_query("select * from atm WHERE tkt_bit=$tkt_bit && user_id='$uid' && match_bit=0") or die(mysql_error());
	$no_rows = mysql_num_rows($result1);
	if ($no_rows!=0)
	{
	if ($tkt_bit==0)
	{
	//public SESSION['flag'] = 1;
	echo "<br>"."<br>"." ATM LOST CARDS."."<br>"."<br>";
	}
	else
	{
	echo "<br>"."<br>"."ATM FOUND CARDS."."<br>"."<br>";
	}
	echo "<table border = 1>";	
	echo "<tr>"."<th>";
	echo "Ticket Id"."</th>"."<th>";
	echo "Date when Lost"."</th>"."<th>";
	echo "Bank name"."</th>"."<th>";
	echo "Card Number"."</th>"."<th>";
	echo "Card Type"."</th>"."<th>";
	echo "Name on card"."</th>"."</tr>";
	while($row = mysql_fetch_assoc($result1))
  	{
	echo "<tr>"."<td>";
	echo $row['tkt_id']."</td>"."<td>";
	echo $row['date']."</td>"."<td>";
  	echo $row['bank_name']."</td>"."<td>";
	echo $row['card_no']."</td>"."<td>";
	echo $row['card_type']."</td>"."<td>";  
	echo $row['name']."</td>"."</tr>";
	}
	echo "</table>";

	}
	}

	public function pmobile_display($uid,$tkt_bit)
	{
	
	
	$result1=mysql_query("select * from mobile WHERE tkt_bit=$tkt_bit && user_id='$uid' && match_bit=0") or die(mysql_error());
	$no_rows = mysql_num_rows($result1);
	if ($no_rows!=0)
	{
	//public SESSION['flag'] = 1;
	if ($tkt_bit==0)
	{
	echo "<br>"."<br>"." MOBILE PHONE LOST TICKETS"."<br>"."<br>";
	}
	else
	{
	echo "<br>"."<br>"." MOBILE PHONE FOUND TICKETS"."<br>"."<br>";
	}
	echo "<table border = 1>";	
	echo "<tr>"."<th>";
	echo "Ticket Id"."</th>"."<th>";
	echo "Date when Lost"."</th>"."<th>";
	echo "Brand name"."</th>"."<th>";
	echo "Card Number"."</th>"."<th>";
	echo "Operating System"."</th>"."<th>";
	//echo "Color"."</th>"."<th>";
	echo "No. of Sim"."</th>"."<th>";
	echo "IMEI no."."</th>"."</tr>";
	while($row = mysql_fetch_assoc($result1))
  	{
	echo "<tr>"."<td>";
	echo $row['tkt_id']."</td>"."<td>";
	echo $row['date']."</td>"."<td>";
  	echo $row['mb_name']."</td>"."<td>";
	echo $row['type']."</td>"."<td>";
	echo $row['os']."</td>"."<td>";  
	//echo $row['color']."</td>"."<td>";
	echo $row['sim_type']."</td>"."<td>";  
	echo $row['imei']."</td>"."</tr>";
	}
	echo "</table>";

	}
	}



	public function delete_ticket($name, $tkt_id,$uid,$tkt_bit)
	{
	if($name != "jewellery")
	{
	mysql_query("delete from $name where tkt_id=$tkt_id && user_id='$uid' && tkt_bit=$tkt_bit ")or die(mysql_error());
	echo "Deleted successfuly";
	}
	else
	{
	mysql_query("delete from $name where tkt_id=$tkt_id && user_id='$uid' && ticket_bit=$tkt_bit")or die(mysql_error());
	echo "Deleted successfuly";
	}
	}

}


class match extends User
{
	
 	public function match_mobile($uid,$bname,$ktyp,$oname,$color, $sname,$imei)
	{
	$used = new User();
	$tkt_bt = $_SESSION['tkt_bit'];
	$result1=mysql_query("select * from mobile WHERE tkt_bit != $tkt_bt && match_bit != 1 " ) or die(mysql_error());
	while($row = mysql_fetch_assoc($result1))
  	{
	$t_id = $row['tkt_id'];
	if( $row['sim_type']==$sname &&	 $row['mb_name']==$bname &&  $row['os']==$oname &&  $row['color']==$color &&  $row['type']==$ktyp &&  $row['imei']==$imei)
	{
	mysql_query("update mobile set match_bit=1 where tkt_id=$t_id")or die(mysql_error());
	//$res = mysql_query("SELECT user_id from mobile where tkt_id = $t_id ") or die(mysql_error());
	$res = $row['user_id'];
	
	//echo "match successful";
	$used->informed($res,$uid);
	$t_id = mysql_query("select tkt_id from mobile  where tkt_id=$t_id")or die(mysql_error());
	mysql_query("update mobile set match_bit=1 where imei=$imei && user_id='$uid'")or die(mysql_error());
	break;
	}
	}
	}
	
	public function match_watch($uid,$bname, $dtype,$wstype,$wdtype,$wcolor)
	{
	$used = new User();
	$tkt_bt = $_SESSION['tkt_bit'];
	$result1=mysql_query("select * from watch WHERE tkt_bit != $tkt_bt && match_bit != 1 ") or die(mysql_error());
	while($row = mysql_fetch_assoc($result1))
  	{
		$ti_id = $row['tkt_id'];
		if(  $row['bname']==$bname &&  $row['type']==$dtype &&  $row['strap_type']==$wstype &&  $row['dialshape']==$wdtype &&  $row['color']==$wcolor)
		{
		mysql_query("update watch set match_bit=1 where tkt_id=$ti_id")or die(mysql_error());
		$res = $row['user_id'];
		
		//echo "match successful";
		$used->informed($res,$uid);
		//$ti_id = mysql_query("select tkt_id from watch  where tkt_id=$t_id")or die(mysql_error());
		mysql_query("update watch set match_bit=1 where  user_id='$uid' && bname='$bname' && type='$dtype' && strap_type='$wstype' && dialshape='$wdtype' && color = '$wcolor'")or die(mysql_error());
		break;
		}
	}
	}

	public function match_calculator($uid, $company,$calc_typ,$model, $disp)
	{
	$used = new User();
	$tkt_bt = $_SESSION['tkt_bit'];
	$result1=mysql_query("select * from calculator WHERE tkt_bit != $tkt_bt && match_bit != 1 ") or die(mysql_error());
	while($row = mysql_fetch_assoc($result1))
  	{
	$ti_id = $row['tkt_id'];
	if(  $row['brand_name']==$company &&  $row['c_type']==$calc_typ &&  $row['model_no']==$model &&  $row['display']==$disp )
	{
	mysql_query("update calculator set match_bit=1 where tkt_id=$ti_id")or die(mysql_error());
	$res = $row['user_id'];
	
	//echo "match successful";
	$used->informed($res,$uid);
	//$ti_id = mysql_query("select tkt_id from watch  where tkt_id=$t_id")or die(mysql_error());
	mysql_query("update calculator set match_bit=1 where  user_id='$uid' && model_no='$model'")or die(mysql_error());
	break;
	}
	}
	}

	public function match_jewellery($uid, $gtype,$dtype)
	{
	$used = new User();
	$tkt_bt = $_SESSION['tkt_bit'];
	if($tkt_bt == 1)
	{
		$used->inform1($uid);
	}
	$result1=mysql_query("select * from jewellery WHERE ticket_bit != $tkt_bt && match_bit != 1 ") or die(mysql_error());
	$no_rows = mysql_num_rows($result1);
	//echo $no_rows . "<br>";
	while($row = mysql_fetch_assoc($result1))
		{
		$ti_id = $row['tkt_id'];
		if(($row['gtype']==$gtype) &&  ($row['dtype']==$dtype))
		{
			mysql_query("update jewellery set match_bit=1 where tkt_id=$ti_id")or die(mysql_error());
			$res = $row['user_id'];
			if ($tkt_bt == 0)
			{
				$used->inform2($uid);
			}
			else
			{
				$used->inform2($res);
			}
			//echo "match successful";
			//$used->informed($res,$uid);
			//$ti_id = mysql_query("select tkt_id from watch  where tkt_id=$t_id")or die(mysql_error());
			mysql_query("update jewellery set match_bit=1 where  user_id='$uid' && gtype='$gtype' && dtype='$dtype'")or die(mysql_error());
			break;
		}
		}
	}
	
	public function match_atm($uid,$bcard, $cnumber,$ctype,$cname)
	{
	$used = new User();
	$tkt_bt = $_SESSION['tkt_bit'];
	$result1=mysql_query("select * from atm WHERE tkt_bit != $tkt_bt && match_bit != 1 ") or die(mysql_error());
	while($row = mysql_fetch_assoc($result1))
  	{
	$ti_id = $row['tkt_id'];
	if(  $row['bank_name']==$bcard &&  $row['card_no']==$cnumber &&  $row['card_type']==$ctype &&  $row['name']==$cname )
	{
	mysql_query("update atm set match_bit=1 where tkt_id=$ti_id")or die(mysql_error());
	$res = $row['user_id'];
	
	//echo "match successful";
	$used->informed($res,$uid);
	//$ti_id = mysql_query("select tkt_id from watch  where tkt_id=$t_id")or die(mysql_error());
	mysql_query("update atm set match_bit=1 where  user_id='$uid' && card_no='$cnumber'")or die(mysql_error());
	break;
	}
	}
	}

}
?>
