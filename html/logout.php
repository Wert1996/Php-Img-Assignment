<?php
session_start();
?>
<!doctype html>
<html>
<head>
</head>
<body>
</body>
</html>
<?php
session_unset();
session_destroy();
echo "<script>window.location.assign('login.php');</script>";
?>
