<?php 
session_start();

// connect to database
include 'db_connect.php';

// variable declaration
$username = "";
$email    = "";
$name    = "";
$user_type = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}


if (isset($_POST['add_product_btn'])) {
	product();
}


if (isset($_POST['add_category_btn'])) {
	add_category();
}


// Add Product 
function product(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $product_name, $price;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$product_name    =  e($_POST['productname']);
	$price    =  e($_POST['price']);
	$category    =  e($_POST['category']);
	$stocks    =  e($_POST['stocks']);

	// form validation: ensure that the form is correctly filled
	if (empty($product_name)) { 
		array_push($errors, "Product Name is required"); 
	}
	if (empty($price)) { 
		array_push($errors, "Enter Price"); 
	}
	// if (empty($password_1)) { 
	// 	array_push($errors, "Password is required"); 
	// }
	// if ($password_1 != $password_2) {
	// 	array_push($errors, "The two passwords do not match");
	// }

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$query = "INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `price` ,`file_path`,`qty`) VALUES (NULL, '
		$category', '$product_name', '$price', '$target_file','$stocks');";
		mysqli_query($db, $query);
		header('location: index.php?page=product');	

	}
}
// Add Product 
function add_category(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $category_name;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$category_name    =  e($_POST['category_name']);

	// form validation: ensure that the form is correctly filled
	if (empty($category_name)) { 
		array_push($errors, "Category Name is required"); 
	}
	// if (empty($password_1)) { 
	// 	array_push($errors, "Password is required"); 
	// }
	// if ($password_1 != $password_2) {
	// 	array_push($errors, "The two passwords do not match");
	// }

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$query = "INSERT INTO `category` (`category_id`, `name`) VALUES (NULL, '$category_name')";
		mysqli_query($db, $query);
		header('location: index.php?page=category');	

	}
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email, $name;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$name    =  e($_POST['name']);
	$role = e($_POST['user_type']);
	$email = e($_POST['email']);
	$pass    =  e($_POST['password_1']);
	$contact_no    =  e($_POST['contact_no']);
	$age    =  e($_POST['age']);
	$gender    =  e($_POST['gender']);
	$address    =  e($_POST['address']);
	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($name)) { 
		array_push($errors, "Name is required"); 
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($pass);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (username, name, email, user_type, password,contact_no,age,sex,address) 
					  VALUES('$username', '$name', '$email', '$user_type', '$password','$contact_no','$age','$gender','$address')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: ../admin/index.php?page=users');
		}else{
			$query = "INSERT INTO users (username, name, email, user_type, password,contact_no,age,sex,address) 
					  VALUES('$username', '$name', '$email', '$user_type', '$password','$contact_no','$age','$gender','$address')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE user_id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}


// return user array from their id
function check_remaining_stock($qty,$product_id){
	global $db;
	$query = "SELECT * FROM product WHERE qty >= '$qty' and product_id='$product_id'";
	$result = mysqli_query($db, $query);

	$count = mysqli_num_rows($result);
	return $count;
}


// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$pass = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($pass)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($pass);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/index.php');		  
			}else{
				array_push($errors, "Unauthorized access. Admin only");
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}


// escape string
function get_total_price($database,$user_id){
	$sql = "SELECT * FROM `cart` WHERE user_id='$user_id' and status !='finished'";
	$q = mysqli_query($database,$sql) or die (mysqli_error($database));
	$total_price =0;
	while($r = mysqli_fetch_assoc($q))
    {
        $product_id= $r["product_id"];
       
        $sql2 = "SELECT * FROM product where product_id = '$product_id'";
        $q2 = mysqli_query($database,$sql2) or die (mysqli_error($database));
        $price = 0;
                    while($row = mysqli_fetch_assoc($q2))
                    {
                        $price =  $row['price'];
                        $response["price"] = $row['price'];
                    }
		$total_price +=$price*$r["quantity"];
    }

	return number_format((float)$total_price, 2);
}
