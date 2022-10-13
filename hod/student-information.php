	<div class="outter-wp">
		<!--sub-heard-part-->
		<div class="sub-heard-part">
			<ol class="breadcrumb m-b-0">
				<li><a href="index.html">Home</a></li>
				<li class="active"><?php if(isset($_GET['ravi'])){ echo strtoupper($page=$_GET['ravi']); } ?></li>
			</ol>
		</div>
		<!--//sub-heard-part-->
		<div class="graph-visual tables-main">
			<h2 class="inner-tittle"><?php echo strtoupper($_GET['ravi']); ?></h2>
			<form method="post">
				<select name="class_students_data" id="selector1" class="form-control1">
					<option>Select Class</option>
					<?php 
						$opt = $ravi->getAllClass();
						while($op=$opt->fetch_assoc())
						{
					?>
					<option value="<?php echo $op['cid']; ?>">
						<?php echo $op['class_name'] ."	Level ". $op['level']; ?>
					</option>
					<?php }?>
				</select>
				<input type="submit" name="students_info" class="btn red" value="View Class Data">
			</form>	
			<?php
				if(isset($_POST['students_info']))
				{
					$class_students_data = $_POST['class_students_data'];
					$student_dis_admin=	$ravi->student_display_admin($class_students_data);
					$s_sn = 1;
					?>
					<div class="graph">
						<div class="tables">
							<table class="table table-bordered "> 
								<thead>
									<tr>
										<th>#</th>
										<th>Photo</th> 
										<th>RegNo</th> 
										<th>Full Name</th> 
										<th>Email</th>
										<th>Gender</th>
										<th>DOB</th>
										<th>Address</th>
										<th>Father</th>
										<th>Mother</th>
										<th>Parent Contact</th>
										<th>Payment status</th>
										<th colspan="2">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										if($student_dis_admin->num_rows>0){
											while($student_info_admin =$student_dis_admin->fetch_assoc()) { 
												$paid = ($student_info_admin['paid'] == 1)?"paid":"not yet";

												?>
												<tr>
													<td><?php echo $s_sn; ?></td>
													<td><?php echo $student_info_admin['image']; ?></td>
													<td><?php echo $student_info_admin['regno']; ?></td>
													<td><?php echo $student_info_admin['stud_name']; ?></td>
													<td><?php echo $student_info_admin['email']; ?></td>
													<td><?php echo $student_info_admin['gender']; ?></td>
													<td><?php echo $student_info_admin['dob']; ?></td>
													<td><?php echo $student_info_admin['address']; ?></td>
													<td><?php echo $student_info_admin['father']; ?></td>
													<td><?php echo $student_info_admin['mather']; ?></td>
													<td><?php echo $student_info_admin['contact']; ?></td>
													<td><?php echo $paid; ?></td>
													<td>
														<a href="home.php?ravi=edit-stud&sid=<?php echo $student_info_admin['sid']; ?>" class="">
														<i class="fa fa-edit fa-2x" title="Edit Record"></i>
														</a>
													</td>
													<td>
														<a href="home.php?ravi=del-stud&sid=<?php echo $student_info_admin['sid']; ?>" class="">
															<i class="fa fa-edit fa-2x" style="color:red;" title="delete Record"></i>
														</a>
													</td>
												</tr>
												<?php $s_sn++; 
											} 
										} else {
											?>
											<td colspan="12"> No any Students information found </td>
											<?php
										}
									?>
								</tbody>
							</table> 
						</div>
					</div>
				<?php }  
			?>
		</div>
		<!--//graph-visual-->
	</div>