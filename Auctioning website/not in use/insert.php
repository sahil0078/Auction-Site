<html>
<head>
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
</head>
<h1>WELCOME</h1>
<body>
<div id="wrapper">
    <h1>ajax ... nettuts</h1>
    <ul id="nav">
	<li><a href="index.html"><b>Home<b></a></li>
    </ul>
	<p class = "left"><b>new user</b></p>
	<h3></h3>
	<form class = "my" height="500px">
	<table>
        	<tr>
            	<td><p>Name:</p></td> 
   				<td> <input type="text" name="name"></td>
            </tr>
   			<tr>
            	<td><p>User-id:</p></td>
                <td> <input type="text" name="uid"></td>
            </tr>
            <tr>
            	<td><p>Password:</p></td> 
   				<td> <input type="password" name="pass"></td>
            </tr>
            <tr>
            	<td><p>Address:</p></td> 
   				<td> <input type="text" name="add"></td>
            </tr>
            <tr>
            	<td><p>Email-id:</p></td> 
   				<td> <input type="email" name="mail"></td>
            </tr>
            <tr>
            	<td><input type="submit" name="sbmt" value="Login"></td>
            </tr>
   		</table>
</form>
<?php
	if(isset($_REQUEST['sbmt']))
	{
		$userid=$_REQUEST['uid'];
		$name=$_REQUEST['name'];
		$password=$_REQUEST['pass'];
		$address=$_REQUEST['add'];
		$mail=$_REQUEST['mail'];
		if($userid and $name and $password and $address and $mail)
		{
			$con=mysqli_connect("localhost","root","","my_auction1");
			if(!$con)
			echo "error in connection";
			$date=date("Y/m/d");
			$sql ="INSERT INTO user VALUES ('".$name."','".$userid."','".$password."','".$date."','".$address."','".$mail."')";
			$result = mysqli_query($con,$sql);
			if(!$result)
			echo "Could not enter data";
			else
			echo "New user $name is successfully added";
			mysqli_close($con);
		}
		else
		echo"All fileds are not filled";
	}
?>
</body>
</html>