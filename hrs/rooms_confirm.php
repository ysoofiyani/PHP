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

	include "./auth.php";
	include "./functions.php";
	include "themes/header.php";
?>
<tr><td valign=top>

<?php

  include "themes/menu.php";

?>

</td>

<td>

<?php
$res = mysql_query("SELECT * FROM Roomtypes");
		$i=1;
		while( $row = mysql_fetch_array( $res ) ) 
		{
                 $id[$i]=$row['flag']; 
		 $i++;  
		}


?>
<table border=0 cellpadding=7>
<tr valign="top"><th align="right"><?php  print TEXT_ARRIVAL_DATE ?></th><td><?php echo local_date($start_date);?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_DEPARTURE_DATE ?></th><td><?php echo local_date($end_date);?></td></tr>

<tr valign="top"><th align="right"><?php  print TEXT_ROOMS ?></th><td>
  <table>
	
   <?php  if($id[1]=='on')   { ?> <tr valign="top"><td><?php  print TEXT_SINGLE ?></td><td> <?php echo $singles;?></td></tr> <?php  } ?>
   <?php  if($id[2]=='on')   { ?> <tr valign="top"><td><?php  print TEXT_TWIN ?></td><td> <?php echo $twins;?></td></tr> <?php  } ?>
   <?php  if($id[3]=='on')   { ?> <tr valign="top"><td><?php  print TEXT_DOUBLE ?></td><td> <?php echo $doubles;?></td></tr><?php  } ?>
   <?php  if($id[4]=='on')   { ?> <tr valign="top"><td><?php  print TEXT_TRIPLE ?></td><td> <?php echo $triples;?></td></tr><?php  } ?>
   <?php  if($id[5]=='on')   { ?> <tr valign="top"><td><?php  print TEXT_EXECUTIVE ?></td><td> <?php echo $executives;?></td></tr><?php  } ?>
   <?php  if($id[6]=='on')   { ?> <tr valign="top"><td><?php  print RType6 ?></td><td> <?php echo $RType6;?></td></tr><?php  } ?>
   <?php  if($id[7]=='on')   { ?> <tr valign="top"><td><?php  print RType7 ?></td><td> <?php echo $RType7;?></td></tr><?php  } ?>
   <?php  if($id[8]=='on')   { ?> <tr valign="top"><td><?php  print RType8 ?></td><td> <?php echo $RType8;?></td></tr><?php  } ?>
   <?php  if($id[9]=='on')   { ?> <tr valign="top"><td><?php  print RType9 ?></td><td> <?php echo $RType9;?></td></tr><?php  } ?>
   <?php  if($id[10]=='on')   { ?> <tr valign="top"><td><?php  print RType10 ?></td><td> <?php echo $RType10;?></td></tr><?php  } ?>
   
  </table>
 </td>
</tr>
<tr valign="top"><th align="right"><?php  print TEXT_TOTAL_COST ?></th><td><?php  print $currency.$total_cost."( $currency_euro".to_euro($total_cost)." )";?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_NAME ?></th><td><?php echo $title;?> <?php echo $first_name;?> <?php echo $surname;?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_COMPANY ?></th><td><?php echo $company;?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_ADDRESS ?></th><td>
    <?php echo $street_addr;?><br>
    <?php echo $city;?><br>
    <?php echo $province;?><br>
    <?php echo $zip;?> <?php echo $country;?>
  </td>
</tr>
<tr valign="top"><th align="right"><?php  print TEXT_TEL ?></th><td><?php echo $telephone;?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_FAX ?></th><td><?php echo $fax;?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_EMAIL ?></th><td><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></td></td>
<tr valign="top"><th align="right"><?php  print TEXT_CHILD ?></td><td> <?php echo $number_of_child;?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_CONFIRM_TYPE ?></th><td><?php echo $confirm_type;?></td></tr>
<tr valign="top"><th align="right"><?php  print TEXT_SPECIAL_REQUESTS ?></th><td><?php echo $special_requests;?></td></tr>
</table>


<form action="rooms_insert.php" method="post">
	<input type=hidden name="cc" value="<?php echo $cc;?>">
	<input type=hidden name="cc_other" value="<?php echo $cc_other;?>">
	<input type=hidden name="name_on_card" value="<?php echo $name_on_card;?>">
	<input type=hidden name="card_number" value="<?php echo $card_number;?>">
	<input type=hidden name="expire_month" value="<?php echo $expire_month;?>">
	<input type=hidden name="expire_year" value="<?php echo $expire_year;?>">
	<input type=hidden name="additional_comments" value="<?php echo $additional_comments;?>">
	<input type=hidden name="confirm_type" value="<?php echo $confirm_type;?>">
	<input type=hidden name="act" value="add">
	<input type=hidden name="num" value="<?php echo $k;?>">
	<input type=hidden name="singles" value="<?php echo $singles;?>">
	<input type=hidden name="twins" value="<?php echo $twins;?>">
	<input type=hidden name="doubles" value="<?php echo $doubles;?>">
	<input type=hidden name="triples" value="<?php echo $triples;?>">
	<input type=hidden name="executives" value="<?php echo $executives;?>">
	<input type=hidden name="RType6" value="<?php echo $RType6;?>">
	<input type=hidden name="RType7" value="<?php echo $RType7;?>">
	<input type=hidden name="RType8" value="<?php echo $RType8;?>">
	<input type=hidden name="RType9" value="<?php echo $RType9;?>">
	<input type=hidden name="RType10" value="<?php echo $RType10;?>">
	<input type=hidden name="exec_guest_number" value="<?php echo $exec_guest_number;?>">
	<input type=hidden name="start_date" value="<?php echo $start_date;?>">
	<input type=hidden name="end_date" value="<?php echo $end_date;?>">
	<input type=hidden name="title" value="<?php echo $title;?>">
	<input type=hidden name="first_name" value="<?php echo $first_name;?>">
	<input type=hidden name="surname" value="<?php echo $surname;?>">
	<input type=hidden name="street_addr" value="<?php echo $street_addr;?>">
	<input type=hidden name="city" value="<?php echo $city;?>">
	<input type=hidden name="province" value="<?php echo $province;?>">
	<input type=hidden name="zip" value="<?php echo $zip;?>">
	<input type=hidden name="country" value="<?php echo $country;?>">
	<input type=hidden name="telephone" value="<?php echo $telephone;?>">
	<input type=hidden name="fax" value="<?php echo $fax;?>">
	<input type=hidden name="email" value="<?php echo $email;?>">
	<input type=hidden name="total_cost" value="<?php echo $total_cost;?>">
	<input type=hidden name="special_requests" value="<?php echo $special_requests;?>">
	<input type=hidden name="spec_id" value="<?php echo $spec_id;?>">
        <input type=hidden name='number_of_child' value="<?php  echo $number_of_child;?>">
	<input type=submit value="<?php  print TEXT_CONFIRM_MAKE_BOOKING ?>">
</form>

</td></tr>
</td><tr></table>
<?php  include  "themes/footer.php"; ?>
