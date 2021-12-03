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
                      <th width="25%">Total</th>
                      <th width="25%">Date updated</th>
                      <th width="25%">Status</th>
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
        "data":"total_cart",
      },
      {
        "data":"date_updated",
      },
      {
        "data":"status",
      },
      {
        "mRender": function(data,type,row){
          if(row.status=="requested"){
            return "<div class='dropdown'> <button class='dropbtn'>Action</button><div class='dropdown-content'><a  onclick='accept_order("+JSON.stringify(row)+")'>Accept</a><a  onclick='cancel_transaction("+JSON.stringify(row)+")'>Cancel</a><a  href='index.php?page=cart_details&transaction_id="+JSON.stringify(row.trans_id)+"&user_id="+JSON.stringify(row.user_id)+"'>View Order</a></div></div>";
     
          }else if(row.status=="for delivery"){
            return "<div class='dropdown'> <button class='dropbtn'>Action</button><div class='dropdown-content'><a  onclick='finish_order("+JSON.stringify(row)+")'>Finish</a><a  href='index.php?page=cart_details&transaction_id="+JSON.stringify(row.trans_id)+"&user_id="+JSON.stringify(row.user_id)+"'>View Order</a></div></div>";
     
          }else if(row.status=="finished"){
            return "<div class='dropdown'> <button class='dropbtn'>Action</button><div class='dropdown-content'><a  href='index.php?page=cart_details&transaction_id="+JSON.stringify(row.trans_id)+"&user_id="+JSON.stringify(row.user_id)+"'>View Order</a></div></div>";
     
          }

          // return "<div class='dropdown'> <button class='dropbtn'>Action</button><div class='dropdown-content'><a  onclick='finish_order("+JSON.stringify(row)+")'>Finish</a><a  onclick='accept_order("+JSON.stringify(row)+")'>Accept</a><a>Cancel</a><a  href='index.php?page=cart_details&transaction_id="+JSON.stringify(row.trans_id)+"&user_id="+JSON.stringify(row.user_id)+"'>View Order</a></div></div>";
     
       
       }
      },
      ]
    });
  }

  function cancel_transaction(val){
	if (confirm('Are you sure you want to cancel '+val.trans_id+'?')) {
  // Save it!
  url = "./ajax/cancel_transaction.php";
    
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

function cancel_order(val){
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