<?php
    include_once 'StudentSession.php';
    $uname = $_SESSION['email'];
    $password = $_SESSION['password'];
    $chekUser = mysqli_query($con,"Select * from user where email= '$uname' AND password = '$password'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($chekUser);
    $fname = $row['fname'];
    $lname = $row['lname'];

    $username = $fname . " ".$lname;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>NUCRS | Home Page</title>    
        <!-- Favicons Start -->
        <link href="../image/school%20logo.png" rel="icon">
        <link href="../image/school%20logo.png" rel="apple-touch-icon">
        <!-- Favicons Stop -->   
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/indexStyles.css">
        <script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="../js/Registration.js"></script>
        <script src="https://kit.fontawesome.com/439a1fb029.js" crossorigin="anonymous"></script>
        <script>
            function getPage(url){
                $('#content').hide(1000,function(){
                
                $('#content').load(url);
                $('#content').show(1000,function(){});
                });
            }
        </script>
    </head>
    <body>
            <div id="wrap">
            <div id="header">
                <div id="logo">
                    <img src="../image/school%20logo.png" alt="logo"/>                    
                </div>
                <div id="Nile">
                <h1>Nile University Crime Report System</h1>                   
                </div>
            </div>
            <!--  -->
            <!--  -->
            <div id="main">
                <div id="side">
                <h3>Dashboard</h3>
                <!-- style="border: 1px black solid;background-color: #607B8B;" -->
                <table >
                    <tr>
                        <td><li><i class="fas fa-file-code"></i><a href="#" onclick="getPage('../Upload/Upload.php')">Add New file</a></li></td>
                    </tr>
                     <tr>
                        <td><li><i class="fas fa-users"></i><a href="#" onclick="getPage('ViewUser.php')">My Profile</a></li></td>
                    </tr>
                    <tr>
                        <td>
                              <li><i class="fas fa-sign-out-alt"></i><a href="../logout.php">Logout</a></li>
                        </td>
                    </tr>
                </table>
                </div>
             </div>
              <!--  -->
            <div id="content">
                <h1>Welcome to NILE's crime report system <span style="color: maroon;">Student</span>  Page </h1>
                <li style="margin-top: 12px;margin-left: 5em;font-weight:bolder;">Welcome, <?php echo $username?></li>
                <ul style="margin-left: 5em; margin-top: 2em;">
                    <li>Please Upload Complaints to the system and be rest assured we will look into it</li>
                </ul>
            </div>
            <!--  -->
            <div class= "clear"></div>
            <!-- end of wrap div -->
         </div>
         <!-- footer -->
            <div id="footer" style="background-color: maroon; text-align: center;">
            &copy;Nile University Of Nigeria
            </div>
        </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
