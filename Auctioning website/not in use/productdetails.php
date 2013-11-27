<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form >
<table>
<tr>
<td>Product id:</td>
<td><input type="text" name="pname" /></td>
</tr>
<br />
<tr>
<td><input type="submit" name="sbmt" value="submit" />
</td>
</tr>
</table>
</form>
<?php
	if(isset($_REQUEST['sbmt']))
	{
		$pid=$_REQUEST['pname'];
		if($pid)
		{
			$con=mysqli_connect("localhost","root","","my_auction1");			
			if(!$con)
			echo "could not connect";
			$sql="select product_name,product_details,base_price,image from products where pid='".$pid."'";
			$res=mysqli_query($con,$sql);
			echo "<table border=1>";
			echo "<tr><th>Product Name</th><th>Product Details</th><th>Base Price</th><th>Image</th></tr>";
			while($arr=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>".$arr['product_name']."</td>";
				echo "<td>".$arr['product_details']."</td>";
				echo "<td>".$arr['base_price']."</td>";
				echo "<td><img src=".'"'.$arr['image'].'"'."width=100px height=100px alt=$arr[product_name]/></td>";
				echo "</tr>";			
			}
			echo "</table>";
		}
	}
?>
</body>
</html>