<?php
?>
<!doctype html>
<html>
<head>
</head>
<body>
</body>
</html>
<?php
setcookie('id',"",time()-3600);
echo "<script>window.location.assign('login.php');</script>";
?>
