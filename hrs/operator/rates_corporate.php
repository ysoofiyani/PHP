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
include "./rates_functions.php";


$start_date = make_date( $start_year, $start_month, $start_day );
$end_date = make_date( $end_year, $end_month, $end_day );

if( $act == 'add' || $act=='delete' )
{
	include "../check_date.php";
	include "../check_rooms.php";
	$query = "LOCK TABLES Rates WRITE";
	mysql_query( $query ) or die("$query<br> ".mysql_error());
	
	if ($act=='delete')
	{	
	for( $date = $start_date; $date <= $end_date; $date = inc_date( $date,1 ) ) 
		{
		$query = "DELETE FROM Rates
			WHERE date=$date AND special_desc_id=0 AND corporate_id=$corp_id";
		mysql_query( $query ) or die("$query<br> ".mysql_error());
		if( $act == 'add' && !($singles && $doubles && $triples && $executives ) ) 
		{
			header("Location: $HTTP_REFERER");
			exit;			
		}
		}
	}
	if( $act == 'add' )
	{
	for( $date = $start_date; $date <= $end_date; $date = inc_date( $date,1 ) ) 
	{
		$res2=mysql_query("SELECT * FROM Rates WHERE date='$date' AND corporate_id='$corp_id' AND special_desc_id=0");			
		$row=mysql_fetch_array( $res2 );
		if (!$row)
		{
			$query = "INSERT INTO Rates( date, singles, twins, doubles, triples, executives, RType6, RType7, RType8, RType9, RType10, corporate_id )
			values ( '$date', '$singles', '$twins', '$doubles', '$triples', '$executives', '$RType6', '$RType7', '$RType8', '$RType9', '$RType10','$corp_id'  )";
			mysql_query( $query ) or die("$query<br> ".mysql_error());
		}
		else
		{
	 	$query="UPDATE	Rates SET "; 		
		$str=0;
		if ($singles>0)
		{
			$query.="singles='$singles'";
			$str=1;
		}
		if ($twins>0)
		{
			if ($str>0) $query.=",";
			$query.=" twins='$twins'";
			$str=1;			
		}
		if ($doubles>0)
		{
			if ($str>0) $query.=",";
			$query.=" doubles='$doubles'";
			$str=1;
		}
		if ($triples>0)
		{
			if ($str>0) $query.=",";
			$query.=" triples='$triples'";
			$str=1;
		}
		if ($executives>0)
		{
			if ($str>0) $query.=",";	
			$query.=" executives='$executives'";
			$str=1;
		}
		if ($RType6>0)
		{
			if ($str>0) $query.=",";	
			$query.=" RType6='$RType6'";
			$str=1;
		}
		if ($RType7>0)
		{
			if ($str>0) $query.=",";	
			$query.=" RType7='$RType7'";
			$str=1;
		}
		if ($RType8>0)
		{
			if ($str>0) $query.=",";	
			$query.=" RType8='$RType8'";
			$str=1;
		}
		if ($RType9>0)
		{
			if ($str>0) $query.=",";	
			$query.=" RType9='$RType9'";
			$str=1;
		}
		if ($RType10>0)
		{
			if ($str>0) $query.=",";	
			$query.=" RType10='$RType10'";
			$str=1; 
		}
	
                $query.=" where date='$date AND corporate_id=0 AND special_desc_id=0'";
		$res=mysql_query( $query ) or die("$query<br> ".mysql_error());
               }
		if( $warn_counter++ > 366*3 ) die("Loop bug!<br>\n");
	}
	}
	$query = "UNLOCK TABLES";
	mysql_query( $query ) or die("$query<br> ".mysql_error());
	oplog( "Set rates for corporate client $corp_id from $start_day/$start_month/$start_year to $end_day/$end_month/$end_year to $singles/$twins/$doubles/$triples/$executives" );
	header("Location: $PHP_SELF?corp_id=$corp_id");
	exit;
 
}
include "themes/header.php"

