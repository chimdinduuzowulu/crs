<?php
    include_once '../connection.php';
    $id = $_REQUEST['data'];
    $qry = mysqli_query($con,"Select * from user where id='$id'") or die(mysqli_error($con));
    while($row = mysqli_fetch_array($qry)){
        $id = $row['id'];
        $fname=$row['fname'];
        $lname =$row['lname'];
        $phone = $row['phone'];
        $email = $row['email'];
        $Usertype=$row['type'];
        $passWord=$row['password'];
        
        
    }
?>
<script type="text/javascript" src="Registration.js"></script>
<script type="text/javascript">

</script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<h2 style="text-align: center;">Edit Profile </h2>
<form name="Myform" id="Myform" action="../User/EditProcess.php?id='<?php echo $id;?>'"  method="post" onsubmit="return(Validate());" style="width:70%;margin:auto">
    <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">First Name</span>
                <input type="text" class="form-control" value = "<?php echo $fname?>" name="fname" id="fname" onkeydown="HideError()" aria-label="Username" aria-describedby="basic-addon1">
                <span class="input-group-text" id="basic-addon1">Last Name</span>
                <input type="text" class="form-control" value = "<?php echo $lname?>" placeholder="Last Name" name="lname" id="lname" onkeydown="HideError()" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Phone:</span>
            <input type="text" class="form-control" value = "<?php echo $phone?>" name="mobile" id="mobile" maxlength="10" onkeydown="HideError()" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon3">Email</span>
            <input type="email" class="form-control" value = "<?php echo $email?>" name="email" id="email" onkeydown="HideError()" aria-describedby="basic-addon3">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Password:</span>
            <input type="password" class="form-control" aria-label="With textarea" name="password"readonly=true  value = "<?php echo $passWord?>"/>
            <span class="input-group-text" id="basic-addon2">UserType:</span>
            <input type="text" class="form-control" readonly=true value = "<?php echo $Usertype?>"  aria-label="With textarea" name="usertype" value="Submit"/>
        </div>
        <div class="input-group mb-3">
            <button type="submit" class="btn btn-primary" aria-label="With textarea" name="submit">Update</button>
        </div>
</form>
<div id="error" style="color:red; font-size:16px; font-weight:bold; padding:5px"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
