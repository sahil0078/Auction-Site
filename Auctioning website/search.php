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
		@$pname=$_REQUEST['search'];
		if($pname)
		{
			$con=mysqli_connect("localhost","root","","my_auction1");			
			if(!$con)
			echo "could not connect";
			$sql="select pid,product_name,base_price,seller,image,bo_price from products where product_name like '%".$pname."%' or product_details like '%".$pname."%'";
			$res=mysqli_query($con,$sql);
			echo "<table border=1>";
			echo "<tr><th>Product ID</th><th>Product Name</th><th>Base Price</th><th>Seller</th><th>Buy At Once</th><th>Image</th></tr>";
			while($arr=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td><a href=pdetail.php?pname=".$arr['pid']."&sbmt=submit>".$arr['pid']."</a></td>";
				echo "<td><a href=productinfo.php?pname=".$arr['product_name']."&sbmt=submit>".$arr['product_name']."</a></td>";
				echo "<td>".$arr['base_price']."</td>";
				echo "<td><a href=userdetail.php?uname=".$arr['seller']."&sbmt=submit>".$arr['seller']."</a></td>";
				echo "<td>".$arr['bo_price']."</td>";
				echo "<td><img src=".'"'.$arr['image'].'"'."width=100px height=100px alt=$arr[product_name]/></td>";
				echo "</tr>";
			}
			echo "</table>";
		}
	}
?>
    <div id="foot">Copyright © 2012 All Rights Reserved</div>
	</div>
</body>    
</html>
