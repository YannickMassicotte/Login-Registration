<?php

session_start();
//Initialising variables 
$username = "";
$email = "";
$errors = array();

//Connect to database
$db = mysqli_connect('localhost','root', '','login_registration') or die("could not connect to database");

// isset($_POST['email']);
// isset($_POST['username']);
// isset($_POST['password_1']);
// isset($_POST['password_2']);

//*******REGISTER USERS*******//
if(isset($_POST['reg_user'])){

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    //Form validation logic
    if(empty($email)) {array_push($errors, "Email is required");};
    if(empty($username)) {array_push($errors, "Username is required");};
    if(empty($password_1)) {array_push($errors, "Password is required");};
    if(empty($password_2)) {array_push($errors, "Password is required");};

    if($password_1 != $password_2) {array_push($errors, "Passwords do not match");};

    //Check id username already exists in database
    $user_check_query = "SELECT * FROM users WHERE username = '$username' or email ='$email' LIMIT 1;";

    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);

    if($user) {
        if($user['username'] === $username){array_push($errors, "Username already exists");};
        if($user['email'] === $email){array_push($errors, "Email already exists");};
    }

    //Register user if no error
    if(count($errors) === 0){
        // Encrypt password
        $password = md5($password_1);

        //Send data to database
        $registration_query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password');";

        mysqli_query($db, $registration_query);

        // Setup Session variables
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now registered...please log in !";

        //Reload to Login Page
        header("Location: login.php");
    }
}
//*******END OF REGISTER USERS*******//

//*******LOG USERS*******//
if(isset($_POST['log_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']); 

    if(empty($username)) {array_push($errors, "Username is required");};
    if(empty($password)) {array_push($errors, "Password is required");};

    if(count($errors) == 0){
        // Encrypt login password to match with encrypted registration password
        $password = md5($password);
        $password_query = "SELECT * FROM users WHERE username = '$username' AND password='$password';";
        $results = mysqli_query($db, $password_query);
        
        if(mysqli_num_rows($results)){
                // Setup Session variables
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";

                //Reload to Login Page
                header("Location: index.php");
        }else {
            array_push($errors, "Wrong User/Password Combination... try again !");
        }
    }
}
//*******END OF LOG USERS*******//