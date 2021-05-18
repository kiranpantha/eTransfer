<?php
class user
{
  public function getusers($userid_post,$passid_post)
  {
  $loggedin=NULL;
  $userid="ASDF!@#$";
  $passid=base64_decode("ASDFGHJK");
  if (($userid_post==$userid) && ($passid==base64_decode($passid_post)))
  {
  $loggedin=1;
  setcookie("users",$userid_post);
  setcookie("passs",$passid_post);
  }
  else
  {
  $loggedin=0;
  }
  return $loggedin;
  }
}
?>