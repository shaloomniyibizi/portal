<?php 
if(isset($_POST['std_add_now']))
{
	$stud_name = $_POST['stud_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cid = $_POST['cid'];
	$regno = $_POST['regno'];
	$dob = $_POST['dob'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$father = $_POST['father'];
	$mather= $_POST['mather'];
	$contact = $_POST['contact'];
	$paid = $_POST['paid'];
	
	if($stud_name=="" or $email=="" or $password=="" or $cid=="" or $gender=="" or $regno=="" or $dob=="" or $address=="" or $father=="" or $mather=="" or $contact=="" or $paid=="")
	{
		echo "<script>alert('please fill form and Add Student');</script>";
	}
	else
	{
		$add_student_done = $ravi->add_student($stud_name,$email,$password,$cid,$regno,$dob,$address,$gender,$father,$mather,$contact,$paid);
		if($add_student_done==true) {
			echo "<script>window.location = 'home.php?ravi=student-information';</script>";
		}
		else
		{
			echo "<script>alert('oops :( contact with developer');</script>";
		}
	}
}
?>
<div class="forms-main">
	<div class="graph-form">
		<div class="validation-form">
			<h2 align="center"><?php echo strtoupper($_GET['ravi']); ?></h2>
			<form method="post">
				<div class="col-md-12 form-group1 group-mail">
					<label class="control-label">FullName</label>
					<input type="text" placeholder="Full Name" required="" name="stud_name">
				</div>
				<div class="vali-form">
					<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Email</label>
						<input type="text" placeholder="Username" required="" name="email">
					</div>
					<div class="col-md-6 form-group1">
						<label class="control-label">Password</label>
						<input type="text" placeholder="Password" required="" name="password">
					</div>
					<div class="clearfix"> </div>
					<div class="col-md-6 form-group2">
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
					<label class="control-label">gender</label>
						<input type="text" placeholder="eg: Male or Female" required="" name="gender">
					</div>
					<div class="clearfix"> </div>
					<div class="col-md-6 form-group1">
						<label class="control-label">RegNo</label>
						<input type="text" placeholder="Registration number" required="" name="regno">
					</div>
					<div class="col-md-6 form-group1 form-last">
						<label class="control-label">DOB</label>
						<input type="text" placeholder="eg 29 Feb 200" required="" name="dob">
					</div>
					<div class="col-md-6 form-group1">
						<label class="control-label">Address</label>
						<input type="text" placeholder="Address" required="" name="address">
					</div>				
					<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Father</label>
						<input type="text" placeholder="Father Name" required="" name="father">
					</div>
					<div class="col-md-6 form-group1">
						<label class="control-label">Mother</label>
						<input type="text" placeholder="Mother Name" required="" name="mather">
					</div>
					
					<div class="col-md-6 form-group2">
						<label class="control-label">Payment</label>
						<select name="paid">
							<option value="">Make payment</option>
							<option value="1">paid</option>
							<option value="0">not yet paid</option>
						</select>
					</div>
					<div class="col-md-12 form-group1">
						<label class="control-label">Parent Contact</label>
						<input type="text" placeholder="Contact Number" required="" name="contact">
					</div>
				</div>
				<div class="clearfix"> </div>
				<div class="col-md-12 form-group button-2">
					<button type="submit" class="btn btn-primary"name="std_add_now">Add Student</button>
					<button type="reset" class="btn btn-default">Reset</button>
				</div>
				<div class="clearfix"> </div>
			</form>
		</div>
	</div>
</div>
<!--//forms-->