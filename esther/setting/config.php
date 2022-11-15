<?php 

class Portal {
	public $server = "localhost";
	public $username = "root";
	public $password = "";
	public $dbname = "portal";
	public $connectdb;
	
	function __construct() {
		$this->connectdb = new mysqli($this->server,$this->username,$this->password,$this->dbname);
		if($this->connectdb->connect_error) {
			die("connection failed");
		}
	}	
    public function hackme() {
        $this->connectdb = new mysqli($this->server,$this->username,$this->password,$this->dbname);
        return $this->connectdb;
    }


////////// Student informations ////////////////////////////////////////
	
	public function sLogin($email,$password) { 
		$st_login_check = "select  * from student where email = '$email' and password='$password'";
		$st_login_run = $this->connectdb->query($st_login_check);
		$st_login_num = $st_login_run->num_rows;
		return $st_login_num;
	}
	public function getAllStudent($tid) {
		$query = "SELECT * FROM student JOIN teacher ON student.cid = teacher.cid WHERE teacher.tid = $tid";
		$result = $this->connectdb->query($query);
		return $result;
	}
	public function getStudent($email) {
		$query = "select * from student where email='$email'";
		$result = $this->connectdb->query($query);
		return $result;
	}
	public function student_display_admin($class_students_data) {
		$student_display_admin_select = "SELECT * FROM student WHERE cid ='$class_students_data'";
		$student_display_admin_run = $this->connectdb->query($student_display_admin_select);
		return $student_display_admin_run;
	}
	public function add_student($stud_name,$email,$password,$cid,$regno,$dob,$address,$gender,$father,$mather,$contact,$paid) {
		$add_student_insert = "insert into student(stud_name,email,password,cid,regno,dob,address,gender,father,mather,contact,paid) value('$stud_name','$email','$password','$cid','$regno','$dob','$address','$gender','$father','$mather','$contact',$paid)";
		$add_student_run = $this->connectdb->query($add_student_insert);
		return $add_student_run;
	}
	public function update_student_info($up_fullname,$up_address,$up_email,$up_dob,$up_father,$up_mather,$up_contact,$cid,$gender,$sid,$paid) {
		$update_student_info_select = "UPDATE student SET stud_name='$up_fullname',address='$up_address',email='$up_email',dob='$up_dob',father='$up_father',mather='$up_mather',contact='$up_contact',cid='$cid',gender = '$gender',paid = '$paid' WHERE sid='$sid'";
		$update_student_info_run = $this->connectdb->query($update_student_info_select);
		return $update_student_info_run;
	}
	public function edit_studentid($student_id) {
		$edit_studentid = "select * from student where sid='$student_id'";
		$edit_studentid_run = $this->connectdb->query($edit_studentid);
		return $edit_studentid_run;
	}
	public function delete_student($del_student) {
		$delete_student_info = "DELETE FROM student WHERE sid='$del_student'";
		$delete_student_info_run = $this->connectdb->query($delete_student_info);
		return $delete_student_info_run;
	}
	public function student_password_change($st_password_update,$st_username) {
		$student_password_update = "UPDATE student SET password='$st_password_update' where student.stud_name='$st_username'";
		$student_password_update_run = $this->connectdb->query($student_password_update);
		return $student_password_update_run;
	} 
	public function student_change($st_password_update,$sid) {
		$student_password_update = "UPDATE `student` SET `password` = '$st_password_update' WHERE `student`.`sid` = '$sid'";
		$student_password_update_run = $this->connectdb->query($student_password_update);
		return $student_password_update_run;
	} 

//


/////////////////// Teacher informations //////////////////////////////////////
	
