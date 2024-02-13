
<?php

// this for database connection
include('./include/connection.php');

//this is for PHPMailer connection

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if(isset($_POST["send"])){

    //storing data from the forms 
    $frusername = $_POST['name'];
    $fremail = $_POST['email'];
    $frpassword = $_POST['password'];
    $frhashpassword = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $frconfpassword = $_POST['confpassword'];

    //checking  the data for whether the username and user email are matching with database
    $ckquery = "select * from usertable where user_name = '$frusername' and user_email = '$fremail'";
    $result = mysqli_query($con,$ckquery);
    $row = mysqli_num_rows($result);
    //if the query show data then data in the form is already exists in the database
    if($row>0)
    {
        echo "<script>alert('The Username and email are already exists')</script>";
    }
    //checks whether the data is matches
    elseif($frpassword!=$frconfpassword)
    {
        echo "<script>alert('Password Do not match')</script>";
    }
    //execute the code whether the both condition fails
    else
    {
        
        //insert query to insert data

        $insert_query = "insert into usertable (user_name,user_email,user_password) values('$frusername','$fremail','$frhashpassword')";
        $sql_execute = mysqli_query($con,$insert_query);
        if(!$sql_execute){
            die(mysqli_error($con));
        }

        // PHPMailer codes to send a mail
        $mail = new PHPMailer(true);

        $mail->isSMTP();                    //isSMTP(): Set mailer to use SMTP.
        $mail->Host = 'smtp.gmail.com';     //Host: Specifies the servers.
        $mail->SMTPAuth = true;             //SMTPAuth: Enable/Disable SMTP Authentication.
        $mail->Username = 'your_email_id@gmail.com';    //Username: Specify the username.
        $mail->Password = 'your 2 step verification password/App password of gmail';            //Password: use the 2 step verification password which in the app password
        $mail->SMTPSecure = 'tls';                        //SMTPSecure: Specify encryption technique. Accepted values ‘tls’ or ‘ssl’.
        $mail->Port = 587;                 //Specify the TCP port which is to be connected. if you need to use the port 587 then the SMTPSecure should be 'tls',for 'ssl' the port is 465 

        $mail->setFrom('your_email_id@gmail.com');      // Set sender of the mail

        $mail->addAddress($_POST["email"]);               // Add a recipient

        $mail->isHTML(true);                //isHTML(): If passed true, sets the email format to HTML.

        $mail->Subject = 'welcome '. $_POST['name'];
        $mail->Body = '<p>We are happy to welcome you as our member '. $_POST['name'] .',We will make sure it will be a wonder experience with us.</p><br><strong><i>Thank you </i></strong>';

        $mail->send();

        echo 
        "
        <script>
            alert('Sign in Successfully');
            document.location.href = 'index.php';
        </script>
        ";
    }
}

?>