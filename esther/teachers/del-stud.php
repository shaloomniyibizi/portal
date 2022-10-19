<?php 
$del_student = $_GET['sid'];
$del_done = $ravi->delete_student($del_student);
if($del_done==true)
{
	echo "<script>window.location = 'home.php?ravi=student-information'; alert('success delete');</script>";
	
}
else
{
	echo "<script>window.location='home.php?ravi=student-information'; alert('cant delete');</script>";
}
?>