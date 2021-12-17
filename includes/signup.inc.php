<?php
if(isset($_POST['g-recaptcha-response'])) {
    // RECAPTCHA SETTINGS
    $captcha = $_POST['g-recaptcha-response'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $key = '6LfQ2lodAAAAAMQIlF4zR2qHRSE6ZN-ydJ4wv6AN';
    $url = 'https://www.google.com/recaptcha/api/siteverify';
 
    // RECAPTCH RESPONSE
    $recaptcha_response = file_get_contents($url.'?secret='.$key.'&response='.$captcha.'&remoteip='.$ip);
    $data = json_decode($recaptcha_response);
 
    if(isset($data->success) &&  $data->success === true) {
    }
    else {
       die('Your account has been logged as a spammer, you cannot continue!');
    }
  }
  // use \Controllers\SignupContr;
  include '../vendor/autoload.php';
if (isset($_POST['submit'])) { // Form has been submitted.

    // Grab the data! :)

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $confpass = $_POST['confirm_password'];
    $fname = $_POST['fName'];
    $lname = $_POST['lName'];
    $email = $_POST['email'];

    // instantiate Signup Controller Class! :)
    $signup = new \Controllers\SignupContr($user, $pass, $confpass, $fname, $lname, $email);
    // Running error handlers and user signup! :)
    $signup->signupUser();
    // Go back to FP! :)
    header("Location: ../login.php?error=none");
} 