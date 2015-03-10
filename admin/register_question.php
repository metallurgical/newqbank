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
			$size = $connect->real_escape_string($_FILES['soalan']['size']);
			$type = $connect->real_escape_string($_FILES['soalan']['type']);			
			$question_file_name = $connect->real_escape_string($_FILES['soalan']['name']);	        
	        $data = $connect->real_escape_string(file_get_contents($_FILES  ['soalan']['tmp_name']));
	       
			//echo $tmp;
	
			$sql_daftar = "INSERT INTO question (question_name, question_category, question_file_name, question_content, question_size, question_type,question_form) VALUES ('".$question_name."','".$question_category."','".$question_file_name."','".$data."','".$size."','".$type."','".$question_form."')";
			if($result_daftar = $connect->query($sql_daftar))
			{
				echo "<script language=javascript>alert('Upload file berjaya.');window.location='question-manage.php';</script>";
			}
			else
			{
				echo "<script language=javascript>alert('Upload file tidak berjaya. Sila cuba lagi.');window.location='register_class.php';</script>";
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
													<?php include('admin_menu.php');?>
												<form id="borang_pengesahan_pembayaran" name="borang_pengesahan_pembayaran" method="post" class="borang" style="padding-top:20px" enctype="multipart/form-data">
													<fieldset>
														<table width="750" border="0" align="center" cellpadding="3" cellspacing="1">
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kelabu">BORANG PENDAFTARAN SOALAN</div></td>
															</tr>
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kuning2"><strong>MAKLUMAT SOALAN</strong></div></td>
															</tr>
															<tr>
																<td width="270" align="right">Nama Soalan  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield1">
																		<input name="question_name" type="text" class="input" id="class_name" value="" size="45" />
																		<font color="#FF0000"><strong>*</strong></font><br/>
																		<span class="textfieldRequiredMsg">Nama kelas di perlukan.</span>
																	</span>
																</td>
															</tr>

															<tr>
																<td width="270" align="right">Kategori  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield1">
																		<select name="question_category" id="teacher_sub" class="input">
																			<option value="" selected="selected">-- Sila Pilih Kategori --</option>
																			<option value="Soalan Lepas">Soalan Lepas</option>
																			<option value="Rujukan Soalan">Rujukan Soalan</option>
																			
																		</select>
																	</span>
																</td>
															</tr>
															<tr>
																<td width="270" align="right">Tingkatan  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield1">
																		<select name="question_form" id="teacher_sub" class="input">
																			<option value="" selected="selected">-- Sila Pilih tingkatan --</option>
																			<option value="1">T1</option>
																			<option value="2">T2</option>
																			<option value="3">T3</option>
																			<option value="4">T4</option>
																			<option value="5">T5</option>
																			
																			
																		</select>
																	</span>
																</td>
															</tr>
															<tr>
																<td width="270" align="right">Pilih Soalan  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield1">
																		<input name="soalan" type="file" class="input" id="class_name" value="" size="45" />
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