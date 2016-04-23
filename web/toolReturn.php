<?php
include 'public/check.php'; 
include "public/connect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Return Tool</title>
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
		    <table id="toolRet">
		        <tr>
		            <th style="display:none;">No</th>
		            <th scope="col">engineer ID</th>
		            <th scope="col">type</th>
		            <th scope="col">time</th>
		            <th scope="col">number</th>
		            <th scope="col">id</th>
		            <th></th>
		        </tr>
		    <?php

		    $loanId = "toolloan_" .$_COOKIE["boxId"];
		    $sql = "select * from " .$loanId. " where isEnd = false order by No ASC";
		    $res = $db->query($sql);

		    while($row = $res->fetch_array()){
		    ?>
		        <tr id="record-<?php echo $row["No"]; ?>">
		            <td id="<?php echo "No-" .$row["No"]; ?>" style="display:none;"><?php echo $row["No"]; ?></td>
		            <td id="<?php echo "loanId-" .$row["No"]; ?>"><?php echo $row["loanId"]; ?></td>
		            <td id="<?php echo "type-" .$row["No"]; ?>"><?php echo $row["type"]; ?></td>
		            <td id="<?php echo "loanTime-" .$row["No"]; ?>"><?php echo $row["loanTime"]; ?></td>
		            <td>
		                <?php
		                 //get tde number of tool need be return
		                $allNum = explode(",", $row["retNum"]);
		                $sum = 0;

		                foreach ($allNum as $value) {
		                    $sum = $sum + (int)$value;
		                }

		                $max = $row["loanNum"] - $sum;
		                ?> 
		                
		                <input type="number" name="retNum"  id="<?php echo "retNum-" .$row["No"]; ?>"
		                min="0" max="<?php echo $max; ?>" step="1"
		                value="<?php echo $max; ?>" required="required" />
		            </td>
		            <td>
		                <input type="text" name="retId" id="<?php echo "retId-" .$row["No"]; ?>" 
		                value="<?php echo $row["loanId"]; ?>" required="required" />
		            </td>
		            <td>
		                <button onclick="ajaxRet_confirm(<?php echo $row["No"]; ?>)">sub</button>
		            </td>
		        </tr>    
		    <?php } ?>    
		    </table>
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