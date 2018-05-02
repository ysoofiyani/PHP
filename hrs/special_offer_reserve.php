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
include "themes//header.php";
include "./functions.php"; 	
?>

<tr><td valign=top>

<?php

  include "themes/menu.php";


?>

</td>

<td valign=top>

<?php

	$res = mysql_query("SELECT * FROM Roomtypes where flag='on'");
		$i=1;
		while( $row = mysql_fetch_array( $res ) ) 
		{
                 $id[$i]=$row['id']; 
		 $adult[$id[$i]]=$row['adult'];
 		 $child[$id[$i]]=$row['child'];
 		 $name[$id[$i]]=$row['name'];
		 $i++;  
		}
	$k=$i;

		
	$res2 = mysql_query("SELECT MAX(date) AS max, MIN(date) AS min FROM Rates WHERE special_desc_id='$spec_id'");
	while( $row = mysql_fetch_array( $res2 ) ){
		$start_date=$row['min'];	
		$end_date=$row['max'];	
	}

	 

?>

<TABLE width="100%" height="100%" ALIGN=CENTER>
	<TR ALIGN="CENTER" VALIGN="MIDDLE">
		<TD>
			<FONT FACE="Goudy Old Style, Conneticut Gothic, Times New Roman" SIZE=5 COLOR="#cc9900">
			<BR><B><?php  print TEXT_CHECK_AVAILABILITY ?></B><P>
			</FONT>

			<TABLE BORDER="0" WIDTH="600" CELLPADDING="0" CELLSPACING="0" ALIGN="CENTER" VALIGN="MIDDLE">
			<TR ALIGN="CENTER" VALIGN="MIDDLE">
				<TD ALIGN=CENTER>


<FORM name="f1" action="rooms.php?special=1" method="post">
<TABLE BORDER=0 ALIGN=CENTER>

	<TR ALIGN="LEFT">
		<TD ALIGN="LEFT"><FONT FACE="Goudy Old Style, Conneticut Gothic, Times New Roman" SIZE=3  ><B><?php  print TEXT_ARRIVAL_DATE ?></B></FONT></TD>
		<TD ALIGN="CENTER"><FONT FACE="Goudy Old Style, Conneticut Gothic, Times New Roman" SIZE=3  ><B><?php  print local_date($start_date) ?></B></FONT></TD>
		
	</TR>
	<tr align="center">
		<TD ALIGN="LEFT"><FONT FACE="Goudy Old Style, Conneticut Gothic, Times New Roman" SIZE=3  ><B><?php  print TEXT_DEPARTURE_DATE ?></B></FONT></TD>
		<TD><FONT FACE="Goudy Old Style, Conneticut Gothic, Times New Roman" SIZE=3  ><B><?php  print local_date($end_date) ?></B></FONT></TD>
		
	</TR>
	
</TABLE>
<BR>
<HR WIDTH="200" COLOR="RED">
<BR>
<TABLE BORDER="0" ALIGN="CENTER">
	<TR ALIGN="CENTER">
		<TD></TD>
		<?php  $i=1;
		while ($i<$k)
		{ ?>
		<TD><FONT FACE="Goudy Old Style, Conneticut Gothic, Times New Roman" SIZE=3  ><?php  print type($id[$i]) ?></FONT></TD>
		<?php  $i++;
		}?>
		
	</TR>
	<TR ALIGN="CENTER">
		<TD ALIGN="LEFT"><FONT FACE="Goudy Old Style, Conneticut Gothic, Times New Roman" SIZE=3  ><B><?php  print TEXT_ROOM_QUANTITY ?></B></FONT></TD>
		<?php  $i=1;
		while ($i<$k)
		{ ?>
		<TD><INPUT NAME="<?php  print $name[$id[$i]] ?>" VALUE="0" SIZE="2" MAXLENGTH="1"></TD>
		<?php  $i++;
		}?>
		
	</TR>
	<TR ALIGN="CENTER">
		<TD ALIGN="LEFT"><FONT FACE="Goudy Old Style, Conneticut Gothic, Times New Roman" SIZE=3  ><B><?php  print TEXT_MAX_OCCUPANCY ?></B></FONT></TD>
                <?php  $i=1;
		while ($i<$k)
		{	
		if ($id[$i]==5)
		   { echo "<TD><SELECT NAME='exec_guest_number'><OPTION SELECTED>1<OPTION>2<OPTION>3</SELECT></TD>";}
        	else { 
		?>		
		<TD><FONT FACE="Goudy Old Style, Conneticut Gothic, Times New Roman" SIZE=3  ><B><?php  echo $adult[$id[$i]],"+",$child[$id[$i]]; ?></B></FONT></TD>
		<?php  } $i++;
		 }?>
		
	</TR>
		
	
</table>

<BR>
<HR WIDTH="200" COLOR="RED">
<BR>
<input type=hidden name="spec_id" value="<?php echo $spec_id;?>">
<input type=hidden name="start_date" value="<?php echo $start_date;?>">
<input type=hidden name="end_date" value="<?php echo $end_date;?>">
<input type=submit value="<?php  print TEXT_CHECK_AVAILABIL ?>">
</form>
</TD>
</TR>
</TABLE>

</td></tr>
</td><tr></table>
<?php  include "themes/footer.php" ; ?>
