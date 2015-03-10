<?php
session_start();
include('../config.php');

if(!isset($_SESSION['student_id']))
{
	echo "<script language=javascript>alert('Sila log masuk terlebih dahulu.');window.location='../loginf.php';</script>";
}

if(@$_GET['action']=="logout")
{
	unset($_SESSION['student_id']);
	echo "<script language=javascript>alert('Log keluar berjaya.');window.location='../loginf.php';</script>";
}

$sql_pelajar = "SELECT * FROM student WHERE student_id = '".$_SESSION['student_id']."'";
if($result_pelajar = $connect->query($sql_pelajar))
{
	$rows_pelajar = $result_pelajar->fetch_array();
	$total_pelajar = $result_pelajar->num_rows;
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>My Question Bank</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
	<div align="center">
		<table width="95" height="510" border="1" align="center" style="border-collapse:collapse; font-size: 10px;">
			<tr>
				<td>
					<table width="84%" border="0" cellpadding="0" cellspacing="0" id="header_bg">
						<tr>
							<td valign="bottom"><table width="953" border="0" cellpadding="0" cellspacing="0" id="header">
							  <tr>
							    <td width="953">&nbsp;</td>
						      </tr>
						    </table></td>
						</tr>
					</table>
			  </td>
			</tr>
			<tr>
				<td>
					<table width="971" border="0" cellpadding="0" cellspacing="0" id="content">
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
																<a href="student-download.php" class='butangadmin'><span>MUAT TURUN SOALAN</span></a>
																<a href="<?php echo $_SERVER['PHP_SELF']."?action=logout";?>" class='butangadmin'><span>LOG KELUAR</span></a>
															</td>
														</tr>
													</table>
												</div>
											</div>
										</td>
									</tr>
								</table>
								<div class="sub-tajuk-merah" style="width:730px;margin-top:20px"><strong>Log Masuk : <?php echo ucwords($rows_pelajar['student_name'])." (".$rows_pelajar['student_username'].")";?></strong></div>
							</td>
						</tr>
					</table>
					<table width="772" height="150" border="0" align="center">
						<tr><font face="courier new" size=2>
							<td><strong>Setiap pelajar di Sekolah Menengah Sains Dungun sering menghadapi masalah apabila peperiksaan akhir dimana pelajar mendapat markah yang rendah dalam peperiksaan akhir tahun</strong>
						<p><strong>Masalah ini berlaku kerana pelajar yang menghadapi peperiksaan akhir tahun mereka tiada cara yang berkesan kerana tidak mempunyai kemudahan sumber-sumber yang digunakan untuk memproses soalan peperiksaan akhir tahun. Dengan ini 'MY QUESTION BANK' telah direka untuk mengatasi masalah ini.</strong></p></td>
					  </strong></font><</tr>
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
										<td><?php require ('../footer.php'); ?></td>
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