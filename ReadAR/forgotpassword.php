<?php 
include("config.php");
$error = "";    
$message = "";    

if(isset($_POST['send'])) {

        
        if (!$_POST['email']) {
            
            $error .= "An email address is required<br>";            
        }     

        if ($error != "") {

            $error = "<p>There were error(s) in your form:</p>".$error;
            
        }

        else {


          $email = mysqli_real_escape_string($db,$_POST['email']);

          $sql = "SELECT * FROM users WHERE email= '$email'";
          $result = mysqli_query($db,$sql);                      
          $row = mysqli_fetch_array($result);


          if (empty($row)) {

            $error .= "Email not found<br>";            
          }

          require("email.php");

          $email = new email();

          $token = $email->generateToken(20);

          $sql2  = "INSERT INTO passwordTokens (id, token) VALUES ('".$row['id']."', '$token')";
          $result2 = mysqli_query($db,$sql2);                      


          if ($result2) {

            $details = array();
            $details["subject"] = "Password reset request on ReadAr";
            $details["to"] = $row["email"];
            $details["fromName"] = "ReadAr Office";
            $details["fromEmail"] = "ahmetsafasezgin@gmail.com";

            $template = $email->resetPasswordTemplate();
            $template = str_replace("{token}", $token, $template);
            $details["body"] = $template;

            $email->sendEmail($details);


            if (!$error) {

            $message .= "Please check your email address to reset your password.<br>";  

            }                    

          } else {

            $error .= "User with this token is not found<br>";            
          }          
   }                     
 }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">

    <style type="text/css">
        
        .container {
            text-align: center;
            width: 400px;
            margin-top: 230px;
        }

        html { 
              background: url(background.jpg) no-repeat center center fixed; 
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
    }
        body {
            background: none;
        }

        h1{
            color: white;
        } 

        #loginLink {

          color: white;
          text-decoration: underline;
          font-style: italic;
        }        
    </style>
  </head>
  <body>
    <div class="container">

        <h1 class="logo">ReadAr</h1>

            <div id="error"> <?php if($error!="") {

              echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';} ?> </div>    

       <div id="message"> <?php if($message!="") {

                echo '<div class="alert alert-success" role="alert">'.$message.'</div>';} ?> </div>                     

      <div class="card card-block"> <h4 class="card-title">Forgot your Password?</h4> <p class="card-text">Enter your email address and we'll help you reset your password.</p></div>         

             <form method="post">      
            <fieldset class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Your Email">
            </fieldset>

            <fieldset class="form-group">
                <input class="btn btn-success" type="submit" name="send" value="Send">               
            </fieldset>  
                 <a id="loginLink" href="login.php" >Click to Login!</a>

            </form>
    </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>    

  </body>
</html>
