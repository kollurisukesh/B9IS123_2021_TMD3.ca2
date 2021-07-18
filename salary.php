<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[salary_id])
	{
		$SQL="SELECT * FROM `salary` WHERE salary_id = $_REQUEST[salary_id]";
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
				<h4 class="heading colr">Salary Entry Form</h4>
				<?php if($_REQUEST['msg']) { ?>
					<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php } ?>
				<form action="lib/salary.php" enctype="multipart/form-data" method="post" name="frm_salary">
					<ul class="forms">
						<li class="txt">Select Employee</li>
						<li class="inputfield">
							<select name="salary_employee_id" class="bar" required/>
								<?php echo get_new_optionlist("employee","employee_id","employee_name",$data[salary_employee_id]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Month</li>
						<li class="inputfield"><input name="salary_month" id="salary_month" type="text" class="bar" required value="<?=$data[salary_month]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Year</li>
						<li class="inputfield"><input name="salary_year" id="salary_year" type="text" class="bar" required value="<?=$data[salary_year]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Amount</li>
						<li class="inputfield"><input name="salary_amount" id="salary_amount" type="text" class="bar" required value="<?=$data[salary_amount]?>"/></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_salary">
					<input type="hidden" name="salary_id" value="<?=$data[salary_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
