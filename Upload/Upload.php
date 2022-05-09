<?php
session_start();
$path = ($_SESSION['type'] == 'Admin') ? "./" : "../";
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<h2 style="text-align: center;">User Complaint form </h2>
<form action= "<?php echo $path ?>Upload/UploadProcess.php" method="post" enctype="multipart/form-data" style="width:70%;margin:auto">
        <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="First Name" name="fname" id="fname" onkeydown="HideError()" aria-label="Username" aria-describedby="basic-addon1">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control" placeholder="Last Name" name="lname" id="lname" onkeydown="HideError()" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">tel:</span>
            <input type="text" class="form-control" placeholder="Phone Number" name="mobile" id="mobile" maxlength="10" onkeydown="HideError()" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon3">Email</span>
            <input type="email" class="form-control" name="email" id="email" onkeydown="HideError()" aria-describedby="basic-addon3">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">User Type</span>
             <select name="type" id="type" onkeydown="HideError()" class="form-select">
                        <option value="crime" selected>Select Crime Category</option>
                        <option value="Theft">Theft</option>
                        <option value="Sexual">Sexual Assault</option>
                        <option value="Others" >Others</option>
            </select>
        </div>
        <div class="input-group mb-3">
            <textarea type="text" name="info" id="info" onkeydown="HideError()" class="form-control" placeholder="Complaint" aria-label="Complaint"></textarea>
            <span class="input-group-text">Input Statement</span>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Date</span>
            <input  type="date" name="date" id="date" onkeydown="HideError()" class="form-control" aria-label="With textarea" />
            <button type="submit" class="btn btn-primary" aria-label="With textarea" name="submit" value="Submit">Submit</button>
        </div>

</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>