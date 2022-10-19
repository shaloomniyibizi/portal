<?php 
$del_notice = $_GET['nid'];
$del_done = $ravi->delete_notice($del_notice);
if($del_done==true)
{
	echo "<script>window.location = 'home.php?ravi=manage_notice'; alert('success delete');</script>";
	
}
else
{
	echo "<script>window.location='home.php?ravi=manage_notice'; alert('cant delete');</script>";
}
?>