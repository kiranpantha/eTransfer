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
$e_t_result=NULL;  
require('etransferlib/etransfercss.php');
require('etransferlib/etransfermainclass.php');
$got_hash_data=@$_GET['hash'];
$f_=@file('http://localhost/e/temp_data_merchant_listit/'.$got_hash_data);
$invoiceid=substr($f_[0],0,strlen($f_[0])-1);
$accesscode=substr($f_[1],0,32);
$unicheck1=substr($f_[2],0,32);
$unicheck_md5=substr($f_[3],0,32);
$unicheck_sha=$f_[4];
   if (!empty($invoiceid) && !empty($accesscode) && !empty($unicheck1) && !empty($unicheck_md5)  && !empty($unicheck_sha))
   {                                     
   $etransfer_main_validity_obj=new etransfer_data_main();
   $etransfer_main_validity=$etransfer_main_validity_obj->etransfer_data_get_result($accesscode,$specialcode,$merchantid,$unicheck1,$unicheck_md5,$unicheck_sha,$invoiceid,$got_hash_data);
   if($etransfer_main_validity=='TRANSFEROK')
   { 
      $e_t_result='ITSOK';
   }
   else
   {
      $e_t_result = $etransfer_main_validity;
   }
   }
   else
   {
      $e_t_result = 'Invalid or Already Purchased';
   }
}
?>