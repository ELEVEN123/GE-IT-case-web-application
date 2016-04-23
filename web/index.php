<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
    <meta charset="utf-8" />
    <meta name="description" content="Ge Tool Manage" />
    <meta name="keywords" content="ge,manage" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
<div class="header"><h1> Sign In </h1></div>
<div class="container">
    <div class="contact-form">
        <div class="signin">
            <form method="post" action="log.php" name="login">
                <p>Username:</p>
                <input type="text" class="user" name="Id" placeholder="Enter Here" required="required" />
                <p>Password:</p>
                <input type="password" class="pass" name="password" placeholder="Password" required="required" />
                <input type="submit" value="sign in" />
            </form>
        </div>
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