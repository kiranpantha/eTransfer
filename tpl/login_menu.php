<STYLE type="text/css">
.tryit
{
display:block;
color:#FFFFFF;
background-color:#98bf21;
font-weight:bold;
font-size:11px;
width:120px;
text-align:center;
padding:0;
padding-top:3px;
padding-bottom:4px;
border:1px solid #ffffff;
outline:1px solid #98bf21;
text-decoration:none;
margin-left:1px;
}
</STYLE>
<?php
 if(empty($_COOKIE['email']) && empty($_COOKIE['email']) && empty($_COOKIE['email']))
   {
    $info='
	<SCRIPT type="text/javascript">
	<!--
	alert(\'You must Log in to continue\');
	-->
	</SCRIPT>';
	echo '<a class="tryit" title="Log in" href="login.php?admin=login&post='.$_SERVER['PHP_SELF'].'" rel="{handler: \'iframe\', size: {x: 680, y: 560}, overlayOpacity: 0.7}">Log in</a>';
   }
   else
   {
  $info='<a class="tryit">Logged in</a>';
   }
?>
<?php    echo $info; ?>