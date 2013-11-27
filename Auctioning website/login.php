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
                   $sql="select * from user where userid='".$user."'";
                   $result=mysqli_query($con,$sql);
                   if($result->num_rows==0) 
                   {
                        echo "Wrong username";
                   }
				   else
				   {
					   $row = mysqli_fetch_assoc($result);
					   if ( $password!= $row['password']) 
						{
							echo "Username exists but not password";
						}
						else
						{
							print "</br><a href= \"makebid.php\"><img src='images/BIDDING.png'></a> ";
							print "</br></br><a href= \"buyatone.php\"><img src='images/bao.png'></a> ";
							print " <br></br><a href= \"productreg.php\"><img src='images/pro.png'></a> ";
							print " <br></br><a href= \"index.html\"><img src='images/LOGOUT.png'></a> ";
						}
				   }
                }
            }
            else
            echo "All the fields are not filled";
        }
    ?>
    </p>
    </div>
     </div>
</body>
</html>