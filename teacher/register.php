<?php
session_start();
include('../config.php');

if(isset($_POST['submit']))
{
	$sql_daftar = "SELECT * FROM student WHERE student_username = '".$username."'";
	if($result_daftar = $connect->query($sql_daftar))
	{
		if($total_daftar = $result_daftar->num_rows)
		{
			echo "<script language=javascript>alert('ID pengguna telah wujud. Sila cuba lagi.');window.location='register.php';</script>";
		}
		else
		{
			$sql_daftar = "INSERT INTO student (student_name, student_ic, student_form, student_phone, student_add, student_state, student_username, student_password) VALUES ('".$student_name."', '".$student_ic."', '".$student_form."', '".$student_phone."', '".$student_add."', '".$student_state."', '".$student_username."', '".$student_password."')";
			if($result_daftar = $connect->query($sql_daftar))
			{
				$id = $connect->insert_id;
				echo "<script language=javascript>alert('Pendaftaran berjaya. Sila log masuk.');window.location='view-student.php?id=$id';</script>";
			}
			else
			{
				echo "<script language=javascript>alert('Pendaftaran tidak berjaya. Sila cuba lagi.');window.location='register.php';</script>";
			}
		}
	}
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>My Question Bank</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />	<link rel="stylesheet" media="screen" href="css/index.css" >

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
																<a href="index.php" class='butangadmin'><span>LAMAN UTAMA</span></a>
																<a href="student-manage.php" class='butangadmin'><span>PENGURUSAN PELAJAR</span></a>
																<a href="" class='butangadmin'><span>KEMASKINI PROFIL</span></a>
																<a href="" class='butangadmin'><span>PENGURUSAN SOALAN</span></a>															
																<a href="<?php echo $_SERVER['PHP_SELF']."?action=logout";?>" class='butangadmin'><span>LOG KELUAR</span></a>
															</td>
														</tr>
													</table>
													<form id="borang_pengesahan_pembayaran" name="borang_pengesahan_pembayaran" method="post" class="borang" style="padding-top:20px">
														<fieldset>
															<table width="750" border="0" align="center" cellpadding="3" cellspacing="1">
																<tr>
																	<td colspan="2" align="center"><div class="sub-tajuk-kelabu">BORANG PENDAFTARAN PELAJAR</div></td>
																</tr>
																<tr>
																	<td colspan="2" align="center"><div class="sub-tajuk-kuning2"><strong>MAKLUMAT PELAJAR</strong></div></td>
																</tr>
																<tr>
																	<td width="270" align="right">Nama Penuh  :</td>
																	<td width="480" align="left">
																		<span id="sprytextfield1">
																			<input name="student_name" type="text" class="input" id="student_name" value="" size="45" required/>
																			<font color="#FF0000"><strong>*</strong></font><br/>
																			<span class="textfieldRequiredMsg">Nama penuh diperlukan.</span>
																		</span>
																	</td>
																</tr>	
																<tr>
																	<td width="270" align="right">IC Nombor  :</td>
																	<td width="480" align="left">
																		<span id="sprytextfield1">
																			<input name="student_ic" type="text" required class="input" id="student_ic" value="" size="16"placeholder="cth:921010035567" maxlength="12"/>
																			<font color="#FF0000"><strong>*</strong></font><br/>
																			<span class="textfieldRequiredMsg">NNo IC diperlukan.</span>
																	  </span>
																  </td>
																</tr>
																<tr>
																	<td width="270" align="right">Tingkatan  :</td>
																	<td width="480" align="left">
																		<span id="sprytextfield1">
																			<select name="student_form" id="student_form" class="input"required>
																				<option value="" selected="selected">-- Sila Pilih kelas --</option>
																				<?php
																				$sql_a = "SELECT * FROM class";
																				$result_a = $connect->query($sql_a);
																				while($data = $result_a->fetch_array())
																				{
																				?>
																				<option value="<?php echo $data['class_tingkatan'];?>-<?php echo $data['class_name'];?>"><?php echo $data['class_tingkatan'];?>-<?php echo $data['class_name'];?></option>
																				<?php
																				}
																				?>

																				
                                                                             </select>

                                                                             
																			<font color="#FF0000"><strong>*</strong></font><br/>
																			<span class="textfieldRequiredMsg">Tingkatan semasa diperlukan.</span>
																		</span>
																	</td>
																</tr>	
																<tr>
																	<td width="270" align="right">No.Telefon  :</td>
																	<td width="480" align="left">
																		<span id="sprytextfield4">
																			<input name="student_phone" type="text" class="input" id="student_phone" value="" size="15"placeholder="cth: 01234567891" maxlength="11" />
																		</span>
																	</td>
																</tr>
																<tr>
																	<td width="270" align="right">Alamat  :</td>
																	<td width="480" align="left">
																		<span id="sprytextfield1">
																			<input name="student_add" type="text" class="input" id="student_add" value="" size="45" required/>
																			<font color="#FF0000"><strong>*</strong></font><br/>
																			<span class="textfieldRequiredMsg">Alamat diperlukan.</span>
																		</span>
																	</td>
																</tr>	
																<tr>
																	<td width="270" align="right">Negeri  :</td>
																	<td width="480" align="left">
																		<span id="spryselect1">
																			<select name="student_state" id="student_state" class="input">
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
																			<input name="student_username" type="text" class="input" id="student_username" value="" size="45" required/>
																			<font color="#FF0000"><strong>*</strong></font><br/>
																			<span class="textfieldRequiredMsg">ID pengguna diperlukan.</span>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td width="270" align="right">Kata Laluan  :</td>
																	<td width="480" align="left">
																		<span id="sprypassword1">
																			<input name="student_password" type="password" class="input" id="student_password" value="" size="45" required/>
																			<font color="#FF0000"><strong>*</strong></font><br/>
																			<span class="passwordRequiredMsg">Kata laluan diperlukan.</span>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td align="right">&nbsp;</td>
																	<td align="left">
																		<button type="submit" name="submit" class="butangadmin"><span>DAFTAR</span></button>
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
</body>
</html>