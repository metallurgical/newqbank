<?php
session_start();
include ('config.php');
?>
<html>
<body>
<style type="text/css">
body form table tr td span {
	font-size: 10px;
}
body form table tr td span {
	font-size: 14px;
}
</style>


<form name="form1" method="post" action="">
  <table width="981" height="510" border="1" align="center" style="border-collapse:collapse; font-size: 10px;">
    <tr>
      <td width="777">
      <link rel="stylesheet" media="screen" href="css/index.css" >
	  <link rel="stylesheet" type="text/css" href="css/style.css" />
      	<center><img src="images/header.jpg" width="100%" height="246" /></center>
			<div align="center">
              <table width="651" height="29" border="1">
			    <tr style="text-align: center">
			      <td height="23"><a href="index.php" class="butangadmin"><span>Laman Utama</span></a></td>
			      <td><a href="#" class="butangadmin"><span>Maklumat Am</span></a></td>
			      <td><a href="#" class="butangadmin"><span>Latar Belakang</span></a></td>
                  <td><a href="loginf.php" class="butangadmin"><span>Daftar Masuk</span></a></td>
			      <td><a href="#" class="butangadmin"><span>Hubungi Kami</span></a></td>
		        </tr>
		      </table>
        </div>
		</div>
      <br>
      <br>
	    	<?php require ('login_students.php'); ?>
      <br>
      <br>
      <span style="text-align: justify"><br>
      </span>
    </tr>
      <td valign="bottom" align="center"> 
      			<strong>Copyright (c)Jabatan Teknologi Maklumat (PSMZA)<br>
                		 Sekolah Menengah Sains Dungun (SMSD) Dungun Terengganu</strong>
	 </td>
    </tr>
            </td>
  </table>
<br>
</form>
</style>
</body>
</html>