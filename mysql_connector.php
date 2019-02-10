<?php
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWD', '');
DEFINE('DB_HOST', 'http://127.0.0.1/');
DEFINE('DB_NAME', 'teste');

$con = @mysqli_connect(localhost, DB_USER, DB_PASSWD, teste)
OR die('Could not connect' . mysqli_connect_error());


?>