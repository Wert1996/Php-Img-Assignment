<?php
session_start();
$conn=mysqli_connect("172.25.55.156", "test", "test","test");
     if($conn->connect_error){
     die("Connection failed: " .$conn->connect_error);}
     $sql="select * from anshumaan_userdata where ghostname='$_SESSION[n]'"; 
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
     $rank=$row["rank"];
     $img_src=$row["img_src"];                                                                                                                                                  $ghostname=$row["ghostname"];
     $hobbies=$row["hobbies"];
     $sc=$row["stories_contributed"];
                                                                                                                                                                                $sr=$row["stories_read"];
                                                                                                                                                                                $back=$row["back_img"]; 
      $eg=$_POST[eg];
      $hb=$_POST[ehobbies];;
      $eper=$_POST[eper];
      $efs=$_POST[efs];
      move_uploaded_file($_FILES["back_pic"]["tmp_name"], dirname(__FILE__)."/images/".$_SESSION[n]."cover.jpg");

         move_uploaded_file($_FILES["profile_pic"]["tmp_name"], dirname(__FILE__)."/images/".$user."profile.jpg");

      $sql1="update anshumaan_userdata set ghostname='$eg',hobbies='$hb',personal_life='$eper',favorite_stories='$efs' where ghostname='$_SESSION[n]'";
     if(! mysqli_query($conn, $sql1))
{
      echo mysqli_error($conn);}
      mysqli_close($conn);
      ?>
<!doctype html>
<html>
<head>
<title>
Edit your Disguise!
</title>
</head>
<body background="<?php echo $back; ?>">
              <center><img src="<?php echo $img_src ?>"  id='dp' />
             <form method="post" action="editprofile.php">
             <input type="file" name="profile_pic" id="pp"/>
             <input type="file" name="back_pic" id="bp" />
             <div class='fill'><div class='label'>Rank</div><div class='alabel'><?php echo $rank; ?></div></div>
             <div class='fill'><div class='label'>Ghost Name</div><div class='alabel'><input type="text" name="eg" value="<?php echo $ghostname?>" required/></div></div><div class='fill'><div class='label'>Hobbies and Interests</div><div class='alabel'><input type="text" name="ehobbies" value="<?php echo $hobbies ?>"/></div></div> <div class='fill'><div class='label'>Stories Contributed</div><div class='alabel'><?php echo $sc; ?></div></div>
     <div class='fill'><div class='label'>Stories Read</div><div class='alabel'><?php echo $sr ?></div></div>
<div class='fill'><div class='label'>Personal Life</div><div class='alabel'><input type="text" name="eper" value="<?php echo $per; ?>"/></div></div>
   <div class='fill'><div class='label'>Favorite Horror Stories</div><div class='alabel'><input type="text" name="efs" value="<?php echo $fs; ?>"/></div></div><input type="submit" /></form></center></body></html>
