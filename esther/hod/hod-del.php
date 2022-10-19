<?php 
$del_hod = $_GET['hid'];
$del_done = $ravi->delete_hod($del_hod);
if($del_done==true)
{
	echo "<script>window.location = 'home.php?ravi=hod-information'; alert('success delete');</script>";
}
else
{
	echo "<script>window.location='home.php?ravi=hod-information'; alert('cant delete');</script>";
}
?>