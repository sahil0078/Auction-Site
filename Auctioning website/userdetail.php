<html>
<head>
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
</head>
<body>
	<div id="wrapper">
    <h1>ajax ... nettuts</h1>
    <div id="search">
   <form >
    <table>
    <tr>
    	<td><input type="text" name="search" /></td>
    	<td><input type="submit" name="sbmt" value="search" />
    	</td>
    </tr>
    </table>
   </form>
   </div>
    <ul id="nav">
        <li><a href="index.html">welcome</a></li>
        <li><a href="policies.html">Our Policies</a></li>
        <li><a href="login.html">login</a></li>
        <li><a href="contactus.html">contact us</a></li>
		<li><a href="admin.html">admin</a></li>
        
    </ul>
    <div id="content">
<?php
	if(isset($_REQUEST['uname']))
	{
		$uid=$_REQUEST['uname'];
		if($uid)
		{
			$con=mysqli_connect("localhost","root","","my_auction1");			
			if(!$con)
			echo "could not connect";
			$sql="select username,userid,address from user where userid='".$uid."'";
			$res=mysqli_query($con,$sql);
			echo "<table border=1>";
			while($arr=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>".$arr['username']."</td>";
				echo "<td>".$arr['userid']."</td>";
				echo "<td>".$arr['address']."</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}
?>
</div>
</div>
</body>
</html>