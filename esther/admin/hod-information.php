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
				<select name="class_hod_data" id="selector1" class="form-control1">
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
				<input type="submit" name="hod_info" class="btn red" value="View HOD">
			</form>	
			<?php
				if(isset($_POST['hod_info']))
				{
					$dept_hod_data = $_POST['class_hod_data'];
					$hod_dis_admin=	$ravi->hod_display_admin($dept_hod_data);
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
										<th>Department</th>
										<th>Contact</th>
										<th colspan="2">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										if($hod_dis_admin->num_rows>0){
											while($hod_info_admin =$hod_dis_admin->fetch_assoc()) { ?>
												<tr>
													<td><?php echo $s_sn; ?></td>
													<td><?php echo $hod_info_admin['image']; ?></td>
													<td><?php echo $hod_info_admin['hod_name']; ?></td>
													<td><?php echo $hod_info_admin['email']; ?></td>
													<td><?php echo $hod_info_admin['dept_name']; ?></td>
													<td><?php echo $hod_info_admin['contact']; ?></td>
													<td>
														<a href="home.php?ravi=hod-editnow&hid=<?php echo $hod_info_admin['hid']; ?>" class="">
														<i class="fa fa-edit fa-2x" title="Edit Record"></i>
														</a>
													</td>
													<td>
														<a href="home.php?ravi=hod-del&hid=<?php echo $hod_info_admin['hid']; ?>" class="">
															<i class="fa fa-edit fa-2x" style="color:red;" title="delete Record"></i>
														</a>
													</td>
												</tr>
												<?php $s_sn++; 
											} 
										} else {
											?>
											<td colspan="12"> No any hod information found </td>
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