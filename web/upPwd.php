<?php
include "public/connect.php";

if(!isset($_COOKIE["userId"])){
	$url = "index.php";
	?>
	<script type="text/javascript">
	    window.location.href = "<?php echo $url; ?>"; 
	</script>
	<?php
	exit();
}

if(!empty($_POST["oldPwd"]) && !empty($_POST["newPwd"]) && !empty($_POST["newPwd2"])){
	$oldPwd = $_POST["oldPwd"];
	$newPwd = $_POST["newPwd"];
	$newPwd2 = $_POST["newPwd2"];

	if($newPwd !== $newPwd2){
		echo "you input two different password!</br>";
	}else{

        $user = $_COOKIE["userId"];
		$sql = "select * from keeper where Id = '" .$user. "'";
		$res = $db->query($sql);
        $row = $res->fetch_array();

        if($oldPwd !== $row['pwd']){
        	echo "please enter right password!</br>";
        }else{
        	$sql = "update keeper set pwd = '" .$newPwd. "'";
        	$res = $db->query($sql);

        	if($res){
        		echo "success!</br>";
        	}
        }
	}
}

$db->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Alter Password</title>
    <meta charset="utf-8" />
    <meta name="description" content="Ge Tool Manage" />
    <meta name="keywords" content="ge,manage" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
<?php include 'public/header.html'; ?>
<div class="container">
    
    <?php include 'public/nav.html'; ?>

    <div class="content">
	        <form name="upPwd" id="upPwd" method="post" action="" >
	    	<div class="oneInfo long">
	    		<p>old password:</p>
	    		<input type="password" name="oldPwd" required="required" />
	    	</div>
	    	<div class="oneInfo long">
	    		<p>new password:</p>
	    		<input type="password" name="newPwd" required="required" />
	    	</div>
	    	<div class="oneInfo long">
	    		<p>confirm password:</p>
	    		<input type="password" name="newPwd2" required="required" />
	    	</div>
	    	<div class="sub">
	    		<input type="submit" name="sub" value="Sub" />
	    	</div>
        </form>        
    </div>
</div>

<?php include 'public/footer.html'; ?>

<script src="js/lib/jquery-2.1.4.min.js"></script>
<script src="js/lib/layer/layer.js"></script>
<script src="js/common.js"></script>
<script src="js/form.js"></script>
<script src="js/ajax.js"></script>
<script src="js/core.js"></script>
</body>
</html>