<?php
session_start();
include('../config.php');

if(!isset($_SESSION['teacher_id']))
{
	echo "<script language=javascript>alert('Sila log masuk terlebih dahulu.');window.location='../loginf.php';</script>";
}

if(@$_GET['action']=="logout")
{
	unset($_SESSION['teacher_id']);
	echo "<script language=javascript>alert('Log keluar berjaya.');window.location='../loginf.php';</script>";
}

$sql_teacher = "SELECT * FROM teacher WHERE teacher_id = '".$_SESSION['teacher_id']."'";
if($result_teacher = $connect->query($sql_teacher))
{
	$rows_teacher = $result_teacher->fetch_array();
	$total_teacher = $result_teacher->num_rows;
}

$sql_student = "SELECT * FROM student";
if($result_student = $connect->query($sql_student))
{
	$rows_student = $result_student->fetch_array();
	$total_student = $result_student->num_rows;
	$num_student = 0;
}

if((@$_GET['action']=="delete") && ($_GET['id']!=NULL))
{
	$sql_padam_student = "SELECT * FROM student WHERE student_id = ".$_GET['id']."";
	if($result_padam_student = $connect->query($sql_padam_student))
	{
		if($total_padam_student = $result_padam_student->num_rows)
		{
			$sql_padam_student = "DELETE FROM student WHERE student_id = '".$_GET['id']."'";
			if($result_padam_student = $connect->query($sql_padam_student))
			{
				echo "<script language=javascript>alert('Maklumat pelajar berjaya dipadam.');window.location='student-list.php';</script>";
			}
			else
			{
				echo "<script language=javascript>alert('Maklumat pelajar tidak berjaya dipadam. Sila cuba lagi.');window.location='student-list.php';</script>";
			}
		}
		else
		{
			echo "<script language=javascript>alert('Maklumat pelajar tidak wujud.');window.location='student-list.php';</script>";
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>My Question Bank</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />	<link rel="stylesheet" media="screen" href="css/index.css" >

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
							<td valign="top">
								<table width="750" border="0">
									<tr>
										<td align="center">
											<div class='borderkotakbarisputusmerah'>
												<div class='kotakbarisputusmerah'>
													<table width="100%" border="0" cellspacing="1" cellpadding="1">
														<tr>
															<td align="center">
																<div class="sub-tajuk-merah2">
																	<h2><img src="../images/pentadbiran.png" width="32" height="32" align="absmiddle" />&nbsp;MENU PENTADBIRAN SISTEM</h2>
																</div>
															</td>
														</tr>
														<tr>
															<td align="center">
																<a href="index.php" class='butangadmin'><span>LAMAN UTAMA</span></a>
																<a href="student-manage.php" class='butangadmin'><span>PENGURUSAN PELAJAR</span></a>
																<a href="" class='butangadmin'><span>KEMASKINI PROFIL</span></a>
																<a href="" class='butangadmin'><span>PENGURUSAN SOALAN</span></a>
																<a href="<?php echo $_SERVER['PHP_SELF']."?action=logout";?>" class='butangadmin'><span>LOG KELUAR</span></a>
															</td>
														</tr>
													</table>
												</div>
											</div>
										</td>
									</tr>
								</table>
								<div class="sub-tajuk-merah" style="width:730px;margin-top:20px"><strong>Log Masuk : <?php echo ucwords($rows_teacher['teacher_name']);?></strong></div>
								<table width="750" border="0" align="center" cellpadding="3" cellspacing="1">
									<tr>
										<td align="left"><div class="sub-tajuk-borang bulat">Senarai Pelajar</div></td>
									</tr>
									<tr>
										<td align="left">
											<table width="750" border="0" cellspacing="1" cellpadding="5" bgcolor="#CCCCCC" class="display" id="example">
												<thead>
												<tr bgcolor="#EEFFFF">
													<td align="center"><strong>NO</strong></td>
													<td align="center"><strong>NAMA PELAJAR</strong></td>
													<td align="center"><strong>USERNAME PELAJAR</strong></td>
													<td align="center"><strong>KELAS</strong></td>
													<td align="center"><strong>PILIH</strong></td>
												</tr>
												</thead>
												<?php if($total_teacher>0) { do { ?>
												<tr bgcolor="#FFFFFF">
													<td align="center"><?php echo ++$num;?></td>
													<td align="center"><a href="view-student.php?id=<?php echo $rows_student['student_id'];?>"><?php echo ucwords($rows_student['student_name']);?></a></td>
													<td align="center"><?php echo $rows_student['student_username'];?></td>
													<td align="center"><?php echo $rows_student['student_form'];?></td>
													<td align="center">
														<a href="edit-student.php?id=<?php echo $rows_student['student_id'];?>"><img src="../images/edit.png" width="16" height="16" border="0" /></a>
														<a href="student-list.php?action=delete&id=<?php echo $rows_student['student_id'];?>"><img src="../images/delete.png" width="16" height="16" border="0" /></a>
													</td>
												</tr>
												<?php } while($rows_student = $result_student->fetch_array()); } ?>
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