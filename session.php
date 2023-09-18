<?php
    session_start();


    function pathTo($destination){ // eto fucntion lang to para di mahaba yung pag redirect mo and reusable
        echo "<script>window.location.href= '/php-login-session/$destination.php'</script>"; 
    }

    // eto yung ano
    if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
        // set default invalid
        $_SESSION['status'] = 'invalid';
    
        echo "Session is invalid";
        // since invalid si session mo, ireredirect mo sya sa login 
        pathTo('login');
        // if valid naman, wala ka nang gagawin
    
    }
?>