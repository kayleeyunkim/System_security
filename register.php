<!DOCTYPE html>
<html>
<link rel="stylesheet" href="./assets/stylesheet.css" type="text/css">
<link rel="stylesheet" type="text/css" href="./assets/bootstrap.min.css">


<link href='/assets/strength.css' rel="stylesheet" type="text/css">
<script type="text/javascript" src="./assets/jquery.min.js"></script>
<script type="text/javascript" src="./assets/strength.js"></script>
<script type="text/javascript" src="./assets/strength.min.js"></script>


<head>
    <title>REGISTRATION FORM</title>
    <meta charset = "utf-8">
    <script type="text/javascript">
        function checkempty(elem, helperMsg) {
            if (elem.value.length == 0) {
                alert(helperMsg);
                elem.focus();
                return false;
            }
            return true;
        }

        $(document).ready(function ($) {

            $('#pwdid').strength();

        });

        $('#pwdid').strength({
            strengthClass: 'strength',
            strengthMeterClass: 'strength_meter',
            strengthButtonClass: 'button_strength'
            //strengthButtonText: 'Show password',
            //strengthButtonTextToggle: 'Hide Password'
        });

        function checkpassword(pwd, repwd) {
            if (pwd === repwd) {

            }

            else {
                alert("Please match the password and re-type password");
                //document.getElementById("matchpwd").style.display = 'block';
            }
        }

    </script>
</head>



<?php
$hostname = "localhost"; //local server name default localhost
$username = "binker";  //mysql username default is root.
$password = "admin";       //blank if no password is set for mysql.
$database = "Comp424";  //database name which you created

$con = mysql_connect($hostname, $username, $password);
$db = mysql_select_db($database, $con);

if (!$con)
    die('Connection Failed ' . mysql_error());

if (!$db)
    die('Database connection failed ' . mysql_error());

$errorempty = "";

if ($_POST && empty($_POST["honeypot"])) {
    if (empty($_POST["username"]) || empty($_POST["pwd"]) || empty($_POST["firstname"]) || empty($_POST["lastname"])
            || empty($_POST["selectyear"]) || empty($_POST["selectmonth"]) || empty($_POST["selectday"])) {
        $errorempty = "Please fill required field";
    }

    else if (isset($_POST['username']) && isset($_POST['pwd']) && isset($_POST['firstname']) && isset($_POST['lastname']) &&
            isset($_POST['selectyear']) && isset($_POST['selectmonth']) && isset($_POST['selectday']))
    {
        $username = $_POST['username'];
        $password = $_POST['pwd'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $year = $_POST['selectyear'];
        $month = $_POST['selectmonth'];
        $day = $_POST['selectday'];

        $query = "INSERT INTO user_tb (username, password) VALUES ('" . $username . "', '" . $password . "', '" . $firstname . "', '" . $lastname . "', '" . $year . "', '" . $month . "', '" . $day . "',)";
        $result = mysql_query($query);

        if ($result) {
            echo "<br/><div style='color:lightseagreen; text-align: center; font-weight: bold; font-size: 30px; margin-top: 25px;'>User Created Successfully.</div>";
        }
    }
}
?>
<h3 style='text-align: center'>Sign In <a href="signin.php">HERE</a></h3>

<form name="registration" id = "registration" method="post" action="register.php" onsubmit="checkpassword(document.getElementById('pwdid').value, document.getElementById('repwdid').value)">
    <div class=outerbox_register>

        <p id = "matchpwd" style="color:red; text-align: center; font-weight: bold; font-size: 30px; margin-top: 25px; display: none;">Please match the password and re-type password </p>

        <div class="title">Registration Form</div>
        <div class="register_div">
            <input type="text" class="register" name="firstname" placeholder="First name (*Required)">
            <input type="text" class="register" name="lastname" placeholder="Last name (*Required)">

            <body>
            <div id="honeypot-check" style="display:none">
                This is to check if you are human.
                <input type="text" name="honeypot" value=""/>
            </div>
            <br/>


            <select class="dob" id="yearid" name="selectyear">
                <option value="">Year..</option>
                <option value="1971">1971</option>
                <option value="1972">1972</option>
                <option value="1973">1973</option>
                <option value="1974">1974</option>
                <option value="1975">1975</option>
                <option value="1976">1976</option>
                <option value="1977">1977</option>
                <option value="1978">1978</option>
                <option value="1979">1979</option>
                <option value="1980">1980</option>
                <option value="1981">1981</option>
                <option value="1982">1982</option>
                <option value="1983">1983</option>
                <option value="1984">1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
            </select>

            <select class="dob2" id="monthid" name="selectmonth">
                <option value="">Month..</option>
                <option value="01">Janurary</option>
                <option value="02">Faburary</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>

            <select class="dob" id="dayid" name="selectday">
                <option value="">Day..</option>
                <option value="01">1</option>
                <option value="02">2</option>
                <option value="03">3</option>
                <option value="04">4</option>
                <option value="05">5</option>
                <option value="06">6</option>
                <option value="07">7</option>
                <option value="08">8</option>
                <option value="09">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>

            <input type="email" class="register" name="username" placeholder="Email (*Required)"> <br/>

            <input id="pwdid" class="register1" type="PASSWORD" name="pwd" value="" placeholder = "Password (*Required)">
            <input type="PASSWORD" class="register1" id="repwdid" name="repwd" placeholder="Re-type Password">
	 <select class = "securityquestion" name="securityquestion">
		<option value="">Choose Security question</option>
		<option value="petname">What is your pet name?</option>
		<option value="schoolname">Which University did you attand?</option>
		<option value="gradyear">What year did you graduate?</option>
		<option value="maiden">What is your mother's maiden name?</option>
	</select>
<input type="text" class ="register" name="securityanswer" placeholder="Answer for Security Question">
        </div>
        <div class="submit_div">
            <input type="submit" name="submit" value="Register" class="submit">
            <span class=error> <?php echo "<br/><div style='text-align: center'>$errorempty</div>" ?></span>
        </div>
    </div>
</form>
<script type="text/javascript" src="./assets/strength.min.js"></script>
</body>
</html>
