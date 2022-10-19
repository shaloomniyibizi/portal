<?php 

 $mid = $_GET['mid'];
 $edit_module_info = $ravi->edit_moduleid($mid);
	$edit_module_display = $edit_module_info->fetch_assoc();

if(isset($_POST['up_module']))
{
	$name = $_POST['name'];
	$code = $_POST['code'];
	$credit = $_POST['credit'];
	$cid = $_POST['cid'];
	$tid = $_POST['tid'];
	$update_done = $ravi->update_module_info($name,$code,$credit,$cid,$tid,$mid);
	if($update_done==true)
	{
		echo "<script>window.location='home.php?ravi=module-information';</script>";
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
					<div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail3" name="name" value="<?php echo $edit_module_display['mod_name']; ?>"> </div>
					</div>
					<div class="form-group"> <label for="inputEmail3" class="col-sm-2 control-label">code</label>
						<div class="col-sm-9"> <input type="text" class="form-control" id="inputEmail3" name="code" value="<?php echo $edit_module_display['code']; ?>"> </div>
					</div>
					<div class="form-group"> <label for="address" class="col-sm-2 control-label">credit</label>
						<div class="col-sm-9"> <input type="text" class="form-control" name="credit" value="<?php echo $edit_module_display['credit']; ?>"> </div>
					</div>
					<div class="form-group2 ">
						<label class="col-sm-2 control-label">Teacher</label>
						<div class="col-sm-9"> 
						<select name="tid" class="form-control">
							<option value="<?php echo $edit_module_display['tid']; ?>">Select Teacher</option>
							<?php 
							$st_add_class = $ravi->getAllTeacher();
							while($st_add_class_fetch = $st_add_class->fetch_assoc())
							{
							?>
								<option value="<?php echo $st_add_class_fetch['tid']; ?>"><?php echo $st_add_class_fetch['teacher_name']?></option>
							<?php } ?>
						</select>
						</div>
					</div>	
					<div class="form-group2 ">
						<label class="col-sm-2 control-label">Class</label>
						<div class="col-sm-9"> 
						<select name="cid" class="form-control">
							<option value="<?php echo $edit_module_display['cid']; ?>">Select Class</option>
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


					<div class="col-sm-offset-2"> <button type="submit" class="btn btn-default" name="up_module">Update module </button> </div>
				</form>
			</div>

		</div>
	</div>