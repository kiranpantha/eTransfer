<table border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td <?php if ($lang_check=='np') { echo 'bgcolor="#CCCCCC"'; }else {  echo 'bgcolor="#999999"'; } ?>><a href="lang.php?set=NP&amp;redir=<?php echo base64_encode($_SERVER['REQUEST_URI']); ?>"><?php if ($lang_check=='en') { echo '<img src="images/lang_img/lang_np_unchecked.png" alt="Nepali"   height="50" width="50"/>'; } else { echo '<img src="images/lang_img/lang_np_checked.png" alt="Nepali v"  height="50" width="50"/>'; } ?></a></td>
    <td  <?php if ($lang_check=='en') { echo 'bgcolor="#CCCCCC"'; }else {  echo 'bgcolor="#999999"'; } ?>><a href="lang.php?set=EN&amp;redir=<?php echo base64_encode($_SERVER['REQUEST_URI']); ?>"><?php if ($lang_check=='np') { echo '<img src="images/lang_img/lang_en_unchecked.png" alt="English"  height="50" width="50" />'; } else { echo '<img src="images/lang_img/lang_en_checked.png" alt="English v"  height="50" width="50" />'; } ?></a>   </td>
  </tr>
</table>