<DIV class="mc-caption-bg" style="opacity: 0; visibility: hidden;" />
                <DIV class="mc-caption" style="visibility: hidden; width: 440px;">
				</DIV>
			  
				<DIV class="mc-caption-bg2" style="opacity: 0; visibility: hidden;">
				<DIV class="mc-caption" style="width: 440px;">
				</DIV></DIV><DIV class="navBulletsWrapper">
				<DIV REL="0" class="active">
				</DIV>
				</DIV>
	<DIV id="tS2" class="jThumbnailScroller" />
	<DIV class="jTscrollerContainer" style="width: 3410px;">
		<DIV class="jTscroller">
			<?php echo $bankname; ?>
		</DIV>
	</DIV>
	<A class="jTscrollerPrevButton" style="outline: 0px; display: none; cursor:pointer;"><font size="+1"><img src="store/previous.png"/></font></A> <A class="jTscrollerNextButton" style="outline: 0; cursor:pointer;"><font size="+1"><img src="store/next.png"/></font></A>
				<SCRIPT>
/* jQuery.noConflict() for using the plugin along with other libraries. 
   You can remove it if you won't use other libraries (e.g. prototype, scriptaculous etc.) or 
   if you include jQuery before other libraries in yourdocument's head tag. 
   [more info: http://docs.jquery.com/Using_jQuery_with_Other_Libraries] */
jQuery.noConflict(); 
/* calling thumbnailScroller function with options as parameters */
(function($){
window.onload=function(){ 
	/* selector can be id, class, tag name etc. */
	$("#tS1").thumbnailScroller({ 
		/* scroller type based on mouse interaction 
		values: "hoverPrecise", "hoverAccelerate", "clickButtons" 
		default: "hoverPrecise" */
		scrollerType:"hoverAccelerate", 
		/* scroller orientation 
		values: "horizontal", "vertical" 
		default: "horizontal" */
		scrollerOrientation:"horizontal", 
		/* scroll easing type only for "hoverPrecise" scrollers
		available values here: http://jqueryui.com/demos/effect/easing.html 
		default: "easeOutCirc" */
		scrollEasing:"easeOutCirc", 
		/* scroll easing amount only for "hoverPrecise" and "clickButtons" scrollers (0 for no easing) 
		values: milliseconds 
		default: 800 */
		scrollEasingAmount:800, 
		/* acceleration value only for "hoverAccelerate" scrollers 
		values: integer 
		default: 2 */
		acceleration:4, 
		/* scrolling speed only for "clickButtons" scrollers 
		values: milliseconds 
		default: 600 */
		scrollSpeed:800, 
		/* scroller null scrolling area only for "hoverAccelerate" scrollers 
		0 being the absolute center of the scroller
		values: pixels 
		default: 0 */
		noScrollCenterSpace:10, 
		/* initial auto-scrolling 
		0 equals no auto-scrolling 
		values: amount of auto-scrolling loops (integer) 
		default: 0 */
		autoScrolling:0, 
		/* initial auto-scrolling speed 
		values: milliseconds 
		default: 8000 */
		autoScrollingSpeed:2000, 
		/* initial auto-scrolling easing type 
		available values here: http://jqueryui.com/demos/effect/easing.html 
		default: "easeInOutQuad" */
		autoScrollingEasing:"easeInOutQuad", 
		/* initial auto-scrolling delay for each loop 
		values: milliseconds 
		default: 2500 */
		autoScrollingDelay:500 
	});
	$("#tS2").thumbnailScroller({ 
		scrollerType:"clickButtons", 
		scrollerOrientation:"horizontal", 
		scrollSpeed:2, 
		scrollEasing:"easeOutCirc", 
		scrollEasingAmount:600, 
		acceleration:4, 
		scrollSpeed:800, 
		noScrollCenterSpace:10, 
		autoScrolling:0, 
		autoScrollingSpeed:2000, 
		autoScrollingEasing:"easeInOutQuad", 
		autoScrollingDelay:500 
	});
	$("#tS3").thumbnailScroller({ 
		scrollerType:"hoverPrecise", 
		scrollerOrientation:"vertical", 
		scrollSpeed:2, 
		scrollEasing:"easeOutCirc", 
		scrollEasingAmount:800, 
		acceleration:4, 
		scrollSpeed:800, 
		noScrollCenterSpace:10, 
		autoScrolling:0, 
		autoScrollingSpeed:2000, 
		autoScrollingEasing:"easeInOutQuad", 
		autoScrollingDelay:500 
	});
}
})(jQuery);
</SCRIPT></td>
              </tr>
            </table>