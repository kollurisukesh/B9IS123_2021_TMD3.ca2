<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[car_id])
	{
		$SQL="SELECT * FROM car WHERE car_id = $_REQUEST[car_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?> 
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
					<h4 class="heading colr">Welcome to Employee Management System</h4>
					<div class='msg'><?=$_REQUEST['msg']?></div>
					<ul class='login-home-listing'>
						<?php if($_SESSION['user_details']['user_level_id'] == 1) {?>
							<li><a href="employee.php">Add Employee</a></li>
							<li><a href="salary.php">Add Salary</a></li>
							<li><a href="employee-report.php">Employee Report</a></li>
							<li><a href="salary-report.php">Salary Report</a></li>
							<li><a href="./lib/login.php?act=logout">Logout</a></li>
						<?php } ?>
					</ul>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
