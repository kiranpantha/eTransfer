<?php
if($_GET)
{
 $lang=@$_GET['set'];
 $post=@$_GET['redir'];
 $post=base64_decode($post);
 if(!empty($lang) || !empty($post))
 {
   if($lang=='NP')
   {
   setcookie('lang','np');
   header('Location: '.$post);
   die();
   }
   else
   {
   setcookie('lang','en');
   header('Location: '.$post);
   die();
   }
 }
}
?>