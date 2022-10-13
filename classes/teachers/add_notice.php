<?php 
if(isset($_POST['add_now']))
{
    $noticeTitle = $_POST['noticeTitle'];
	$noticeDetails = $_POST['noticeDetails'];
    if($noticeTitle=="" or $noticeDetails=="") {
        echo "<script>alert('please fill form and Add notice');</script>";
	} else { 
        $add_notice_done = $ravi->notice($noticeTitle,$noticeDetails);
		if($add_notice_done==true) {
            echo "<script>window.location = 'home.php?ravi=manage_notice';</script>";
		} else {
            echo "<script>alert('oops :( contact with developer');</script>";
		}
    }
}
?>
<div class="forms-main">
    <div class="graph-form">
        <div class="validation-form">
            <h2 align="center"><?php echo strtoupper($_GET['ravi']); ?></h2>
            <form method="post">
                <div class="col-md-12 form-group1 group-mail">
                    <label class="control-label">Notice Title</label>
					<input type="text" placeholder="Notice Title"  name="noticeTitle">
				</div>
                <div class="col-md-12 form-group1 form-last">
                    <label class="control-label">noticeDetails</label>
                    <textarea placeholder="Notice Details"  name="noticeDetails"></textarea>
                </div>
                <div class="col-md-12 form-group button-2">
					<input type="submit" class="btn btn-primary" value="Add Notice" name="add_now">
					<button type="reset" class="btn btn-default">Reset</button>
				</div>
			</form>
        </div>
    </div>
</div>