<?php
class etransferlib
{ 
  function etransfer_verify($specialcode,$accesscode,$x1,$x2)
  {
  $pass_secured=$epay=$x1_a=$x2_a=NULL;
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
  $error_e=302;
  $pass_secured=md5($specialcode);
  $x1_a=md5(base64_decode($x1));
  $x2_a=$x2;
  if (!empty($x1_a) || !empty($x2_a))
  {
     if ($x1_a!==$x2_a)
	 {
	 $error_e=404;
	 }
	 if ($pass_secured!==$accesscode)
	 {
	 $error_e=404;
	 }
   }
  return $error_e;
  }
}
?>