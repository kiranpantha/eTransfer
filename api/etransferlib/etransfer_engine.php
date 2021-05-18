<?php
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///DDDDD//////OO0O////////////NN///////NN///OOOOO////TTTTTTTTTTT///////EEEEEEEEEE//DDDDD////IIIIIII//TTTTTTTTTTTT//
  ///D///DD////OO///OO//////////NNNN/////NN//OO////OO///////TT///////////EE//////////D///DD//////II/////////TT///////
  ///D///DDD///OO///OO//////////NN/NN////NN//OO////OO///////TT///////////EE//////////D///DDD/////II/////////TT///////
  ///D///DDDD//OO///OO//////////NN///NN//NN//OO////OO///////TT///////////EEEEEEEEEE//D///DDDD////II/////////TT///////
  ///D///DDD///OO///OO//////////NN////NN/NN//OO////OO///////TT///////////EE//////////D///DDD/////II/////////TT///////
  ///D///DD////OO///OO//////////NN/////NNNN//OO////OO///////TT///////////EE//////////D///DD//////II/////////TT///////
  ///DDDDD//////OO00////////////NN//////NNN////OOOOO////////TT///////////EEEEEEEEEE//DDDDD/////IIIIII///////TT///////
  //-----------------------------------------Code By E-Transfer----------------------------------------------------//
  //--------------------------------------Written By Kiran Pantha--------------------------------------------------//
  //--------------------------------------www.kiranpantha.com.np---------------------------------------------------//
  //-------------------------------------(c) 2013 E-transfer Nepal-------------------------------------------------//
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if ($_GET)                                                                                                               
{        
require('etransferlib/etransfermainclass.php');
$accesscode=@$_GET['accesscode']; $x1=@$_GET['x1']; $x2=@$_GET['x2']; $x3=@$_GET['x3']; $x4=@$_GET['x4']; $invoiceid=@$_GET['invoiceid'];     
   if (!empty($x1) && !empty($x2) && !empty($x3) && !empty($x4)  && !empty($accesscode) && !empty($invoiceid))
   {                                     
   $etransfer_main_validity_obj=new etransfer_data_main();
   $etransfer_main_validity=$etransfer_main_validity_obj->etransfer_data_get_result($accesscode,$specialcode,$merchantid,$x1,$x2,$x3,$x4,$invoiceid);
   if($etransfer_main_validity=='TRANSFEROK')
   { 
      $e_t_result='ITSOK';
   }
   }
   else
   {
	  echo '<div class="warning">Error 0XASD002<BR>System Error</div>';
   }
}
?>