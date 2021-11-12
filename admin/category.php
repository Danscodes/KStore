<!DOCTYPE html>
<?php
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
				    		<form method="post" action="add_category.php">

								<?php echo display_error(); ?>

								<div class="input-group">
									<label>Category Name</label>
									<input type="text" name="category_name">
								</div>
								<div class="input-group">
								<button type="submit" class="btn"> Add Category</button>
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
				      <h2>Edit Category</h2>
			    	</div>

				    <div class="modal-body">
				    	<div class="form-body">
						<form action="update_category.php" method="post" enctype="multipart/form-data">

							<div class="input-group" style="display:none">
								<label>Category id</label>
								<input type="text" name="u_category_id" id="u_category_id">
							</div>

							<div class="input-group">
								<label>Category Name</label>
								<input type="text" name="u_category_name" id="u_category_name">
							</div>
							
							<br>
							<div class="input-group">
								<button type="submit" class="btn"> Edit Category</button>
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
				<th width="25%">Category Name</th>
			    <th width="10%">Action</th>
				</tr>
			  </thead>
			  <tbody>
		   
			  </tbody>
			</table>

</div>

<script>
$(document).ready(function() {
	get_category_data();
} );

function get_category_data(){
    $("#mydataTable").DataTable().destroy();
    $("#mydataTable").dataTable({
    
      "ajax":{
        "type":"POST",
        "url":"ajax/datatables/get_category.php",
        "data":"",
        "processing":true
      },
      "columns":[
  
	  {
        "data":"category_name"
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
	document.getElementById("u_category_id").value = val.category_id;
	document.getElementById("u_category_name").value = val.category_name;

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
	if (confirm('Are you sure you want to delete '+val.category_name+'?')) {
  // Save it!
  url = "./ajax/delete_category.php";
    
      $.post(url,{category_id: val.category_id}, function(data){
		console.log(data);
            if(data == 1){
				window.location.href = "index.php?page=category";
    		}else{
     
 			}
});

  console.log('Thing was saved to the database.');
} else {
  // Do nothing!
  console.log('Thing was not saved to the database.');
}
}

</script>
</body>
</html>