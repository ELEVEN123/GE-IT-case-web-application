<?php
//set char encode
mb_internal_encoding("utf-8");
mb_http_input("utf-8");
mb_http_output("utf-8");
mb_regex_encoding("utf-8");

//connect datebase
include 'public/connect.php';
include 'public/check.php';

//get current time
$retTime = date("Y-m-d h:i");
$retNum = $_POST["retNum"];
$retId = $_POST["retId"];
$No =  $_POST["No"];
$type = $_POST["type"];


$recordId = "toolloan_" .$_COOKIE["boxId"];
$sql = "select * from " .$recordId. " where No = '" .$No. "'";

$res = $db->query($sql);
$row = $res->fetch_array();

if($row['isEnd'] == true){
 	exit("error:Already return！");
}

$newNum = $row["retNum"]. $retNum. ",";
$newId = $row["retId"]. $retId. ",";
$newTime = $row["retTime"]. $retTime. ","; 

$sql = "update " .$recordId. " set 
        retTime = '" .$newTime. "' 
        ,retId = '" .$newId. "' 
        ,retNum = '" .$newNum. "'
        where No = '" .$No. "'";
$db->query($sql);

//updata the number of tools we have
$sum = $retNum;

$allNum = explode(",", $row["retNum"]);

foreach ($allNum as $value) {
	$sum = $sum + (int)$value;
}

if($sum == $row["loanNum"]){

	$sql = "update " .$recordId. " set isEnd = true  where No = '" .$No. "'";
	$db->query($sql);

	$status = "normal";
}else{
	$status = "loanSome";
}

$boxId = "toolbox_" .$_COOKIE["boxId"];
$sql = "select * from " .$boxId. " where type = '" .$type. "'";

$res = $db->query($sql);
$row = $res->fetch_array();

$number = $row["number"] + $retNum;

$sql = "update " .$boxId. " set 
       status = '" .$status. "',
       number = '" .$number. "' 
       where type ='" .$type. "'"; 

$res = $db->query($sql);

if($res){
  echo "Success!";
}else{
  echo "Fail!";
  echo $sql;
}

$db->close();
?>