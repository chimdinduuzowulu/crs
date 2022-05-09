<?php
        include_once '../connection.php'; 
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        require_once '../vendor2/autoload.php';       
    if(isset($_POST['submit'])){
        $fname = htmlentities(stripslashes(mysqli_real_escape_string($con,$_POST['fname'])));
        $lname = htmlentities(stripslashes(mysqli_real_escape_string($con,$_POST['lname'])));
        $phone = htmlentities(stripslashes(mysqli_real_escape_string($con,$_POST['mobile'])));
        $email = htmlentities(stripslashes(mysqli_real_escape_string($con,$_POST['email'])));
        $type = htmlentities(stripslashes(mysqli_real_escape_string($con,$_POST['type'])));
        $info = htmlentities(stripslashes(mysqli_real_escape_string($con,$_POST['info'])));
        $date = htmlentities(stripslashes(mysqli_real_escape_string($con,$_POST['date'])));
        // mailing
            $contact_message =$info ; 
            $complainer = $fname." ".$lname; 
            $mail = new PHPMailer;
            $mail->SMTPDebug = 0;
            $mail->isSMTP(); 
            $mail->Host = "smtp.gmail.com"; 
            $mail->Port = 587; // TLS only
            $mail->SMTPSecure =PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPAuth = true;
            $mail->Username = 'chimdindu73@gmail.com'; // email
            $mail->Password = 'Chimdindu.73.09030428141.'; // password
            $mail->setFrom("chimdindu73@gmail.com" ,"chimdindu"); // From email and name
            $mail->addAddress('chimdindu73@gmail.com', 'chimdindu'); // to email and name
            $mail->isHTML(true);
            $mail->Subject = 'Complaint submission: '.$contact_message;
            $mail->Body='<p align=center font-family=fantasy;line-height=45.8px;> Message: '.$contact_message.' <br> By: '.$complainer.'</p>';
            $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
            
        if($mail->send()){
                $insertqry = mysqli_query($con,"Insert into upload (fname,lname,mobile,email,type,info,date) values('$fname','$lname','$mobile','$email','$type','$info','$date')") or die(mysqli_error($con));
                    header('location:Success.php');}       
            else{
                    echo "<script> alert('Mail server not responding';)</script>";
                }  
        
        
        
    }
?>

