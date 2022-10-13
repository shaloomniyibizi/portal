<?php 
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','portal');
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>
<div class="outter-wp">
	<!--sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="index.html">Home</a></li>
			<li class="active">
				<?php if(isset($_GET['ravi'])){ echo strtoupper($page=$_GET['ravi']); } ?>
			</li>
		</ol>
	</div>
	<!--//sub-heard-part-->
	<div class="graph-visual tables-main">
		<h2 class="inner-tittle">
			<?php echo strtoupper($_GET['ravi']); ?>
		</h2>
		<div class="grid-1">
			<section class="section">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>View Notices Info</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body p-20">
                                            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Notice Title</th>
                                                        <th>Noticle Details</th>
                                                        <th>Creation Date</th>
                                                        <th colspan="2">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $sql = "SELECT * from notice";
                                                        $query = $dbh->prepare($sql);
                                                        $query->execute();
                                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                        $cnt=1;
                                                        if($query->rowCount() > 0) {
                                                            foreach($results as $result)
                                                            {   ?>
                                                            <tr>
                                                                <td><?php echo htmlentities($cnt);?></td>
                                                                <td><?php echo htmlentities($result->noticeTitle);?></td>
                                                                <td><?php echo htmlentities($result->noticeDetails);?></td>
                                                                <td><?php echo htmlentities($result->postingDate);?></td>
                                                                <td>
                                                                    <a href="home.php?ravi=edit-notice&nid=<?php echo htmlentities($result->nid);?>">
                                                                    <i class="fa fa-edit fa-2x" title="Edit this Record" style="color:red;"></i> </a> 
                                                                </td>
                                                                <td>
                                                                    <a href="home.php?ravi=del-notice&nid=<?php echo htmlentities($result->nid);?>" onclick="return confirm('Do you really want to delete the notice?');">
                                                                    <i class="fa fa-edit fa-2x" title="Delete this Record" style="color:red;"></i> </a> 
                                                                </td>
                                                            </tr>
                                                            <?php $cnt=$cnt+1;}} ?>
                                                        </tbody>
                                                    </table>
                                                    <!-- /.col-md-12 -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col-md-6 -->
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
		</div>
	</div>