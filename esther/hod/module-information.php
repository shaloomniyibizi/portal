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
				<select name="class_module_data" id="selector1" class="form-control1">
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
				<input type="submit" name="module_info" class="btn red" value="View Class Data">
			</form>	
			<?php
				if(isset($_POST['module_info']))
				{
					$class_module_data = $_POST['class_module_data'];
					$module_dis_admin=	$ravi->module_display_admin($class_module_data);
					$s_sn = 1;
					?>
					<div class="graph">
						<div class="tables">
							<table class="table table-bordered "> 
								<thead>
									<tr>
										<th>#</th>
										<th>code</th> 
										<th>Name</th> 
										<th>credit</th>
										<th>class_name</th>
										<th>Teacher</th>
										<th colspan="2">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										if($module_dis_admin->num_rows>0){
											while($module_info_admin =$module_dis_admin->fetch_assoc()) { ?>
												<tr>
													<td><?php echo $s_sn; ?></td>
													<td><?php echo $module_info_admin['code']; ?></td>
													<td><?php echo $module_info_admin['mod_name']; ?></td>
													<td><?php echo $module_info_admin['credit']; ?></td>
													<td><?php echo $module_info_admin['class_name']; ?></td>
													<td><?php echo $module_info_admin['teacher_name']; ?></td>
												
													<td>
														<a href="home.php?ravi=module-editnow&mid=<?php echo $module_info_admin['tid']; ?>" class="">
														<i class="fa fa-edit fa-2x" title="Edit Record"></i>
														</a>
													</td>
													<td>
														<a href="home.php?ravi=module-del&mid=<?php echo $module_info_admin['tid']; ?>" class="">
															<i class="fa fa-edit fa-2x" style="color:red;" title="delete Record"></i>
														</a>
													</td>
												</tr>
												<?php $s_sn++; 
											} 
										} else {
											?>
											<td colspan="12"> No any module information found </td>
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