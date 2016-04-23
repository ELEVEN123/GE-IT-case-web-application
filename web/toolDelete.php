<?php
require_once 'public/connect.php';
require_once 'public/check.php';

if(empty($_GET["No"])){
    $url = "home.php";
    header("location:" .$url);
    exit();
}

$boxId = "toolbox_" .$_COOKIE["boxId"];
$sql = "delete from " .$boxId. " where No = '" .$_GET['No']. "'";
$res = $db->query($sql);

if($res){
  echo "Success!";
}else{
  echo "Failed!";
}
?>