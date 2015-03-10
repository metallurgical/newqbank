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
	$sql_daftar = "SELECT * FROM teacher WHERE teacher_staffid = '".$teacher_staffid."'";
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
				$id = $connect->insert_id;
				//echo $id;
				echo "<script language=javascript>alert('Pendaftaran berjaya. Sila log masuk.'); window.location='view-teacher.php?id=$id';</script>";
			}
			else
			{
				echo "<script language=javascript>alert('Pendaftaran tidak berjaya. Sila cuba lagi.'); window.location='register.php';</script>";
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
																<a href="index.php" class='butangkecil'><span>LAMAN UTAMA</span></a>
																<a href="teacher-manage.php" class='butangkecil'><span>PENGURUSAN GURU</span></a>
																<a href="" class='butangkecil'><span>PENGURUSAN SOALAN</span></a>
																<a href="" class='butangkecil'><span>DAFTAR KELAS</span></a>
																<a href="<?php echo $_SERVER['PHP_SELF']."?action=logout";?>" class='butangkecil'><span>LOG KELUAR</span></a>
															</td>
														</tr>
													</table>
												<form id="borang_pengesahan_pembayaran" name="borang_pengesahan_pembayaran" method="post" class="borang" style="padding-top:20px">
													<fieldset>
														<table width="750" border="0" align="center" cellpadding="3" cellspacing="1">
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kelabu">BORANG PENDAFTARAN GURU</div></td>
															</tr>
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kuning2"><strong>MAKLUMAT GURU</strong></div></td>
															</tr>
															<tr>
																<td width="270" align="right">No Staff  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield1">
																		<input name="teacher_staffid" type="text" required class="input" id="teacher_staffid" value="" size="5"placeholder="A1234" maxlength="5"/>
																		<font color="#FF0000"><strong>*</strong></font><br/>
																		<span class="textfieldRequiredMsg">No Staff diperlukan.</span>
																  </span>
															  </td>
															</tr>
															<tr>
																<td width="270" align="right">No IC  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield1">
																		<input name="teacher_ic" type="text" required class="input" id="teacher_ic" value="" size="16"placeholder="cth:921010035567" maxlength="12"/>
																		<font color="#FF0000"><strong>*</strong></font><br/>
																		<span class="textfieldRequiredMsg">No IC diperlukan.</span>
																  </span>
															  </td>
															</tr>
															<tr>
																<td width="270" align="right">Nama  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield1">
																		<input name="teacher_name" type="text" class="input" id="teacher_name" value="" size="45" required/>
																		<font color="#FF0000"><strong>*</strong></font><br/>
																		<span class="textfieldRequiredMsg">Nama penuh diperlukan.</span>
																	</span>
																</td>
															</tr>
															<tr>
																<td width="270" align="right">Alamat Email  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield2">
																		<input name="teacher_email" type="text" class="input" id="teacher_email" value="" size="45" placeholder="cth : email@yahoo.com" required/>
																		<font color="#FF0000"><strong>*</strong></font><br/>
																		<span class="textfieldRequiredMsg">Alamat email diperlukan.</span>
																		<span class="textfieldInvalidFormatMsg">Alamat email tidak sah.</span>
																	</span>
																</td>
															</tr>
															<tr>
																<td width="270" align="right">Subjek  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield1">
																		<select name="teacher_sub" id="teacher_sub" class="input">
																			<option value="" selected="selected">-- Sila Pilih Subjek --</option>
																			<option value="Bahasa Melayu">Bahasa Melayu</option>
																			<option value="Bahasa Inggeris">Bahasa Inggeris</option>
																			<option value="Matematik">Matematik</option>
																			<option value="Geografi">Geografi</option>
																			<option value="Sejarah">Sejarah</option>
																			<option value="Pendidikan Islam">Pendidikan Islam</option>
																			<option value="Sains">Sains</option>
																			<option value="Fizik">Fizik</option>
																			<option value="Kimia">Kimia</option>
																			<option value="Biologi">Biologi</option>
																			<option value="Kejuruteraan Awam">Kejuruteraan Awam</option>
																			<option value="Pendidikan Seni Visual">Pendidikan Seni Visual</option>
																			<option value="Kemahiran Hidup">Kemahiran Hidup</option>
																			<option value="Matematik Tambahan">Matematik Tambahan</option>
																		</select>
																	</span>
																</td>
															</tr>
															<tr>
																<td width="270" align="right">Alamat  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield4">
																		<input name="teacher_add" type="text" class="input" id="teacher_add" value="" size="45" />
																	</span>
																</td>
															</tr>
															<tr>
																<td width="270" align="right">Bandar / Daerah  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield5">
																		<input name="teacher_daerah" type="text" class="input" id="teacher_daerah" value="" size="45" />
																	</span>
																</td>
															</tr>
															<tr>
																<td width="270" align="right">Poskod  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield6">
																		<input name="teacher_pos" type="text" class="input" id="teacher_pos" placeholder="cth : 12345" value="" size="8" maxlength="5" /><br/>
																		<span class="textfieldInvalidFormatMsg">Poskod tidak sah.</span>
																		<span class="textfieldMinCharsMsg">Poskod tidak sah.</span>
																		<span class="textfieldMaxCharsMsg">Poskod tidak sah.</span>
																  </span>
															  </td>
															</tr>
															<tr>
																<td width="270" align="right">Negeri  :</td>
																<td width="480" align="left">
																	<span id="spryselect1">
																		<select name="teacher_state" id="teacher_state" class="input">
																			<option value="" selected="selected">-- Sila Pilih Negeri --</option>
																			<option value="Johor">Johor</option>
																			<option value="Melaka">Melaka</option>
																			<option value="Negeri Sembilan">Negeri Sembilan</option>
																			<option value="Selangor">Selangor</option>
																			<option value="Putrajaya">Putrajaya</option>
																			<option value="Kuala Lumpur">Kuala Lumpur</option>
																			<option value="Perak">Perak</option>
																			<option value="Pulau Pinang">Pulau Pinang</option>
																			<option value="Kedah">Kedah</option>
																			<option value="Perlis">Perlis</option>
																			<option value="Kelantan">Kelantan</option>
																			<option value="Terengganu">Terengganu</option>
																			<option value="Pahang">Pahang</option>
																			<option value="Sabah">Sabah</option>
																			<option value="Sarawak">Sarawak</option>
																			<option value="Lain-lain">Lain-lain</option>
																		</select>
																	</span>
																</td>
															</tr>
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kuning2"><strong>MAKLUMAT LOG MASUK</strong></div></td>
															</tr>
															<tr>
																<td width="270" align="right">ID Pengguna  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield7">
																		<input name="teacher_username" type="text" class="input" id="teacher_username" value="" size="45" required/>
																		<font color="#FF0000"><strong>*</strong></font><br/>
																		<span class="textfieldRequiredMsg">ID pengguna diperlukan.</span>
																	</span>
																</td>
															</tr>
															<tr>
																<td width="270" align="right">Kata Laluan  :</td>
																<td width="480" align="left">
																	<span id="sprypassword1">
																		<input name="teacher_password" type="password" class="input" id="teacher_password" value="" size="45" required/>
																		<font color="#FF0000"><strong>*</strong></font><br/>
																		<span class="passwordRequiredMsg">Kata laluan diperlukan.</span>
																	</span>
																</td>
															</tr>
															<tr>
																<td width="270" align="right">Pengesahan Kata Laluan  :</td>
																<td width="480" align="left">
																	<span id="spryconfirm1">
																		<input name="confirm_password" type="password" class="input" id="confirm_password" value="" size="45" required/>
																		<font color="#FF0000"><strong>*</strong></font><br/>
																		<span class="confirmRequiredMsg">Pengesahan kata laluan diperlukan.</span>
																		<span class="confirmInvalidMsg">Pengesahan kata laluan dan kata laluan tidak sama.</span>
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