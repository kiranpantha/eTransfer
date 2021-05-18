<link rel="stylesheet" href="../photo/modal000.css" type="text/css" />
<script type="text/javascript" src="../photo/mootools.js"></script>
<script type="text/javascript" src="../photo/modal000.js"></script>
<script type="text/javascript">
		window.addEvent('domready', function() {
			SqueezeBox.initialize({});
			$$('a.modal-button').each(function(el) {
				el.addEvent('click', function(e) {
					new Event(e).stop();
					SqueezeBox.fromElement(el);
				});
			});
		});
  </script>
<style type="text/css">
<!--
.close{
background-color:#666666;
border-bottom:thin;
border-top:thin;
border-left:thin;
border-right:thin;
}
-->
</style>
<style type="text/css">
<!----
 #phocagallery .name {color: #135cae ;}
 .phocagallery-box-file {background: #fcfcfc ; border:1px solid #e8e8e8 ;}
 .phocagallery-box-file-first { background: url('../photo/shadow10.gif') 0 0 no-repeat; }
 .phocagallery-box-file:hover, .phocagallery-box-file.hover {border:1px solid #135cae ; background: #f5f5f5 ;}
-->
 </style>
  <!--[if IE]>
<style type="text/css">
phocagallery-box-file{
background-color: expression(isNaN(this.js)?(this.js=1,
this.onmouseover=new Function("this.className+=' hover';"),
this.onmouseout=new Function("this.className=this.className.replace(' hover','');")):false););
} </style>
<![endif]-->
  <style type="text/css"> 
 #sbox-window {background-color:#000000;padding:10px} 
 #sbox-overlay {background-color:#000000;} 
 </style>