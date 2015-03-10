<?php
@session_start();
include('config.php');

if(isset($_SESSION['student_id']))
{
	echo "<script language=javascript>window.location='admin/index.php';</script>";
}

if(isset($_POST['login']))
{
	$sql_login_pelajar = "SELECT * FROM student WHERE student_username = '".$username."' AND student_password = '".$password."'";
	if($result_login_pelajar = $connect->query($sql_login_pelajar))
	{
		$rows_login_pelajar = $result_login_pelajar->fetch_array();
		if($total_login_pelajar = $result_login_pelajar->num_rows)
		{
			$_SESSION['student_id'] = $rows_login_pelajar['student_id'];
			echo "<script language=javascript>window.location='student/index.php';</script>";
		}
		else
		{
			echo "<script language=javascript>alert('Log masuk tidak berjaya. Sila cuba lagi.');window.location='login_student.php';</script>";
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>My Question Bank</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
	<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
	<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
</head>
<body>
	<table>
		<tr>
			<td>
				<form id="borang_pelanggan_masuk" name="borang_pelanggan_masuk" method="post" style="padding-top:20px">
					<table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
						<tr>
							<td width="23"><img src="images/kotak_01_01.png" width="23" height="21" alt="" /></td>
							<td background="images/kotak_01_02.png">&nbsp;</td>
							<td width="31" height="21"><img src="images/kotak_01_03.png" width="31" height="21" alt="" /></td>
						</tr>
						<tr>
							<td background="images/kotak_01_04.png">&nbsp;</td>
							<td valign="top" bgcolor="#FFFFFF">
								<table border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
									<tr>
										<td><div class="sub-tajuk-borang bulat">Log Masuk Pelajar</div></td>
									</tr>
									<tr>
										<td>ID Pengguna</td>
									</tr>
									<tr>
										<td>
											<span id="sprytextfield1">
												<input name="username" type="text" class="input" size="45" id="username" /><br/>
												<span class="textfieldRequiredMsg">ID Pengguna diperlukan.</span>
											</span>
										</td>
									</tr>
									<tr>
										<td>Kata Laluan</td>
									</tr>
									<tr>
										<td>
											<span id="sprypassword1">
												<input name="password" type="password" class="input" size="45" id="password" /><br/>
												<span class="passwordRequiredMsg">Kata laluan diperlukan.</span>
											</span>
										</td>
									</tr>
									<tr>
										<td align="left">
											<button type="submit" name="login" class="butangkecil"><span>MASUK</span></button>
											<button type="reset" class="butangkecil"><span>PADAM</span></button>
										</td>
									</tr>
								</table>
							</td>
							<td background="images/kotak_01_05.png">&nbsp;</td>
						</tr>
						<tr>
							<td><img src="images/kotak_01_06.png" width="23" height="33" alt="" /></td>
							<td background="images/kotak_01_07.png">&nbsp;</td>
							<td height="33"><img src="images/kotak_01_08.png" width="31" height="33" alt="" /></td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
</body>
</html>