<?php
include 'public/connect.php';

if(empty($_GET['centerId'])){
	exit();
}else{
	$centerId = $_GET['centerId'];
	
	$sql = "select * from center where No = '" .$centerId. "'";
	$res = $db->query($sql);
	$row = $res->fetch_array();

	$boxs = explode(',', $row['boxs']);

	foreach ($boxs as $value) {
		echo "<option value='$value'>$value</option>";
	}
}
?>