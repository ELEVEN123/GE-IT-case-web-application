<?php

$txtRes = "";

if(!isset($_COOKIE["userId"])){
    $url = "_index.html";
    ?>
    <script type="text/javascript">
        window.location.href = "<?php echo $url; ?>"; 
    </script>
    <?php
    exit();
}

if(!empty($_POST["boxId"])){
    $boxId = $_POST['boxId'];
    
    setcookie("boxId",$boxId,time()+36000);
    $_COOKIE["boxId"] = $boxId;
    
    include "public/connect.php";
    $sql = "update keeper set boxUse = '" .$_POST["boxId"]. "' where Id = '" .$_COOKIE["userId"]. "'";
    $db->query($sql);

    $txtRes = "Success";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Choose A Box</title>
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
        <div class="txtRes"><?php echo $txtRes; ?></div>
        
        <form method="post" action="" name="boxChoose">
            <div class="oneInfo long">
                <p>choose a tool box:</p>
    	        <select name="centerId" id="centerId" onchange="setBox(this.value)">
    	        <?php
    	        include "public/connect.php";
    	        $sql = "select * from center";
    	        $res = $db->query($sql);var_dump($res);

    	         while ($row = $res->fetch_array()) {
    	        ?>
    	        	<option value="<?php echo $row["No"]; ?>"><?php echo $row["name"]; ?></option>
    	        <?php } ?>	
    	        </select>
    	        <select name="boxId" id="boxId">
    	        </select>
            </div>    
	        <div class="sub">
	            <input type="submit" value="confim" />
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