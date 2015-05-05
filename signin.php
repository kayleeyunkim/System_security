<html>
<link rel="stylesheet" href="./assets/stylesheet.css" type="text/css">
  <head>
    <meta charset = "utf-8">
    <title>Lab 4</title>

    <style>

    #logger{
      color: #00CCFF;
      display:none;
    }

    #failure{
      color: red;
      display:none;
    }

    </style>
  </head>
 <body>

 <!--Initial connection to mysql -->
<?php
  $con=mysqli_connect("localhost","binker","admin","Comp424");

  if (mysqli_connect_errno()){
    echo "Failed to Connect to MySQL: " . mysqli_connect_error();
  }
?>

 <!--These spans are all CSS set to display:none and will only show up when appropriate -->
 <span id=logger>You Are Logged In</span>
 <span id=failure>Incorrect Log In Credentials</span>



<h3 style='text-align: center; margin-top: 25px;'>Don't have an acccount? Register <a href="register.php">HERE</a>
    </h3>
    <h3 style='text-align: center; margin-top: 0px; margin-bottom: 10px;'>Forgot Username / Password? Find <a href="forgot.php">HERE</a>
    </h3>

 <!--Form to Log In -->
<form name="login" action="" method="post">
<div class="logindiv">
	<div class="title">SIGN IN</div>
	<div class="logindivdiv">
  		<input class="login" id="usernameL" name="usernameL" type="text" placeholder="Enter User Name" style="margin-bottom: 5px;">
  		<input class="login" id=passwordL" name="passwordL" type="PASSWORD" placeholder="Enter Password">
	</div>
  <div class="loginbutton">
  	<input id="loginz" name ="loginz" type="submit" value="Log In" class="submitdiv">
</form>

<!--Log In PHP Script -->
<?php
  if (isset($_POST['loginz'])){
    $con=mysqli_connect("localhost","binker","admin","DannyNCale+2");
  if (mysqli_connect_errno()){
      echo "Failed to Connect to MySQL: " . mysqli_connect_error();
    }
    $i=0;
    $h=0;
    $a;
    $userLOG = mysqli_real_escape_string($con, $_POST['usernameL']);
    $passwordLOG = mysqli_real_escape_string($con, $_POST['passwordL']);
    $result = mysqli_query($con, "SELECT * FROM nerdsuck");
    //compares input to all user names, if there is a match, compares to its password
    while ($row = mysqli_fetch_array($result)){
      if ($userLOG == $row['username']){
$i=1;
if ($passwordLOG == $row['userpass']){
 $h=2;
 $a=$row;
}
      }
    }

    //If information is correct, display log in message and message form
function curPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
    } else {
      $pageURL .= $_SERVER["SERVER_NAME"];
    }
    return $pageURL;
}

    if ($h == 2){
        $baseUrl = curPageURL();
header("Location: $baseUrl/loggedin.php");
die();
        echo '<style type="text/css">
#formg{
display: inline;
}
</style>';
echo '<style type="text/css">
#logger{
display: inline;
}
</style>';
    }
    //Otherwise, display a failure message
    else {
     echo '<style type="text/css">
#failure{
display: inline;
}
</style>';
    }
  }
?>
<br>
<br>
<br>




</body>
</html>

