		<div class="outter-wp">
					<!--/tabs-->
					<div class="tab-main">
						<!--/tabs-inner-->
						<div class="tab-inner">
							<div id="tabs" class="tabs">
								<h2 class="inner-tittle">Welcome, <?php echo $hod['hod_name']; ?>  </h2>
								<div class="graph">
									<nav>
										<ul>
											<li><a href="#section-1" class="icon-shop"><i class="fa fa-briefcase"></i> <span>Information</span></a></li>
											<li><a href="#section-2" class="icon-cup"><i class="fa fa-book"></i> <span>Results</span></a></li>
											<li><a href="#section-3" class="icon-food"><i class="fa fa-cutlery"></i> <span>Teachers</span></a></li>
											<!-- <li><a href="#section-4" class="icon-lab"><i class="fa fa-flask"></i> <span>Subject</span></a></li> -->
										</ul>
									</nav>
									<div class="content tab">
										<section id="section-1">
											<div class="mediabox">
												<strong>Personal Information</strong>
												<p>	<strong>Welcome,</strong>
												<?php echo $hod['hod_name']; ?>
											
												<p>	<strong>Email:</strong>
												<?php echo $hod['email']; ?>
											</p>
											
										</section>
										<section id="section-2">
											<?php
													$m = $ravi->getResult();
													$result = $m->fetch_assoc();
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
										</section>
										<section id="section-3">
											<?php
													$t = $ravi->getAllTeacher();
													$allteacher = $t->fetch_assoc();
											?>
											<table class="table table-bordered table-striped table-hover mt-2">
												<thead class="table-primary">
													<tr>
														<th>Image</th>
														<th>Names</th>
														<th>Email</th>
														<th>Qualification</th>
														<th>Depertment</th>
														<th>Class</th>
														<th>address</th>
														<th>Contact</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><?php echo ucfirst($allteacher['image']); ?></td>
														<td><?php echo ucfirst($allteacher['teacher_name']); ?></td>
														<td><?php echo ucfirst($allteacher['email']); ?></td>
														<td><?php echo ucfirst($allteacher['qualification']); ?></td>
														<td><?php echo ucfirst($allteacher['dept_name']); ?></td>
														<td><?php echo ucfirst($allteacher['class_name']); ?></td>
														<td><?php echo ucfirst($allteacher['address']); ?></td>
														<td><?php echo ucfirst($allteacher['contact']); ?></td> 
												</tbody>
											</table>
										</section>
										</section>
									</div>
									<!-- /content -->
								</div>
								<!-- /tabs -->
							</div>
							<script src="js/cbpFWTabs.js"></script>
							<script>
								new CBPFWTabs(document.getElementById('tabs'));
							</script>
							<div class="clearfix"> </div>
						</div>
					</div>
					<!--//tabs-inner-->
					<!--custom-widgets-->
					<div class="custom-widgets">
						<div class="row-one">
							<div class="col-md-3 widget">
								<div class="stats-left ">
									<h5>Total</h5>
									<h4> Students</h4>
								</div>
								<div class="stats-right">
									<label>90</label>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="col-md-3 widget states-mdl">
								<div class="stats-left">
									<h5>Total</h5>
									<h4>Teachers</h4>
								</div>
								<div class="stats-right">
									<label> 85</label>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="col-md-3 widget states-thrd">
								<div class="stats-left">
									<h5>Total</h5>
									<h4>Courses</h4>
								</div>
								<div class="stats-right">
									<label>51</label>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="col-md-3 widget states-last">
								<div class="stats-left">
									<h5>Total</h5>
									<h4>Passout</h4>
								</div>
								<div class="stats-right">
									<label>30</label>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<!--//custom-widgets-->

					<!--/charts-->
					<div class="charts">
						<div class="chrt-inner">
							<!--//weather-charts-->
							<div class="graph-visualization">
								<div class="col-md-6 map-1">
									<h3 class="sub-tittle">Profile </h3>


								</div>
								<div class="col-md-6 map-2">
									<div class="profile-nav alt">
										<section class="panel">
											<div class="user-heading alt clock-row terques-bg">
												<h3 class="sub-tittle clock">Easy Clock </h3>
											</div>
											<ul id="clock">
												<li id="sec"></li>
												<li id="hour"></li>
												<li id="min"></li>
											</ul>



										</section>

									</div>
								</div>
								<div class="clearfix"> </div>
							</div>


						</div>
						<!--/charts-inner-->
					</div>
					<!--//outer-wp-->
				</div>