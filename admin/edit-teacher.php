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

$sql_teacher = "SELECT * FROM teacher WHERE teacher_id = ".$_GET['id']."";
if($result_teacher = $connect->query($sql_teacher))
{
	$rows_teacher = $result_teacher->fetch_array();
	if(!$total_teacher = $result_teacher->num_rows)
	{
		echo "<script language=javascript>alert('Maklumat guru tidak wujud.');window.location='teacher-list.php';</script>";
	}
}


if(isset($_POST['simpan']))
{
	//$sql_edit_teacher = "SELECT * FROM teacher WHERE teacher_id != '".$_GET['id']."' AND teacher_username = '".$username."'";
	//if($result_edit_teacher = $connect->query($sql_edit_teacher))
	//{
		/*if($total_edit_teacher = $result_edit_teacher->num_rows)
		{
			echo "<script language=javascript>alert('ID pengguna telah wujud. Sila cuba lagi.');window.location='edit-teacher.php?id=".$_GET['id']."';</script>";
		}
		else
		{*/
			$sql_edit_teacher = "UPDATE teacher SET teacher_name = '".$teacher_name."', teacher_username = '".$teacher_username."', teacher_password = '".$teacher_password."', teacher_staffid = '".$teacher_staffid."', teacher_ic = '".$teacher_ic."', teacher_email = '".$teacher_email."', teacher_sub = '".$teacher_sub."', teacher_add = '".$teacher_add."', teacher_pos = '".$teacher_pos."', teacher_daerah = '".$teacher_daerah."', teacher_state = '".$teacher_state."' WHERE teacher_id = '".$_GET['id']."'";
			if($result_edit_teacher = $connect->query($sql_edit_teacher))
			{
				echo "<script language=javascript>alert('Maklumat guru berjaya dikemaskini.');window.location='view-teacher.php?id=".$_GET['id']."';</script>";
			}
			else
			{
				echo "<script language=javascript>alert('Maklumat guru tidak berjaya dikemaskini. Sila cuba lagi.');window.location='edit-teacher.php?id=".$_GET['id']."';</script>";
			}
		//}
	//}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Bengkel Mudah PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
	<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
	<link href="../SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
	<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
	<script src="../SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
</head>
<body>
	<div align="center">
		<table width="981" height="510" border="1" align="center" style="border-collapse:collapse; font-size: 10px;">
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
																<a href="teacher-manage.php" class='butangadmin'><span>PENGURUSAN GURU</span></a>
																<a href="" class='butangadmin'><span>MUAT NAIK SOALAN</span></a>
																<a href="question-list.php" class='butangadmin'><span>SOALAN</span></a>
																<a href="<?php echo $_SERVER['PHP_SELF']."?action=logout";?>" class='butangadmin'><span>LOG KELUAR</span></a>
															</td>
														</tr>
													</table>
											<div class="sub-tajuk-merah" style="width:730px;margin-top:20px" align="left"><strong>Log Masuk : <?php echo ucwords($rows_admin['admin_name']);?></strong></div>
												<form method="post" enctype="multipart/form-data" name="borang_pengesahan_pembayaran" class="borang" id="borang_pengesahan_pembayaran" style="padding-top:20px">
													<fieldset>
														<table width="750" border="0" align="center" cellpadding="3" cellspacing="1">
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kelabu">KEMASKINI PROFIL</div></td>
															</tr>
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kuning2"><strong>MAKLUMAT GURU</strong></div></td>
															</tr>
																<tr>
																	<td width="270" align="right">No Staff  :</td>
																	<td width="480" align="left">
																		<span id="sprytextfield1">
																			<input name="teacher_staffid" type="text" class="input" id="teacher_staffid" value="<?php echo ucwords($rows_teacher['teacher_staffid']);?>" size="45" />
																			<font color="#FF0000"><strong>*</strong></font><br/>
																			<span class="textfieldRequiredMsg">No Staff diperlukan.</span>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td width="270" align="right">No IC  :</td>
																	<td width="480" align="left">
																		<span id="sprytextfield1">
																			<input name="teacher_ic" type="text" class="input" id="teacher_ic" value="<?php echo ucwords($rows_teacher['teacher_ic']);?>" size="45" />
																			<font color="#FF0000"><strong>*</strong></font><br/>
																			<span class="textfieldRequiredMsg">No IC diperlukan.</span>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td width="270" align="right">Nama  :</td>
																	<td width="480" align="left">
																		<span id="sprytextfield1">
																			<input name="teacher_name" type="text" class="input" id="teacher_name" value="<?php echo ucwords($rows_teacher['teacher_name']);?>" size="45" />
																			<font color="#FF0000"><strong>*</strong></font><br/>
																			<span class="textfieldRequiredMsg">Nama penuh diperlukan.</span>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td width="270" align="right">Alamat Email  :</td>
																	<td width="480" align="left">
																		<span id="sprytextfield2">
																			<input name="teacher_email" type="text" class="input" id="teacher_email" value="<?php echo ucwords($rows_teacher['teacher_email']);?>" size="45" placeholder="cth : email@domain.com" />
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
																				<option value="Bahasa Melayu" <?php if($rows_teacher['teacher_sub']=="Bahasa Melayu") { ?>selected="selected"<?php } ?>>Bahasa Melayu</option>
																				<option value="Bahasa Inggeris" <?php if($rows_teacher['teacher_sub']=="Bahasa Inggeris") { ?>selected="selected"<?php } ?>>Bahasa Inggeris</option>
																				<option value="Matematik" <?php if($rows_teacher['teacher_sub']=="Matematik") { ?>selected="selected"<?php } ?>>Matematik</option>
																				<option value="Geografi" <?php if($rows_teacher['teacher_sub']=="Geografi") { ?>selected="selected"<?php } ?>>Geografi</option>
																				<option value="Sejarah" <?php if($rows_teacher['teacher_sub']=="Sejarah") { ?>selected="selected"<?php } ?>>Sejarah</option>
																				<option value="Pendidikan Islam" <?php if($rows_teacher['teacher_sub']=="Pendidikan Islam") { ?>selected="selected"<?php } ?>>Pendidikan Islam</option>
																				<option value="Sains" <?php if($rows_teacher['teacher_sub']=="Sains") { ?>selected="selected"<?php } ?>>Sains</option>
																				<option value="Fizik" <?php if($rows_teacher['teacher_sub']=="Fizik") { ?>selected="selected"<?php } ?>>Fizik</option>
																				<option value="Kimia" <?php if($rows_teacher['teacher_sub']=="Kimia") { ?>selected="selected"<?php } ?>>Kimia</option>
																				<option value="Biologi" <?php if($rows_teacher['teacher_sub']=="Biologi") { ?>selected="selected"<?php } ?>>Biologi</option>
																				<option value="Kejuruteraan Awam" <?php if($rows_teacher['teacher_sub']=="Kejuruteraan Awam") { ?>selected="selected"<?php } ?>>Kejuruteraan Awam</option>
																				<option value="Pendidikan Seni Visual" <?php if($rows_teacher['teacher_sub']=="Pendidikan Seni Visual") { ?>selected="selected"<?php } ?>>Pendidikan Seni Visual</option>
																				<option value="Kemahiran Hidup" <?php if($rows_teacher['teacher_sub']=="Kemahiran Hidup") { ?>selected="selected"<?php } ?>>Kemahiran Hidup</option>
																				<option value="Matematik Tambahan" <?php if($rows_teacher['teacher_sub']=="Matematik Tambahan") { ?>selected="selected"<?php } ?>>Matematik Tambahan</option>
																			</select>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td width="270" align="right">Alamat  :</td>
																	<td width="480" align="left">
																		<span id="sprytextfield4">
																			<input name="teacher_add" type="text" class="input" id="teacher_add" value="<?php echo ucwords($rows_teacher['teacher_add']);?>" size="45" />
																		</span>
																	</td>
																</tr>
																<tr>
																	<td width="270" align="right">Bandar / Daerah  :</td>
																	<td width="480" align="left">
																		<span id="sprytextfield5">
																			<input name="teacher_daerah" type="text" class="input" id="teacher_daerah" value="<?php echo ucwords($rows_teacher['teacher_daerah']);?>" size="45" />
																		</span>
																	</td>
																</tr>
																<tr>
																	<td width="270" align="right">Poskod  :</td>
																	<td width="480" align="left">
																		<span id="sprytextfield6">
																			<input name="teacher_pos" type="text" class="input" id="teacher_pos" placeholder="cth : 12345" value="<?php echo ucwords($rows_teacher['teacher_pos']);?>" size="8" maxlength="5" /><br/>
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
																			<option value="Johor" <?php if($rows_teacher['teacher_state']=="Johor") { ?>selected="selected"<?php } ?>>Johor</option>
																			<option value="Melaka" <?php if($rows_teacher['teacher_state']=="Melaka") { ?>selected="selected"<?php } ?>>Melaka</option>
																			<option value="Negeri Sembilan" <?php if($rows_teacher['teacher_state']=="Negeri Sembilan") { ?>selected="selected"<?php } ?>>Negeri Sembilan</option>
																			<option value="Selangor" <?php if($rows_teacher['teacher_state']=="Selangor") { ?>selected="selected"<?php } ?>>Selangor</option>
																			<option value="Putrajaya" <?php if($rows_teacher['teacher_state']=="Putrajaya") { ?>selected="selected"<?php } ?>>Putrajaya</option>
																			<option value="Kuala Lumpur" <?php if($rows_teacher['teacher_state']=="Kuala Lumpur") { ?>selected="selected"<?php } ?>>Kuala Lumpur</option>
																			<option value="Perak" <?php if($rows_teacher['teacher_state']=="Perak") { ?>selected="selected"<?php } ?>>Perak</option>
																			<option value="Pulau Pinang" <?php if($rows_teacher['teacher_state']=="Pulau Pinang") { ?>selected="selected"<?php } ?>>Pulau Pinang</option>
																			<option value="Kedah" <?php if($rows_teacher['teacher_state']=="Kedah") { ?>selected="selected"<?php } ?>>Kedah</option>
																			<option value="Perlis" <?php if($rows_teacher['teacher_state']=="Perlis") { ?>selected="selected"<?php } ?>>Perlis</option>
																			<option value="Kelantan" <?php if($rows_teacher['teacher_state']=="Kelantan") { ?>selected="selected"<?php } ?>>Kelantan</option>
																			<option value="Terengganu" <?php if($rows_teacher['teacher_state']=="Terengganu") { ?>selected="selected"<?php } ?>>Terengganu</option>
																			<option value="Pahang" <?php if($rows_teacher['teacher_state']=="Pahang") { ?>selected="selected"<?php } ?>>Pahang</option>
																			<option value="Sabah" <?php if($rows_teacher['teacher_state']=="Sabah") { ?>selected="selected"<?php } ?>>Sabah</option>
																			<option value="Sarawak" <?php if($rows_teacher['teacher_state']=="Sarawak") { ?>selected="selected"<?php } ?>>Sarawak</option>
																			<option value="Lain-lain" <?php if($rows_teacher['teacher_state']=="Lain-lain") { ?>selected="selected"<?php } ?>>Lain-lain</option>
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
																			<input name="teacher_username" type="text" class="input" id="teacher_username" value="<?php echo ucwords($rows_teacher['teacher_username']);?>" size="45" />
																			<font color="#FF0000"><strong>*</strong></font><br/>
																			<span class="textfieldRequiredMsg">ID pengguna diperlukan.</span>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td width="270" align="right">Kata Laluan  :</td>
																	<td width="480" align="left">
																		<span id="sprypassword1">
																			<input name="teacher_password" type="password" class="input" id="teacher_password" value="<?php echo ucwords($rows_teacher['teacher_password']);?>" size="45" />
																			<font color="#FF0000"><strong>*</strong></font><br/>
																			<span class="passwordRequiredMsg">Kata laluan diperlukan.</span>
																		</span>
																	</td>
																</tr>
															<tr>
																<td align="right">&nbsp;</td>
																<td align="left">
																	<button type="submit" name="simpan" class="butangadmin"><span>SIMPAN</span></button>
																	<button type="reset" class="butangadmin"><span>PADAM</span></button>
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
	<script type="text/javascript">
	var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["change"]});
	var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email", {validateOn:["change"]});
	var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["change"], isRequired:false, minChars:10, maxChars:11});
	var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {isRequired:false});
	var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {isRequired:false});
	var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "integer", {isRequired:false, minChars:5, maxChars:5, validateOn:["change"]});
	var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {isRequired:false});
	var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "none", {validateOn:["change"]});
	var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["change"]});
	</script>
</body>
</html>