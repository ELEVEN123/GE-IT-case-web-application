<?php
include 'public/check.php'; 
include "public/connect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Loan Tool</title>
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
        <form method="post" action="toolLoan_.php" id="loanForm" >
	        <div class="oneInfo">
	            <p>Tool:</p>
	            <select name="type" id="type">
		            <?php

		            $boxId = "toolbox_" .$_COOKIE["boxId"];
		            $sql = "select * from " .$boxId. " where number > 0";
		            $res = $db->query($sql);

		            while ($row = $res->fetch_array()) {

		            ?>
	                <option value = "<?php echo $row["type"]; ?>"><?php echo $row["type"]; ?></option>
	                <?php } ?>
	            </select> 
	        </div>
	        <div class="oneInfo">
	            <p>Number:</p>
	            <input type="number" name="loanNum" id="loanNum" min="0" max="" step="1" required="required" />
	        </div>
	        <div class="oneInfo">
	            <p>engineerID:</p>
	            <input type="text" name="loanId" id="loanId" required="required" />
	        </div>
	        <div class="sub">
	            <input type="button" name="sub" value="Submit" onclick="ajaxLoan();"  />  
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