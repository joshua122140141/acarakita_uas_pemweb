<?php

// remove php session
session_start();
session_unset();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script src="./assets/js/cookie.js"></script>
    <script>
        clearCookies();
        window.location.href = './login.php';
    </script>    
</body>
</html>