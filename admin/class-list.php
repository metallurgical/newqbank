<?php
session_start();
include('../config.php');

if(!isset($_SESSION['admin_id']))
{
	echo "<script language=javascript>alert('Sila log masuk terlebih dahulu.');window.location='../loginf.php';</script>";
}

if(@$_GET['action']=="logout")
{
	unset($_SESSION['admin_id']);
	echo "<script language=javascript>alert('Log keluar berjaya.');window.location='../loginf.php';</script>";
}

$sql_admin = "SELECT * FROM admin WHERE admin_id = '".$_SESSION['admin_id']."'";
if($result_admin = $connect->query($sql_admin))
{
	$rows_admin = $result_admin->fetch_array();
	$total_admin = $result_admin->num_rows;
}

$sql_class = "SELECT * FROM class";
if($result_class = $connect->query($sql_class))
{
	$rows_class = $result_class->fetch_array();
	$total_class = $result_class->num_rows;
	$num_class = 0;
}

if((@$_GET['action']=="delete") && ($_GET['id']!=NULL))
{
	$sql_padam_class = "SELECT * FROM class WHERE class_id = ".$_GET['id']."";
	if($result_padam_class = $connect->query($sql_padam_class))
	{
		if($total_padam_class = $result_padam_class->num_rows)
		{
			$sql_padam_class = "DELETE FROM class WHERE class_id = '".$_GET['id']."'";
			if($result_padam_class = $connect->query($sql_padam_class))
			{
				echo "<script language=javascript>alert('Maklumat kelas berjaya dipadam.');window.location='class-list.php';</script>";
			}
			else
			{
				echo "<script language=javascript>alert('Maklumat guru tidak berjaya dipadam. Sila cuba lagi.');window.location='class-list.php';</script>";
			}
		}
		else
		{
			echo "<script language=javascript>alert('Maklumat guru tidak wujud.');window.location='class-list.php';</script>";
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>My Question Bank</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<style type="text/css" title="currentStyle">
	@import "../js/dataTables/css/demo_page.css";
	@import "../js/dataTables/css/demo_table_jui.css";
	@import "../js/dataTables/themes/smoothness/jquery-ui-1.8.4.custom.css";
	</style>
	<script type="text/javascript" language="javascript" src="../js/dataTables/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../js/dataTables/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		oTable = $('#example').dataTable({
			"bJQueryUI": true,
			"sPaginationType": "full_numbers",
			"aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 0,4 ] }],
		});
	} );
	</script>
</head>
<body>
	<div align="center">
		<table width="95" height="510" border="1" align="center" style="border-collapse:collapse; font-size: 10px;">
			<tr>
				<td>
					<table width="100%" border="0" cellpadding="0" cellspacing="0" id="header_bg">
						<tr>
							<td valign="bottom">
								<table width="100%" border="0" cellpadding="0" cellspacing="0" id="header">
									<tr>
										<td>&nbsp;</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
				  <table width="100%" border="0" cellpadding="0" cellspacing="0" id="content">
						<tr>
							<td height="393" valign="top">
								<table width="750" border="0">
									<tr>
										<td align="center">
											<div class='borderkotakbarisputusmerah'>
												<div class='kotakbarisputusmerah'>
													<?php include('admin_menu.php');?>
												</div>
											</div>
										</td>
									</tr>
								</table>
								<div class="sub-tajuk-merah" style="width:730px;margin-top:20px"><strong>Log Masuk : <?php echo ucwords($rows_admin['admin_name']);?></strong></div>
								<table width="750" border="0" align="center" cellpadding="3" cellspacing="1">
									<tr>
										<td align="left"><div class="sub-tajuk-borang bulat">Senarai Kelas</div></td>
									</tr>
									<tr>
										<td height="84" align="left">
											<table width="750" border="0" cellspacing="1" cellpadding="5" bgcolor="#CCCCCC" class="display" id="example">
												<thead>
												<tr bgcolor="#EEFFFF">
													<td align="center"><strong>NO</strong></td>
													<td align="center"><strong>NAMA KELAS</strong></td>
													<!-- <td align="center"><strong>USERNAME GURU</strong></td>
													<td align="center"><strong>STAFF ID GURU</strong></td> -->
													<td align="center"><strong>PILIH</strong></td>
												</tr>
												</thead>
												<?php if($total_class>0) { do { ?>
												<tr bgcolor="#FFFFFF">
													<td align="center"><?php echo ++$num_class;?></td>
													<td align="center"><a href="view-class.php?id=<?php echo $rows_class['class_id'];?>"><?php echo ucwords($rows_class['class_name']);?></a></td>
													<!-- <td align="center"><?php echo $rows_class['class_username'];?></td>
													<td align="center"><?php echo $rows_class['class_staffid'];?></td> -->
													<td align="center">
														<a href="edit-class.php?id=<?php echo $rows_class['class_id'];?>"><img src="../images/edit.png" width="16" height="16" border="0" /></a>
														<a href="class-list.php?action=delete&id=<?php echo $rows_class['class_id'];?>"><img src="../images/delete.png" width="16" height="16" border="0" /></a>
													</td>
												</tr>
												<?php } while($rows_class = $result_class->fetch_array()); } ?>
											</table>
										</td>
								  </tr>
								</table>							
							</td>
					  </tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<table width="100%" border="0" cellpadding="0" cellspacing="0" id="footer">
									<tr>
										<td><?php include("../footer.php");?></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>