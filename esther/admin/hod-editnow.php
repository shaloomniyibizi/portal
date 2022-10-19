<?php 

 $hod_id = $_GET['hid'];
 $edit_hod_info = $ravi->edit_hod($hod_id);
	$edit_hod_display = $edit_hod_info->fetch_assoc();

if(isset($_POST['up_hod']))
{
	$up_fullname = $_POST['up_fullname'];
	$up_email = $_POST['up_email'];
	$up_contact = $_POST['up_contact'];
	$did = $_POST['did'];
	$update_done = $ravi->update_hod_info($up_fullname,$up_email,$up_contact,$did,$hod_id);
	if($update_done==true)
	{
		echo "<script>window.location='home.php?ravi=hod-information';</script>";
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
					<div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Full Name</label>
						<div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail3" name="up_fullname" value="<?php echo $edit_hod_display['hod_name']; ?>"> </div>
					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="up_email" value="<?php echo $edit_hod_display['email']; ?>"> </div>
					</div>
					</div>
					<div class="form-group"> 
						<label for="address" class="col-sm-2 control-label">Contact</label>
						<div class="col-sm-9"> 
							<input type="text" class="form-control" name="up_contact" value="<?php echo $edit_hod_display['contact']; ?>"> 
						</div>
					</div>
					<div class="form-group2 ">
						<label class="col-sm-2 control-label">Department</label>
						<div class="col-sm-9"> 
						<select name="did" class="form-control">
							<option value="<?php echo $edit_hod_display['did']; ?>">Select Depertment</option>
							<?php 
							$st_add_class = $ravi->getAllDepartment();
							while($st_add_class_fetch = $st_add_class->fetch_assoc())
							{
							?>
								<option value="<?php echo $st_add_class_fetch['did']; ?>"><?php echo $st_add_class_fetch['dept_name']?></option>
							<?php } ?>
						</select>
						</div>
					</div>


					<div class="col-sm-offset-2"> <button type="submit" class="btn btn-default" name="up_hod">Update hod Profile</button> </div>
				</form>
			</div>

		</div>
	</div>