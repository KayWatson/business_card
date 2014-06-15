<?php
define('DB_NAME', 'businesscard');
define('DB_USER', 'root');
define('DB_PASSWORD', 'test');
define('DB_HOST', 'localhost');

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if(!$link){
	die('Could not connect: ' .mysql_error());
}

$db_selected = mysql_selectdb(DB_NAME, $link);

if(!$db_selected){
	die('Can\'t use '.DB_NAME.': '.mysql_error());
}

$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];

$sql = "INSERT INTO user(first,last,email)VALUES('$first','$last','$email')";

if(!mysql_query($sql)){
	die('Error: '.mysql_error());
}

mysql_close();

?>