<?php
session_start();

// initializing variables
$id    = "";
$username = "";
$email    = "";
$full_name = "";
$phone    = "";
$password_1 = "";
$password_2 = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'tolet');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $full_name = mysqli_real_escape_string($db, $_POST['full_name']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required!"); }
  if (empty($email)) { array_push($errors, "Email is required!"); }
  if (empty($full_name)) { array_push($errors, "Full Name is required!"); }
  if (empty($phone)) { array_push($errors, "Phone is required!"); }
  if (empty($password_1)) { array_push($errors, "Password is required!"); }
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

  $query = "INSERT INTO users (username, email, password, full_name, phone) 
    VALUES('$username', '$email', '$password', '$full_name', '$phone')";
  mysqli_query($db, $query);
  $_SESSION['username'] = $username;
  $_SESSION['success'] = "You are now logged in";
  header('location: index.php');
}
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
array_push($errors, "Username is required!");
  }
  if (empty($password)) {
array_push($errors, "Password is required!");
  }

  if (count($errors) == 0) {
$password = md5($password);
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$results = mysqli_query($db, $query);
if (mysqli_num_rows($results) == 1) {
  $_SESSION['username'] = $username;
  $_SESSION['id'] = $id;
  $_SESSION['success'] = "You are now logged in";
  header('location: index.php');
}else {
array_push($errors, "Wrong username/password combination");
}
  }
}

// UPDATE USER
if (isset($_POST['update'])) {
$id = $_POST['id'];
$full_name = $_POST['full_name'];
$phone = $_POST['phone'];

mysqli_query($db, "UPDATE users SET full_name=$full_name, phone=$phone WHERE id=$id");
$_SESSION['message'] = "Profile updated!"; 
header('location: my-profile.php');
}

// ADD APARTMENT
if (isset($_POST['add_apartment'])) {
  // receive all input values from the form
  $title = $_POST['title'];
  $bedrooms = $_POST['bedrooms'];
  $bathrooms = $_POST['bathrooms'];
  $belcony = $_POST['belcony'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $area = $_POST['area'];
  $post_code = $_POST['post_code'];
  $price = $_POST['price'];
  $description = $_POST['description'];

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($title)) { array_push($errors, "Title is required!"); }
  if (empty($bedrooms)) { array_push($errors, "Bedroom is required!"); }
  if (empty($bathrooms)) { array_push($errors, "Bathroom is required!"); }
  if (empty($belcony)) { array_push($errors, "Belcony is required!"); }
  if (empty($address)) { array_push($errors, "Address is required!"); }
  if (empty($city)) { array_push($errors, "City is required!"); }
  if (empty($area)) { array_push($errors, "Area is required!"); }
  if (empty($post_code)) { array_push($errors, "Post Code is required!"); }
  if (empty($price)) { array_push($errors, "Price is required!"); }
  if (empty($description)) { array_push($errors, "Description is required!"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  $query = "INSERT INTO apartments (title,bedrooms,bathrooms,belcony,address,city,area,post_code,price,description) 
    VALUES('$title','$bedrooms','$bathrooms','$belcony','$address','$city','$area','$post_code','$price','$description')";
  mysqli_query($db, $query);
  $_SESSION['success'] = "Apartment Added";
  header('location: index.php');
}
}

// EDIT APARTMENT
if (isset($_POST['edit_apartment'])) {
  $aprt_id = $_POST['aprt_id'];
  $title = $_POST['title'];
  $bedrooms = $_POST['bedrooms'];
  $bathrooms = $_POST['bathrooms'];
  $belcony = $_POST['belcony'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $area = $_POST['area'];
  $post_code = $_POST['post_code'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($title)) { array_push($errors, "Title is required!"); }
  if (empty($bedrooms)) { array_push($errors, "Bedroom is required!"); }
  if (empty($bathrooms)) { array_push($errors, "Bathroom is required!"); }
  if (empty($belcony)) { array_push($errors, "Belcony is required!"); }
  if (empty($address)) { array_push($errors, "Address is required!"); }
  if (empty($city)) { array_push($errors, "City is required!"); }
  if (empty($area)) { array_push($errors, "Area is required!"); }
  if (empty($post_code)) { array_push($errors, "Post Code is required!"); }
  if (empty($price)) { array_push($errors, "Price is required!"); }
  if (empty($description)) { array_push($errors, "Description is required!"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
	mysqli_query($db, "UPDATE apartments SET title=$title, bedrooms=$bedrooms, bathrooms=$bathrooms, belcony=$belcony, address=$address, city=$city, area=$area, post_code=$post_code, price=$price, description=$description WHERE aprt_id=$aprt_id");
	$_SESSION['message'] = "Apartment updated!"; 
	header('location: edit-apartments.php?aprt_id='.$aprt_id);
  }
}

// Remove APARTMENT


?>
