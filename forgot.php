<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">

    <title>FORGOT INFO</title>

    <link rel="stylesheet" href="./assets/stylesheet.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap.min.css">

</head>

<body>
<br/>
<h3 style='text-align: center; margin: 0px;'>Sign In <a href="signin.php">HERE</a></h3>
<br/>
<h3 style='text-align: center; margin: 0px;'>Register <a href="register.php">HERE</a></h3>

<form name="registration" method="post" action="register.php" onsubmit="return validation()">
    <div class="outerbox_forgot">
        <div class="title">Find Username and Password</div>
        <div class="forgot_div">
            <input type="text" class="forgot1" name="firstname" placeholder="First name">
            <input type="text" class="forgot1" name="lastname" placeholder="Last name">
            <input type="email" class="forgot" name="email" placeholder="Email address"> <br/>
            <input type="text" class="forgot2" name="year" placeholder="Year">
            <input type="text" class="forgot3" name="month" placeholder="Month">
            <input type="text" class="forgot2" name="day" placeholder="Day">
        </div>
    </div>
</form>
</body>
</html>


















