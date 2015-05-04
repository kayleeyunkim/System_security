<!DOCTYPE html>
<html>


<head>
    <meta charset = "utf-8">

    <title>Log in</title>


<link rel="stylesheet" href="./assets/stylesheet.css" type="text/css">
<link rel="stylesheet" type="text/css" href="./assets/bootstrap.min.css">
</head>

<body>
<?php session_start();

if ($_POST) {
    $valid = true;

    if (!isset($_POST['username']) || empty($_POST['username'])) {
        $valid = false;
    }


    if (!isset($_POST['pwd']) || empty($_POST['pwd'])) {
        $valid = false;
    }


    if ($valid) {
        $hostname = "localhost"; //local server name default localhost
        $username = "hello";  //mysql username default is root.
        $password = "tkfkdgo1";       //blank if no password is set for mysql.
        $database = "424project";  //database name which you created

<<<<<<< HEAD
        $con = mysql_connect($hostname, $username, $password);
=======
        $con = mysql_connect("localhost","binker","admin","424project");
>>>>>>> origin/master
        $db = mysql_select_db('424project', $con);

        if (!$con)
            die('Connection Failed' . mysql_error());


        if (!$db)
            die('Database connection failed' . mysql_error());

        $username = $_POST['username'];
        $password = $_POST['pwd'];

<<<<<<< HEAD
        $query = "SELECT * FROM  user_tb where username = \"$username\" AND password = \"$password\"";
=======
        $query = "SELECT * FROM  user_tb where username = \"$username\" AND userpass = \"$password\"";
>>>>>>> origin/master

        $result = mysql_query($query);

        $row = mysql_fetch_assoc($result);

        if ($row) {
<<<<<<< HEAD
=======
            $today = date("z");
            $sql = "UPDATE 424project SET today='$today' WHERE userid='$row['userid']'";
>>>>>>> origin/master
            $_SESSION['user_id'] = $row['userid'];
            $_SESSION['logged_in'] = true;
            $_SESSION['user_name'] = $username;

            header("Location: signin.php");
        } else {
            echo "<div style='color:red; text-align: center; font-weight: bold; font-size: 30px; margin-top: 25px;'>
                Wrong credentials. Please try again!</div>";
        }
    } else {
        echo "<div style='color:red; text-align: center; font-weight: bold; font-size: 30px; margin-top: 25px;'>Please check your input.</div> ";
    }
} ?>

<?php
if (!isset($_SESSION['logged_in'])) { ?>
    <h3 style='text-align: center; margin-top: 25px;'>Don't have an acccount? Register <a href="register.php">HERE</a>
    </h3>
    <h3 style='text-align: center; margin-top: 0px; margin-bottom: 10px;'>Forgot Username / Password? Find <a href="forgot.php">HERE</a>
    </h3>

    <form method="post" action="">
        <div class="logindiv">
            <div class="title">SIGN IN</div>
            <div class="logindivdiv">
                <input type="text" name="username" placeholder="Enter your username" class="login" style="margin-bottom: 5px;"> <br/>
                <input type="PASSWORD" name="pwd" placeholder="Enter your password" class="login">
            </div>
            <div class="loginbutton">
                <input type="submit" value="Login" class="submitdiv">
            </div>
        </div>
    </form>

<?
} // if user LOGGED IN then display application
else {
    ?>
    <h1 style='text-align: center; margin-top: 20px'> Welcome back: <?= $_SESSION['user_name'] ?> <a
            style='font-size: 18px;' href="logout.php">Log Out</a></h1>

    <?php
    if (isset($_SESSION['error'])) {
        echo "<div style='color:red; text-align: center; font-size: 20px;'> " . $_SESSION['error'] . "</div>";
        unset($_SESSION['error']);
    }
    ?>

    <?php
    if (isset($_SESSION['success'])) {
        echo "<div style='color:green; text-align: center; font-size: 20px;'> " . $_SESSION['success'] . "</div>";
        unset($_SESSION['success']);
    }

    ?>
    <br/>
<? } ?>
</body>
</html>