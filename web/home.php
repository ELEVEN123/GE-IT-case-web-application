<?php
include 'public/check.php'; 
include "public/connect.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
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
		<table>
			<tr>
				<th style="display:none;">No</th>
				<th>Type</th>
				<th>number</th>
				<th>status</th>
				<th>intro</th>
				<th>operate</th>
			</tr>
			<?php
			
			$boxId = "toolbox_" .$_COOKIE["boxId"];
			$sql = "select * from " .$boxId;
			$res = $db->query($sql);

			while($row = $res->fetch_array()){
			?>
			<tr id="tool-<?php echo $row["No"]; ?>">	
				<td style="display:none;"><?php echo $row["No"]; ?></td>
				<td><?php echo $row["type"]; ?></td>
				<td><?php echo $row["number"]; ?></td>
				<td><?php echo $row["status"]; ?></td>
				<td><?php echo $row["intro"]; ?></td>
				<td><a href="toolUpdate.php?No=<?php echo $row["No"]; ?>">update</a>
				    <a href="//toolDelete.php?No=<?php echo $row["No"]; ?>"
				     onclick="return ajaxDel(<?php echo $row["No"]; ?>);">delete</a></td>
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