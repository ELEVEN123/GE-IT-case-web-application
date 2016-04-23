<?php
include "public/connect.php";
include "public/check.php";

$txtRes = "";

if(!empty($_POST["type"])){


    $txtRes = "";
    
    $boxId = "toolbox_" .$_COOKIE["boxId"];
    $sql = "insert into " .$boxId. 
           "(type, number, status, intro) values ('"
           .$_POST["type"]. "', '" .$_POST["number"]. "', '"
           .$_POST["status"]. "', '" .$_POST["intro"]. "')";
    
    $res = $db->query($sql);

    if($res){
        $txtRes = "Success!";
    }else{

        die('error:' .$db->connect_error. "</br>sql:" .$sql);
    }

    $db->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Tool </title>
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
        
        <form method="post" name="toolAdd" action="">
	        <div class="oneInfo">
	            <p class="text">Type:</p>
	            <select name="type">
	                <option value="test1">test1</option>
	                <option value="test2">test2</option>
	            </select>
	        </div>
	        <div class="oneInfo">
	            <p>number:</p>
	            <input type="number" name="number" min="0" step="1" required="required" />
	        </div>
	        <div class="oneInfo">        
	            <p>status:</p>
	            <input type="text" name="status" value="normal" />
	        </div>
	        <div class="oneInfo">    
	            <p>intro:</p>
	            <textarea name="intro"  rows="4" cols="35" placeholder="enter some information about the tool" >
	            </textarea>
	        </div>
	        <div class="sub">   
	            <input type="submit" value="submit" name="btnSubmit" />
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