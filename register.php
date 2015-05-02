<!DOCTYPE html>
<html>
<head>
<title>REGISTRATION FORM</title>
<style TYPE = "text/css">
*{
    font-family: Tahoma, Geneva, sans-serif;
}
.outerbox_register
{
width: 300px;
height: auto;
margin: auto;
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
    margin-top: 15px;
    text-decoration: underline;
}

.register_div
{
    margin-right: 10px;
    margin-left: 10px;
padding: 5px 0 5px;
}

.register
{
position: relative;
padding: 7px;
width: 265px;
    font-size: 18px;
    border-radius: 8px;
border: none;
}

.submit_div
{
    margin-right: 10px;
    margin-left: 10px;
padding: 5px 0 5px;
}

.submit
{
color: white;
    font-size: 18px;
    background-color: #75b1ff;
width: 280px;
border: none;
    border-radius: 8px;
}

.error
{
    font-size: 18px;
    text-align: center;
color: red;
    font-weight: bold;
}
</style>


<script type ="text/javascript">
function checkempty(elem, helperMsg)
{
    if(elem.value.length == 0)
    {
        alert(helperMsg);
        elem.focus();
        return false;
    }
    return true;
}

function checkpassword(pwd, repwd)
{
    if (pwd === repwd)
    {
        alert("same");
    }
    
    else
    {
        alert("Please match the password and re-type password");
    }
}

</script>
</head>

<body>

<?php
    $hostname="localhost"; //local server name default localhost
    $username="hello";  //mysql username default is root.
    $password="tkfkdgo1";       //blank if no password is set for mysql.
    $database="424project";  //database name which you created
    
    $con=mysql_connect($hostname,$username,$password);
    $db = mysql_select_db('424project', $con);
    
    if(!$con)
    die('Connection Failed '.mysql_error());
    
    if (!$db)
    die('Database connection failed '.mysql_error());
    
    $errorempty = "";
    
    if ($_POST)
    {
        if (empty($_POST["username"]) || empty($_POST["pwd"])) {
            $errorempty = "Please fill required field";
        }
        else if (isset($_POST['username']) && isset($_POST['pwd']))
        {
            $username = $_POST['username'];
            $password = $_POST['pwd'];
            
            /*
             if (preg_match('/[0-9]/', $password) == 0 || preg_match('/[a-zA-Z]', $password) == 0 || preg_match('/[!@#$%^&*-+=_]/', $password) )
             {
             $errorempty = "Password must contains at least one number, one letter, and one special characters";
             }
             */
            
            //   else
            //   {
            $query = "INSERT INTO user_tb (username, password) VALUES ('" . $username . "', '" . $password . "')";
            $result = mysql_query($query);
            
            if($result)
            {
                echo "<br/><div style='color:lightseagreen; text-align: center; font-weight: bold; font-size: 30px; margin-top: 25px;'>User Created Successfully.</div>";
            }
            //   }
        }
    }
    ?>
<h3 style = 'text-align: center'>Sign In <a href="signin.php">HERE</a></h3>
<form name="registration" method="post" action="register.php" onsubmit="return validation()">
<div class = outerbox_register>
<div class = "title">Registration Form</div>
<div class = "register_div">
<input type = "text" class = "register" name = "firstname" placeholder="First name (*Required)">
<input type = "text" class = "register" name = "lastname" placeholder="Last name (*Required)">
<br/>
Year: <select class = "year" id = "yearid" name = "selectyear">
<option value ="">Select Year..</option>
<option value ="1971">1971</option>
<option value ="1972">1972</option>
<option value ="1973">1973</option>
<option value ="1974">1974</option>
<option value ="1975">1975</option>
<option value ="1976">1976</option>
<option value ="1977">1977</option>
<option value ="1978">1978</option>
<option value ="1979">1979</option>
<option value ="1980">1980</option>
<option value ="1981">1981</option>
<option value ="1982">1982</option>
<option value ="1983">1983</option>
<option value ="1984">1984</option>
<option value ="1985">1985</option>
<option value ="1986">1986</option>
<option value ="1987">1987</option>
<option value ="1988">1988</option>
<option value ="1989">1989</option>
<option value ="1990">1990</option>
<option value ="1991">1991</option>
<option value ="1992">1992</option>
<option value ="1993">1993</option>
<option value ="1994">1994</option>
<option value ="1995">1995</option>
<option value ="1996">1996</option>
<option value ="1997">1997</option>
<option value ="1998">1998</option>
<option value ="1999">1999</option>
<option value ="2000">2000</option>
<option value ="2001">2001</option>
<option value ="2002">2002</option>
<option value ="2003">2003</option>
<option value ="2004">2004</option>
<option value ="2005">2005</option>
</select>
Month: <select class = "month" id = "monthid" name="selectMonth">
<option value="">Select Month..</option>
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
<br/>
Day: <select class = "day" id="dayid" name="selectday">
<option value = "">Select Day..</option>
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
<br/>
<input type = "text" class = "register" name = "username" placeholder="Email (*Required)">
<input type = "PASSWORD" class = "register" id = "pwdid" name = "pwd" placeholder="Password (*Required)">
<input type = "PASSWORD" class = "register" id = "repwdid" name = "repwd" placeholder="Re-type Password">
<button type="button" class = "register" onclick="checkpassword(document.getElementById('pwdid').value, document.getElementById('repwdid').value)">check password</button>
</div>
<div class="submit_div">
<input type="submit" name="submit" value="Register" class = "submit">
<span class = error> <?php echo "</br><div style='text-align: center'>$errorempty</div>"?></span>
</div>
</div>
</form>
</body>
</html>
