 <?php
  $css=NULL;
  $url='http://127.0.0.1/e';
  $css='
    <style type="text/css" />
	<!--
	div.warning {
    margin:             0.5em 0 0.5em 0.5 em;
    border:             0.2em solid #CC0000;
    width:              80%;
    background-image:   url('.$url.'/imp_img/err.png);
    background-repeat:  no-repeat;
    background-position: 10px 50%;
            }
	div.attention {
    margin:0.5em 0 0.5em 0;
    border:0.2em solid #00FF00;
    width:80%;
    background-image:url('.$url.'/imp_img/ok.png);
    background-repeat:no-repeat;
    background-position:10px 50%;
    }
	-->
	</style>';
	echo $css;
	?>