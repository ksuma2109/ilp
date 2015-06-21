<div class="admin_design">
	
		<form method="post" action = "#create">
			<button type="submit" >Create a new project</button>
		</form>

		<div class="display">

		</div>
	
	<div class="deadlines">
		<h3 class="heading">Upcoming Deadlines</h3>
			<ul>
				<li></li>
				<li></li>
				<li></li>
			</ul>
	</div>

	<div class="updates">
		<h3 class="heading">Updates</h3>
			<ul>
				<li></li>
				<li></li>
				<li></li>
			</ul>
	</div> 
	<div class = "newproject">
		<a name="create">
			<h3 class="heading">Create a new Project</h3>
		</a>

		<form method="POST" action="<?php echo base_url();?>index.php/admin/create" enctype="multipart/form-data">
			Company: 
			
			<input type="text" name="company" placeholder="Company"></input><br>
			<br>
			Alumnus Contributed: 
			<br>
			First Name: 
			
			<input type="text" name="firstname" placeholder="First Name"></input>
			<br><br>
			Last Name: 
			<input type="text" name="lastname" placeholder="Last Name"></input>
			<br><br>
			Email ID: 
			<input type="text" name="email" placeholder="Email ID"></input>
			<br><br>
			Phone Number: 
			<input type="text" name="phone" placeholder="Phone Number"></input>
			<br><br>
			Problem Title: 
			<input type="text" name="title" size="75" placeholder="Title"></input>
			<br><br>
			Problem Statement: 
			<input type="file" name="probstat"></input>
			<br><br>
			Max. Team Size: 
			<input type="number" name="maxsize" placeholder="1"></input>
			<br><br>
			Deadline: 
			<input type="date" name="deadline" placeholder="yyyy-mm-dd"></input>
			<br><br>
			Open For: <input type="text" name="openfor"></input>
			<br><br>
			<button class="btn" style="color:black;font-size:17px" type="submit" name="sub" value="Submit">
					Submit</button>

		</form>


	</div>
</div>