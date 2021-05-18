<?php 
  //-----------------------------------------Code By E-Transfer----------------------------------------------------//
  //--------------------------------------Written By Kiran Pantha--------------------------------------------------//
  //-----------------------------------------Software Designer-----------------------------------------------------//
  //-------------------------------------(c) 2013 E-transfer Nepal-------------------------------------------------//
  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  $merchantid=3;                            //     Merchant code of your product                                         
  $specialcode='15C253EBEB582BE';            //     Special code provided to you                                         
  ////////eeeee//////////////tt//////////////////////////////////////////ssssss///////ffff////eeeee/////rr////////rr/
  //////eee///eee////////////tt//////rr////rr/////aaaaa//////nnnnnnn////sss///sss////ff//ff//ee///ee//////rr/////rr//
  //////eeeeeeeeee//____///tttttt/////rr//rr////aa/////aa////nn////nn///ss///////////ff/////eeeeeeeeee//////rr//rr///
  //////eee////////|____|////tt/////////rr//////aa/////aa////nn/////nn////sssss////ffffff///ee//////////////rrrr/////
  //////eee////ee////////////tt///tt//rr//rr////aaa///aaaa///nn/////nn//s////sss/////ff/////ee/////ee//////rr///rr///
  /////////eeeeee///////////////tttt////rrrr///////aaaaa//aaa/nn/////nn//ssssssss/////ff///////eeeee/////////rrrr////
  include('etransferlib/etransfer_engine.php');                
  if ($e_t_result=='ITSOK')                                    //      got data from the the result of the data called
  {
  /**THE CODE TO EXECUTE YOUR PROJECT**/
  echo adddata();  // Place you function to continue the rest services 
  }
  else
  {
  /**THE CODE TO EXECUTE YOUR PROJECT**/
  echo requestdata($e_t_result);  // Place you function to continue the fake request 
  }
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ///////////////////////////////////////[Written BY Kiran Pantha]////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
function adddata()
{
$rand_data=rand(9999,99999);
$rand_base64=md5(base64_encode($rand_data));
$info_code= substr(strtoupper($rand_base64),0,15);
//add to db
include('dbconn.php');
$tbl_name2="code_my";
$sqlz="INSERT INTO  `$db_name`.`$tbl_name2` (`code`) VALUES ('$info_code');";
$result2=mysql_query($sqlz);
if ($result2){ 
?>
<script type="text/javascript">
<!--
alert('Purchase Ok \n <?php echo $info_code; ?>');
-->
</script>
<?php
return $info_code;
} else { return 0; }
//end add to db
}

function requestdata($e_t_result)
{
?>
<script type="text/javascript">
<!--
alert('Purchase Failed \n <?php echo $e_t_result; ?>');
-->
</script>
<?php
}
?>