<!DOCTYPE html>
<?php
$conn = mysqli_connect("localhost","root","") or die (mysqli_error($conn));
$db = mysqli_select_db($conn,"db_kstore");
$sql = "SELECT * FROM category";
$q = mysqli_query($conn,$sql) or die (mysqli_error($conn));

 include_once('../functions.php')
?>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel = "stylesheet" type="text/css" href="../css/create_user.css" />
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="button-align">
		<div class="first-modal">
			<!-- Trigger/Open The Modal -->
			<button class="modal-button" href="#myModal1"> + Add Category</button>

				<!-- The Modal -->
				<div id="myModal1" class="modal">

				  <!-- Modal content -->
				  <div class="modal-content">
				  	<div class="modal-header">
				      <span class="close">×</span>
				      <h2>Add Category</h2>
			    	</div>

				    <div class="modal-body">
				    	<div class="form-body">
				    		<form method="post" action="index.php?page=category.php">

								<?php echo display_error(); ?>

								<div class="input-group">
									<label>Category Name</label>
									<input type="text" name="category_name">
								</div>
							
								
								
								<br>
								<div class="input-group">
									<button type="submit" class="btn" name="add_category_btn"> + Add Category</button>
								</div>
							</form>
				    	</div>
				    </div>
				  </div>
				</div>
		</div>
</div>
	<br>
	<hr>
	<br>

	<div id="tbody">
		<table width="100%">
			<tr>
		
			    <th width="35%">Name</th>
			    <th width="10%">Category Update</th>
			</tr>
			<?php
						while($r = mysqli_fetch_assoc($q))
						{
					?> 
			 	<tr>
			 		<td><?php echo $r['name'];?></td>
					
					
					<td> 
						<div class="dropdown">
						  <button class="dropbtn">Action</button>
						  <div class="dropdown-content">
						    <a href = "index.php?page=update&user_id=<?php echo $product_name;?>"> Update </a>
							<a href = "index.php?page=delete&user_id=<?php echo $product_name;?>&product_nam=<?php echo $r['name'];?>"> Delete </a>
						  </div>
						</div>
					</td>
			 	</tr>
			 		<?php 
						}
					?>
		</table>
	</div>

<script>
// Get the button that opens the modal
var btn = document.querySelectorAll("button.modal-button");

// All page modals
var modals = document.querySelectorAll('.modal');

// Get the <span> element that closes the modal
var spans = document.getElementsByClassName("close");

// When the user clicks the button, open the modal
for (var i = 0; i < btn.length; i++) {
 btn[i].onclick = function(e) {
    e.preventDefault();
    modal = document.querySelector(e.target.getAttribute("href"));
    modal.style.display = "block";
 }
}

// When the user clicks on <span> (x), close the modal
for (var i = 0; i < spans.length; i++) {
 spans[i].onclick = function() {
    for (var index in modals) {
      if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
    }
 }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
     for (var index in modals) {
      if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
     }
    }
}
</script>
</body>
</html>