<?php 
if(isset($_POST['add_now'])) {
	 // $std_fullname,$std_username,$std_password,$std_grade,$std_roll,$std_dob,$std_address,$std_district,$std_gender,$std_father,$std_mother,$std_parent_contact
	$teacher_name = $_POST['teacher_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$did = $_POST['did'];
	$cid = $_POST['cid'];
	$qualification = $_POST['qualification'];
	$dob = $_POST['dob'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	
	if($teacher_name=="" or $email=="" or $password=="" or $did=="" or $cid=="" or $qualification=="" or $dob=="" or $address=="" or $contact=="")
	{ 
		echo "<script>alert('please fill form and Add teacher');</script>";
	}
	else
	{
		$add_teacher_done = $ravi->add_teacher($teacher_name,$email,$password,$qualification,$cid,$did,$address,$contact,$dob);
		if($add_teacher_done==true) {
			echo "<script>window.location = 'home.php?ravi=teacher-information';</script>";
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
					<input type="text" placeholder="Enter Full Name" required="" name="teacher_name">
				</div>
				<div class="vali-form">
					<div class="col-md-6 form-group1">
						<label class="control-label">Email</label>
						<input type="email" placeholder="Enter Email" required="" name="email">
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
					<div class="col-md-6 form-group2 ">
						<label class="control-label">Class</label>
						<select name="cid">
							<option>Select Class</option>
							<?php 
							$st_add_class = $ravi->getAllClass();
							while($st_add_class_fetch = $st_add_class->fetch_assoc())
							{
							?>
								<option value="<?php echo $st_add_class_fetch['cid']; ?>"><?php echo $st_add_class_fetch['class_name']."	Level ".$st_add_class_fetch['level']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-md-6 form-group1">
						<label class="control-label">Qualification</label>
						<input type="text" placeholder="Enter Qualification" required="" name="qualification">
					</div>
					<div class="col-md-6 form-group1">
						<label class="control-label">DOB</label>
						<input type="date" placeholder="eg 29 Feb 200" required="" name="dob">
					</div>
					<div class="col-md-6 form-group1">
						<label class="control-label">Address</label>
						<input type="text" placeholder="Enter Address" required="" name="address">
					</div>
					<div class="col-md-6 form-group1">
						<label class="control-label">Contact</label>
						<input type="text" placeholder="Contact Number" required="" name="contact">
					</div>
				</div>
				<div class="col-md-12 form-group button-2">
					<input type="submit" class="btn btn-primary" value="Add teacher" name="add_now">
					<button type="reset" class="btn btn-default">Reset</button>
				</div>
				<div class="clearfix"> </div>
			</form>

			<!---->
		</div>

	</div>
</div>
<!--//forms-->