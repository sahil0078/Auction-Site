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
    <input type="submit" value="Buy At Once" name="sbmt"/>
    </form>
	<?php
	if(isset($_REQUEST['sbmt']))
    {
	@	$del=$_REQUEST['delete'];
		$con=mysqli_connect("localhost","root","","my_auction1");
        if(!$con)
        echo "Error in connection";
        else
        {
           if($del)
		   mysqli_query($con,"delete from sold1 where pid=".$del);
		   $sql="select * from sold1";
           $result=mysqli_query($con,$sql);
           if($result->num_rows>0) 
           {
				echo "<table border=1>";
				echo "<tr><th>User ID</th><th>Product ID</th><th>Amount</th><th>Date</th><th></th></tr>";
				while(@$arr=mysqli_fetch_assoc($result))
				{
					echo "<tr><td><a href=userdetail.php?uname=".$arr['userid']."&sbmt=submit>".$arr['userid']."</a></td>";
					echo "<td><a href=pdetail.php?pname=".$arr['pid']."&sbmt=submit>".$arr['pid']."</a></td>";
					echo "<td>".$arr['amount']."</td><td>".$arr['date']."</td>";
					echo "<td><a href=account.php?delete=".$arr['pid']."&sbmt=Buy+At+Once>Delete</a></td></tr>";
				}
				echo "</table>";                
		   }
	   }
	}
?>

</p>
</div>
</div>
</body>
</html>