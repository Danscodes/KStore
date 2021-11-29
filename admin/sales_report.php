<!DOCTYPE html>
<?php

 include_once('../functions.php')
?>
<style>

label {
  display: block;
}
input {
  border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
  padding: 3px 5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  width: 190px;
}
</style>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel = "stylesheet" type="text/css" href="../css/create_user.css" />
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <h1>Sales Report</h1>

<div id="tbody">

	<table class="table table-sm table-bordered" id="mydataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                  
                      <th width="35%">Transaction Number</th>
                      <th width="20%">User</th>
                      <th width="20%">Date of Transaction</th>
                      <th width="25%">Total</th>
                   
                    </tr>
                  </thead>
                  <tbody>
               
                  </tbody>
                  <tfoot >
                  <tr>
                  <th></th>
                  <th></th>
                     <th>TOTAL SALES:</th>
                    
                     <th id="total_amt"></th>
                  </tr>
                </tfoot>
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
        "url":"ajax/datatables/get_sales_report.php",
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
        "data":"date_updated",
      },
      {
        "data":"total_cart",
      }
    ],
    "createdRow": function( row, data, dataIndex) {
        console.log(data.total_amount);
       
          $("#total_amt").html(data.total_amount);
       
      },
      "initComplete": function( settings, json ) {
        var api = this.api();
        if(api.rows().count() == 0){

          $("#total_amt").html("0.00");

        }
      }

    });
  }

  function delete_file(val){
	if (confirm('Are you sure you want to delete '+val.trans_id+'?')) {
  // Save it!
  url = "./ajax/delete_file.php";
    
      $.post(url,{trans_id: val.trans_id}, function(data){
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


function accept_order(val){
	if (confirm('Are you sure you want to accept order? '+val.trans_id+'?')) {
  // Save it!
  url = "./ajax/accept_transaction.php";
    
      $.post(url,{trans_id: val.trans_id}, function(data){
		console.log(data);
            if(data == 1){
				window.location.href = "index.php?page=transactions";
    		}else{
     
 			}
});

  console.log('Thing was saved to the database.');
} else {
  // Do nothing!
  console.log('Thing was not saved to the database.');
}
}


function finish_order(val){
	if (confirm('Are you sure you want to accept order? '+val.trans_id+'?')) {
  // Save it!
  url = "./ajax/finish_transaction.php";
    
      $.post(url,{trans_id: val.trans_id,total:val.total_cart}, function(data){
		console.log(data);
            if(data == 1){
				window.location.href = "index.php?page=transactions";
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