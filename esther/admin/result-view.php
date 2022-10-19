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
			<?php
												$sid = $_GET['sid'];
												$m = $ravi->getResultById($sid);
												$result = $m->fetch_assoc();
												if ($result > 0) {
											?>
											<table class="table table-bordered table-striped table-hover mt-2">
												<thead class="table-primary">
													<tr>
														<th>Module code</th>
														<th>Module Name</th>
														<th>Credit</th>
														<th>Conitnous assment</th>
														<th>Exam</th>
														<th>Total</th>
														<th>Decision</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><?php echo ucfirst($result['code']); ?></td>
														<td><?php echo ucfirst($result['mod_name']); ?></td>
														<td><?php echo ucfirst($result['credit']); ?></td>
														<td><?php echo ucfirst($result['quiz']); ?></td>
														<td><?php echo ucfirst($result['exam']); ?></td>
														<td><?php echo ucfirst($result['total']); ?></td>
														<td><?php echo ucfirst($result['decision']); ?></td> 
												</tbody>
											</table>
											<?php
												} else {
													echo "No mark added";
												}
											?>
		</div>
		<!--//graph-visual-->
	</div>