	public function tLogin($email,$password) { 
		$st_login_check = "select  * from teacher where email = '$email' and password='$password'";
		$st_login_run = $this->connectdb->query($st_login_check);
		$st_login_num = $st_login_run->num_rows;
		return $st_login_num;
	}
	public function getAllTeacher() {
		$query = "SELECT * FROM teacher INNER JOIN department ON teacher.did = department.did INNER JOIN class ON class.did = department.did";
		$result = $this->connectdb->query($query);
		return $result;
	}
	public function getTeacher($email) {
		$query = "select * from teacher where email='$email'";
		$result = $this->connectdb->query($query);
		return $result;
	}
	public function teacher_display_admin($class_students_data) {
		$student_display_admin_select = "SELECT * FROM teacher WHERE did ='$class_students_data'";
		$student_display_admin_run = $this->connectdb->query($student_display_admin_select);
		return $student_display_admin_run;
	}
	public function edit_teacherid($teacher_id) {
		$edit_teacherid = "select * from teacher where tid='$teacher_id'";
		$edit_teacherid_run = $this->connectdb->query($edit_teacherid);
		return $edit_teacherid_run;
	}
	public function add_teacher($teacher_name,$email,$password,$qualification,$cid,$did,$address,$contact,$dob) {
		$add_teacher_insert = "INSERT INTO teacher(teacher_name,email,password,qualification,cid,did,address,contact,dob) VALUES('$teacher_name','$email','$password','$qualification','$cid','$did','$address','$contact','$dob')";
		$add_teacher_run = $this->connectdb->query($add_teacher_insert);
		return $add_teacher_run;
	}
	public function update_teacher_info($up_fullname,$up_address,$up_email,$up_dob,$up_qualification,$up_contact,$cid,$did,$tid) {
		$update_teacher_info_select = "UPDATE teacher SET teacher_name='$up_fullname',address='$up_address',email='$up_email',dob='$up_dob',qualification='$up_qualification',contact='$up_contact',cid='$cid',did = '$did' WHERE tid='$tid'";
		$update_teacher_info_run = $this->connectdb->query($update_teacher_info_select);
		return $update_teacher_info_run;
	}
	public function delete_teacher($del_teacher) {
		$delete_teacher_info = "DELETE FROM teacher WHERE tid='$del_teacher'";
		$delete_teacher_info_run = $this->connectdb->query($delete_teacher_info);
		return $delete_teacher_info_run;
	}
//


/////////////////// HOD informations //////////////////////////////////////
	
	public function hLogin($email,$password) { 
		$st_login_check = "SELECT  * FROM hod WHERE email = '$email' and password='$password'";
		$st_login_run = $this->connectdb->query($st_login_check);
		$st_login_num = $st_login_run->num_rows;
		return $st_login_num;
	}
	public function getHod($email) {
		$query = "SELECT * FROM hod WHERE email='$email'";
		$result = $this->connectdb->query($query);
		return $result;
	}
	public function hod_display_admin($dept_hod_data) {
		$hod_display_admin_select = "SELECT * FROM hod JOIN department ON hod.did=department.did WHERE hod.did ='$dept_hod_data'";
		$hod_display_admin_run = $this->connectdb->query($hod_display_admin_select);
		return $hod_display_admin_run;
	}
	public function delete_hod($del_hod) {
		$delete_hod_info = "DELETE FROM hod WHERE hid='$del_hod'";
		$delete_hod_info_run = $this->connectdb->query($delete_hod_info);
		return $delete_hod_info_run;
	}
	public function edit_hod($hod) {
		$edit_hod = "SELECT * FROM hod WHERE hid='$hod'";
		$edit_hod_run = $this->connectdb->query($edit_hod);
		return $edit_hod_run;
	}
	public function update_hod_info($up_fullname,$up_email,$up_contact,$did,$hid) {
		$update_hod_info_select = "UPDATE hod SET hod_name='$up_fullname',email='$up_email',contact='$up_contact',did = '$did' WHERE hid='$hid'";
		$update_hod_info_run = $this->connectdb->query($update_hod_info_select);
		return $update_hod_info_run;
	}
	public function add_hod($hod_name,$email,$password,$did,$contact) {
		$add_hod_insert = "INSERT INTO hod(hod_name,email,password,did,contact) VALUES('$hod_name','$email','$password','$did','$contact')";
		$add_hod_run = $this->connectdb->query($add_hod_insert);
		return $add_hod_run;
	}
//


/////////////////// Admin informations //////////////////////////////////////
	
