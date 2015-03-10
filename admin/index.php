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

$sql_admin = "SELECT * FROM admin WHERE admin_id = '".$_SESSION['admin_id']."'";
if($result_admin = $connect->query($sql_admin))
{
	$rows_admin = $result_admin->fetch_array();
	$total_admin = $result_admin->num_rows;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>My Question Bank</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<link rel="stylesheet" media="screen" href="css/index.css" >
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
												</div>
											</div>
											<div class="sub-tajuk-merah" style="width:730px;margin-top:20px" align="left"><strong>Log Masuk : <?php echo ucwords($rows_admin['admin_name']);?></strong></div>
										</td>
									</tr>
									<tr>
										<td height="">
											<p>
												<center>
												<img src="../images/slmatdtg.gif" width="665" height="214" />
												
												</center>
											</p>
										</td>
									</tr>
								</table>
								<br><br>
								<table width="629" border="0" align="center">
									<tr>
										<td height="117">
											<span style="text-align: justify"><font face="courier new" size=2><strong>
												<p>'MY QUESTION BANK' merujuk kepada penggunaan Teknologi Maklumat dan Komunikasi (ICT) bagi kemudahan pelajar Sekolah Menengah Sains Dungun (SMSD). Sistem ini juga memudahkan pelajar Sekolah Menengah Sains Dungun (SMSD) memperoleh soalan peperiksaan akhir tahun lepas dengan mudah. Pelajar hanya perlu memuat turun soalan yang lepas untuk rujukan dan ulangkaji.
												<p>Halaman pentadbir ini khas untuk kegunaan admin sahaja. Dihalama ini, terdapat 3 bahagian  yang digunakan oleh pentadbir untuk Pengurusan Guru, Padam Soalan dan juga Memuat Naik soalan peperiksaan.
											</strong></font>
									 </span></td>
									</tr>
								</table>
								<br><br>
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