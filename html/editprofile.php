<?php
      ?>
<!doctype html>
<html>
<head>
<title>
Edit your Disguise!
</title>
</head>
<body background="<?php echo $back; ?>">
<div id="header"><h2><a href="profile.php">View Profile</a></h2><h2><a href='logout.php'>Logout</a></h2></div>
              <center><img src="<?php echo $img_src ?>"  id='dp' /><br><br>
             <table><form method="post" action="editprofile.php" enctype='multipart/form-data'><br><br>
            <tr><td> Upload Profile Photo</td><td><input type="file" name="profile_pic" id="pp"/></td></tr>
             <tr><td>Upload Background Photo</td><td><input type="file" name="back_pic" id="bp" /></td></tr>
             <tr><td>Ghost Name</td><td><input type="text" name="eg" value="<?php echo $ghostname ?>" required/></td></tr>
             <tr><td>Hobbies and Interests</td><td><input type="text" name="ehobbies" value="<?php echo $hobbies ?>"/></td></tr>
             <tr><td>Personal Life</td><td><input type="text" name="eper" value="<?php echo $per; ?>"/></td></tr>
             <tr><td>Favorite Horror Stories</td><td><input type="text" name="efs" value="<?php echo $fs; ?>"/></td></tr>
             <tr><center><input type="submit" /></center></tr></form></center>
             <div id="footer"></div>
             </body></html>
             <?php
             function test_input($data) {
                 $data = trim($data);
                   $data = stripslashes($data);
                     $data = htmlspecialchars($data);
                       return $data;
             }
             if($_SERVER["REQUEST_METHOD"]=="POST"){
$conn=mysqli_connect("172.25.55.156", "test", "test","test");
     if($conn->connect_error){
     die("Connection failed: " .$conn->connect_error);}
     $sql="select * from anshumaan_userdata where id=$_COOKIE[id]"; 
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
     $rank=$row[rank];
     $ghostname=$row[ghostname];
     $hobbies=$row[hobbies];
    $per=$row[personal_life];
    $fs=$row[favorite_stories]; 
    if(empty($_POST[eg]))
          {
            echo "Ghostname cannot be empty.";$valid=0;
            }
            else
            {$eg=test_input($_POST[eg]);$valid=1;
              if(!preg_match("/^[a-zA-Z ]*$/",$eg))
                {
                    echo "Ghostname must only contain letters or whitespace"; $valid=0;
                }
             }
      $hb=test_input($_POST[ehobbies]);
      $eper=test_input($_POST[eper]);
      $efs=test_input($_POST[efs]);
      if($valid){
       $file_name = $_FILES['profile_pic']['name'];
       $file_size= $_FILES['profile_pic']['size'];
       $file_tmp= $_FILES['profile_pic']['tmp_name'];
       $file_type= $_FILES['profile_pic']['type'];
       $file_ext=strtolower(end(explode('.',$_FILES['profile_pic']['name'])));
       $extensions= array('jpeg','jpg','png');
       if(in_array($file_ext,$extensions)===false){ 
       $errors[]="extensions not allowed,please choose a JPEG or PNG file.";
       }
      if($file_size>5000000){
           $errors[]="File size must be lesser";
      }
      if(empty($errors)==true){
           move_uploaded_file($file_tmp, realpath(dirname(__FILE__)) . '/../images/profile/' . $_COOKIE[id].'.'.$file_ext);

       }

       $file_name1 = $_FILES['back_pic']['name'];
      $file_size1= $_FILES['back_pic']['size'];
        $file_tmp1= $_FILES['back_pic']['tmp_name'];
         $file_type1= $_FILES['back_pic']['type'];
         $file_ext1=strtolower(end(explode('.',$_FILES['back_pic']['name'])));

        $extensions1= array('jpeg','jpg','png');
        if(in_array($file_ext1,$extensions1)===false){ 
        $errors1[]="extensions not allowed,please choose a JPEG or PNG file.";
        }
        if($file_size1>5000000){
        $errors1[]="File size must be lesser";
        }
        if(empty($errors1)==true){
         move_uploaded_file($file_tmp1, realpath(dirname(__FILE__)) . '/../images/back/' . $_COOKIE[id].'.'.$file_ext1);
          }
      $sql1="update anshumaan_userdata set ghostname='$eg',hobbies='$hb',personal_life='$eper',favorite_stories='$efs' where id='$_COOKIE[id]'";
     if(mysqli_query($conn, $sql1))
{
      echo "Your profile was successfully edited.";
      echo "<script>window.location.assign('profile.php');</script>";
}
      else{echo mysqli_error($conn);}
      }
}
?>


