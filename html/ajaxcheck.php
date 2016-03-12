<?php

  $q=$_REQUEST['q'];
  $conn=mysqli_connect("172.25.55.156","test","test","test");
  if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: ".mysqli_connect_error();
  }
$sql="select ghostname from anshumaan_userdata";
$result=mysqli_query($conn, $sql);
$users=mysqli_fetch_array($result, MYSQLI_NUM);
$len=sizeof($users);
$count=0;
for($i=0;$i<$len;$i++){
  if($q==$users[$i])
    $count++;
}
if($count){
  echo "The username is already in use.";
}
else{ echo "This username can be used.";}
?>