?>
                <TD  
                style="BORDER-RIGHT: 0px; BORDER-TOP: 0px; BORDER-LEFT: 0px; BORDER-BOTTOM: 0px" 
                bgColor=#FFE0AD cellpadding="0" cellspacing="0" valign=top>
		<table border=0>
		<tr>
		<td onmouseover="this.style.backgroundColor='maroon'"  onmouseout="this.style.backgroundColor='FFE0AD'">
		<a href=rates_public.php class=menu><?php  print TEXT_PUBLIC ?></a>
		</td></tr>
		<td onmouseover="this.style.backgroundColor='maroon'"  onmouseout="this.style.backgroundColor='FFE0AD'">
                <a href=rates_corporate.php class=menu> <?php  print TEXT_PARTNERS ?></a>
		</td></tr></table>
                             
                </TD>
             
		   <TD 
                style="BORDER-RIGHT: 0px; BORDER-TOP: 0px; BORDER-LEFT: 0px; BORDER-BOTTOM: 0px" 
                width="100%" bgColor=#FFE0AD border="0" cellpadding="0" 
                cellspacing="0" align=center>
                <table border=0 BGCOLOR=#c0c0c0>
		<tr><td bgcolor=navy><FONT class=a1 color=#ffffff>&nbsp;<B><?php  print TEXT_SET_RATES ?>: </B><?php  print TEXT_PARTNERS ?></FONT></td>
		<tr><td class=WIN>
 

	<?php  if( $corp_id ) {
	$res2 = mysql_query( "SELECT * FROM Corporates WHERE corporate_id=$corp_id" )
		 or die("SELECT: ".mysql_error());
	$row2 = mysql_fetch_array( $res2 );
	?>
	
<h1><?php  echo $row2['name'];?>( <?php echo $row2['type'];?> ) Rates.</h1>
<?php  include( "rates_msg_warn.html" ); ?>
<?php  include "./rates_common_date.php"; ?>
<input type="hidden" name="corp_id" value="<?php echo $corp_id;?>">
<input type="radio" name="act" value="add" CHECKED><?php  print TEXT_ADD ?>&nbsp;&nbsp;
<input type="radio" name="act" value="delete"><?php  print TEXT_DELETE ?><br>
<?php  include "./rates_common_date_fin.php";

$res = mysql_query( "SELECT * FROM Rates WHERE corporate_id=$corp_id ORDER by date" )
		 or die("SELECT: ".mysql_error());
	
$i=1;

while( $row = mysql_fetch_array( $res ) ) {
	$names[$i]=$row2['name'];
	$types[$i]=$row2['type'];	
	$date[$i]=$row['date'];
	$rate[$i][1]=$row['singles'];
	$rate[$i][2]=$row['twins'];
	$rate[$i][3]=$row['doubles'];
	$rate[$i][4]=$row['triples'];
	$rate[$i][5]=$row['executives'];					
	$rate[$i][6]=$row['RType6'];	
	$rate[$i][7]=$row['RType7'];	
	$rate[$i][8]=$row['RType8'];	
	$rate[$i][9]=$row['RType9'];	
	$rate[$i][10]=$row['RType10'];	
	$i++;
}
$j=$i;


?>
<hr>
<table border=1 cellspacing=2>
<tr>
	<th><?php  print TEXT_TYPE ?></th>
	<th><?php  print TEXT_NAME ?></th>
	<th><?php  print TEXT_DATE ?></th>
	<?php  $i=1;
	while ($i<$k)
	{ ?>
	<th><?php  print type($id[$i]) ?></th>
	<?php  $i++; } ?>

</tr>
<?php 	        $i=1;
		while ($i<$j)
		{?>
		<tr align='right'>  
		<td><?php  print ($types[$i])?></td>
	        <td><?php  print ($names[$i])?></td>
		<td><?php  print local_date($date[$i])?></td>
			<?php  $m=1;
			while ($m<$k)
			{?>
			  <td><?php  echo $rate[$i][$id[$m]] ?></td>
			<?php  $m++;} ?>
		</tr>
		<?php  $i++;
		}
	
?>
</table>


<?php  }
?>

	<form name="f2" action="<?php echo $PHP_SELF;?>" method="GET">
	<table>
		<tr>
			<td>
				<select name="corp_id" onChange="document.f2.submit();return true;">
					<option value="">Select corporate client
<?php 				$res = mysql_query( "SELECT * FROM Corporates  ORDER BY name" )
					 or die("SELECT: ".mysql_error());
			
				while( $row = mysql_fetch_array( $res ) ) { 
?>			       <option value="<?php echo $row['corporate_id'];?>"><?php echo $row['name'];?>
<?php  				}
?>
				</select></td>
		</tr>
	</table>
	</form>
<?php // } ?>

<?php  include "themes/footer.php" ?>
