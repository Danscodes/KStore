<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Waba Mart</title>
	<link rel="stylesheet" type="text/css" href="css/nlogin.css">
</head>
<body>
  <div class="wrapper">
  <div class="left">
      <h3>Waba Mart</h3>   
	  <img src="./waba_logo2.png" alt="Waba Mart">
  </div>
  <div class="right">
    <div class="tabs">
      <ul>
     
        <li class="login_li">Admin Portal</li>
      </ul>
    </div>
    
	<?php echo display_error(); ?>
    <form method="post" action="login.php">
    <div class="login">
      <div class="input_field">
        <input type="text" placeholder="Username" class="input" name="username">
      </div>
      <div class="input_field">
        <input type="password" placeholder="Password" class="input" name="password">
      </div>
      <button class="btn"  type="submit" name="login_btn"><a >Login</a></button>
    </div>
</form>
  </div>
</div>
</body>
</html>
<script>


</script>