<?php

  $q=$_REQUEST['q'];
  $conn=mysqli_connect("172.25.55.156","test","test","test");
  if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: ".mysqli_connect_error();
  }
$sql="select ghostname from anshumaan_userdata";
$result=mysqli_query($conn, $sql);
$count=0;
while($users=mysqli_fetch_array($result, MYSQLI_BOTH)){
  if($q==$users[0])
    $count++;
}
if($count){
  echo "The username is already in use.";
}
else{ echo "This username can be used.";}
?>
