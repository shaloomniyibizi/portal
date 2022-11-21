<?php 
if(isset($_POST['add_now'])) {
	$dept_name = $_POST['dept_name'];
	if($dept_name=="")
	{ 
		echo "<script>alert('please fill form and Add hod');</script>";
	}
	else
	{
		$add_dept_done = $ravi->add_department($dept_name);
		if($add_dept_done==true) {
			echo "<script>alert('successfull registered');</script>";
			echo "<script>window.location = 'home.php';</script>";
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
					<input type="text" placeholder="Enter Full Name" required="" name="dept_name">
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