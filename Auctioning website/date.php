<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$con=mysqli_connect("localhost","root","","my_auction1");			
	if(!$con)
	echo "could not connect";
	$sql="select closing_date from products where pid='".$pid."'";
	$res=mysqli_query($con,$sql);
	@$arr=mysqli_fetch_array($res);
	$date1 =date("Y/m/d");
	$date2 =$arr['closing_date'];
	$diff = abs(strtotime($date2) - strtotime($date1));
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	printf("\n%d years, %d months, %d days\n", $years, $months, $days);
?>
</body>
</html>