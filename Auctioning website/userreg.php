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
    	<td>User id:</td>
    	<td><input type="text" name="uid" /></td>
    	<td><input type="submit" name="sbmt" value="submit" /></td>
    </tr>
    </table>
    </form>
<?php
	@$uid=$_REQUEST['uid'];
	if(isset($_REQUEST['sbmt']))
	{
		
		if($uid)
		{
			$con=mysqli_connect("localhost","root","","my_auction1");
			if(!$con)
			echo "error could not connect";
			$sql="select userid from user where userid='".$uid."'";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0)
			echo "Username already in use";
			else
			echo "Username Available";	
		}
	}
?>
    <form >
    <table>
    <tr>
    	<td>Userid:</td>
    	<td><input type="text" name="uid" value="<?php echo $uid; ?>" /></td>
    </tr>
    <tr>
    	<td>Username:</td>
    	<td><input type="text" name="uname" /></td>
    </tr>
    <tr>
    	<td>Password:</td>
    	<td><input type="password" name="pass" /></td>
    </tr>
    <tr>
    	<td>Email Id:</td>
    	<td><input type="text" name="email" /></td>
    </tr>
    	<tr>
    	<td>Address:</td>
    <td><input type="text" name="add" /></td>
    </tr>
    <tr>
    	<td><input type="submit" name="sbmt1" value="submit" /></td>
    </tr>
    </table>
    </form>
<?php
if(isset($_REQUEST['sbmt1']))
{
	$uid=$_REQUEST['uid'];
	$username=$_REQUEST['uname'];
	$password=$_REQUEST['pass'];
	$email=$_REQUEST['email'];
	$add=$_REQUEST['add'];
	if($username and $password and $email and $add and $uid)
	{
		$con=mysqli_connect("localhost","root","","my_auction1");
		if(!$con)
		echo "error in connection";
		$date=date("Y/m/d");
		$sql ="INSERT INTO user VALUES ('".$username."','".$uid."','".$password."','".$date."','".$add."','".$email."')";
		$result = mysqli_query($con,$sql);
		if(!$result)
		echo "could not enter data";
		else
		echo "'".$username."' is successfully added";
		mysqli_close($con);
	}
	else
	echo"All fileds are not filled";
}
?>
</body>
</html>