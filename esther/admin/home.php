<?php 
include "../setting/config.php";
session_start();
if(!$_SESSION['admin'])
{
	header("location:../index.php");
}
else
{
	$email = $_SESSION['admin'];
	$admine = $ravi->getAdmin($email);
	$admin = $admine->fetch_assoc();
	
}



?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>

<head>
	<title>Portal| Home</title>
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
		
				<?php  
				$homepage = "home1";
				if(isset($_GET['ravi']))
				{
					$homepage = $_GET['ravi'];
				}
				include $homepage.".php"; 
				?> 
				<!--footer section start-->
				<footer>
					<p>&copy 2018 Augment . All Rights Reserved | Design by Esther</p>
				</footer>
				<!--footer section end-->
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<div class="sidebar-menu">
			<header class="logo">
				<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>Portal</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				</a>
			</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
			<div class="down">
				<a href="index.html"><img src="images/admin.jpg"></a>
				<a href="index.php"><span class=" name-caret"><?php echo $admin['admin_name']; ?></span></a>
				<p>System Administrator in Company</p>
				<ul>
					<li><a class="tooltips" href="index.html"><span>Profile</span><i class="fa fa-user"></i></a></li>
					<li><a class="tooltips" href="index.html"><span>Settings</span><i class="fa fa-cog"></i></a></li>
					<li><a class="tooltips" href="logouts.php"><span>Log out</span><i class="fa fa-cog"></i></a></li>
				</ul>
			</div>
			<!--//down-->
			<div class="menu">
				<ul id="menu">
					<li><a href="home.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
					<li id="menu-academico"><a href="#"><i class="fa fa-users"></i> <span>Students</span> <span class="fa fa-angle-right" style="float: right"></span></a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="home.php?ravi=student-information">Students Information</a></li>
							<li id="menu-academico-boletim"><a href="home.php?ravi=add-student">Add Students</a></li>
						</ul>
					</li>
					<li id="menu-academico"><a href="#"><i class="fa fa-user"></i> <span>Teacher</span> <span class="fa fa-angle-right" style="float: right"></span></a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="home.php?ravi=teacher-information">Teacher Information</a></li>
							<li id="menu-academico-boletim"><a href="home.php?ravi=teacher-add">Add Teacher</a></li>
						</ul>
					</li>
					<li id="menu-academico"><a href="#"><i class="fa fa-user"></i> <span>HOD</span> <span class="fa fa-angle-right" style="float: right"></span></a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="home.php?ravi=hod-information">hod Information</a></li>
							<li id="menu-academico-boletim"><a href="home.php?ravi=hod-add">Add hod</a></li>
						</ul>
					</li>
					<li id="menu-academico"><a href="#"><i class="fa fa-user"></i> <span>module</span> <span class="fa fa-angle-right" style="float: right"></span></a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="home.php?ravi=module-information">module Information</a></li>
							<li id="menu-academico-boletim"><a href="home.php?ravi=module-add">Add module</a></li>
						</ul>
					</li>
					<li id="menu-academico"><a href="#"><i class="fa fa-users"></i> <span>Result</span> <span class="fa fa-angle-right" style="float: right"></span></a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-avaliacoes"><a href="home.php?ravi=result-information">Result Information</a></li>
							<!-- <li id="menu-academico-boletim"><a href="home.php?ravi=add-result">Add result</a></li> -->
						</ul>
					</li>
					<li id="menu-academico"><a href="#"><i class="fa fa-cog"></i> <span>Settings</span> <span class="fa fa-angle-right" style="float: right"></span></a>
					<ul id="menu-academico-sub">
						<li id="menu-academico-avaliacoes"><a href="home.php?ravi=general-information">General Information</a></li>
						<li id="menu-academico-avaliacoes"><a href="home.php?ravi=edit-general-information">Edit General Information</a></li>
					</ul>
					</li>
					<li id="menu-academico">
						<a href="#">
							<i class="fa fa-book"></i>
							<span>notice</span> <span class="fa fa-angle-right" style="float: right"></span>
						</a>
						<ul id="menu-academico-sub">
							<li id="menu-academico-boletim"><a href="home.php?ravi=add_notice">Add Notice</a></li>
							<li id="menu-academico-boletim"><a href="home.php?ravi=manage_notice">Manage Notice</a></li>
						</ul>
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