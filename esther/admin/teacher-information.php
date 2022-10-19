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
				<select name="class_teacher_data" id="selector1" class="form-control1">
					<option>Select Department</option>
					<?php 
						$opt = $ravi->getAllDepartment();
						while($op=$opt->fetch_assoc())
						{
					?>
					<option value="<?php echo $op['did']; ?>">
						<?php echo $op['dept_name'] ?>
					</option>
					<?php }?>
				</select>
				<input type="submit" name="teacher_info" class="btn red" value="View Class Data">
			</form>	
			<?php
				if(isset($_POST['teacher_info']))
				{
					$class_teacher_data = $_POST['class_teacher_data'];
					$teacher_dis_admin=	$ravi->teacher_display_admin($class_teacher_data);
					$s_sn = 1;
					?>
					<div class="graph">
						<div class="tables">
							<table class="table table-bordered "> 
								<thead>
									<tr>
										<th>#</th>
										<th>Photo</th> 
										<th>Full Name</th> 
										<th>Email</th>
										<th>Qualification</th>
										<th>DOB</th>
										<th>Address</th>
										<th>Contact</th>
										<th colspan="2">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										if($teacher_dis_admin->num_rows>0){
											while($teacher_info_admin =$teacher_dis_admin->fetch_assoc()) { ?>
												<tr>
													<td><?php echo $s_sn; ?></td>
													<td><?php echo $teacher_info_admin['image']; ?></td>
													<td><?php echo $teacher_info_admin['teacher_name']; ?></td>
													<td><?php echo $teacher_info_admin['email']; ?></td>
													<td><?php echo $teacher_info_admin['qualification']; ?></td>
													<td><?php echo $teacher_info_admin['dob']; ?></td>
													<td><?php echo $teacher_info_admin['address']; ?></td>
													<td><?php echo $teacher_info_admin['contact']; ?></td>
													<td>
														<a href="home.php?ravi=teacher-editnow&teacherid=<?php echo $teacher_info_admin['tid']; ?>" class="">
														<i class="fa fa-edit fa-2x" title="Edit Record"></i>
														</a>
													</td>
													<td>
														<a href="home.php?ravi=teacher-del&teacherid=<?php echo $teacher_info_admin['tid']; ?>" class="">
															<i class="fa fa-edit fa-2x" style="color:red;" title="delete Record"></i>
														</a>
													</td>
												</tr>
												<?php $s_sn++; 
											} 
										} else {
											?>
											<td colspan="12"> No any teacher information found </td>
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