<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[employee_id])
	{
		$SQL="SELECT * FROM employee WHERE employee_id = $_REQUEST[employee_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?> 
<script>

jQuery(function() {
	jQuery( "#employee_dob" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-65:-10",
	   dateFormat: 'd MM,yy'
	});
	jQuery('#frm_employee').validate({
		rules: {
			employee_confirm_password: {
				equalTo: '#employee_password'
			}
		}
	});
});
function validateForm(obj) {
	if(validateEmail(obj.employee_email.value))
		return true;
	jQuery('#error-msg').show();
	return false;
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr">Employee Registration</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<div class="msg" style="display:none" id="error-msg">Enter valid EmailID !!!</div>
				<form action="lib/employee.php" enctype="multipart/form-data" method="post" name="frm_employee" onsubmit="return validateForm(this)">
					<ul class="forms">
						<li class="txt">Name</li>
						<li class="inputfield"><input name="employee_name" type="text" class="bar" required value="<?=$data[employee_name]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Blood Group</li>
						<li class="inputfield"><input name="employee_blood_group" type="text" class="bar" required value="<?=$data[employee_blood_group]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Mobile</li>
						<li class="inputfield"><input name="employee_mobile" type="text" class="bar" required value="<?=$data[employee_mobile]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Email</li>
						<li class="inputfield"><input name="employee_email" id="employee_email" type="text" class="bar" required value="<?=$data[employee_email]?>" onchange="validateEmail(this)" /></li>
					</ul>
					<ul class="forms">
						<li class="txt">Date of Birth</li>
						<li class="inputfield"><input name="employee_dob" id="employee_dob" type="text" class="bar" required value="<?=$data[employee_dob]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Address Line 1</li>
						<li class="inputfield"><input name="employee_add1" type="text" class="bar" required value="<?=$data[employee_add1]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">Address Line 2</li>
						<li class="inputfield"><input name="employee_add2" type="text" class="bar" required value="<?=$data[employee_add2]?>"/></li>
					</ul>
					<ul class="forms">
						<li class="txt">City</li>
						<li class="inputfield">
							<select name="employee_city" class="bar" required/>
								<?php echo get_new_optionlist("city","city_id","city_name",$data[employee_city]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">State</li>
						<li class="inputfield">
							<select name="employee_state" class="bar" required/>
								<?php echo get_new_optionlist("state","state_id","state_name",$data[employee_state]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Country</li>
						<li class="inputfield">
							<select name="employee_country" class="bar" required/>
								<?php echo get_new_optionlist("country","country_id","country_name",$data[employee_country]); ?>
							</select>
						</li>
					</ul>
					<ul class="forms">
						<li class="txt">Photo</li>
						<li class="inputfield"><input name="employee_image" type="file" class="bar"/></li>
					</ul>
					<div class="clear"></div>
					<ul class="forms">
						<li class="txt">&nbsp;</li>
						<li class="textfield"><input type="submit" value="Submit" class="simplebtn"></li>
						<li class="textfield"><input type="reset" value="Reset" class="resetbtn"></li>
					</ul>
					<input type="hidden" name="act" value="save_employee">
					<input type="hidden" name="avail_image" value="<?=$data[employee_image]?>">
					<input type="hidden" name="employee_id" value="<?=$data[employee_id]?>">
				</form>
			</div>
		</div>
		<div class="col2">
			<?php if($_REQUEST[employee_id]) { ?>
			<div class="contactfinder">
				<h4 class="heading colr">Profile of <?=$data['employee_name']?></h4>
				<div><img src="<?=$SERVER_PATH.'uploads/'.$data[employee_image]?>" style="width: 250px"></div><br>
			</div> 
			<?php } ?>
		</div>
		<div class="col2">
			<?php include_once("includes/sidebar.php"); ?> 
		</div>
	</div>
<?php
	if($_SESSION['employee_details']['employee_level_id'] != 1)
	{
?>
	<script>
		jQuery( "#employee_level_id" ).val(3);
		jQuery( "#employee_level" ).hide();
	</script>
<?php		
	}
?>
<?php include_once("includes/footer.php"); ?> 
