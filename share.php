<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
        <title>
        </title>
		<link rel = "stylesheet" type="text/css" href="../css/create_user.css" />
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
				<div class="modal-body">
				    <div class="form-body">
    					<div class="input-group">
									<label>Product Name</label>
									<input type="text" name="name" value="<?php echo $pname; ?>">
								</div>
								<div class="input-group">
									<label>Product Description</label>
									<input type="text" name="name" value="<?php echo $pdescription; ?>">
								</div>
								<div class="input-group">
									<label>Price</label>
									<input type="text" name="name" value="<?php echo $price; ?>">
								</div>
								<div class="input-group">
									<label>User type</label>
									<select name="user_type" id="user_type" >
										<option value=""></option>
										<option value="admin">Admin</option>
										<option value="user">User</option>
									</select>
						</div>
					</div>
				</dive>
       	<div id="tbody">
		<table width="100%">
			<tr>
				<th width="20%">Product Name</th>
			    <th width="30%">Product Description</th>
			    <th width="20%">Price</th>
			    <th width="20%">Type</th>
			    <th width="30%"></th>
			</tr>
        </div>

		<!-- <tr>
			 		<td><?php echo $r['name'];?></td>
					<td><?php echo $r['username'];?></td>
					<td><?php echo $r['email'];?></td>
					<td><?php echo $r['user_type'];?></td>
					<?php $user_id = $r['user_id']?> -->
					<td> 
						<div class="dropdown">
						  <button class="dropbtn">Action</button>
						  <div class="dropdown-content">
						    <a href = "index.php?page=update&user_id=<?php echo $user_id;?>"> Update </a>
							<a href = "index.php?page=delete&user_id=<?php echo $user_id;?>&name=<?php echo $r['name'];?>"> Delete </a>
						  </div>
						</div>
					</td>
			</tr>

    </body>

</html>