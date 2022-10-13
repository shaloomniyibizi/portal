<?php 
if(isset($_POST['add_now'])) {
	 // $std_fullname,$std_username,$std_credit,$std_grade,$std_roll,$std_dob,$std_address,$std_district,$std_gender,$std_father,$std_mother,$std_parent_contact
	$module_name = $_POST['module_name'];
	$code = $_POST['code'];
	$credit = $_POST['credit'];
	$tid = $_POST['tid'];
	$cid = $_POST['cid'];
	
	if($module_name=="" or $code=="" or $credit=="" or $tid=="" or $cid=="")
	{ 
		echo "<script>alert('please fill form and Add module');</script>";
	}
	else
	{
		$add_module_done = $ravi->add_module($module_name,$code,$credit,$cid,$tid);
		if($add_module_done==true) {
			echo "<script>window.location = 'home.php?ravi=module-information';</script>";
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
					<label class="control-label">Name</label>
					<input type="text" placeholder="Enter Name" required="" name="module_name">
				</div>
				<div class="vali-form">
					<div class="col-md-6 form-group1">
						<label class="control-label">code</label>
						<input type="text" placeholder="Enter code" required="" name="code">
					</div>
					<div class="col-md-6 form-group1">
						<label class="control-label">credit</label>
						<input type="text" placeholder="Enter credit" required="" name="credit">
					</div>
					<div class="col-md-6 form-group2 ">
						<label class="control-label">Teacher</label>
						<select name="tid">
							<option>Select Teacher</option>
							<?php 
							$st_add_class = $ravi->getAllTeacher();
							while($st_add_class_fetch = $st_add_class->fetch_assoc())
							{
							?>
								<option value="<?php echo $st_add_class_fetch['tid']; ?>"><?php echo $st_add_class_fetch['teacher_name']?></option>
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
				<div class="col-md-12 form-group button-2">
					<button type="submit" class="btn btn-primary"name="add_now">Add module</button>
					<button type="reset" class="btn btn-default">Reset</button>
				</div>
				<div class="clearfix"> </div>
			</form>

			<!---->
		</div>

	</div>
</div>
<!--//forms-->