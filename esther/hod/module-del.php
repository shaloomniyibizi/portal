<?php 
$del_module = $_GET['mid'];
$del_done = $ravi->delete_module($del_module);
if($del_done==true)
{
	echo "<script>window.location = 'home.php?ravi=module-information'; alert('success delete');</script>";
	
}
else
{
	echo "<script>window.location='home.php?ravi=module-information'; alert('cant delete');</script>";
}
?>