<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<!-- Favicons Start -->
        <link href="../image/school%20logo.png" rel="icon">
        <link href="../image/school%20logo.png" rel="apple-touch-icon">
        <!-- Favicons Stop -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="../css/loginStyle.css">
<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
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
<div id="header"  style="background-color: maroon;">
<div id="logo" style="background-color: maroon;">
    <h1 style="text-align: center; background-color: maroon;">NUCRS | <span style="color:white;">Login</span></h1>  
</div>
</div>

<div id="content">
    <form name="Myform" id="Myform" action="loginProcess.php" method="post" onsubmit="return(Validate());">
   <div id="error" style="color:red; font-size:16px; font-weight:bold; padding:5px"></div>
    <table style="width:100px; margin-left:2em;">
        <thead></thead>
        <tbody>
            <tr>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Email</span>
                    <input type="text" name="uname" id="fname" onkeydown="HideError()" size="20px;" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <!-- <td style="text-align: right;font-size: 20px">Username</td>
                <td style="font-size: 20px"><input type="text" name="uname" id="fname" onkeydown="HideError()" size="20px;"/></td> -->
            </tr>
            <tr>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Password</span>
                    <input type="password" name="password" id="password" onkeydown="HideError()" size="20px;" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                </div>
                <!-- <td style="text-align: right;font-size: 20px">Password</td>
                <td style="font-size: 20px"><input type="password" name="password" id="password" onkeydown="HideError()" size="20px;"/></td> -->
            </tr>
            
            <tr style="display:flex;justify-content:center;align-items:center">
                <!-- <td style="color:#F8F8FF;">dddddddddddddddd</td> -->
                <td style="display:flex;justify-content:center;align-items:center"><input type="submit" name="submit" value="Login" class="btn btn-primary" height="50px" style="padding:12px;width:130px;background-color: maroon;border:none;"/></td>
            </tr>
            <tr>
                <td style="color:green;"><a href="#" onclick="getPage('forgetPassword.php')"><i>forgot password?</i></a></td>
            </tr>
        
        </tbody>
    </table>
</form>

</div>

<div class= "clear"></div>

<div id="footer"  style="background-color: maroon; text-align: center;">
&copy;Nile University Of Nigeria
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
