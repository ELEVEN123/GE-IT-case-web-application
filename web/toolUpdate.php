<?php
include "public/connect.php";
include "public/check.php";

$txtRes = "";

if(empty($_GET["No"])){
    $url = "home.php";
    header("location:" .$url);
    exit();
}

if(!empty($_POST["number"])){

    $boxId = "toolbox_" .$_COOKIE["boxId"];
    $sql = "update " .$boxId. " set
           number = '" .$_POST["number"]. "', 
           status = '" .$_POST["status"]. "', 
           intro = '" .$_POST["intro"]. "' 
           where No = '" .$_GET["No"]. "'";
    
    $res = $db->query($sql);

    if($res){
      $txtRes = "Success!";
    }else{
      die('error:' .$db->connect_error. "</br>sql:" .$sql);
    }
}

$boxId = "toolbox_" .$_COOKIE["boxId"];
$sql = "select * from " .$boxId. " where No = '" .$_GET["No"]. "'";
$res = $db->query($sql);
$row = $res->fetch_array();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Tool </title>
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
        <form method="post" name="toolUpdate" action="">
            <div class="oneInfo">
                <p>Type:</p>
                <p class="info"><?php echo $row["type"]; ?></p>
            </div>    
            <div class="oneInfo">
                <p>number:</p>
                <input type="number" name="number" min="0" step="1" value="<?php echo $row["number"]; ?>" required="required" />
            </div>
            <div class="oneInfo">        
                <p>status:</p>
                <input type="text" name="status" value="<?php echo $row["status"]; ?>" />
            </div>
            <div class="oneInfo">    
                <p>intro:</p>
                <textarea name="intro"  rows="" cols=""></textarea>
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