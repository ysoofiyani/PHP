<?php  include "auth.php";

 include "themes/header.php"; 

?>
<tr><td valign=top>

<?php

  include "themes/menu.php";

?>

</td>

<td>


<form action="rooms_confirm.php" method="post">
<table>
<tr><td colspan=2 align=center><?php  print TEXT_CONFIRMATION_OF_BOOKING ?></td></tr><tr><td colspan=2>
	<table width=100% cellpadding="6">
		<tr align="center"><td>Visa</td><td>MasterCard</td><td>&nbsp;</td></tr>
		<tr align=center>
			<td><input type=radio name="cc" value="Visa" CHECKED></td>
			<td><input type=radio name="cc" value="MasterCard"></td>
			<td>
				<select name="cc_other">
					<option value=""><?php  print TEXT_OTHER ?></option>
					<option value="Amex"><?php  print TEXT_AMEX ?></option>
					<option value="Diners"><?php  print TEXT_DINERS ?></option>
					<option value="Laser"><?php  print TEXT_LASER ?></option>
				</select>
			</td>
		</tr>
	</table>
</td></tr><tr><td><?php  print TEXT_NAME_ON_CARD_2 ?></td><td>	<input name="name_on_card">
</td></tr><tr><td><?php  print TEXT_CARD_NUMBER_2 ?></td><td>	<input name="card_number">
</td></tr><tr><td>
<?php  print TEXT_EXPIRES ?></td><td>
<select name="expire_month">
  <option value="January"><?php  print TEXT_JANUARY ?>
  <option value="February"><?php  print TEXT_FEBRUARY ?>
  <option value="March"><?php  print TEXT_MARCH ?>
  <option value="April"><?php  print TEXT_APRIL ?>
  <option value="May"><?php  print TEXT_MAY ?>
  <option value="June"><?php  print TEXT_JUNE ?>
  <option value="July"><?php  print TEXT_JULY ?>
  <option value="August"><?php  print TEXT_AUGUST ?>
  <option value="September"><?php  print TEXT_SEPTEMBER ?>
  <option value="October"><?php  print TEXT_OCTOBER ?>
  <option value="November"><?php  print TEXT_NOVEMBER ?>
  <option value="December"><?php  print TEXT_DECEMBER ?>
</select>
<select name="expire_year">
<option value="2001">2001
<option value="2002">2002
<option value="2003">2003
<option value="2004">2004
<option value="2005">2005
<option value="2006">2006
<option value="2007">2007
<option value="2008">2008
<option value="2009">2009
<option value="2010">2010

</select>
</td></tr>
<!--
<tr>
	<td><?php  print TEXT_ADDITIONAL_COMMENTS ?></td>
	<td><textarea name="additional_comments" cols="35" rows="6"></textarea></td>
</tr>
<tr><td colspan=2>

	<table width="100%" cellpadding="6">
		<tr align=center><td colspan="3"><?php  print TEXT_HOW_WOULD_YOU ?>		</td></tr>
		<tr align=center><td><?php  print TEXT_EMAIL ?></td><td><?php  print TEXT_TELEPHONE ?></td><td><?php  print TEXT_FAX ?>/td></tr>

		<tr align=center>
			<td><input type=radio name="confirm_type" value="email" CHECKED></td>
			<td><input type=radio name="confirm_type" value="telephone"></td>
			<td><input type=radio name="confirm_type" value="fax"></td>
		</tr>
	</table>
</td></tr>
-->
</table>
	<input type=hidden name="act" value="add">
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
	<input type=hidden name="special_requests" value="<?php echo $special_requests;?>">
	<input type=hidden name="spec_id" value="<?php echo $spec_id;?>">
	<input type=hidden name="total_cost" value="<?php echo $total_cost;?>">
	<input type=hidden name='number_of_child' value="<?php  echo $number_of_child;?>">
	<input type=submit value="<?php  print TEXT_CONTINUE ?>">
</form>

</td>
</tr>
</td>
<tr>

    </table>
<?php  include  "themes/footer.php"; ?>

