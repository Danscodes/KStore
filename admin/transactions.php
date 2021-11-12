<!DOCTYPE html>
<?php

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
    <h1>TRANSACTIONS</h1>

<div id="tbody">

	<table class="table table-sm table-bordered" id="mydataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                  
                      <th width="35%">Transaction Number</th>
                      <th width="20%">User</th>
                      <th width="25%">status</th>
                      <th width="20%">Action</th>
             
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
        "url":"ajax/datatables/get_transactions.php",
        "data":"",
        "processing":true
      },
      "columns":[
      {
        "data":"trans_id"
      },
	  {
        "data":"user_name",
      },
      {
        "data":"status",
      },
      {
        "mRender": function(data,type,row){
            return "<div class='dropdown'> <button class='dropbtn'>Action</button><div class='dropdown-content'><a>Accept</><a>Cancel</></div></div>";
        }
      },
      ]
    });
  }

  function delete_file(val){
	if (confirm('Are you sure you want to delete '+val.filename+'?')) {
  // Save it!
  url = "./ajax/delete_file.php";
    
      $.post(url,{file_id: val.f_id,fname:val.filename}, function(data){
		console.log(data);
            if(data == 1){
				window.location.href = "index.php?page=files";
    		}else{
     
 			}
});

  console.log('Thing was saved to the database.');
} else {
  // Do nothing!
  console.log('Thing was not saved to the database.');
}
}

  
function selected_id(val){
	
	var modals = document.querySelectorAll('.modal');
	modal = document.querySelector('#UpdateFile');
	modal.style.display = "block";
	let str = val.filename;
const myArr = str.split(".");
	document.getElementById("file_path").value = val.file_path;
	document.getElementById("file_id").value = val.f_id;
	document.getElementById("file_name").value = val.filename;
	document.getElementById("file_newname").value = myArr[0];

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


</script>
</body>
</html>