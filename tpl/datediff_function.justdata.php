<?php
/* start of function for the date difference */
function getthediff($date1,$date2)
{
  $datediff=$msg=NULL;
  $datediff=$date2-$date1;
  if($datediff<60)
  {
    $msg=$datediff.' seconds ago';
  }
  elseif($datediff>60 && $datediff<3600)
  {
     /* code if the time is grater than 60sec */
	 $t_minutes=round($datediff/60,0);
	 $msg.=$t_minutes.' minute(s) ';
	 $t_min_sec=$t_minutes*60;
	 $rem_sec=$datediff-$t_min_sec;
	 if($rem_sec>0)
	 {
	 $msg.=$rem_sec.' second(s)';
	 }
	 /*         code   ending                */  }
  elseif($datediff>3600 && $datediff<86400)
  {
     /* code if the time is grater than 3600sec */
	 $t_hours=round($datediff/3600,0);
	 $msg.=$t_hours.' hours(s) ';
	 $t_remaining=$datediff-($t_hours*3600);
	 if ($t_remaining>0)
	 {
	  $t_minutes=round($t_remaining/60,0);
	  if($t_minutes>60)
	  {
	  $t_minutes=$t_minutes-60;
	  }
	  $msg.=$t_minutes.' minute(s) ';
	  $t_min_sec=$t_minutes*60;
	  $rem_sec=$t_remaining-$t_min_sec;
	   if($rem_sec>0)
	   {
	   $msg.=$rem_sec.' second(s)';
	   }
	  }
	 }
	 /*            code   ending               */
  }
  elseif($datediff>86400 && $datediff<2592000)
  {
    $msg=round($datediff/86400,1).' days ago';
  }
  elseif($datediff>2592000 && $datediff<31104000)
  {
    $msg=round($datediff/2592000,1).' months ago';
  }
  elseif($datediff>31104000)
  {
    $msg=round($datediff/31104000,1).' years ago';
  }
  return $msg;
}
/*  end of the function of date difference  */
?>