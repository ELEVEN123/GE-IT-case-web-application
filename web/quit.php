<?php

if(isset($_COOKIE['userId'])){
	setcookie("userId","",time()-36000);
}

if(isset($_COOKIE['boxId'])){
	setcookie("boxId","",time()-36000);
}


?>
<script type="text/javascript">
	window.location.href = 'index.php';
</script>