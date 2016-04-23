<script type="text/javascript">
    function back() {
            history.go(-1);
        }    
</script>

<?php

$Id = $_POST["Id"];  
$pwd = $_POST["password"]; 

    if($Id == "" || $pwd == "")  
    {  
    ?>    
        <p>Please enter your id and password!</p>
        <button onclick="back()">back</button>
    <?php      
    }  
    else {
        include 'public/connect.php';
        $sql = "select * from keeper where Id = '" .$Id. "'";
        $result = $db->query($sql);  
        $row = $result->fetch_array();

        if(!$row){
        ?>    
            <p>Please check your Id!</p>
            <button onclick="back()">back</button>
        <?php    
        }elseif($row["pwd"] !== $pwd){
        ?>    
            <p>Please check your Password!</p>
            <button onclick="back()">back</button>
        <?php    
        }else{
            setcookie("userId",$Id,time()+36000);

            if($row["boxUse"]){
                $url = "home.php";
            }else{
                $url = "boxChoose.php";
            }
        ?>    
        	<script type="text/javascript">
        	    window.location.href="<?php echo $url; ?>";
        	</script>
        <?php    
        }
    }
?>