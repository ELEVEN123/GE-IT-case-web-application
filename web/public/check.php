<?php
include 'public/connect.php';

if(!isset($_COOKIE["userId"])){
	$url = "index.php";
	?>
	<script type="text/javascript">
	    window.location.href = "<?php echo $url; ?>"; 
	</script>
	<?php
	exit();
}

$userId = $_COOKIE["userId"];

$sql = "select * from keeper where Id = '" .$userId. "'";
$res = $db->query($sql);
$row = $res->fetch_array();

if(empty($row["boxUse"])){
	$url = "boxChoose.php";
	?>
		<script type="text/javascript">
		    window.location.href = "<?php echo $url; ?>"; 
		</script>
	<?php	
		exit();	
}else{

	setcookie("boxId",$row["boxUse"],time()+36000);
	$_COOKIE["boxId"] = $row["boxUse"];

}	
?>