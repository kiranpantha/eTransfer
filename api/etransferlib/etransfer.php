<?php
class etransferlib
{ 
  function etransfer_verify($specialcode,$accesscode,$unicheck1,$unicheck_md5,$unicheck_sha1)
  {
  $pass_secured=$epay=$md5_decoded=$sha1_decoded=NULL;
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
  //-------------------------------------(c) 2013 e-transfer Nepal-------------------------------------------------//
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  $error_e=302;
  $pass_secured=md5($specialcode);
  $md5_decoded=md5($unicheck1);
  $sha1_decoded=sha1($unicheck1);
     if ($md5_decoded!==$unicheck_md5)
	 {
	 $error_e='Checkpost 1 ERROR';
	 }
     if ($sha1_decoded!==$unicheck_sha1)
	 {
	 $error_e='Checkpost 2 ERROR';
	 }
	 if ($pass_secured!==$accesscode)
	 {
	 $error_e='Merchant ERROR';
	 }
  return $error_e;
  }
}
?>