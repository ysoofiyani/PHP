<?php
//
// RICS <info@rics.ru>
// Created on: <06-Nov-2001 15:28:37 bf>
//
// This source file is part of HRS software.
// Copyright (C) 1999-2001 RICS systems.
//
// This program is licence software; 
//  The licensee may modify or change this software program
// to suit licensee's needs, at licensee's own risk.
// The licensee may modify the source code for licensee's own use.
// However, the modified source code must not be resold or distributed. 

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//  License for more details.
// RICS Ltd.,St.Chernigovskaya 8., Saint-Petersburg, Russia.tel./fax:
// +7 812 298 3611 E-mail: russia@rics.ru
//

	include "../auth.php";
	include "./userauth.php";
	include "../functions.php";
	include "themes/header.php";
 


	$res = mysql_query("SELECT * FROM Roomtypes");
		$i=1;
		while( $row = mysql_fetch_array( $res ) ) 
		{
                 $flag[$i]=$row['flag']; 
		 $i++;  
		}


	if( $act == "del" ) {
			if( $is_can_delete ) {
				$query = "UPDATE Bookings SET is_deleted=1 WHERE booking_id=$id";
				mysql_query( $query )
					or die("$query<br> ".mysql_error());
				oplog( "Cancel reservation $id" );
					
				header("Location: reservations.php"); 
				exit;
			}
	} 

	$res = mysql_query( "SELECT * FROM Bookings WHERE booking_id=$id" )
		or die("SELECT: ".mysql_error());
	$row = mysql_fetch_array( $res );
	if( $row['client_id'] ) {
		$res = mysql_query( "SELECT * FROM Bookings AS B,Clients AS C
						WHERE booking_id=$id AND B.client_id=C.client_id" )
			or die("SELECT2: ".mysql_error());
		$row = mysql_fetch_array( $res );
	} else {
		if(!$row['corporate_id']) { 
			print "$id: no such booking. Please check if this number is correct.<br>";
			print '<form><input type=button value="Back" onClick="history.back();"></form>';
			exit;
		}
		$query2 = "SELECT * FROM Corporates WHERE corporate_id=".$row['corporate_id'];
		$res2 = mysql_query( $query2 )
			or die("$query2<br> ".mysql_error());
		$row2 = mysql_fetch_array( $res2 );
		print "<h1>".$row2['name']."(".$row2['type'].") Booking:</h1>";
	}
	mysql_query( "UPDATE Bookings SET is_seen=1 WHERE booking_id=$id" )
		or die("MARK AS SEEN: ".mysql_error());
	oplog( "Seen booking number $id" );
	
?>
<script language="JavaScript">
	function del_corp( corp_id  ) {
		var url = "<?php echo $PHP_SELF;?>?act=del&id=" + corp_id;
		if( confirm("Are you sure you want to\nDELETE booking "+ corp_id + "?") )
			document.location=url;
	}


</script>

                <TD 
                style="BORDER-RIGHT: 0px; BORDER-TOP: 0px; BORDER-LEFT: 0px; BORDER-BOTTOM: 0px" 
                width="100%" bgColor=#FfE0AD border="0" cellpadding="0" 
                cellspacing="0" align=center>
		
		<table border=0 BGCOLOR=#c0c0c0>
		<tr><td bgcolor=navy><FONT class=a1 color=#ffffff>
		&nbsp;<B><?php  print TEXT_CHECK_RESERVATION ?></B></FONT></td>
		<tr><td class=WIN>


<table border=0 cellpadding=7>
<tr valign="top"><th align="right"><?php  print TEXT_BOOKING_TIME ?></th><td><?php echo $row['booking_time'];?></td></tr>
<?php  if( $row['special_id'] ) { ?>
<tr valign="top"><th align="right"><?php  print TEXT_SPECIAL_ORDER ?> No:</th><td><?php echo $row['special_id'];?></td></tr>
<?php  } ?>
<tr valign="top"><th align="right"><?php  print TEXT_ARRIVAL_DATE ?></th><td><?php echo local_date($row['start_date']);?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_DEPARTURE_DATE ?></th><td><?php echo local_date($row['end_date']);?></td></tr>

<tr valign="top"><th align="right"><?php  print TEXT_ROOMS ?></th><td>
  <table border=0>
   <?php  if($flag[1]=='on')   { ?> <tr valign="top"><td><?php  print TEXT_SINGLE ?></td><td> <?php echo $row['singles'];?></td></tr> <?php  } ?>
   <?php  if($flag[2]=='on')   { ?> <tr valign="top"><td><?php  print TEXT_TWIN ?></td><td> <?php echo $row['twins'];?></td></tr> <?php  } ?>
   <?php  if($flag[3]=='on')   { ?> <tr valign="top"><td><?php  print TEXT_DOUBLE ?></td><td> <?php echo $row['doubles'];?></td></tr><?php  } ?>
   <?php  if($flag[4]=='on')   { ?> <tr valign="top"><td><?php  print TEXT_TRIPLE ?></td><td> <?php echo $row['triples'];?></td></tr><?php  } ?>
   <?php  if($flag[5]=='on')   { ?> <tr valign="top"><td><?php  print TEXT_EXECUTIVE ?></td><td> <?php echo $row['executives'];?></td></tr><?php  } ?>
   <?php  if($flag[6]=='on')   { ?> <tr valign="top"><td><?php  print RType6 ?></td><td> <?php echo $row['RType6'];?></td></tr><?php  } ?>
   <?php  if($flag[7]=='on')   { ?> <tr valign="top"><td><?php  print RType7 ?></td><td> <?php echo $row['RType7'];?></td></tr><?php  } ?>
   <?php  if($flag[8]=='on')   { ?> <tr valign="top"><td><?php  print RType8 ?></td><td> <?php echo $row['RType8'];?></td></tr><?php  } ?>
   <?php  if($flag[9]=='on')   { ?> <tr valign="top"><td><?php  print RType9 ?></td><td> <?php echo $row['RType9'];?></td></tr><?php  } ?>
   <?php  if($flag[10]=='on')   { ?> <tr valign="top"><td><?php  print RType10 ?></td><td> <?php echo $row['RType10'];?></td></tr><?php  } ?>
  </table>
 </td>
</tr>
<tr valign="top"><th align="right"><?php  print TEXT_TOTAL_COST ?></th><td><?php  print $currency.$row['total_cost']."( $currency_euro".to_euro($row['total_cost'])." )";?></td></tr>
<?php  if( $row['client_id']) { ?>
<tr valign="top"><th align="right"><?php  print TEXT_NAME ?></th><td><?php echo $row['title'];?> <?php echo $row['first_name'];?> <?php echo $row['surname'];?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_COMPANY ?></th><td><?php echo $row['company'];?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_ADDRESS ?></th><td>
    <?php echo $row['street_addr'];?><br>
    <?php echo $row['city'];?><br>
    <?php echo $row['province'];?><br>
    <?php echo $row['zip'];?> <?php echo $row['country'];?>
  </td>
</tr>
<tr valign="top"><th align="right"><?php  print TEXT_TEL ?></th><td><?php echo $row['phone'];?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_FAX ?></th><td><?php echo $row['fax'];?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_EMAIL ?>:</th><td><a href="mailto:<?php echo $row['email'];?>"><?php echo $row['email'];?></a></td></td>
<tr valign="top"><th align="right"><?php  print TEXT_CHILD ?></th><td><?php echo $row['childs'];?></td></td>
<tr valign="top"><th align="right"><?php  print TEXT_PAYMENT_DETAILS ?></th><td><?php echo $row['cc_info'];?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_CONFIRM_TYPE ?></th><td><?php echo $row['confirm_type'];?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_SPECIAL_REQUESTS?></th><td><?php echo $row['special_requests'];?></td></tr>
<tr valign="top"><th align="right">IP address:</th><td><?php echo $row['ip'];?></td></tr>
<?php  } else { ?>
<tr valign="top"><th align="right"><?php  print TEXT_GUESTS_NAME ?></th><td><pre><?php echo $row['special_requests'];?></pre></td></tr>
<?php  } ?>
</table>
<form>
  <input type="button" value="<?php  print TEXT_BACK ?>" onClick="document.location='reservations.php';">
  <input type="button" value="<?php  print TEXT_DEL_RESERV ?>" onClick="del_corp(<?php echo $id?>);">
</form>

<?php  include "themes/footer.php" ?>



