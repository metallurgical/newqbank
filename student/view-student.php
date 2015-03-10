<?php
session_start();
include('../config.php');

if(!isset($_SESSION['student_id']))
{
	echo "<script language=javascript>alert('Sila log masuk terlebih dahulu.');window.location='../loginf.php';</script>";
}

if($_GET['action']=="logout")
{
	unset($_SESSION['student_id']);
	echo "<script language=javascript>alert('Log keluar berjaya.');window.location='../loginf.php';</script>";
}

$sql_pelajar = "SELECT * FROM pelajar WHERE student_id = '".$_SESSION['student_id']."'";
if($result_pelajar = $connect->query($sql_pelajar))
{
	$rows_pelajar = $result_pelajar->fetch_array();
	$total_pelajar = $result_pelajar->num_rows;
}

$sql_pelajar = "SELECT * FROM student WHERE student_id = ".$_GET['id']."";
if($result_pelajar = $connect->query($sql_pelajar))
{
	$rows_pelajar = $result_pelajar->fetch_array();
	if(!$total_pelajar = $result_pelajar->num_rows)
	{
		echo "<script language=javascript>alert('Maklumat pelajar tidak wujud.');window.location='student-list.php';</script>";
	}
}

?>

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
																<a href="edit-student.php" class='butangadmin'><span>KEMASKINI PROFIL</span></a>
																<a href="" class='butangadmin'><span>MUAT TURUN SOALAN</span></a>
																<a href="<?php echo $_SERVER['PHP_SELF']."?action=logout";?>" class='butangadmin'><span>LOG KELUAR</span></a>
															</td>
														</tr>
													</table>
													<div class="sub-tajuk-merah" style="width:730px;margin-top:20px"><strong>Log Masuk : <?php echo ucwords($rows_pelajar['student_name']);?></strong></div>
													<form method="post" enctype="multipart/form-data" name="borang_pengesahan_pembayaran" class="borang" id="borang_pengesahan_pembayaran" style="padding-top:20px">
														<fieldset>
															<table width="750" border="0" align="center" cellpadding="3" cellspacing="1">
																<tr>
																	<td colspan="2" align="center"><div class="sub-tajuk-kelabu">LIHAT PROFIL</div></td>
																</tr>
																<tr>
																	<td colspan="2" align="center"><div class="sub-tajuk-kuning2"><strong>MAKLUMAT PELAJAR</strong></div></td>
																</tr>
																<tr>
																	<td width="270" align="right">Nama Penuh  :</td>
																	<td width="480" align="left"><?php echo ucwords($rows_pelajar['student_name']);?></td>
																</tr>
																<tr>
																	<td width="270" align="right">Username  :</td>
																	<td width="480" align="left"><?php echo ucwords($rows_username['student_username']);?></td>
																</tr>
																<tr>
																	<td width="270" align="right">IC  :</td>
																	<td width="480" align="left"><?php echo ucwords($rows_pelajar['student_ic']);?></td>
																</tr>
																<tr>
																	<td width="270" align="right">Negeri  :</td>
																	<td width="480" align="left"><?php echo ucwords($rows_pelajar['student_state']);?></td>
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