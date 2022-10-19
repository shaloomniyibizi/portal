<?php 

 $student_id = $_GET['sid'];
 $edit_student_info = $ravi->edit_studentid($student_id);
	$edit_student_display = $edit_student_info->fetch_assoc();


if(isset($_POST['up_student']))
{
	$up_fullname = $_POST['up_fullname'];
	$up_address = $_POST['up_address'];
	$up_email = $_POST['up_email'];
	$up_dob = $_POST['up_dob'];
	$up_father = $_POST['up_father'];
	$up_mather = $_POST['up_mather'];
	$up_contact = $_POST['up_contact'];
	$cid = $_POST['cid'];
	$gender = $_POST['gender'];
	$paid = $_POST['paid'];
	
	$update_done = $ravi->update_student_info($up_fullname,$up_address,$up_email,$up_dob,$up_father,$up_mather,$up_contact,$cid,$gender,$student_id,$paid);
	if($update_done==true)
	{
		echo "<script>window.location='home.php?ravi=student-information';</script>";
	}
	else
	{
		echo "<script>alert('Cant update Information');</script>";
	}
	

}

?>
<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="index.html">Home</a></li>
			<li class="active">
				<?php if(isset($_GET['ravi'])){ echo strtoupper($page=$_GET['ravi']); } ?>
			</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h2 class="inner-tittle">
			<?php echo strtoupper($_GET['ravi']); ?>
		</h2>

		<div class="grid-1">
			<div class="form-body">
				<form class="form-horizontal" method="post">
					<div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Registration Number</label>
						<div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail3" name="up_regno" value="<?php echo $edit_student_display['regno']; ?>"> </div>
					</div>
					<div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
						<div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail3" name="up_fullname" value="<?php echo $edit_student_display['stud_name']; ?>"> </div>
					</div>
					<div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
						<div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail3" name="up_address" value="<?php echo $edit_student_display['address']; ?>"> </div>
					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_email" value="<?php echo $edit_student_display['email']; ?>"> </div>
					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">DOB</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_dob" value="<?php echo $edit_student_display['dob']; ?>"> </div>
					</div>
					<div class="form-group"> 
						<label for="address" class="col-sm-2 control-label">Father</label>
						<div class="col-sm-9"> 
							<input type="text" class="form-control" name="up_father" value="<?php echo $edit_student_display['father']; ?>"> 
						</div>
					</div>
					<div class="form-group"> 
						<label for="address" class="col-sm-2 control-label">Mather</label>
						<div class="col-sm-9"> 
							<input type="text" class="form-control" name="up_mather" value="<?php echo $edit_student_display['mather']; ?>"> 
						</div>
					</div>
					<div class="form-group"> 
						<label for="address" class="col-sm-2 control-label">Contact</label>
						<div class="col-sm-9"> 
							<input type="text" class="form-control" name="up_contact" value="<?php echo $edit_student_display['contact']; ?>"> 
						</div>
					</div>	
					<div class="form-group2 ">
						<label class="col-sm-2 control-label">Gender</label>
						<div class="col-sm-9"> 
						<select name="gender" class="form-control">
							<option value="<?php echo $edit_student_display['gender']; ?>">Select gender</option>
							<option value = "male">Male</option>
							<option value = "female">Female</option>
						</select>
						</div>
					</div>	
					<div class="form-group2 ">
						<label class="col-sm-2 control-label">Class</label>
						<div class="col-sm-9"> 
						<select name="cid" class="form-control">
							<option value="<?php echo $edit_student_display['cid']; ?>">Select Class</option>
							<?php 
							$st_add_class = $ravi->getAllClass();
							while($st_add_class_fetch = $st_add_class->fetch_assoc())
							{
							?>
								<option value="<?php echo $st_add_class_fetch['cid']; ?>"><?php echo $st_add_class_fetch['class_name']."	Level ".$st_add_class_fetch['level']; ?></option>
							<?php } ?>
						</select>
						</div> 
					</div>

					<div class="form-group2 ">
						<label class="col-sm-2 control-label">Paid</label>
						<div class="col-sm-9"> 
						<select name="paid" class="form-control">
							<option value="<?php echo $edit_student_display['paid']; ?>">Make payment</option>
							<option value = "1">paid</option>
							<option value = "0">not yet paid</option>
						</select>
						</div>
					</div>

					<div class="col-sm-offset-2"> <button type="submit" class="btn btn-default" name="up_student">Update student Profile</button> </div>
				</form>
			</div>
		</div>
	</div>