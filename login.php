<?php
    include('./database.php');

    session_start(); // Start or resume the session 

    function pathTo($destination){ // eto fucntion lang to para di mahaba yung pag redirect mo and reusable
    echo "<script>window.location.href= '/php-login-session/$destination.php'</script>"; 
    }

    //echo $_SESSION['username'];

    if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
        // set default invalid
        $_SESSION['status'] = 'invalid';
    }

    if($_SESSION['status'] == 'valid'){
       pathTo('home');
    }    

    if (isset($_POST['login'])){
        $username = trim($_POST['username']); // trim is to remove white spaces
        $password = trim($_POST['password']);

        if (empty($username) || empty($password)){ // para malaman mo if empty ba yung ininput ni user
            echo "<script>alert('Please fill up all fields')</script>";
        }
        else{
            // kapag may input iveveryfy nya na if may nag mamatch ba sa database using these
            $queryValidate = "SELECT * FROM accounts where username ='$username' AND password = md5('$password')";
            $sqlValidate = mysqli_query($connection,$queryValidate);
            $rowValidate = mysqli_fetch_array($sqlValidate); // para makuha nya yung nagmatch na username and password

            if (mysqli_num_rows($sqlValidate) > 0){
                $_SESSION['status'] = 'valid';
                $_SESSION['username'] = $rowValidate['username'];

                pathTo('home');
            } else{
                $_SESSION['status'] = 'Invalid';
                echo 'Invalid Credentials';
            }

        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>

    <form action="/php-login-session/login.php" method="POST">

    <input type="text" name ="username" placeholder="Input your username">
    <input type="text" name ="password" placeholder="Input your password">
    <input type="submit" name="login" value="LOGIN">
    </form>
</body>
</html>