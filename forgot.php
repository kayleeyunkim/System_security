<!DOCTYPE html>
<html>
<head>
<title>FORGOT INFO</title>

<style TYPE = "text/css">
*{
    font-family: Tahoma, Geneva, sans-serif;
}
.outerbox_forgot
{
width: 500px;
height: auto;
margin: auto;
    margin-top: 10px;
padding: 10px;
border: solid 1px #83ffcb;
    background-color: #d1ffec;
    border-radius: 8px;
}
.title
{
    font-size: 30px;
    font-weight: bold;
color: blue;
    text-align: center;
    margin-bottom: 10px;
    margin-top: 10px;
    text-decoration: underline;
}

.forgot_div
{
    margin-right: 10px;
    margin-left: 10px;
padding: 5px 0 5px;
}

.forgot
{
position: relative;
padding: 10px;
width: 95%;
    font-size: 18px;
    border-radius: 8px;
border: none;
}
}
</style>

</head>

<body>

<h3 style = 'text-align: center; margin: 0px;'>Sign In <a href="signin.php">HERE</a></h3>
<h3 style = 'text-align: center; margin: 0px;'>Register <a href="register.php">HERE</a></h3>

<form name="registration" method="post" action="register.php" onsubmit="return validation()">
<div class = "outerbox_forgot">
<div class = "title">Find Username and Password</div>
<div class = "forgot_div">
<input type = "text" class = "forgot" name = "firstname" placeholder = "First name">
<input type = "text" class = "forgot" name = "lastname" placeholder = "Last name">
<input type = "text" class = "forgot" name = "email" placeholder = "Email address"> <br/>
<input type = "text" class = "forgot" name = "year" placeholder = "Year">
<input type = "text" class = "forgot" name = "month" placeholder = "Month">
<input type = "text" class = "forgot" name = "day" placeholder = "Day">
</div>
</div>
</div>
</form>
</body>
</html>


















