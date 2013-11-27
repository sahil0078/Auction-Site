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
	<?php
        if(isset($_REQUEST['sbmt']))
        {
            $user=$_REQUEST['user'];
            $password=$_REQUEST['password'];
            if($user and $password)
            {
                $con=mysqli_connect("localhost","root","","my_auction1");
                if(!$con)
                echo "Error in connection";
                else
                {
                   $sql="select * from admin where name='".$user."'";
                   $result=mysqli_query($con,$sql);
                   if($result->num_rows>0) 
                   {
                        $row = mysqli_fetch_assoc($result);
						if ( $password!= $row['password'])
						echo "Login Failed";
						else
						{
							echo "Welcome Admin";
							print "<ul><li><a href = \"account.php\"> <img src='images/account.png'></li><br/><li><a href = \"index.html\"> <img src='images/LOGOUT.png'></li></ul> ";
						}
				   }
				   else
				   echo "Only admin is allowed and u r not one";
                }
            }
            else
            echo "fill all the fields";
        }
    ?>
    </p>
</body>
</html>