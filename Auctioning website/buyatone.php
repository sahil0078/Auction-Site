<html>
<head>

<body onLoad="checkCookie()">

<title>online shopping cart</title>
	<script type="text/javascript" src="jquery.js"></script>
	
	<style type="text/css">
	@import url(css.css);
	</style>
	
	<script type="text/javascript" src="js.js"></script>

	<script type="text/javascript">
        var GB_ROOT_DIR = ".//greybox//";
    </script>

    <script type="text/javascript" src="greybox/AJS.js"></script>
    <script type="text/javascript" src="greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="greybox/gb_scripts.js"></script>
    <link href="greybox/gb_styles.css" rel="stylesheet" type="text/css"  />
	<link type = "text/css" rel = "stylesheet" href = "sheet.css">
</head>
<body>
    <div id="wrapper">
    <h1>ajax ... nettuts</h1>
	<body style="background-color:black ">
	<h1>Welcome seller</h1>
    <ul id="nav">
	<li><a href="index.html"><b>Home<b></a></li>
    </ul>
    <div id="content">
	<p>
<form>
<table>
<tr>
<td>Product id:</td>
<td><input type="text" name="pid" /></td>
</tr>
<tr>
<td>User id:</td>
<td><input type="text" name="uid" /></td>
</tr>
<br />
<tr>
<td><input type="submit" name="sbmt" value="Buy At once" />
</td>
</tr>
</table>
</form>
<?php
	if(isset($_REQUEST['sbmt']))
	{
		$pid=$_REQUEST['pid'];
		$uid=$_REQUEST['uid'];
		if($pid and $uid)
		{
			$con=mysqli_connect("localhost","root","","my_auction1");			
			if(!$con)
			echo "could not connect";
			$date=date("Y/m/d");
			$sql="insert into sold1 values('".$uid."','".$pid."',(select bo_price from products where pid='".$pid."'),'".$date."')";
			$res=mysqli_query($con,$sql);
			if($res)
			echo "Your Request has Been Taken";
			else
			"server is down try later or contact admin";
		}
	}
?>
</body>
</html>