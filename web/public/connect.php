<?php
$db = new mysqli("localhost","root","lt159357","getool");

if($db->connect_error){
	die('connect error:' .$db->connect_error);
}
?>