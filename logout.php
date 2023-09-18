<?php 
    session_start();
    
    function pathTo($destination){ // eto fucntion lang to para di mahaba yung pag redirect mo and reusable
        echo "<script>window.location.href= '/php-login-session/$destination.php'</script>"; 
    }

    // setting status into invalid para malogout
    $_SESSION['status'] = 'invalid';

    // unsetting variables
    unset($_SESSION['username']); // you are unsetting this kase pag si status na logout mo nakasave parin yung session username which is delikado

    pathTo('login');

?>