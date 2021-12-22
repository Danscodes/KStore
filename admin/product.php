<!DOCTYPE html>
<?php
   include '../db_connect.php';
$sql2 = "SELECT * FROM category";
$q2 = mysqli_query($conn,$sql2) or die (mysqli_error($conn));
$sql3 = "SELECT * FROM category";
$q3= mysqli_query($conn,$sql3) or die (mysqli_error($conn));

 include_once('../functions.php')
?>
<html>
<style>


</style>
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
			<button class="modal-button" href="#myModal1"> + Add Product</button>

				<!-- The Modal -->
				<div id="myModal1" class="modal">

				  <!-- Modal content -->
				  <div class="modal-content">
				  	<div class="modal-header">
				      <span class="close">×</span>
				      <h2>Add Product</h2>
			    	</div>
				    <div class="modal-body">
				    	<div class="form-body">
						<form action="add_product.php" method="post" enctype="multipart/form-data">

								<?php echo display_error(); ?>

								<div class="input-group">
									<label>Product Name</label>
									<input type="text" name="productname">
								</div>
								<div>
								<img id="blah" src="#" alt="your image" style="width: 100%; /* or any custom size */
							height: 100%; 
							object-fit: contain;"/>
								<input type='file'  name="fileToUpload" id="fileToUpload" onchange="readURL(this);" />
															
								</div>
								<div class="input-group">
									<label>Price</label>
									<input type="text" name="price" >
								</div>

								<div class="input-group">
									<label>Stocks</label>
									<input type="text" name="stocks" >
								</div>
								<div class="custom-select">
								<label>Select Category</label>
								<select name="category" id="category" style="  height: 40px;
									width: 93%;
									padding: 5px 10px;
									background: white;
									font-size: 16px;
									border-radius: 5px;
									border: 1px solid gray;">
								<?php
									while($row = mysqli_fetch_assoc($q2))
									{
								?> 
								<option value="<?php echo $row['category_id']?>"><?php echo  $row['name'];?></option>
								<?php
								}
								?>
								</select>
							
								</div>
								<br>
								<div class="input-group">
									<button type="submit" class="btn" name="add_product_btn"> + Add Product</button>
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

	<div class="first-modal">
			<!-- Trigger/Open The Modal -->
	
				<!-- The update Modal -->
				<div id="UpdateFile" class="modal">

				  <!-- Modal content -->
				  <div class="modal-content">
				  	<div class="modal-header">
				      <span class="close">×</span>
				      <h2>Edit Product</h2>
			    	</div>

				    <div class="modal-body">
				    	<div class="form-body">
						<form action="update_product.php" method="post" enctype="multipart/form-data">

							<div class="input-group" style="display:none">
								<label>Product id</label>
								<input type="text" name="u_product_id" id="u_product_id">
							</div>

							<div class="input-group">
								<label>Product Name</label>
								<input type="text" name="u_productname" id="u_productname">
							</div>

								<div>
								<img id="update_img" src="#" alt="your image" style="width: 100%; /* or any custom size */
							height: 100%; 
							object-fit: contain;"/>
								<input type='file'  name="u_fileToUpload" id="u_fileToUpload" onchange="u_readURL(this);" />
															
								</div>


							<div class="input-group">
								<label>Price</label>
								<input type="text" name="u_price"  id="u_price">
							</div>

							<div class="input-group">
									<label>Stocks</label>
									<input type="text" name="u_stocks" id="u_stocks">
							</div>

							<div  class="input-group" >
							<label>Select Category</label>
							<select name="u_category" id="u_category" style="  height: 40px;
									width: 93%;
									padding: 5px 10px;
									background: white;
									font-size: 16px;
									border-radius: 5px;
									border: 1px solid gray;">
							<?php
								while($row = mysqli_fetch_assoc($q3))
								{
							?> 
							<option value="<?php echo $row['category_id']?>"><?php echo  $row['name'];?></option>
							<?php
							}
							?>
							</select>

							</div>
							<br>
							<div class="input-group">
								<button type="submit" class="btn"> Edit Product</button>
							</div>
						</form>
				    	</div>
				    </div>
				  </div>
				</div>
		</div>
	<div id="tbody">

<table class="table table-sm table-bordered" id="mydataTable" width="100%" cellspacing="0">
			  <thead>
				<tr>
				<th width="25%">Product Name</th>
				<th width="25%">Category</th>
			    <th width="25%">Price</th>
				<th width="15%">Stocks</th>
		
			    <th width="10%">Action</th>
				</tr>
			  </thead>
			  <tbody>
		   
			  </tbody>
			</table>

</div>

<script>
$(document).ready(function() {
	get_products_data();
} );

function get_products_data(){
    $("#mydataTable").DataTable().destroy();
    $("#mydataTable").dataTable({
    
      "ajax":{
        "type":"POST",
        "url":"ajax/datatables/get_products.php",
        "data":"",
        "processing":true
      },
      "columns":[
      {
        "data":"product_name"
      },
	  {
        "data":"category_name"
      },
	  
	  {
        "data":"price",
      },
	  {
        "data":"stocks"
      },
      {
        "mRender": function(data,type,row){
            return "<div class='dropdown'> <button class='dropbtn'>Action</button><div class='dropdown-content'><a onclick='selected_id("+JSON.stringify(row)+")'>Edit</a><a onclick='delete_file("+JSON.stringify(row)+")'>Delete</a></div></div>";
        }
      },
      ]
    });
  }

    
function selected_id(val){
	var modals = document.querySelectorAll('.modal');
	modal = document.querySelector('#UpdateFile');
	modal.style.display = "block";
	document.getElementById("u_product_id").value = val.product_id;
	document.getElementById("u_productname").value = val.product_name;
	document.getElementById("u_price").value = val.price;
	document.getElementById("u_category").value = val.category_id;
	document.getElementById("u_stocks").value = val.stocks;
	document.getElementById("update_img").src = val.file_path;
}


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



function delete_file(val){
	if (confirm('Are you sure you want to delete '+val.product_name+'?')) {
  // Save it!
  url = "./ajax/delete_product.php";
    
      $.post(url,{product_id: val.product_id}, function(data){
		console.log(data);
            if(data == 1){
				window.location.href = "index.php?page=products";
    		}else{
     
 			}
});

  console.log('Thing was saved to the database.');
} else {
  // Do nothing!
  console.log('Thing was not saved to the database.');
}
}

function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width("100%")
                        .height("100%");
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		function u_readURL(input) {
			
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#update_img')
                        .attr('src', e.target.result)
						.width("100%")
                        .height("100%");                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
</body>
</html>