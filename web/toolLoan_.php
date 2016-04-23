<?php
//set char encode
mb_internal_encoding("utf-8");
mb_http_input("utf-8");
mb_http_output("utf-8");
mb_regex_encoding("utf-8");

//connect datebase
include 'public/connect.php';
include 'public/check.php';

$type = $_POST["type"];
$loanNum = $_POST["loanNum"];
$loanId = $_POST["loanId"];

$boxId = "toolbox_" .$_COOKIE["boxId"];
$sql = "select * from " .$boxId. " where type = '" .$type. "'";

$res = $db->query($sql);
$row = $res->fetch_array();

$number = $row["number"] - $_POST["loanNum"];

if($number < 0){
	exit("please enter right number!");
}

//updata the number of tools we have
$sql = "update " .$boxId. " set 
        status = 'loan',
        number = '" .$number. "' 
        where type = '" .$type. "'";

$db->query($sql);

//get current time and set data to database(toolloan)
$loanTime = date("Y-m-d h:i");

$recordId = "toolloan_" .$_COOKIE["boxId"];
$sql = "insert into " .$recordId. " 
        (type, loanNum, loanTime, loanId, isEnd) values ('" 
   	    .$type. "', '" .$loanNum. "', '" .$loanTime. "', '" .$loanId. "', false)";

$res = $db->query($sql);

if($res){
	echo "Success!";
	//echo "</br><a href='tool.php'>Back</a>";
}else{
	echo "false!";
}

$db->close();
?>