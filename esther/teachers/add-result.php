<?php 
$tid = $_GET['tid'];
if(isset($_POST['std_add_now'])) {
	 // $std_fullname,$std_username,$std_term,$std_grade,$std_roll,$std_quiz,$std_exam,$std_district,$std_total,$std_father,$std_mother,$std_parent_contact
	$mid = $_POST['mid'];
	$sid = $_POST['sid'];
	$term = $_POST['term'];
	$cid = $_POST['cid'];
	$year = $_POST['year'];
	$quiz = $_POST['quiz'];
	$exam = $_POST['exam'];
	$total = ($quiz + $exam)/2 ."%";
	$decision =($total > 50) ? "pass" : "fail";
	if($mid=="" or $sid=="" or $term=="" or $cid=="" or $year=="" or $quiz=="" or $exam=="")
	{
		echo "<script>alert('please fill form and Add result');</script>";
	} elseif($quiz > 100 or $exam > 100){
		echo "<script>alert('please marks must not exceed 100');</script>";
	}
	else
	{
    $add_result_done = $ravi->add_result($mid, $sid, $cid, $term, $year, $quiz, $exam, $total,$decision);
    if ($add_result_done==true) {
        echo "<script>window.location = 'home.php?ravi=result-information';</script>";
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
				<div class="vali-form">
					<div class="col-md-6 form-group2 ">
						<label class="control-label">Module</label>
						<select name="mid">
							<option>Select Module</option>
							<?php 
							$st_add_class = $ravi->getAllModuleName($tid);
							while($st_add_class_fetch = $st_add_class->fetch_assoc())
							{
							?>
								<option value="<?php echo $st_add_class_fetch['mid']; ?>"><?php echo $st_add_class_fetch['mod_name']?></option>
							<?php } ?>
						</select>
					</div>	
					
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
					<div class="col-md-6 form-group2">
						<label class="control-label">student</label>
						<select name="sid">
							<option>Select student</option>
							<?php 
							$st_add_student = $ravi->getAllStudent($tid);
							while($st_add_student_fetch = $st_add_student->fetch_assoc())
							{
							?>
								<option value=<?php echo $st_add_student_fetch['sid']; ?> > <?php echo $st_add_student_fetch['stud_name']; ?> </option>
							<?php } ?>
						</select>
					</div>	
					<div class="col-md-6 form-group2">
						<label class="control-label">term</label>
						<select name="term" id="">
							<option value="">Select semester</option>
							<option value="1"> 1 </option>
							<option value="2"> 2 </option>
						</select>
					</div>
					<div class="col-md-6 form-group1">
						<label class="control-label">Year</label>
						<input type="text" placeholder="ex: 2021-2022" required="" name="year">
					</div>
					
					<div class="col-md-6 form-group1 form-last">
						<label class="control-label">Quizes</label>
						<input type="text" placeholder="quiz marks" required="" name="quiz">
					</div>
					<div class="col-md-6 form-group1">
						<label class="control-label">Exams</label>
						<input type="text" placeholder="exam marks" required="" name="exam">
					</div>
				</div>
					<div class="clearfix"> </div>
				<div class="col-md-12 form-group button-2">
					<button type="submit" class="btn btn-primary" name="std_add_now">Add Markes</button>
					<button type="reset" class="btn btn-default">Reset</button>
				</div>
				<div class="clearfix"> </div>
			</form>

			<!---->
		</div>

	</div>
</div>
<!--//forms-->