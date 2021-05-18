<?php
function tonepali($word_got)
{
  $i=NULL;
  $word=NULL;
  $lenofword=strlen($word_got);
  for($i;$i<=$lenofword;$i++)
  {
   $word_extract=substr($word_got,$i,1);
   $n_add = NULL;			
			switch($word_extract){
				case '1':
					$n_add = "१";
					break;
					
				case '2':
					$n_add  = "२";
					break;
					
				case '3':
					$n_add  = "३";
					break;
					
				case '4':
					$n_add = "४";
					break;
					
				case '5':
					$n_add = "५";
					break;
				
				case '6':
					$n_add = "६";
					break;
				
				case '7':
					$n_add = "७";
					break;
				
				case '8':
					$n_add = "८";
					break;
				
				case '9':
					$n_add = "९";
					break;
				
				case '0':
					$n_add = "०";
					break;
				case '.':
				    $n_add = "|";
					break;
			}	
		$word.=$n_add;
  }
  return $word;
}
require('../words.php');
require('class/checkbalance.php');
require('class/ab.php');
require('class/verifylogin.php');
$logged_obj=new verify();
$a_balance_obj=new mybalance();
$r_balance_obj=new myrbalance();
$user=@$_COOKIE['email'];
$pass1=@$_COOKIE['pass1'];
$pass2=@$_COOKIE['pass2'];
$logged_stat=$logged_obj->verified($user,$pass1,$pass2);
if ($logged_stat!=='NULL')
{
$a_balance_stat=$a_balance_obj->getmybalance($logged_stat);
$r_balance_stat=$r_balance_obj->getmyrbalance($logged_stat);
  $type=@$_GET['type'];
  $add_data=NULL; 
  if($lang_check=='np')
  {
  header('Content-Type: text/xml');
  $add_data.= "<?xml version=\"1.0\" ?><balance><ab>रू ".tonepali($a_balance_stat)."</ab><rb>रू ".tonepali($r_balance_stat)."</rb>";
  $tb_balance_stat=tonepali($r_balance_stat+$a_balance_stat);
  $add_data.= "<tb>रू $tb_balance_stat</tb></balance>";
  echo $add_data;
  }
  else
  {
  header('Content-Type: text/xml');
  $add_data.= "<?xml version=\"1.0\" ?><balance><ab>RS ".$a_balance_stat."</ab><rb>RS ".$r_balance_stat."</rb>";
  $tb_balance_stat=$r_balance_stat+$a_balance_stat;
  $add_data.= "<tb>RS $tb_balance_stat</tb></balance>";
  echo $add_data;
  }
}
else
{
$add_data=NULL; 
  header('Content-Type: text/xml');
  $add_data.= "<?xml version=\"1.0\" ?><balance><ab>ERROR</ab><rb>ERROR</rb><tb>ERROR</tb></balance>";
  echo $add_data;}
?>