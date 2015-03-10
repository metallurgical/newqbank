<?php
session_start();
include('../config.php');

if(!isset($_SESSION['admin_id']))
{
	echo "<script language=javascript>alert('Sila log masuk terlebih dahulu.');window.location='../login.php';</script>";
}

if(@$_GET['action']=="logout")
{
	unset($_SESSION['admin_id']);
	echo "<script language=javascript>alert('Log keluar berjaya.');window.location='../loginf.php';</script>";
}

/*$sql_admin = "SELECT * FROM admin WHERE admin_id = '".$_SESSION['admin_id']."'";
if($result_admin = $connect->query($sql_admin))
{
	$rows_admin = $result_admin->fetch_array();
	$total_admin = $result_admin->num_rows;
}*/

$sql_teacher = "SELECT * FROM teacher WHERE teacher_id = ".$_GET['id']."";
//echo $_SESSION['teacher_id'];
if($result_teacher = $connect->query($sql_teacher))
{
	$rows_teacher = $result_teacher->fetch_array();
	if(!$total_teacher = $result_teacher->num_rows)
	{
		echo "<script language=javascript>alert('Maklumat guru tidak wujud.');window.location='teacher-list.php';</script>";
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>My Bank Question</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
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
													<?php include('admin_menu.php');?>
													<div class="sub-tajuk-merah" style="width:730px;margin-top:20px"><strong>Log Masuk : <?php echo ucwords(@$rows_admin['admin_name']);?></strong></div>
													<form method="post" enctype="multipart/form-data" name="borang_pengesahan_pembayaran" class="borang" id="borang_pengesahan_pembayaran" style="padding-top:20px">
														<fieldset>
															<table width="750" border="0" align="center" cellpadding="3" cellspacing="1">
																<tr>
																	<td colspan="2" align="center"><div class="sub-tajuk-kelabu">LIHAT PROFIL</div></td>
																</tr>
																<tr>
																	<td colspan="2" align="center"><div class="sub-tajuk-kuning2"><strong>MAKLUMAT GURU</strong></div></td>
																</tr>
																<tr>
																	<td width="270" align="right">Nama Penuh  :</td>
																	<td width="480" align="left"><?php echo ucwords($rows_teacher['teacher_name']);?></td>
																</tr>
																<tr>
																	<td width="270" align="right">Username  :</td>
																	<td width="480" align="left"><?php echo ucwords($rows_teacher['teacher_username']);?></td>
																</tr>
																<tr>
																	<td width="270" align="right">Staff ID  :</td>
																	<td width="480" align="left"><?php echo ucwords($rows_teacher['teacher_staffid']);?></td>
																</tr>
																<tr>
																	<td width="270" align="right">IC  :</td>
																	<td width="480" align="left"><?php echo ucwords($rows_teacher['teacher_ic']);?></td>
																</tr>
																<tr>
																	<td width="270" align="right">Email  :</td>
																	<td width="480" align="left"><?php echo ucwords($rows_teacher['teacher_email']);?></td>
																</tr>
																<tr>
																	<td width="270" align="right">Subjek  :</td>
																	<td width="480" align="left"><?php echo ucwords($rows_teacher['teacher_sub']);?></td>
																</tr>
																<tr>
																	<td width="270" align="right">Alamat  :</td>
																	<td width="480" align="left"><?php echo ucwords($rows_teacher['teacher_add']);?></td>
																</tr>
																<tr>
																	<td width="270" align="right">Poskod  :</td>
																	<td width="480" align="left"><?php echo ucwords($rows_teacher['teacher_pos']);?></td>
																</tr>
																<tr>
																	<td width="270" align="right">Daerah  :</td>
																	<td width="480" align="left"><?php echo ucwords($rows_teacher['teacher_daerah']);?></td>
																</tr>
																<tr>
																	<td width="270" align="right">Negeri  :</td>
																	<td width="480" align="left"><?php echo ucwords($rows_teacher['teacher_state']);?></td>
																</tr>
															</table>
														</fieldset>
													</form>
												</div>
											</div>
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