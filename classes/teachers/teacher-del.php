<?php 
$del_teacher = $_GET['teacherid'];
$del_done = $ravi->delete_teacher($del_teacher);
if($del_done==true)
{
	echo "<script>window.location = 'home.php?ravi=teacher-information'; alert('success delete');</script>";
	
}
else
{
	echo "<script>window.location='home.php?ravi=teacher-information'; alert('cant delete');</script>";
}
?>