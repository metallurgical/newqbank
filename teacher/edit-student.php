<?php
session_start();
include('../config.php');

$sql_student = "SELECT * FROM student WHERE student_id = '".$_GET['id']."'";
if($result_student = $connect->query($sql_student))
{
	$rows_student = $result_student->fetch_array();
	$total_student = $result_student->num_rows;
}



if(isset($_POST['simpan']))
{
	extract($_POST);
	
$sql_edit_student = "UPDATE student SET 
				student_name     = '".$student_name."',
				student_ic       = '".$student_ic."',
				student_form     = '".$student_form."',
				student_phone    = '".$student_phone."',
				student_add      = '".$student_add."',
				student_state    = '".$student_state."',
				student_username = '".$student_username."',
				student_password = '".$student_password."'
				WHERE student_id = '".$_GET['id']."'";
			
			if($result_edit_student = $connect->query($sql_edit_student)or die(mysql_error()))
			{
				echo "<script language=javascript>alert('Maklumat pelajar berjaya dikemaskini.');window.location='edit-student.php?id=".$_GET['id']."';</script>";
			}
			else
			{
				echo "<script language=javascript>alert('Maklumat pelajar tidak berjaya dikemaskini. Sila cuba lagi.');window.location='edit-student.php?id=".$_GET['id']."';</script>";
			}
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>My Bank Question</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" media="screen" href="css/index.css" >

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
																<a href="student-manage.php" class='butangadmin'><span>PENGURUSAN PELAJAR</span></a>
																<a href="edit-teacher.php" class='butangadmin'><span>KEMASKINI PROFIL</span></a>
																<a href="question-upload.php" class='butangadmin'><span>PENGURUSAN SOALAN</span></a>
																												
																<a href="<?php echo $_SERVER['PHP_SELF']."?action=logout";?>" class='butangadmin'><span>LOG KELUAR</span></a>
															</td>
														</tr>
													</table>
												</div>
											</div>
											<div class="sub-tajuk-merah" style="width:730px;margin-top:20px" align="left"><strong>Log Masuk : <?php echo ucwords($rows_student['student_name']);?></strong></div>
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
																<td width="270" align="right">Nama Penuh  :</td>
																<td width="480" align="left">
																  <span id="sprytextfield1">
																		<input name="student_name" type="text" class="input" id="student_name" value="<?php echo ucwords($rows_student["student_name"]);?>" size="45" />
																		<font color="#FF0000"><strong>*</strong></font></span></td>
															</tr>
															<tr>
																<td width="270" align="right"> No IC  :</td>
																<td width="480" align="left"><p><span id="sprytextfield1">
																  <input name="student_ic" type="text" class="input" id="student_ic" value="<?php echo ucwords($rows_student["student_ic"]);?>" size="45" />
																  <font color="#FF0000"><strong>*</strong></font><br/>
																  <span class="textfieldRequiredMsg">Nama penuh diperlukan</span></span></p></td>
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
<option value="<?php echo $data['class_tingkatan'];?>-<?php echo $data['class_name'];?>" <?php if($rows_student['student_form']==$data['class_tingkatan'].'-'.$data['class_name']) echo 'selected';?>><?php echo $data['class_tingkatan'];?>-<?php echo $data['class_name'];?></option>
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
																<td width="270" align="right">No Telefon  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield4">
																		<input name="student_phone" type="text" class="input" id="student_phone" value="<?php echo ucwords($rows_student["student_phone"]);?>" size="45" />
																	</span>
																</td>
															</tr>
															<tr>
																<td width="270" align="right">Alamat  :</td>
																<td width="480" align="left">
																	<span id="sprytextfield4">
																		<input name="student_add" type="text" class="input" id="student_add" value="<?php echo ucwords($rows_student["student_add"]);?>" size="45" />
																	</span>
																</td>
															</tr>
															<tr>
																<td width="270" align="right">Negeri  :</td>
																<td width="480" align="left">
																	<span id="spryselect1">
																		<select name="student_state" id="student_state" class="input">
																		<option value="" selected="selected">-- Sila Pilih Negeri --</option>
																		<option value="Johor" <?php if($rows_student["student_state"]=="Johor") { ?>selected="selected"<?php } ?>>Johor</option>
																		<option value="Melaka" <?php if($rows_student["student_state"]=="Melaka") { ?>selected="selected"<?php } ?>>Melaka</option>
																		<option value="Negeri Sembilan" <?php if($rows_student["student_state"]=="Negeri Sembilan") { ?>selected="selected"<?php } ?>>Negeri Sembilan</option>
																		<option value="Selangor" <?php if($rows_student["student_state"]=="Selangor") { ?>selected="selected"<?php } ?>>Selangor</option>
																		<option value="Putrajaya" <?php if($rows_student["student_state"]=="Putrajaya") { ?>selected="selected"<?php } ?>>Putrajaya</option>
																		<option value="Kuala Lumpur" <?php if($rows_student["student_state"]=="Kuala Lumpur") { ?>selected="selected"<?php } ?>>Kuala Lumpur</option>
																		<option value="Perak" <?php if($rows_student["student_state"]=="Perak") { ?>selected="selected"<?php } ?>>Perak</option>
																		<option value="Pulau Pinang" <?php if($rows_student["student_state"]=="Pulau Pinang") { ?>selected="selected"<?php } ?>>Pulau Pinang</option>
																		<option value="Kedah" <?php if($rows_student["student_state"]=="Kedah") { ?>selected="selected"<?php } ?>>Kedah</option>
																		<option value="Perlis" <?php if($rows_student["student_state"]=="Perlis") { ?>selected="selected"<?php } ?>>Perlis</option>
																		<option value="Kelantan" <?php if($rows_student["student_state"]=="Kelantan") { ?>selected="selected"<?php } ?>>Kelantan</option>
																		<option value="Terengganu" <?php if($rows_student["student_state"]=="Terengganu") { ?>selected="selected"<?php } ?>>Terengganu</option>
																		<option value="Pahang" <?php if($rows_student["student_state"]=="Pahang") { ?>selected="selected"<?php } ?>>Pahang</option>
																		<option value="Sabah" <?php if($rows_student["student_state"]=="Sabah") { ?>selected="selected"<?php } ?>>Sabah</option>
																		<option value="Sarawak" <?php if($rows_student["student_state"]=="Sarawak") { ?>selected="selected"<?php } ?>>Sarawak</option>
																		<option value="Lain-lain" <?php if($rows_student["student_state"]=="Lain-lain") { ?>selected="selected"<?php } ?>>Lain-lain</option>
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
																		<input name="student_username" type="text" class="input" id="student_username" value="<?php echo $rows_student["student_username"];?>" size="45" />
																		<font color="#FF0000"><strong>*</strong></font><br/>
																		<span class="textfieldRequiredMsg">ID pengguna diperlukan.</span>
																	</span>
																</td>
															</tr>
															<tr>
																<td width="270" align="right">Kata Laluan  :</td>
																<td width="480" align="left">
																	<span id="sprypassword1">
																		<input name="student_password" type="password" class="input" id="student_password" value="<?php echo ucwords($rows_student["student_password"]);?>" size="45" />
																		<font color="#FF0000"><strong>*</strong></font><br/>
																		<span class="passwordRequiredMsg">Kata laluan diperlukan.</span>
																	</span>
																</td>
															</tr></table>
                                                            <p><table width="200" border="0" align="center">
                                                            <input type="hidden" name="student_id" value="<?php echo $_GET['id']; ?>"/>
                                                            
															<tr>
																<td align="right">&nbsp;</td>
																<td align="left">
					<button type="submit" name="simpan" class="butangadmin"><span>SIMPAN</span></button>
                                                                    <button type="submit" name="simpan" class="butangadmin"><span>PADAM</span></button>


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