<div class="loginwrap">
	<img class="logo" src="<?php echo asset_url();?>images/sarclogo.png">
	<center>
		<h3>Login here to register for Industrial Learning Programme 2015</h3>
	</center>

	<form action="<?php echo base_url();?>index.php/student/login" method="POST">
		<div class="logininside">
			<div class="inputwrap">
				<div class="fl">

					<label>LDAP ID: </label>
				</div>
				<div class="fl">

					<input type="text" class="form-control" name="ldap_id" placeholder="Enter LDAP ID">	
				</div>
			</div>
			<div class="inputwrap">
				<div class="fl">
					<label>Password: </label>
				</div>
				<div class="fl">
					<input type="password" class="form-control" name='ldap_pass' placeholder="Enter Password">
				</div>
			</div>
			<div class="inputwarp">
				<center>
					<button class="btn" style="color:black;font-size:17px" type="submit" name="sub" value="Submit">
					Submit</button>
				</center>
			</div>
		</div>
	</form>
</div>
