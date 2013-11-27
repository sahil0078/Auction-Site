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
    <form >
    <table>
    <tr>
    	<td>Product id:</td>
    	<td><input type="text" name="pid" /></td>
    	<td><input type="submit" name="sbmt" value="submit" />
    	</td>
    </tr>
    </table>
    </form>
<?php
	@$pid=$_REQUEST['pid'];
	if(isset($_REQUEST['sbmt']))
	{
		
		if($pid)
		{
			$con=mysqli_connect("localhost","root","","my_auction1");
			if(!$con)
			echo "error could not connect";
			$sql="select pid from products where pid='".$pid."'";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0)
			echo "Product ID already in use";
			else
			echo "Product ID Available";	
		}
	}
?>
<form >
<table>
<tr>
	<td>userid:</td>
	<td><input type="text" name="uid" /></td>
</tr>
<tr>
	<td>Password:</td>
	<td><input type="text" name="pass" /></td>
</tr>
<tr>
	<td>Product id:</td>
	<td><input type="text" name="pid" value="<?php echo $pid; ?>" /></td>
</tr>
<tr>
	<td>Productname:</td>
	<td><input type="text" name="pname" /></td>
</tr>
<tr>
	<td>Product Details:</td>
	<td><input type="text" name="pdetail" /></td>
</tr>
<tr>
	<td>Category id:</td>
	<td><input type="text" name="cid" /></td>
</tr>
<tr>
	<td>Base Price:</td>
	<td><input type="text" name="bp" /></td>
</tr>
<tr>
	<td>Closing Date:</td>
	<td><input type="text" name="cd" /></td>
</tr>
<tr>
	<td>Buy At Once Price:</td>
	<td><input type="text" name="bop" /></td>
</tr>
<tr>
	<td>image:</td>
	<td><input type="text" name="image" /></td>
</tr>
<br />
<tr>
	<td><input type="submit" name="sbmt1" value="submit" />
</td>
</tr>
</table>
</form>
<?php
if(isset($_REQUEST['sbmt1']))
{
	$uid=$_REQUEST['uid'];
	$pid=$_REQUEST['pid'];
	$pname=$_REQUEST['pname'];
	$pdetail=$_REQUEST['pdetail'];
	$bp=$_REQUEST['bp'];
	$cd=$_REQUEST['cd'];
	$bop=$_REQUEST['bop'];
	$image=$_REQUEST['image'];
	$cid=$_REQUEST['cid'];
	if($uid and $pname and $pdetail and $bp and $cd and $bop and $pid and $image)
	{
		$con=mysqli_connect("localhost","root","","my_auction1");
		if(!$con)
		echo "error in connection";
		$date=date("Y/m/d");
		$sql ="INSERT INTO products VALUES ('".$pid."','".$pname."','".$pdetail."','".$uid."','".$bp."','".$cid."','".$cd."','".$image."','".$date."','".$bop."')";
		$result = mysqli_query($con,$sql);
		if(!$result)
		echo "could not enter data";
		else
		echo "'".$pname."' is successfully added";
		mysqli_close($con);
	}
	else
	echo"All fileds are not filled";
}
?>
</body>
</html>