	public function aLogin($email,$password) { 
		$st_login_check = "select  * from admin where email = '$email' and password='$password'";
		$st_login_run = $this->connectdb->query($st_login_check);
		$st_login_num = $st_login_run->num_rows;
		return $st_login_num;
	}
	public function getAdmin($email) {
		$query = "select * from admin where email='$email'";
		$result = $this->connectdb->query($query);
		return $result;
	}
//


/////////////////// Result informations //////////////////////////////////////
	
	public function getResult() {
		$sql = "SELECT  * from result join module on module.mid=result.mid join student on result.sid = student.sid";
		$result = $this->connectdb->query($sql);
		return $result;
	}
	public function getResultById($sid) {
		$sql = "SELECT  * from result join module on result.mid=module.mid join student on result.sid = student.sid WHERE student.sid = '$sid'";
		$result = $this->connectdb->query($sql);
		return $result;
	}
	public function add_result($mid, $sid, $cid, $term, $year, $quiz, $exam, $total,$decision) {
		$add_result_insert = "INSERT INTO result(mid, sid, cid, term, year, quiz, exam, total, decision) VALUES ('$mid', '$sid', '$cid', '$term', '$year', '$quiz', '$exam', '$total', '$decision')";
		$add_result_run = $this->connectdb->query($add_result_insert);
		return $add_result_run;
	}
//


/////////////////// Module informations //////////////////////////////////////
	
	public function getAllModuleName($tid) {
		$query = "SELECT * FROM module JOIN teacher ON module.tid = teacher.tid WHERE teacher.tid = $tid";
		$result = $this->connectdb->query($query);
		return $result;
	}
	public function getAllModule() {
		$query = "SELECT * FROM module JOIN class ON module.cid = class.cid JOIN hod ON teacher.tid = module.tid";
		$result = $this->connectdb->query($query);
		return $result;
	}
	public function module_display_admin($class_modules_data) {
		$module_display_admin_select = "SELECT * FROM module JOIN teacher ON module.tid=teacher.tid JOIN class ON module.cid=class.cid WHERE class.cid ='$class_modules_data'";
		$module_display_admin_run = $this->connectdb->query($module_display_admin_select);
		return $module_display_admin_run;
	}
	public function edit_moduleid($module_id) {
		$edit_moduleid = "SELECT * FROM module WHERE mid='$module_id'";
		$edit_moduleid_run = $this->connectdb->query($edit_moduleid);
		return $edit_moduleid_run;
	}
	public function add_module($mod_name,$code,$credit,$cid,$tid) {
		$add_module_insert = "INSERT INTO module(mod_name,code,credit,cid,tid) VALUES('$mod_name','$code','$credit','$cid','$tid')";
		$add_module_run = $this->connectdb->query($add_module_insert);
		return $add_module_run;
	}
	public function update_module_info($up_name,$up_code,$up_credit,$cid,$tid,$mid) {
		$update_module_info_select = "UPDATE module SET mod_name='$up_name',code='$up_code',credit='$up_credit',cid='$cid',tid = '$tid' WHERE mid='$mid'";
		$update_module_info_run = $this->connectdb->query($update_module_info_select);
		return $update_module_info_run;
	}
	public function delete_module($del_module) {
		$delete_module_info = "DELETE FROM module WHERE mid='$del_module'";
		$delete_module_info_run = $this->connectdb->query($delete_module_info);
		return $delete_module_info_run;
	}
//


/////////////////// Class informations //////////////////////////////////////
	
	public function getAllClass() {
		$query = "SELECT * FROM class INNER JOIN department ON class.did = department.did";
		$result = $this->connectdb->query($query);
		return $result;
	}
//


/////////////////// Department informations //////////////////////////////////////
	
