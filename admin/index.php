<?php $load = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';?>
<?php
include('../functions.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel = "stylesheet" type="text/css" href="../css/responsive.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<title>Waba Mart</title>
<?php 
	 if (!isAdmin()) {
	  $_SESSION['msg'] = "You must log in first";
	  header('location: ../login.php');
	}
	if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['user']);
  header("location: ../login.php");
}
?>
</head>
<body>
	<div class="header">
		<div class="navbar">
			<ul>
			<li <?php if($load == 'product') {echo 'class="active"';} ?>><a href="index.php?page=product"><i class='bx bx-product-alt'></i>Product</a></li>
			<li <?php if($load == 'category') {echo 'class="active"';} ?>><a href="index.php?page=category"><i class='bx bx-product-alt'></i>Category</a></li>
		   
			<li <?php if($load == 'transactions') {echo 'class="active"';} ?>><a href="index.php?page=transactions"><i class='bx bx-product-alt'></i>Transactions</a></li>
		   
		      <li <?php if($load == 'users') {echo 'class="active"';} ?>><a href="index.php?page=users"><i class='bx bx-file-blank'></i>Users</a></li>
		    

				<li style="float: right;"><small>
                  <i style="color: #888;"><?php if (isset($_SESSION['success'])) : ?>
                            <?php 
                              echo $_SESSION['success']; 
                              unset($_SESSION['success']);
                            ?>
                          <?php endif ?></i>
              </small><img src="../images/user.png" >
                   <?php  if (isset($_SESSION['user'])) : ?>
                      <strong><?php echo $_SESSION['user']['name']; ?></strong>
                      <small>
                        <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
                        | <a href="../index.php?logout='1'" style="color: white;"> <i class='bx bx-power-off' ></i>Logout</a>
                      </small>
                    <?php endif ?></li>
			</ul>
		</div>
	</div>

	<div class="row">
	

		<div class="col-12 col-s-12 content">
			<?php
	          switch ($load) {
	            case 'product':
	            require_once('product.php');
	            break;
				case 'category':
					require_once('category.php');
					break;
	            case 'transactions':
	              require_once('transactions.php');
	              break;
	            case 'users':
	              require_once('users.php');
	              break;
	             case 'update':
	              require_once('update_user.php');
	              break;
	            case 'delete':
	              require_once('delete_user.php');
	              break; 
				  case 'cart_details':
					require_once('cart_details.php');
					break;   
					
	            default:
	              require_once('product.php');
	              break;  
	          	}
			?>
		</div>
	</div>

</body>
</html>