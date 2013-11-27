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
	if(isset($_REQUEST['sbmt']))
	{
		$pid=$_REQUEST['pname'];
		if($pid)
		{
			$con=mysqli_connect("localhost","root","","my_auction1");			
			if(!$con)
			echo "could not connect";
			$sql="select userid,amount from bids where pid='".$pid."' order by amount desc";
			$res=mysqli_query($con,$sql);
			$sql1="select product_name,base_price from products where pid='".$pid."'";
			$res1=mysqli_query($con,$sql1);
			@$arr1=mysqli_fetch_assoc($res1);
			echo "Product Name :".$arr1['product_name']."<br/>";
			echo "Base price:".$arr1['base_price']."<br/>";
			if($res->num_rows==0)
			echo "No bids upto now <a href=login.html>Login</a> to make a bid";
			else
			{
				echo "The Bids upto now are";
				echo "<table border=1>";
				echo "<tr><th>User ID</th><th>Amount</th></tr>";
				while(@$arr=mysqli_fetch_assoc($res))
				{
					echo "<tr><td>".$arr['userid']."</td><td>".$arr['amount']."</td></tr>";
				}
				echo "</table>";
				require "date.php";
			}
		}
	}
?>
</div>
</div>
</body>
</html>