	public function getAllDepartment() {
		$query = "SELECT * FROM department";
		$result = $this->connectdb->query($query);
		return $result;
	}
	public function getDepartment($email) {
		$query = "SELECT * FROM department WHERE email='$email'";
		$result = $this->connectdb->query($query);
		return $result;
	}
	public function department_display_admin($dept_department_data) {
		$department_display_admin_select = "SELECT * FROM department JOIN department ON department.did=department.did WHERE department.did ='$dept_department_data'";
		$department_display_admin_run = $this->connectdb->query($department_display_admin_select);
		return $department_display_admin_run;
	}
	public function delete_department($del_department) {
		$delete_department_info = "DELETE FROM department WHERE hid='$del_department'";
		$delete_department_info_run = $this->connectdb->query($delete_department_info);
		return $delete_department_info_run;
	}
	public function edit_department($department) {
		$edit_department = "SELECT * FROM department WHERE hid='$department'";
		$edit_department_run = $this->connectdb->query($edit_department);
		return $edit_department_run;
	}
	public function update_department_info($up_fullname,$up_email,$up_contact,$did,$hid) {
		$update_department_info_select = "UPDATE department SET department_name='$up_fullname',email='$up_email',contact='$up_contact',did = '$did' WHERE hid='$hid'";
		$update_department_info_run = $this->connectdb->query($update_department_info_select);
		return $update_department_info_run;
	}
	public function add_department($department_name,$email,$password,$did,$contact) {
		$add_department_insert = "INSERT INTO department(department_name,email,password,did,contact) VALUES('$department_name','$email','$password','$did','$contact')";
		$add_department_run = $this->connectdb->query($add_department_insert);
		return $add_department_run;
	}
////


/////////////////// Notice information ///////////////////////////////////////////

	public function delete_notice($del_notice) {
		$delete_notice_info = "DELETE FROM notice WHERE nid='$del_notice'";
		$delete_notice_info_run = $this->connectdb->query($delete_notice_info);
		return $delete_notice_info_run;
	}
	public function notice($noticeTitle,$noticeDetails) {
		$notice_insert = "INSERT INTO notice(noticeTitle,noticeDetails) VALUES('$noticeTitle','$noticeDetails')";
		$notice_run = $this->connectdb->query($notice_insert);
		return $notice_run;
	}
	public function getAllNotice() {
		$notice_check = "SELECT * FROM notice";
		$notice_run = $this->connectdb->query($notice_check);
		return $notice_run;
	}
	public function getNotice($nid) {
		$notice_check = "SELECT * FROM notice WHERE nid = '$nid'";
		$notice_run = $this->connectdb->query($notice_check);
		return $notice_run;
	}
	public function notice_update($noticeTitle,$noticeDetails,$nid) {
		$update_notice = "UPDATE notice SET noticeTitle='$noticeTitle', noticeDetails='$noticeDetails' WHERE nid = '$nid'";
		$update_notice_run = $this->connectdb->query($update_notice);
		return $update_notice_run;
	}
//


//////////// General setting information //////////////////////////////////////////

	public function general_setting($name,$address,$phone,$email,$about) {
		$general_setting_insert = "INSERT INTO general(name,address,phone,email,about) VALUES('$name','$address','$phone','$email','$about')";
		$general_setting_run = $this->connectdb->query($general_setting_insert);
		return $general_setting_run;
	}
	public function general_setting_check() {
		$general_setting_check = "SELECT * FROM general";
		$general_setting_run = $this->connectdb->query($general_setting_check);
		return $general_setting_run;
	}
	public function general_setting_update($name,$address,$phone,$email,$about) {
		$update_general_setting = "UPDATE general SET name='$name',address='$address',phone='$phone', email='$email', about='$about'";
		$update_general_run = $this->connectdb->query($update_general_setting);
		return $update_general_run;
	}
	}
$ravi = new Portal;