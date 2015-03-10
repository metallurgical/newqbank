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

if(isset($_POST['daftar']))
{
	extract($_POST);
	$sql_daftar = "SELECT * FROM class WHERE class_name = '".$class_name."' AND class_tingkatan = '".$class_tingkatan."'";
	$result_daftar = $connect->query($sql_daftar);
	
		if($result_daftar->num_rows > 0)
		{
			echo "<script language=javascript>alert('ID pengguna telah wujud. Sila cuba lagi.');window.location='register_class.php';</script>";
		}
		else
		{
			$sql_daftar = "INSERT INTO class (class_name,class_tingkatan) VALUES ('".$class_name."','".$class_tingkatan."')";
			if($result_daftar = $connect->query($sql_daftar))
			{
				echo "<script language=javascript>alert('Pendaftaran berjaya.');window.location='class-manage.php';</script>";
			}
			else
			{
				echo "<script language=javascript>alert('Pendaftaran tidak berjaya. Sila cuba lagi.');window.location='register_class.php';</script>";
			}
		}
	//}
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
													<?php include('admin_menu.php');?>
												<form id="borang_pengesahan_pembayaran" name="borang_pengesahan_pembayaran" method="post" class="borang" style="padding-top:20px">
													<fieldset>
														<table width="750" border="0" align="center" cellpadding="3" cellspacing="1">
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kelabu">BORANG PENDAFTARAN KELAS</div></td>
															</tr>
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kuning2"><strong>MAKLUMAT KELAS</strong></div></td>
															</tr>
															<tr>
																<td width="270" align="right">Tingkatan  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield1">
																		<select name="class_tingkatan" id="student_state" class="input">
																				<option value="" selected="selected">-- Sila Pilih Tingkatan --</option>
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3">3</option>
                                                                                <option value="4">4</option>
																				<option value="5">5</option>
                                                                             </select>
																	</span>
																</td>
															</tr>
															<tr>
																<td width="270" align="right">Nama Kelas  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield1">
																		<!-- <input name="class_name" type="text" class="input" id="class_name" value="" size="45" required/> -->
																		<select name="class_name" id="class_name" class="input">
																				<option value="" selected="selected">-- Sila Pilih kelas --</option>
																				<option value="Amanah">Amanah</option>
																				<option value="Berkat">Berkat</option>
																				<option value="Cekal">Cekal</option>
                                                                                <option value="Dedikasi">Dedikasi</option>
                                                                             </select>
																		<font color="#FF0000"><strong>*</strong></font><br/>
																		<span class="textfieldRequiredMsg">Nama kelas di perlukan.</span>
																	</span>
																</td>
															</tr>
															
															<tr>
																<td align="right">&nbsp;</td>
																<td align="left">
																	<button type="submit" name="daftar" class="butangkecil"><span>DAFTAR</span></button>
																	<button type="reset" class="butangkecil"><span>PADAM</span></button>
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