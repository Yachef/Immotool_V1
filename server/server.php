<?php
require_once('functions.php');
require_once('calcul.php');
session_start();
$username = "";
$email    = "";
$errors = array();
$prelevementsSociaux = 0.172;



// CONNECT TO DATABASE
try{
    $db = mysqli_connect('localhost', 'yachef', 'yacleboss', 'calculermoncashflow',3306);
    //   $db = mysql_connect('localhost:3306', 'yachef', 'yacleboss');
}
catch(Exception $e){
  echo "Problème de connexion à la DB :".$e;
}

// REGISTER USER
if (isset($_REQUEST['reg_user'])) { ///isset($_REQUEST['reg_user'])
  // receive all input $values from the form
  $username = mysqli_real_escape_string($db, $_REQUEST['username']);
  $email = mysqli_real_escape_string($db, $_REQUEST['email']);
  $password_1 = mysqli_real_escape_string($db, $_REQUEST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_REQUEST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);


  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) values ('$username', '$email', '$password_1')";
    mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
    $_SESSION['connected']="connected";
  	$_SESSION['success'] = "You are now logged in";
    $_SESSION['connected'] = "yes";
  	header('location: app.php');
  }
}

// LOGIN USER
if (isset($_REQUEST['login_user']) or isset($_REQUEST['login_user_via_popup'])) {
  $username = mysqli_real_escape_string($db, $_REQUEST['username']);
  $password = mysqli_real_escape_string($db, $_REQUEST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	// $password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
      $_SESSION['connected']="connected";
  	  $_SESSION['success'] = "You are now logged in";
      if(isset($_REQUEST['login_user'])){
        header('location: app.php');
      }else if(isset($_REQUEST['login_user_via_popup'])){
        header('location:result.php');
        $popup = false;
      }
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

// Si le formulaire est bien rempli
if(isset($_REQUEST['simulation'])){
  saveData();
  calcul();
  if(isset($_SESSION['connected'])){ // Bien
    header('location:result-simulateur.php');
  }
}
?>