(function(e){e.fn.marquee=function(t){return this.each(function(){function d(e){var t=[];for(var n in e){if(e.hasOwnProperty(n)){t.push(n+":"+e[n])}}t.push();return"{"+t.join(",")+"}"}function v(){if(l&&n.allowCss3Support){return i.css(f,"paused")}if(e.fn.pause){i.pause();r.trigger("paused")}}function m(){if(l&&n.allowCss3Support){return i.css(f,"running")}if(e.fn.resume){i.resume();r.trigger("resumed")}}var n=e.extend({},e.fn.marquee.defaults,t),r=e(this),i,s,o,u,a,f="animation-play-state",l=false;if(typeof r.data().delaybeforestart!=="undefined"){r.data().delayBeforeStart=r.data().delaybeforestart;delete r.data().delaybeforestart}if(typeof r.data().pauseonhover!=="undefined"){r.data().pauseOnHover=r.data().pauseonhover;delete r.data().pauseonhover}if(typeof r.data().pauseoncycle!=="undefined"){r.data().pauseOnCycle=r.data().pauseoncycle;delete r.data().pauseoncycle}if(typeof r.data().allowcss3support!=="undefined"){r.data().allowCss3Support=r.data().allowcss3support;delete r.data().allowcss3support}n=e.extend({},n,r.data());n.duration=n.speed||n.duration;u=n.direction=="up"||n.direction=="down";n.gap=n.duplicated?n.gap:0;r.wrapInner('<div class="js-marquee"></div>');var c=r.find(".js-marquee").css({"margin-right":n.gap,"float":"left"});if(n.duplicated){c.clone().appendTo(r)}r.wrapInner('<div style="width:100000px" class="js-marquee-wrapper"></div>');i=r.find(".js-marquee-wrapper");if(u){var h=r.height();i.removeAttr("style");r.height(h);r.find(".js-marquee").css({"float":"none","margin-bottom":n.gap,"margin-right":0});if(n.duplicated)r.find(".js-marquee:last").css({"margin-bottom":0});var p=r.find(".js-marquee:first").height()+n.gap;n.duration=(parseInt(p,10)+parseInt(h,10))/parseInt(h,10)*n.duration}else{a=r.find(".js-marquee:first").width()+n.gap;s=r.width();n.duration=(parseInt(a,10)+parseInt(s,10))/parseInt(s,10)*n.duration}if(n.duplicated){n.duration=n.duration/2}if(n.allowCss3Support){var g=document.createElement("div"),y="animation",b="marqueeAnimation-"+Math.floor(Math.random()*1e7),w="Webkit Moz O ms Khtml".split(" "),E="",S="",x=e("style"),T="";if(g.style.animationCssStr){l=true}if(l===false){for(var N=0;N<w.length;N++){if(g.style[w[N]+"AnimationName"]!==undefined){var C="-"+w[N].toLowerCase()+"-";E=C+"animation";f=C+f;T="@"+C+"keyframes "+b+" ";l=true;break}}}if(l){S=b+" "+n.duration/1e3+"s "+n.delayBeforeStart/1e3+"s infinite "+n.css3easing;}}var k=function(){if(u){if(n.duplicated){i.css("margin-top",n.direction=="up"?0:"-"+p+"px");o={"margin-top":n.direction=="up"?"-"+p+"px":0}}else{i.css("margin-top",n.direction=="up"?h+"px":"-"+p+"px");o={"margin-top":n.direction=="up"?"-"+i.height()+"px":h+"px"}}}else{if(n.duplicated){i.css("margin-left",n.direction=="left"?0:"-"+a+"px");o={"margin-left":n.direction=="left"?"-"+a+"px":0}}else{i.css("margin-left",n.direction=="left"?s+"px":"-"+a+"px");o={"margin-left":n.direction=="left"?"-"+a+"px":s+"px"}}}r.trigger("beforeStarting");if(l){i.css(E,S);var t=T+" { 100%  "+d(o)+"}";if(x.length!=0){x.last().append(t)}else{e("head").append("<style>"+t+"</style>")}}else{i.animate(o,n.duration,n.easing,function(){r.trigger("finished");if(n.pauseOnCycle){setTimeout(k,n.delayBeforeStart)}else{k()}})}};r.bind("pause",v);r.bind("resume",m);if(n.pauseOnHover){r.hover(v,m)}if(l&&n.allowCss3Support){k()}else{setTimeout(k,n.delayBeforeStart)}})};e.fn.marquee.defaults={allowCss3Support:true,css3easing:"linear",easing:"linear",delayBeforeStart:0,direction:"left",duplicated:false,duration:5e3,gap:20,pauseOnCycle:false,pauseOnHover:false}})(jQuery)
jQuery(document).ready(function() {
			jQuery('.bxtickr').marquee( {
				duration: 50000,
			    gap: 50,
			    delayBeforeStart: 500,
			    direction: 'left',
			    duplicated: true,
			    pauseOnHover: true
				/* moveSlides: 2  */} );	
					
	
	jQuery('.bxslider li').hover(
		function(){
			jQuery(this).find('.bx-caption').animate({marginBottom: 10}, 300);
		},
		function(){
			jQuery(this).find('.bx-caption').animate({marginBottom: -80}, 300);
		});
	
	jQuery('#fixed-search span.show-fake').click(
	function() {
		jQuery('#fixed-search span.show-fake').hide();
		jQuery('#fixed-search input[type=text]').css('width','0px').show().animate({'width':'200px'},500);
		jQuery('#fixed-search').css('bottom','-48px');
		if ( jQuery.browser.mozilla ) {
 		   	jQuery('#fixed-search').css('bottom','-44px')
    }
		jQuery('#fixed-search input[type=text]').focus();
	});
	jQuery('#fixed-search input[type=text]').focusout(
	function(){
		jQuery('#fixed-search input[type=text]').hide();
		jQuery('#fixed-search').css('bottom','-40px');
		jQuery('#fixed-search span.show-fake').show();
		if ( jQuery.browser.mozilla ) {
 		   	jQuery('#fixed-search').css('bottom','-42px')
    }
	});
	if ( jQuery.browser.mozilla ) {
 		   	jQuery('#fixed-search').css('bottom','-42px');
 		   	jQuery('#fixed-search').css('box-shadow','0px 3px 2px #8a8a8a')
    }
    
    jQuery(function () {
        jQuery.stellar({
            horizontalScrolling: false,
            verticalOffset: 40
        });
    });
    
    jQuery('#masonry .main-article').each( function() { jQuery(this).hoverdir(); } );
    

		
				jQuery('.iosSlider').iosSlider({
					desktopClickDrag: true,
					snapToChildren: true,
					infiniteSlider: true,
					snapSlideCenter: true,
					navSlideSelector: '.sliderContainer .slideSelectors .item',
					navPrevSelector: '.sliderContainer .slideSelectors .prev',
					navNextSelector: '.sliderContainer .slideSelectors .next',
					onSlideComplete: slideComplete,
					onSliderLoaded: sliderLoaded,
					onSlideChange: slideChange,
					autoSlide: true,
					scrollbar: true,
					scrollbarContainer: '.sliderContainer .scrollbarContainer',
					scrollbarMargin: '0',
					scrollbarBorderRadius: '0',
					keyboardControls: true
				});
			
			});
			
			function slideChange(args) {
						
				jQuery('.sliderContainer .slideSelectors .item').removeClass('selected');
				jQuery('.sliderContainer .slideSelectors .item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
			
			}
			
			function slideComplete(args) {
				
				if(!args.slideChanged) return false;
					
				jQuery(args.sliderObject).find('.text1, .text2').attr('style', '');
				
				jQuery(args.currentSlideObject).find('.text1').animate({
					left: '30px',
					opacity: '0.8'
				}, 700, 'easeOutQuint');
				
				jQuery(args.currentSlideObject).find('.text2').delay(200).animate({
					left: '30px',
					opacity: '0.8'
				}, 600, 'easeOutQuint');
				
			}
			
			function sliderLoaded(args) {
					
				jQuery(args.sliderObject).find('.text1, .text2').attr('style', '');
				
				jQuery(args.currentSlideObject).find('.text1').animate({
					left: '30px',
					opacity: '0.8'
				}, 700, 'easeOutQuint');
				
				jQuery(args.currentSlideObject).find('.text2').delay(200).animate({
					left: '30px',
					opacity: '0.8'
				}, 600, 'easeOutQuint');
				
				slideChange(args);
				
			}



