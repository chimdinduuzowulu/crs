<!-- style for search table starts-->
<style type="text/css">
#viewdata table{
    border:1px solid #aaa;
}
#viewdata th{background:#aaa;}
#viewdata td{background:#efefef;}
#viewdata th,td{padding:15px;text-align:left;}
</style>
<!-- style for search table stops-->

<?php

// databse connection for search button
$con = mysqli_connect("localhost","root","","doc_db");

$output = "";

if(isset($_POST['search'])) {
    
    $input = $_POST['input'];
    
    if (!empty($input)) {
        
        $query = "SELECT * FROM upload WHERE id LIKE '%$input'";
        
        $res = mysqli_query($con,$query);
        
        $output = "
           <table class='table table-bordered table-striped' id='viewdata'>
           <tr>
           <th>ID</th>
           <th>First Name</th>
           <th>Last Name</th>
           <th>Phone No.</th>
           <th>Crime Type</th>
           <th>Content</th>
           <th>date</th>
           </tr>
        ";
        
        if (mysqli_num_rows($res) < 1) {
            $output .="
                 <tr>
                 <td colspan='6' class='text-center'>No data found</td>
                 </tr>
            ";
        }
        else{
            while ($row = mysqli_fetch_array($res)) {
                
                $output .= "
                    <tr>
                      <td>".$row['id']."</td>
                      <td>".$row['fname']."</td>
                      <td>".$row['lname']."</td>
                      <td>".$row['mobile']."</td>
                      <td>".$row['type']."</td>
                      <td>".$row['info']."</td>
                      <td>".$row['date']."</td>
                ";
            }
        }
    }
}

include_once '../connection.php';
$sql="SELECT * FROM upload";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));

include_once 'NormalSession.php';
    $uname = $_SESSION['email'];
    $password = $_SESSION['password'];
    $chekUser = mysqli_query($con,"Select * from user where email= '$uname' AND password = '$password'") or die(mysqli_error($con));
    $row = mysqli_fetch_array($chekUser);
    $fname = $row['fname'];
    $lname = $row['lname'];
    
    $username = $fname . " ".$lname;

?>
<html>
<head>
      <title>List of Complaints</title>
        <link rel="stylesheet" href="../css/index.css">
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/Registration.js"></script>
        <script>
            function getPage(url){
                $('#content').hide(1000,function(){
                $('#content').load(url);
                $('#content').show(1000,function(){});
                });
            }
        </script>
<!-- style for uploads table starts-->
<style type="text/css">
#viewdata table{
    border:1px solid #aaa;
}
#viewdata th{background:#aaa;}
#viewdata td{background:#efefef;}
#viewdata th,td{padding:15px;text-align:left;}
</style>
<!-- style for uploads table stops-->
    <div id="wrap">
            <div id="header" style="background-color: maroon;">
                <div id="logo">
                    <h1 style="text-align: center;color: white;"><span><img src="../image/school%20logo.png" alt="logo" height="100px"/></span>Nile University Crime Report System</h1>  
                </div>
                </div>
            <div id="menu">
                <ul>
                <li><a href="../logout.php" style="margin-left: 600px;">Logout</a></li>
                
                <li style="margin-top: 5px;margin-left: 25px;;">You login as : <?php echo $username?></li>
                
                </ul>
            </div>
            <div id="main">
            <div id="content">
            <form method="post">
                <div class="row">
                    <div class="col-md-9">
                        <input type="text" name="input" class="form-control" placeholder="Search...">
                    </div>
                    <div class="col-md-3">
                        <input type="submit" name="search" class="btn btn-info" value="Search">
                    </div>
                </div>
            </form>
            <br>
            <?php
                echo $output;
                ?>
<!-- table data from of complaints from upload -->
<table id="viewdata">
<tr>
<th>Id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Phone No.</th>
<th>Crime Type</th>
<th>Content</th>
<th>Date</th>
</tr>
<?php
while($row=mysqli_fetch_assoc($res))
{
echo "<tr><td>";
echo $row['id'];
echo "</td><td>";
echo $row['fname'];
echo "</td><td>";
echo $row['lname'];
echo "</td><td>";
echo $row['mobile'];
echo "</td><td>";
echo $row['type'];
echo "</td><td>";
echo $row['info'];
echo "</td><td>";
echo $row['date'];
}
mysqli_close($con);
?>
</table>
<!-- end of table -->
            </div>
            <div id="side">
            <h3>Dashboard</h3>
            <table style="border: 1px black solid;background-color: #607B8B;">
                <tr>
                    <td><li><a href="index.php" onclick="getPage('index.php')">Home</a></li></td>
                </tr>

            </table>
            </div>
        
            <!-- this clear class is for special purpose.
            this is for to clear the "float property" of 
            the previous element, it will prevent footer
            to float -->
            <div class= "clear"></div>
        </div>
            <div id="footer" style="background-color: maroon; text-align: center;">
            &copy;Nile University Of Nigeria
            </div>
        </div>


<script>
	$(document).ready(function(){
		$('.del_doc').click(function(e){
			e.preventDefault();
			var loc = $(this).attr('href');
			$.ajax({
				url:loc,
				error:err=>{
					alert("An error occured");
					console.log(err)
				},
				success:function(resp){
					if(resp == 1){
						alert("File successfully deleted");
						getPage('<?php echo $path ?>View/View.php')
					}
				}
			})
		})
	})
</script>
