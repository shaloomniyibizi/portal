
<div class="forms-main">
    <div class="graph-form">
        <div class="validation-form">
            <h2 align="center"><?php echo strtoupper($_GET['ravi']); ?></h2>
            <?php 	
            $nid = $_GET['nid'];
            if(isset($_POST['update_general_setting'])) {
                $noticeTitle = $_POST['noticeTitle'];
                $noticeDetails = $_POST['noticeDetails'];
                $upweb_info_success = $ravi->notice_update($noticeTitle,$noticeDetails,$nid);
                if($upweb_info_success==true) {
                    echo "<script>alert('Success Update notice Information Thank You.....');</script>";
                    echo "<script>window.location= 'home.php?ravi=manage_notice';</script>";
                } else {
                    echo "<script>alert('Please contact with devloper for fixing this problem or try later');</script>";
                }
            }
            
            $dis_general_data = $ravi->getNotice($nid);
            $display_notice = $dis_general_data->fetch_assoc();
            ?>
            <form method="post">
					<div class="col-md-12 form-group1 group-mail">
					<label class="control-label">Notice Title</label>
					<input type="text" value="<?php echo $display_notice['noticeTitle']; ?>" name="noticeTitle">
				</div>
                <div class="col-md-12 form-group1 form-last">
						<label class="control-label">Notice Details</label>
							<textarea name="noticeDetails" id="txtarea1" cols="50" rows="4" class="form-control1" data-gramm="true" data-txt_gramm_id="ca81ed2e-db8f-f21e-8724-3b682fade546" data-gramm_id="ca81ed2e-db8f-f21e-8724-3b682fade546" spellcheck="false" data-gramm_editor="true" style="z-index: auto; position: relative; line-height: 19.4286px; font-size: 13.6px; transition: none; background: transparent !important;">
                                <?php echo $display_notice['noticeDetails']; ?>
                            </textarea>
					</div>
					
				</div>
					<div class="clearfix"> </div>
				<div class="col-md-12 form-group button-2">
					<button type="submit" class="btn btn-primary" name="update_general_setting">Update Notice Info</button>
				
				</div>
				<div class="clearfix"> </div>
			</form>

			<!---->
		</div>

	</div>
</div>
<!--//forms-->