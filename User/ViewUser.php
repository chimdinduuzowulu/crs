
<?php
include_once '../connection.php';
$sql="SELECT * FROM user";
$res=mysqli_query($con,$sql) or die(mysqli_error($con));
?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">          
<style type="text/css">
#viewdata table{
    border:1px solid #aaa;}
#viewdata th{background:#aaa;}
#viewdata td{background:#efefef;}
#viewdata th,td{padding:5px;text-align:left;}
</style>
<table id="viewdata" class="table table-striped">
<tr>
<th>#</th>
<th>First name</th>
<th>Last name</th>
<th>Phone number</th>
<th>Email Address</th>
<th>User Type</th>
<th colspan=2>Action</th>
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
echo $row['phone'];
echo "</td><td>";
echo $row['email'];
echo "</td><td>";
echo $row['type'];
echo "
<td><a class=\"btn btn-danger\" href=\"User/delete.php?data=".$row['id']."\">delete</a></td>
<td><a href=\"#\" class=\"btn btn-primary\" onclick=\"getPage('User/Edit.php?data=".$row['id']."')\">edit</a></td></tr>";
}
mysqli_close($con);
?>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
