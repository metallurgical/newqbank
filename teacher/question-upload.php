<?php
session_start();
include('../config.php');

if(!isset($_SESSION['teacher_id']))
{
	echo "<script language=javascript>alert('Sila log masuk terlebih dahulu.');window.location='../login.php';</script>";
}

if(@$_GET['action']=="logout")
{
	unset($_SESSION['admin_id']);
	echo "<script language=javascript>alert('Log keluar berjaya.');window.location='../loginf.php';</script>";
}

$sql_admin = "SELECT * FROM admin WHERE admin_id = '".@$_SESSION['admin_id']."'";
if($result_admin = $connect->query($sql_admin))
{
	$rows_admin = $result_admin->fetch_array();
	$total_admin = $result_admin->num_rows;
}

if(isset($_POST['daftar']))
{
	$sql_daftar = "SELECT * FROM teacher WHERE teacher_username = '".$username."'";
	if($result_daftar = $connect->query($sql_daftar))
	{
		if($total_daftar = $result_daftar->num_rows)
		{
			echo "<script language=javascript>alert('ID pengguna telah wujud. Sila cuba lagi.');window.location='register.php';</script>";
		}
		else
		{
			$sql_daftar = "INSERT INTO teacher (teacher_staffid, teacher_ic, teacher_name, teacher_email, teacher_sub, teacher_add, teacher_pos, teacher_daerah, teacher_state, teacher_username, teacher_password) VALUES ('".$teacher_staffid."', '".$teacher_ic."', '".$teacher_name."', '".$teacher_email."', '".$teacher_sub."', '".$teacher_add."', '".$teacher_pos."', '".$teacher_daerah."', '".$teacher_state."', '".$teacher_username."', '".$teacher_password."')";
			if($result_daftar = $connect->query($sql_daftar))
			{
				echo "<script language=javascript>alert('Pendaftaran berjaya. Sila log masuk.');window.location='register.php';</script>";
			}
			else
			{
				echo "<script language=javascript>alert('Pendaftaran tidak berjaya. Sila cuba lagi.');window.location='register.php';</script>";
			}
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
	<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
	<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
	<link href="../SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
	<link href="../SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
	<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
	<script src="../SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
	<script src="../SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
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
																<a href="edit-teacher.php" class='butangadmin'><span>KEMASKINI PROFIL</span></a>
																<a href="question-upload.php" class='butangadmin'><span>PENGURUSAN SOALAN</span></a>
																												
																<a href="<?php echo $_SERVER['PHP_SELF']."?action=logout";?>" class='butangadmin'><span>LOG KELUAR</span></a>
															</td>
														</tr>
													</table>
												</div>
											</div>
												<form id="borang_pengesahan_pembayaran" name="borang_pengesahan_pembayaran" method="post" class="borang" style="padding-top:20px">
													<fieldset>
														<table width="750" border="0" align="center" cellpadding="3" cellspacing="1">
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kelabu">PENGURUSAN SOALAN </div></td>
															</tr>
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kuning2"><strong>PILIHAN</strong></div></td>
															</tr>
															<tr align="center">
																<td>
																	<a href="register_question.php" class='butangkecil'><span>DAFTAR SOALAN</span></a>
																</td>
																<td>
																	<a href="question-list.php" class='butangkecil'><span>SENARAI SOALAN</span></a>
																</td>
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