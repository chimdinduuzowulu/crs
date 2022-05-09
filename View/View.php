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

include_once '../AdminSession.php';
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
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/Registration.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">          
        <link rel="stylesheet" href="../css/indexStyles.css">
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
    border:1px solid #aaa;}
#viewdata th{background:#aaa;}
#viewdata td{background:#efefef;}
#viewdata th,td{padding:15px;text-align:left;}
</style>
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
        <table id="viewdata" class="table table-striped">
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
                echo "<tr>";
                echo "</td><td>";
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
                echo "</tr>";
            }
            mysqli_close($con);
            ?>
        </table>
<!-- </div> -->
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
