<?php 
include "../setting/config.php";
session_start();
if(!$_SESSION['student']) {
	
	header("location:../index.php");
} else {
	$email = $_SESSION['student'];
	$email = $ravi->getStudent($email);
	$e = $ravi->getAllTeacher();
	
	$student = $email->fetch_assoc();
	$teacher = $e->fetch_assoc();
}
?> 
<!DOCTYPE HTML>
<html>

<head>
	<title>portal | student</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);
		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<link rel="stylesheet" href="css/font-awesome.css">
	<!-- //lined-icons -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/amcharts.js"></script>
	<script src="js/serial.js"></script>
	<script src="js/light.js"></script>
	<script src="js/radar.js"></script>
	<link href="css/barChart.css" rel='stylesheet' type='text/css' />
	<link href="css/fabochart.css" rel='stylesheet' type='text/css' />
	<!--clock init-->
	<script src="js/css3clock.js"></script>
	<!--Easy Pie Chart-->
	<!--skycons-icons-->
	<script src="js/skycons.js"></script>
	<script src="js/jquery.easydropdown.js"></script>
	<!--//skycons-icons-->
</head>
<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<div class="header-section">
					<div class="clearfix"></div>
				</div>
				<!-- //header-ends -->
				<div class="outter-wp">
					<!--/tabs-->
					<div class="tab-main">
						<!--/tabs-inner-->
						<div class="tab-inner">
							<div id="tabs" class="tabs">
								<h2 class="inner-tittle">Welcome,
									<?php echo ucfirst($student['stud_name']); ?> </h2>
								<div class="graph">
									<nav>
										<ul>
											<li><a href="#section-1" class="icon-shop"><i class="fa fa-briefcase"></i> <span>Information</span></a></li>
											<li><a href="#section-2" class="icon-cup"><i class="fa fa-lock"></i> <span>Change Password</span></a></li>
											<li><a href="#section-5" class="icon-truck"> <i class="fa fa-book"></i> <span>Results</span></a></li>
										</ul>
									</nav>
									<div class="content tab">
										<section id="section-1">
											<div class="mediabox">
												<strong>Personal Information</strong>
												<p> <strong>WELCOME</strong>,
													<?php echo ucfirst($student['stud_name']); ?>
												</p>
												
												<p><strong>Gender: </strong>
												<?php echo ucfirst($student['gender']); ?>
												</p>
												<p><strong>RegNo: </strong>
													<?php echo ucfirst($student['regno']); ?>
												</p>
												<p> <strong>Date of Birth:</strong>
													<?php echo ucfirst($student['dob']); ?>
												</p>

											</div>
											<div class="mediabox">
												<strong>Contact Details</strong>

												<p> <strong>Address:</strong>
													<?php echo ucfirst($student['address']); ?>
												</p>
												<p> <strong>Email:</strong>
													<?php echo ucfirst($student['email']); ?>
												</p>
											</div>
											<div class="mediabox">
												<strong>Parents Detail</strong>
												<p><strong>Father Name: </strong>
													<?php echo ucfirst($student['father']); ?>
												</p>
												<p><strong>Mother Name: </strong>
													<?php echo ucfirst($student['mather']); ?>
												</p>
												<p><strong>Parents Contact: </strong>
													<?php echo ucfirst($student['contact']); ?>
												</p>
											</div>
										</section>
										<section id="section-2"> 
											<div class="col-md-12">
												<?php 
												if(isset($_POST['change_password']))
												{
													
													$prev_password = $student['password'];
													$old_password = $_POST['old_password'];
													
													if($prev_password!=$old_password)
													{ 
														echo "<script>alert('Old Password Does not Matched');</script>";	
													}
													else
													{
														$st_username = $student['name'];
														$st_password_update = $_POST['new_password'];
														$update_success = $ravi->student_password_change($st_password_update,$st_username);
														print_r($update_success);
														echo "<script>window.location = 'home.php?success';</script>";
													}
												}
										
												?>
												<form method="post">
												<div class="input-group input-icon">
													<span class="input-group-addon">
												<i class="fa fa-key"></i>	</span>
													<input type="password" class="form-control1 icon" name="old_password" placeholder="Old Password">
													
												</div>
												<div class="input-group input-icon">
													<span class="input-group-addon">
												<i class="fa fa-key"></i>	</span>
													<input type="password" class="form-control1 icon" placeholder="New Password" name="new_password">
													
												</div>	
										
													<input type="submit" name="change_password" class="a_demo_four" value="Change Password">
													</form>
											</div>
										</section>
										<section id="section-5">
											<?php
												$sid = $student['sid'];
												$paid = $student['paid'];
												$m = $ravi->getResultById($sid);
												$result = $m->fetch_assoc();
												if ($result > 0) {
													if ($paid != 0) {
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
														echo "sorry <h1>". $student['stud_name'] ." </h1> Go and finish your payment";
													}
												} else {
													echo "No mark";
												}
											?>
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
									<h5>Today</h5>
									<h4> Users</h4>
								</div>
								<div class="stats-right">
									<label>90</label>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="col-md-3 widget states-mdl">
								<div class="stats-left">
									<h5>Today</h5>
									<h4>Visitors</h4>
								</div>
								<div class="stats-right">
									<label> 85</label>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="col-md-3 widget states-thrd">
								<div class="stats-left">
									<h5>Today</h5>
									<h4>Tasks</h4>
								</div>
								<div class="stats-right">
									<label>51</label>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="col-md-3 widget states-last">
								<div class="stats-left">
									<h5>Today</h5>
									<h4>Alerts</h4>
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
				<!--footer section start-->
				<footer>
					<p>&copy 2018 Portal . All Rights Reserved | Develop By Esther</p>
				</footer>
				<!--footer section end-->
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<div class="sidebar-menu">
			<header class="logo">
				<a href="#" class="sidebar-icon"> 
					<span class="fa fa-bars"></span> 
				</a> 
				<a href="home.php"> 
					<span id="logo"> <h1>Portal</h1></span> 
				</a>
			</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
			<div class="down">
				<a href="index.html"><img src="images/admin.jpg"></a>
				<a href="home.php"><span class=" name-caret"><?php echo $student['stud_name']; ?></span></a>
				<p>Student</p>
				<ul>
					<li><a class="tooltips" href="home.php"><span>Profile</span><i class="fa fa-user"></i></a></li>
					<li><a class="tooltips" href="home.php"><span>Settings</span><i class="fa fa-cog"></i></a></li>
					<li><a class="tooltips" href="logout.php"><span>Log out</span><i class="fa fa-cog"></i></a></li>
				</ul>
			</div>
			<!--//down-->
			<div class="menu">
				<ul id="menu">
					<li>
						<a href="home.php">
							<i class="fa fa-tachometer"></i> 
							<span>Dashboard</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {
			if (toggle) {
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({
					"position": "absolute"
				});
			} else {
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({
						"position": "relative"
					});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<link rel="stylesheet" href="css/vroom.css">
	<script type="text/javascript" src="js/vroom.js"></script>
	<script type="text/javascript" src="js/TweenLite.min.js"></script>
	<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>