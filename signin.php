<style type = "text/css">
    *{
        font-family: Tahoma, Geneva, sans-serif;
    }
    .logindiv
    {
        border-radius: 8px;
        width: 350px;
        height: auto;
        margin: auto;
        box-shadow: 0 0 30px #2d7699;
        padding-top: 20px;
        background-color: #d1ffec;
    }

    .title
    {
        font-size: 30px;
        font-weight: bold;
        color: blue;
        text-align: center;
        text-decoration: underline;
    }

    .logindivdiv
    {
        margin-right: 10px;
        margin-left: 10px;
        margin-top: 0;
        padding: 10px 10px 0;
    }

    .login
    {
        position: relative;
        padding: 7px;
        width: 310px;
        font-size: 18px;
        border-radius: 8px;
        border: none;
    }

    .loginbutton
    {
        margin-right: 20px;
        margin-left: 20px;
        padding: 10px 0 10px;
    }

    .submitdiv
    {
        color: white;
        font-size: 18px;
        background-color: #75b1ff;
        width: 310px;
        border: none;
        border-radius: 8px;
    }

    .cronbutton
    {
        padding: 10px 0 5px;
    }

    .cron
    {
        color: white;
        font-size: 18px;
        background-color: #75b1ff;
        width: 310px;
        border: none;
        border-radius: 8px;
    }

    .seecronjobpage
    {
        padding: 0;
    }

    .cron1
    {
        color: white;
        font-size: 18px;
        background-color: #75b1ff;
        margin-bottom: 10px;
        width: 310px;
        border: none;
        border-radius: 8px;
    }

    select
    {
        font-size: 20px;
    }


</style>

<?php session_start();
    
if($_POST)
{
    $valid = true;

    if(!isset($_POST['username']) || empty($_POST['username']) )
    {
        $valid = false;
    }


    if(!isset($_POST['pwd']) || empty($_POST['pwd']) )
    {
        $valid = false;
    }


    if($valid)
    {
        $hostname="localhost"; //local server name default localhost
        $username="hello";  //mysql username default is root.
        $password="tkfkdgo1";       //blank if no password is set for mysql.
        $database="424project";  //database name which you created

        $con=mysql_connect($hostname,$username,$password);
        $db = mysql_select_db('424project', $con);

        if(!$con)
            die('Connection Failed'.mysql_error());


        if (!$db)
            die('Database connection failed'.mysql_error());

        $username = $_POST['username'];
        $password = $_POST['pwd'];

        $query = "SELECT * FROM  user_tb where username = \"$username\" AND password = \"$password\"";

        $result = mysql_query($query);

        $row = mysql_fetch_assoc($result);

        if( $row )
        {
                $_SESSION['user_id'] = $row['userid'];
                $_SESSION['logged_in']= true;
                $_SESSION['user_name']=$username;

                header("Location: signin.php");
        }

        else
        {
            echo "<div style='color:red; text-align: center; font-weight: bold; font-size: 30px; margin-top: 25px;'>
            Wrong credentials. Please try again or register!</div>";
        }
    }

    else
    {
        echo "<div style='color:red; text-align: center; font-weight: bold; font-size: 30px; margin-top: 25px;'>Please check your input.</div> ";
    }
} ?>

<?php
    if(!isset($_SESSION['logged_in']))
    { ?>
        <h3 style = 'text-align: center; margin-top: 25px;'>Don't an have acccount? Register <a href="register.php">HERE</a></h3>

        <form method="post" action="">
            <div class = logindiv>
                <div class = title>SIGN IN</div>
                <div class = logindivdiv>
                    <input type="text" name="username" placeholder="Enter your username" class = "login">
                    <input type="text" name="pwd" placeholder="Enter your password" class = "login">
                </div>
                <div class = "loginbutton">
                    <input type="submit" value="Login" class = "submitdiv">
                </div>
            </div>
        </form>
    <?}

// if user LOGGED IN then display application
    else
    {
        ?>
        <h1 style = 'text-align: center; margin-top: 20px'> Welcome back: <?=$_SESSION['user_name']?> <a style = 'font-size: 18px;' href="logout.php">Log Out</a></h1>

        <?php
            if(isset($_SESSION['error']))
            {
                echo "<div style='color:red; text-align: center; font-size: 20px;'> " .$_SESSION['error'] . "</div>";
                unset($_SESSION['error']);
            }
        ?>

        <?php
        if(isset($_SESSION['success']))
        {
            echo "<div style='color:green; text-align: center; font-size: 20px;'> " .$_SESSION['success'] . "</div>";
            unset($_SESSION['success']);
        }

        ?>
        <br/>
    <?} ?>
