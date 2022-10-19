<?php 
session_start();
include "../setting/config.php";
if(isset($_POST['login'])) {
    $type = $_POST['type'];
    $email = $_POST['email'];
	$password = $_POST['password']; 
	
	if($email=="" || $password=="" || $type=="") {
      echo "<script>alert('Please Fill all field Properly');</script>";
	} else {
        switch($type)
		{
			case "admin":
                $go = $ravi->aLogin($email,$password);
                if($go==1) { 
                    $_SESSION['admin'] = $email;
                    header("location:../admin/home.php");
                } else {
                    echo "<script>alert('login failed');</script>";
                }
            break;
			case "hod":
                $go = $ravi->hLogin($email,$password);
                if($go==1) { 
                    $_SESSION['hod'] = $email;
                    header("location:../hod/home.php");
                } else {
                    echo "<script>alert('login failed');</script>";
                }
			break;
			case "teacher":
                $go = $ravi->tLogin($email,$password);
                if($go==1) { 
                    $_SESSION['teacher'] = $email;
                    header("location:../teachers/home.php");
                } else {
                    echo "<script>alert('login failed');</script>";
                }
			break;
			case "student":
                $go = $ravi->sLogin($email,$password);
                if($go==1) { 
                    $_SESSION['student'] = $email;
                    header("location:../students/home.php");
                } else {
                    echo "<script>alert('login failed');</script>";
                }
            break;
			default :
				echo "no teacher found";
		}
        
    }
}