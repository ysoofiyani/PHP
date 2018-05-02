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
		
	if( ! $is_corp ) $is_corp=0;
	if( $act == "add" )
	{
		include "../check_date.php";
		$start_date = make_date( $start_year, $start_month, $start_day );
		$end_date = make_date( $end_year, $end_month, $end_day );
		$query = "LOCK TABLES Rooms WRITE";
		mysql_query( $query ) or die("$query<br> ".mysql_error());
		
	for( $date = $start_date; $date <= $end_date; $date = inc_date( $date,1 ) ) 
	{
			$res2=mysql_query("SELECT * FROM Rooms WHERE date='$date' AND is_corporate='$is_corp'");			
			$row=mysql_fetch_array( $res2 );
			if (!$row)
			{

	                	$query = "INSERT INTO Rooms ( date, singles, twins, doubles, triples, executives, RType6, RType7, RType8, RType9, RType10, is_corporate) values ( '$date', '$singles', '$twins', '$doubles', '$triples', '$executives', '$RType6', '$RType7', '$RType8', '$RType9', '$RType10','$is_corp')";
				$res=mysql_query($query ) or die("$query<br> ".mysql_error());
		        }
			else
			{
		$query="UPDATE	Rooms SET "; 		
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
	
	
                $query.=" where date='$date' AND is_corporate='$is_corp'";
		$res=mysql_query( $query ) or die("$query<br> ".mysql_error());		
		}
			if( $warn_counter++ > 366*3 ) die("Loop bug!<br>\n");
	}
	
		$query = "UNLOCK TABLES";
		mysql_query( $query ) or die("$query<br> ".mysql_error());
		oplog( "Set rooms availability from $start_day/$start_month/$start_year to $end_day/$end_month/$end_year. Single:$singles  Triple:$triples   Executive:$executives" );	
                header("Location: $PHP_SELF?is_corp=$is_corp");
		exit;
	}

include "themes/header.php";
?>
 	         <TD  
                style="BORDER-RIGHT: 0px; BORDER-TOP: 0px; BORDER-LEFT: 0px; BORDER-BOTTOM: 0px" 
                bgColor=#ffe0ad cellpadding="0" cellspacing="0" valign=top>
                <table border=0>
		<tr>
		<td onmouseover="this.style.backgroundColor='maroon'"  onmouseout="this.style.backgroundColor='FFE0AD'">
		<a href=availability.php?is_corp=0 class=menu><?php  print TEXT_PUBLIC ?></a>
		</td></tr>
		<td onmouseover="this.style.backgroundColor='maroon'"  onmouseout="this.style.backgroundColor='FFE0AD'">
                <a href=availability.php?is_corp=1 class=menu> <?php  print TEXT_PARTNERS ?></a>
		</td></tr></table>
                 </TD>
                <TD 
                style="BORDER-RIGHT: 0px; BORDER-TOP: 0px; BORDER-LEFT: 0px; BORDER-BOTTOM: 0px" 
                width="100%" bgColor=#FFE0AD border="0" cellpadding="0" 
                cellspacing="0" align=center>


		<table border=0 BGCOLOR=#c0c0c0>
		<tr><td bgcolor=navy><FONT class=a1 color=#ffffff>&nbsp;<B><?php  print TEXT_SET_AVAILABILITY ?>: </B><?php  if ($is_corp>0) print TEXT_PARTNERS; else print TEXT_PUBLIC; ?></FONT></td>
		<tr><td class=WIN>

<?php
 if( $corp_id ) print "<H1>Availability for corporate client number $corp_id</H1>"; ?>

<?php  include "./rates_common_date.php"; ?>
	<input type=radio name=is_corp value=0 <?php echo ($is_corp?"":"CHECKED");?>><?php  print TEXT_GENERAL ?>
	<input type=radio name=is_corp value=1 <?php echo ($is_corp?"CHECKED":"");?>><?php  print TEXT_CORPORATE ?>
	<input type=hidden name="act" value="add">
<?php  include "./rates_common_date_fin.php";
$query = "SELECT * FROM Rooms WHERE is_corporate=$is_corp ORDER BY date";
	
	$res = mysql_query( $query )
		or die("SELECT: ".mysql_error());
?>

<table border=1>

<th><?php  print TEXT_DATE ?></th>
<?php  $i=1;
while ($i<$k)
{ ?>
<th><?php  print type($id[$i]) ?></th>
<?php  $i++; }

$i=1;
 while( $row = mysql_fetch_array( $res ) ) {
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
        $i=1;
	while($i<$j) 
	{?>
		<tr>
		<td><?php  print local_date($date[$i]) ?></td>
		<?php  $m=1;
		while ($m<$k)
		{
			echo "<td>", $rate[$i][$id[$m]],"</td>";
			$m++;
		}
		print "</tr>";
		$i++;	
	}
?>
</table>



<?php  include "themes/footer.php" ?>


