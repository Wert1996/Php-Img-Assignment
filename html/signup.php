<!doctype html>
<html>
<head>

  <title>

      Sign Up!!

        </title>

          <link rel="icon" href=""/>

            <link rel="stylesheet" href="../css/signup.css" />

            </head>

            <body>

              <div id="header"></div>

                  <div id="container">

                    <center><form action="signup.php" onsubmit="return f()">

                        <input type="text" name="firstname" placeholder="First Name" /><br><br>

                            <input type="text" name="lastname" placeholder="Last Name" /><br><br>

                                <input type="text" name="ghostname" placeholder="Ghost Name (User Name :P)" /><br><br>

                                    <input type="text" name="password" placeholder="Pass Phrase" /><br><br>

                                        <input type="text" name="cpassword" placeholder="Confirm Pass Phrase" /><br><br>

                                            <select name="gender" ><option value="Male" >Male</option><option value="Female">Female</option></select><br><br>

                                                <input type="text" name="email" placeholder="Valid Email" /><br><br>

                                                    <input type="date" name="dob" /><br><br><br><br>

                                                        <input type="image" alt="submit" src="https://www.capitalpridecenter.org/wp-content/uploads/2013/07/join-button.png" /><br><br><br>

                                                          </form><p id="formerror"></p></center>

                                                          </div>
                                                          <script src="../js/formval.js"></script>

                                                          </body>

                                                          </html>
                                                          <?php
                                                          $server="172.25.55.156";
                                                          $user="test";
                                                          $upass="test";
                                                          $dbname="test";
                                                          $conn=mysqli_connect($server,$user,$upass,$dbname);
                                                          if($conn->connect_error){
                                                            die("Connection failed: " . $conn->connect_error);
                                                          }
    
                                                          $x="insert into anshumaan_userdata values(".$_POST['firstname'].",".$_POST['lastname'].",".$_POST['ghostname'].",".$_POST['password'].",".$_POST['lastname'].",".$_POST['gender'].",".$_POST['email'].",".$_POST['dob'].")";               
if($conn->query($x) === TRUE){echo "<span style='color:white'>Your account has been created successfully</span>" ; }
else echo "<span style='color:white;'>Your account could not be created.</span>";
?>
