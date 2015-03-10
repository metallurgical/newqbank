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

$sql_pelajar = "SELECT * FROM student WHERE student_id = '".@$_SESSION['student_id']."'";
if($result_pelajar = $connect->query($sql_pelajar))
{
	$rows_pelajar = $result_pelajar->fetch_array();
	$total_pelajar = $result_pelajar->num_rows;
}

if(isset($_POST['simpan']))
{
	extract($_POST);
	//$sql_edit_pelajar = "SELECT * FROM student WHERE student_id != '".$_GET['id']."' AND student_username = '".$username."'";
	//if($result_edit_pelajar = $connect->query($sql_edit_pelajar))
	//{
		//if($total_edit_pelajar = $result_edit_pelajar->num_rows)
		//{
			//echo "<script language=javascript>alert('ID pengguna telah wujud. Sila cuba lagi.');window.location='edit-student.php?id=".$_GET['id']."';</script>";
		//}
		//else
		//{
			$sql_edit_pelajar = "UPDATE student SET student_ic = '".$student_ic."', student_name = '".$student_name."', student_username = '".$student_username."', student_form = '".$student_form."', student_phone = '".$student_phone."', student_state = '".$student_state."' WHERE student_id = '".$_SESSION['student_id']."'";
			if($result_edit_pelajar = $connect->query($sql_edit_pelajar)or die(mysql_error()))
			{
				echo "<script language=javascript>alert('Maklumat pelajar berjaya dikemaskini.');window.location='edit-student.php?id=".$_SESSION['student_id']."';</script>";
			}
			else
			{
				echo "<script language=javascript>alert('Maklumat pelajar tidak berjaya dikemaskini. Sila cuba lagi.');window.location='edit-student.php?id=".$_GET['id']."';</script>";
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
																<a href="edit-student.php" class='butangadmin'><span>KEMASKINI PROFIL</span></a>
																<a href="student-download.php" class='butangadmin'><span>MUAT TURUN SOALAN</span></a>
																<a href="<?php echo $_SERVER['PHP_SELF']."?action=logout";?>" class='butangadmin'><span>LOG KELUAR</span></a>
															</td>
														</tr>
													</table>
												</div>
											</div>
											<div class="sub-tajuk-merah" style="width:730px;margin-top:20px" align="left"><strong>Log Masuk : <?php echo ucwords($rows_pelajar['student_name'])." (".$rows_pelajar['student_username'].")";?></strong></div>
												<form method="post" enctype="multipart/form-data" name="borang_pengesahan_pembayaran" class="borang" id="borang_pengesahan_pembayaran" style="padding-top:20px">
													<fieldset>
														<table width="750" border="0" align="center" cellpadding="3" cellspacing="1">
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kelabu">KEMASKINI PROFIL</div></td>
															</tr>
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kuning2"><strong>MAKLUMAT PELAJAR</strong></div></td>
															</tr>
																<tr>
																	<td width="270" align="right">No IC  :</td>
																	<td width="480" align="left">
																		<span>
																			<input name="student_ic" type="text" class="input" id="student_ic" value="<?php echo ucwords($rows_pelajar['student_ic']);?>" size="16" maxlength="12" />
																			<font color="#FF0000"><strong>*</strong></font><br/>
																			<span class="textfieldRequiredMsg">No IC diperlukan.</span>
																	  </span>
																  </td>
																</tr>
																<tr>
																	<td width="270" align="right">Nama  :</td>
																	<td width="480" align="left">
																		<span >
																			<input name="student_name" type="text" class="input" id="student_name" value="<?php echo ucwords($rows_pelajar['student_name']);?>" size="45" />
																			<font color="#FF0000"><strong>*</strong></font><br/>
																			<span class="textfieldRequiredMsg">Nama penuh diperlukan.</span>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td width="270" align="right">Nama Pengguna  :</td>
																	<td width="480" align="left">
																		<span>
																			<input name="student_username" type="text" class="input" id="student_username" value="<?php echo ucwords($rows_pelajar['student_username']);?>" size="45" />
																			<font color="#FF0000"><strong>*</strong></font><br/>
																			<span class="textfieldRequiredMsg">Nama penuh diperlukan.</span>
																		</span>
																	</td>
																</tr>
																<tr>
																	<td width="270" align="right">Tingkatan  :</td>
																	<td width="480" align="left">
																	<!-- <select name="student_form" id="student_form" class="input">
																		<option value="">-- Sila Pilih kelas --</option>
																				<option value="1 Amanah" selected="selected" <?php if($rows_pelajar['student_form']=="1 Amanah") { ?>selected="selected"<?php } ?>>1 Amanah</option>
																				<option value="1 Berkat" <?php if($rows_pelajar['student_form']=="1 Berkat") { ?>selected="selected"<?php } ?>>1 Berkat</option>
																				<option value="1 Cekal" <?php if($rows_pelajar['student_form']=="1 Cekal") { ?>selected="selected"<?php } ?>>1 Cekal</option>
																				<option value="2 Amanah" <?php if($rows_pelajar['student_form']=="2 Amanah") { ?>selected="selected"<?php } ?>>2 Amanah</option>
																				<option value="2 Berkat" <?php if($rows_pelajar['student_form']=="2 Berkat") { ?>selected="selected"<?php } ?>>2 Berkat</option>
																				<option value="2 Cekal" <?php if($rows_pelajar['student_form']=="2 Cekal") { ?>selected="selected"<?php } ?>>2 Cekal</option>
																				<option value="3 Amanah" <?php if($rows_pelajar['student_form']=="3 Amanah") { ?>selected="selected"<?php } ?>>3 Amanah</option>
																				<option value="3 Berkat" <?php if($rows_pelajar['student_form']=="3 Berkat") { ?>selected="selected"<?php } ?>>3 Berkat</option>
																				<option value="3 Cekal" <?php if($rows_pelajar['student_form']=="3 Cekal") { ?>selected="selected"<?php } ?>>3 Cekal</option>
                                                                                <option value="4 Amanah" <?php if($rows_pelajar['student_form']=="4 Amanah") { ?>selected="selected"<?php } ?>>4 Amanah</option>
																				<option value="4 Berkat" <?php if($rows_pelajar['student_form']=="4 Berkat") { ?>selected="selected"<?php } ?>>4 Berkat</option>
																				<option value="4 Cekal" <?php if($rows_pelajar['student_form']=="4 Cekal") { ?>selected="selected"<?php } ?>>4 Cekal</option>
																				<option value="5 Amanah" <?php if($rows_pelajar['student_form']=="5 Amanah") { ?>selected="selected"<?php } ?>>5 Amanah</option>
                                                                                <option value="5 Berkat" <?php if($rows_pelajar['student_form']=="5 Berkat") { ?>selected="selected"<?php } ?>>5 Berkat</option>
																				<option value="5 Cekal" <?php if($rows_pelajar['student_form']=="5 Cekal") { ?>selected="selected"<?php } ?>>5 Cekal</option>
                                                                             </select> -->
                                                                             <select name="student_form" id="student_form" class="input">
																				<option value="" selected="selected">-- Sila Pilih kelas --</option>
																				<?php
																				$sql_a = "SELECT * FROM class";
																				$result_a = $connect->query($sql_a);
																				while($data = $result_a->fetch_array())
																				{
																				?>
<option value="<?php echo $data['class_tingkatan'];?>-<?php echo $data['class_name'];?>" <?php if($rows_pelajar['student_form']==$data['class_tingkatan'].'-'.$data['class_name']) { ?>selected="selected"<?php } ?>><?php echo $data['class_tingkatan'];?>-<?php echo $data['class_name'];?></option>
																				<?php
																				}
																				?>

																				
                                                                             </select>
                                                                             
                                                                             
																  </td>
																</tr>
																<tr>
																	<td width="270" align="right">No. Telefon :</td>
																	<td width="480" align="left">
																		<span >
																			<input name="student_phone" type="text" class="input" id="student_phone" placeholder="cth : 0123456789" value="<?php echo $rows_pelajar['student_phone'];?>" size="11" maxlength="11" /><br/>
																			<span class="textfieldInvalidFormatMsg">No telefon bimbit tidak sah.</span>
																			<span class="textfieldMinCharsMsg">No telefon bimbit tidak sah.</span>
																			<span class="textfieldMaxCharsMsg">No telefon bimbit tidak sah.</span>
																	  </span>
																  </td>
																</tr>									
																<tr>
																	<td width="270" align="right">Negeri  :</td>
																	<td width="480" align="left">
																		<span>
																			<select name="student_state" id="student_state" class="input">
																			<option value="" selected="selected">-- Sila Pilih Negeri --</option>
																			<option value="Johor" <?php if($rows_pelajar['student_state']=="Johor") { ?>selected="selected"<?php } ?>>Johor</option>
																			<option value="Melaka" <?php if($rows_pelajar['student_state']=="Melaka") { ?>selected="selected"<?php } ?>>Melaka</option>
																			<option value="Negeri Sembilan" <?php if($rows_pelajar['student_state']=="Negeri Sembilan") { ?>selected="selected"<?php } ?>>Negeri Sembilan</option>
																			<option value="Selangor" <?php if($rows_pelajar['student_state']=="Selangor") { ?>selected="selected"<?php } ?>>Selangor</option>
																			<option value="Putrajaya" <?php if($rows_pelajar['student_state']=="Putrajaya") { ?>selected="selected"<?php } ?>>Putrajaya</option>
																			<option value="Kuala Lumpur" <?php if($rows_pelajar['student_state']=="Kuala Lumpur") { ?>selected="selected"<?php } ?>>Kuala Lumpur</option>
																			<option value="Perak" <?php if($rows_pelajar['student_state']=="Perak") { ?>selected="selected"<?php } ?>>Perak</option>
																			<option value="Pulau Pinang" <?php if($rows_pelajar['student_state']=="Pulau Pinang") { ?>selected="selected"<?php } ?>>Pulau Pinang</option>
																			<option value="Kedah" <?php if($rows_pelajar['student_state']=="Kedah") { ?>selected="selected"<?php } ?>>Kedah</option>
																			<option value="Perlis" <?php if($rows_pelajar['student_state']=="Perlis") { ?>selected="selected"<?php } ?>>Perlis</option>
																			<option value="Kelantan" <?php if($rows_pelajar['student_state']=="Kelantan") { ?>selected="selected"<?php } ?>>Kelantan</option>
																			<option value="Terengganu" <?php if($rows_pelajar['student_state']=="Terengganu") { ?>selected="selected"<?php } ?>>Terengganu</option>
																			<option value="Pahang" <?php if($rows_pelajar['student_state']=="Pahang") { ?>selected="selected"<?php } ?>>Pahang</option>
																			<option value="Sabah" <?php if($rows_pelajar['student_state']=="Sabah") { ?>selected="selected"<?php } ?>>Sabah</option>
																			<option value="Sarawak" <?php if($rows_pelajar['student_state']=="Sarawak") { ?>selected="selected"<?php } ?>>Sarawak</option>
																			<option value="Lain-lain" <?php if($rows_pelajar['student_state']=="Lain-lain") { ?>selected="selected"<?php } ?>>Lain-lain</option>
																			</select>
																		</span>
																	</td>
																</tr>
															<tr>
																<td align="right">&nbsp;</td>
																<td align="left">
																	<button type="submit" name="simpan" class="butangadmin"><span>SIMPAN</span></button>
																	<!-- <button type="reset" class="butangadmin"><span>PADAM</span></button> -->
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