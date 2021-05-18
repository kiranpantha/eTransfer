<?php
class etransfer_css
{
  function etransfer_css_data($url)
  {
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///DDDDD//////OO0O////NN///////NN///OOOOO////TTTTTTTTTTT///EEEEEEEEEE//DDDDD////IIIIIII///TTTTTTTTTTT///////////
  ///D///DD////OO///OO//NNNN/////NN//OO////OO///////TT///////EE//////////D///DD//////II/////////TT////////////////
  ///D///DDD///OO///OO//NN/NN////NN//OO////OO///////TT///////EE//////////D///DDD/////II/////////TT////////////////
  ///D///DDDD//OO///OO//NN///NN//NN//OO////OO///////TT///////EEEEEEEEEE//D///DDDD////II/////////TT////////////////
  ///D///DDD///OO///OO//NN////NN/NN//OO////OO///////TT///////EE//////////D///DDD/////II/////////TT////////////////
  ///D///DD////OO///OO//NN/////NNNN//OO////OO///////TT///////EE//////////D///DD//////II/////////TT////////////////
  ///DDDDD//////OO00////NN//////NNN////OOOOO////////TT///////EEEEEEEEEE//DDDDD/////IIIIII///////TT////////////////
  //-----------------------------------------Code By E-Transfer-------------------------------------------------//
  //--------------------------------------Written By Kiran Pantha-----------------------------------------------//
  //--------------------------------------www.kiranpantha.com.np------------------------------------------------//
  //-------------------------------------(c) 2013 E-transfer Nepal----------------------------------------------//
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  $css=NULL;
  $css='
    <style type="text/css" />
	div.warning {
    margin:             0.5em 0 0.5em 0.5 em;
    border:             0.2em solid #CC0000;
    width:              80%;
    background-image:   url('.$url.'/imp_img/err.png);
    background-repeat:  no-repeat;
    background-position: 10px 50%;
    padding:            10px 10px 10px 36px;
            }
	div.attention {
    margin:0.5em 0 0.5em 0;
    border:0.2em solid #00FF00;
    width:80%;
    background-image:url('.$url.'/imp_img/ok.png);
    background-repeat:no-repeat;
    background-position:10px 50%;
    padding:10px 10px 10px 36px;
    }
	</style>';
  return $css;
  }
}
?>