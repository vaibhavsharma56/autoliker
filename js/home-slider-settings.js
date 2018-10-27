// ---------------------------------------------------------------- //
// Home Page Slider
// ---------------------------------------------------------------- //
$(document).ready(function() {
	
	// Only load slider if more than one slide
	if ($('#home-slider > li').length > 1) {
		
		// --------------------------- //
		// Settings
		// --------------------------- //
		
		var slider = $('#home-slider').bxSlider_main({
			auto: true, // Start slider automatically
			pause: '4000', // Delay in ms between each transition
			responsive: false,
			useCSS: false,
			touchEnabled: true,
			nextSelector: '#slider-next', // Next slide link
			prevSelector: '#slider-prev', // Previous slide link
			pagerCustom: '#bx-pager', // Slide status
			autoControlsSelector: '#slider-pause', // Stop/Start button
			autoControls: true,
			autoControlsCombine: true,
			adaptiveHeight: true,
			onSliderLoad: function(){
				$(".slide-outer").css('visibility', 'visible');
			}
		});
		
		// --------------------------- //
		// Check if document is being scrolled past 2px. If so, stop sliding!
		// This checks during live scrolling
		// --------------------------- //
		
		var $document = $(document);
		$document.scroll(function() {
			if ($document.scrollTop() >= 2) {
				slider.stopAuto();
				} else {
				slider.startAuto();
			}
		});
		
		// --------------------------- //
		// Check if window resized. If so, reset slider.
		// --------------------------- //
		
		$(window).resize(function(){
			slider.reloadSlider();
			
			// Once again - Check if document has scrolled past 2px. If so, stop sliding!
			if ($document.scrollTop() >= 2) {
				slider.stopAuto();
				} else {
				slider.startAuto();
			}
			
		});
		
		// --------------------------- //
		// Check if document has scrolled past 2px on page load. If so, stop sliding!
		// This is to cater for the page being refreshed
		// --------------------------- //
		
		if ($document.scrollTop() >= 2) {
			slider.stopAuto();
			} else {
			slider.startAuto();
		}
		
		// if there is only 1 slide then remove slide status bar and set only slide to visible
		} else {
		
		$(".slide-outer").css('visibility', 'visible');
		$(".slide-outer").css('padding-bottom', '0');
		$(".slider-nav-container").hide();
		
	}
	
});