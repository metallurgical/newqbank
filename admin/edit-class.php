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

$sql_class = "SELECT * FROM class WHERE class_id = ".$_GET['id']."";
if($result_class = $connect->query($sql_class))
{
	$rows_class = $result_class->fetch_array();
	if(!$total_class = $result_class->num_rows)
	{
		echo "<script language=javascript>alert('Maklumat guru tidak wujud.');window.location='class-list.php';</script>";
	}
}


if(isset($_POST['simpan']))
{
	extract($_POST);
	//$sql_edit_class = "SELECT * FROM class WHERE class_id != '".$_GET['id']."' AND class_username = '".$username."'";
	//if($result_edit_class = $connect->query($sql_edit_class))
	//{
		//if($total_edit_class = $result_edit_class->num_rows)
		//{
			//echo "<script language=javascript>alert('ID pengguna telah wujud. Sila cuba lagi.');window.location='edit-class.php?id=".$_GET['id']."';</script>";
		//}
		//else
		//{
			$sql_edit_class = "UPDATE class SET class_name = '".$class_name."' WHERE class_id = '".$_GET['id']."'";
			if($result_edit_class = $connect->query($sql_edit_class))
			{
				echo "<script language=javascript>alert('Maklumat kelas berjaya dikemaskini.');window.location='view-class.php?id=".$_GET['id']."';</script>";
			}
			else
			{
				echo "<script language=javascript>alert('Maklumat guru tidak berjaya dikemaskini. Sila cuba lagi.');window.location='edit-class.php?id=".$_GET['id']."';</script>";
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
		<table width="98" height="510" border="1" align="center" style="border-collapse:collapse; font-size: 10px;">
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
											<div class="sub-tajuk-merah" style="width:730px;margin-top:20px" align="left"><strong>Log Masuk : <?php echo ucwords($rows_admin['admin_name']);?></strong></div>
												<form method="post" enctype="multipart/form-data" name="borang_pengesahan_pembayaran" class="borang" id="borang_pengesahan_pembayaran" style="padding-top:20px">
													<fieldset>
														<table width="750" border="0" align="center" cellpadding="3" cellspacing="1">
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kelabu">KEMASKINI PROFIL</div></td>
															</tr>
															<tr>
																<td colspan="2" align="center"><div class="sub-tajuk-kuning2"><strong>MAKLUMAT KELAS</strong></div></td>
															</tr>
																<tr>
																	<td width="270" align="right">Nama Kelas :</td>
																	<td width="480" align="left">
																		<span id="sprytextfield1">
																			<input name="class_name" type="text" class="input" id="class_name" value="<?php echo ucwords($rows_class['class_name']);?>" size="45" />
																			
																			
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