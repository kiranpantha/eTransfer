<?php
class getuser
{
  function getlist($s_c)
  {
   if ($s_c!=='GETDATAOFUSER'){exit();}
   $main_top=$main_body=NULL;
   $login_id="NULL";
   require('dbconn.php');
   $tbl_name="members"; // Table name 
   $sql="SELECT * FROM $tbl_name";
   $result_user=mysql_query($sql);
   $main_top='<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <tr>
    <td width="5%"   background="images/blue.png"><div align="center">id</div></td>
     <td width="10%"  background="images/blue.png"><div align="center">Name</div></td>
    <td width="10%"  background="images/blue.png"><div align="center">Details</div></td>
    <td width="14%"  background="images/blue.png"><div align="center">Action</div></td>
 </tr>';
   $count=mysql_num_rows($result_user);
   if($count>=1){
    while($rows=mysql_fetch_array($result_user))
    {
    $login_id=$rows['id'];
    $login_name=$rows['name'];
    $login_email=$rows['email'];
    $login_org=$rows['organization'];
    $login_address=$rows['address'];
    $login_phone=$rows['phone']; 
	$login_birthday=$rows['birthday'];
    $login_gen=$rows['gender'];
	  //get balance of user
	  $tbl_name='balance';
	  $sql="SELECT * FROM $tbl_name WHERE id=$login_id";
	  $result=mysql_query($sql);
	  $count=mysql_num_rows($result);
	  if ($count==1)
	  {
	  $rows=mysql_fetch_array($result);
	  $balance=$rows['ab'];
	  $activeon=$rows['active'];
	$main_body.='<tr>
    <td  background="images/blue.png">'.$login_id.'</td>
    <td  background="images/blue.png">'.$login_name.'</td>
	<td background="images/noisestrip.png"><a class="modal-button" href="user_show_details.php?id='.$rows['id'].'" rel="{handler: \'iframe\', size: {x: 720, y: 190}, overlayOpacity: 0.7}">View details..</a></td>
	<td background="images/noisestrip.png"><iframe frameborder="0" height="30px" width="100px" scrolling="no" src="super_class/user_action_data.php?userid='.$login_id.'" allowtransparency="yes"></iframe>
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
    return "No Record Found";
    }
   }
  }
}
?>