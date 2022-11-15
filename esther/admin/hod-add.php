<?php 
if(isset($_POST['add_now'])) {
	$hod_name = $_POST['hod_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$did = $_POST['did'];
	$contact = $_POST['contact'];
	
	if($hod_name=="" or $email=="" or $password=="" or $did=="" or $contact=="")
	{ 
		echo "<script>alert('please fill form and Add hod');</script>";
	}
	else
	{
		$add_hod_done = $ravi->add_hod($hod_name,$email,$password,$did,$contact);
		if($add_hod_done==true) {
			echo "<script>window.location = 'home.php?ravi=hod-information';</script>";
		} else { 
			echo "<script>alert('oops :( contact with developer');</script>";
		}
	}
}
?>

<div class="forms-main">
	<div class="graph-form">
		<div class="validation-form">
			<!---->
			<h2 align="center"><?php echo strtoupper($_GET['ravi']); ?></h2>
			<form method="post">
				<div class="col-md-12 form-group1 group-mail">
					<label class="control-label">FullName</label>
					<input type="text" placeholder="Enter Full Name" required="" name="hod_name">
				</div>
				<div class="vali-form">
					<div class="col-md-6 form-group2">
						<label class="control-label">Email</label><br>
						<input type="text" placeholder="Enter Email" required="" name="email">
					</div>
					<div class="col-md-6 form-group1">
						<label class="control-label">Password</label>
						<input type="password" placeholder="Enter Password" required="" name="password">
					</div>
					<div class="col-md-6 form-group2 ">
						<label class="control-label">Department</label>
						<select name="did">
							<option>Select Department</option>
							<?php 
							$st_add_class = $ravi->getAllDepartment();
							while($st_add_class_fetch = $st_add_class->fetch_assoc())
							{
							?>
								<option value="<?php echo $st_add_class_fetch['did']; ?>"><?php echo $st_add_class_fetch['dept_name']?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-6 form-group1">
						<label class="control-label">Contact</label>
						<input type="text" placeholder="Contact Number" required="" name="contact">
					</div>
				</div>
				<div class="col-md-12 form-group button-2">
					<input type="submit" class="btn btn-primary" value="Add hod" name="add_now">
					<button type="reset" class="btn btn-default">Reset</button>
				</div>
				<div class="clearfix"> </div>
			</form>

			<!---->
		</div>

	</div>
</div>
<!--//forms-->