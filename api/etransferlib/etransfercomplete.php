<?php
class etransferlib_complete
{
  function etransfer_verify($merid,$specialcode,$invoiceid,$got_hash_data)
  {
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///DDDDD///////OO0O////////NN///////NN///OOOOO////TTTTTTTTTTT///////EEEEEEEEEE//DDDDD////IIIIIII//TTTTTTTTTTTT//
  ///D///DD/////OO///OO//////NNNN/////NN//OO////OO///////TT///////////EE//////////D///DD//////II/////////TT///////
  ///D///DDD////OO///OO//////NN/NN////NN//OO////OO///////TT///////////EE//////////D///DDD/////II/////////TT///////
  ///D///DDDD///OO///OO//////NN///NN//NN//OO////OO///////TT///////////EEEEEEEEEE//D///DDDD////II/////////TT///////
  ///D///DDD////OO///OO//////NN////NN/NN//OO////OO///////TT///////////EE//////////D///DDD/////II/////////TT///////
  ///D///DD/////OO///OO//////NN/////NNNN//OO////OO///////TT///////////EE//////////D///DD//////II/////////TT///////
  ///DDDDD///////OO00////////NN//////NNN////OOOOO////////TT///////////EEEEEEEEEE//DDDDD/////IIIIII///////TT///////
  //-----------------------------------------Code By E-Transfer-------------------------------------------------//
  //--------------------------------------Written By Kiran Pantha-----------------------------------------------//
  //--------------------------------------www.kiranpantha.com.np------------------------------------------------//
  //-------------------------------------(c) 2013 E-transfer Nepal----------------------------------------------//
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  $url=NULL;
  $url="http://127.0.0.1/e/api/finalprocess.php?merid=".$merid."&s_c=".$specialcode."&invoiceid=".$invoiceid."&hash=".$got_hash_data;
  return file_get_contents($url);
  }
}
?>