<!DOCTYPE html>
<html>
    <head>
        <title>
        </title>
    </head>
    <body>
    <div class="input-group">
									<label>Product Name</label>
									<input type="text" name="username" value="<?php echo $username; ?>">
								</div>
								<div class="input-group">
									<label>Product Description</label>
									<input type="text" name="name" value="<?php echo $name; ?>">
								</div>
								<div class="input-group">
									<label>Address</label>
									<input type="email" name="email" value="<?php echo $email; ?>">
								</div>
								<div class="input-group">
									<label>User type</label>
									<select name="user_type" id="user_type" >
										<option value=""></option>
										<option value="admin">Admin</option>
										<option value="user">User</option>
									</select>
								</div>
        <div id="tbody">
		<table width="100%">
			<tr>
				<th width="20%">Product Name</th>
			    <th width="30%">Product Description</th>
			    <th width="20%">Address</th>
			    <th width="20%">Type</th>
			    <th width="30%"></th>
			</tr>
        </div>

    </body>

</html>