<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	$SQL="SELECT * FROM `salary`, `employee` WHERE salary_employee_id = employee_id";
	$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
function delete_salary(salary_id)
{
	if(confirm("Do you want to delete the salary?"))
	{
		this.document.frm_salary.salary_id.value=salary_id;
		this.document.frm_salary.act.value="delete_salary";
		this.document.frm_salary.submit();
	}
}
</script>
	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr">Salary Report</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_salary" action="lib/salary.php" method="post">
				<div class="static">
					<table style="width:100%">
					  <tbody>
					  <tr class="tablehead bold">
					    <td scope="col">ID</td>
						<td scope="col">Name</td>
						<td scope="col">Month</td>
						<td scope="col">Year</td>
						<td scope="col">Amount</td>
						<td scope="col">Action</td>
					  </tr>
					<?php 
					$sr_no=1;
					while($data = mysql_fetch_assoc($rs))
					{
					?>
					  <tr>
						<td><?=$data[salary_id]?></td>
						<td><?=$data[employee_name]?></td>
						<td><?=$data[salary_month]?></td>
						<td><?=$data[salary_year]?></td>
						<td><?=$data[salary_amount]?></td>
						<td style="text-align:center">
							<a href="salary.php?salary_id=<?php echo $data[salary_id] ?>">Edit</a> | <a href="Javascript:delete_salary(<?=$data[salary_id]?>)">Delete</a> </td>
						</td>
					  </tr>
					<?php } ?>
					</tbody>
					</table>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="salary_id" />
			</form>
		</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?> 
