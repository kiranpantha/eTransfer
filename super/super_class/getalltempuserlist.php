<?php
class gettempuser
{
  function gettemplist($s_c)
  {
   if ($s_c!=='GETDATAOFUSER'){exit();}
   $main_top=$main_body=$data_ok=NULL;
   $login_id="NULL";
   require('dbconn.php');
   $tbl_name="temp_members_db"; // Table name 
   $sql="SELECT * FROM $tbl_name";
   $result_user=mysql_query($sql);
   $main_top='<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td width="10%"  background="images/blue.png"><div align="center">Name</div></td>
    <td width="14%"  background="images/blue.png"><div align="center">Address</div></td>
    <td width="16%"  background="images/blue.png"><div align="center">E-mail</div></td>
    <td width="10%"  background="images/blue.png"><div align="center">Organisation</div></td>
    <td width="21%"  background="images/blue.png"><div align="center">Phone no </div></td>
    <td width="14%"  background="images/blue.png"><div align="center">Birthday</div></td>
    <td width="12%"  background="images/blue.png"><div align="center">Gender</div></td>
	<td width="15%"  background="images/blue.png"><div align="center">Action</div></td>
  </tr>';
   $count=mysql_num_rows($result_user);
   if($count>=1){
    while($rows=mysql_fetch_array($result_user))
    {
    $login_name=$rows['name'];
    $login_email=$rows['email'];
    $login_org=$rows['organization'];
	if ($login_org==NULL)
	{
	$login_org="NULL";
	}
    $login_address=$rows['address'];
    $login_phone=$rows['phone']; 
	$login_birthday=$rows['birthday'];
    $login_gen=$rows['gender'];
	  //get balance of user
	$main_body.='<tr>
    <td background="images/noisestrip.png">'.$login_name.'</td>
    <td background="images/noisestrip.png">'.$login_address.'</td>
    <td background="images/noisestrip.png">'.$login_email.'</td>
    <td background="images/noisestrip.png">'.$login_org.'</td>
    <td background="images/noisestrip.png">'.$login_phone.'</td>
    <td background="images/noisestrip.png">'.$login_birthday.'</td>
    <td background="images/noisestrip.png">'.$login_gen.'</td>
	<td background="images/noisestrip.png"><iframe frameborder="0" height="30px" width="100px" scrolling="no" src="super_class/tempuser_action_data.php?emailid='.$login_email.'"  allowtransparency="yes"></iframe>
</td>
    </tr>';
    $data_ok='OK';
    }
    }
	if ($data_ok=='OK')
    {
    return  $main_top.$main_body."</table>";
    }
    else
    {
	include('css.php');
    return $css.'<div class="attention" align="center" style="height:30px;"><STRONG>No Record Found</STRONG></div>';
    }
  }
}
?>