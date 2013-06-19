$(function()
{
    var gallery = $('#thumbs').galleriffic(
            {
                delay:                     1250,
					
		imageContainerSel:         '#slideshow',
					
		captionContainerSel:       '#caption',
		loadingContainerSel:       '#loading',
                onSlideChange:             function(prevIndex, nextIndex) {
		// 'this' refers to the gallery, which is an extension of $('#thumbs')
		this.find('ul.thumbs').children()
                    .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
                    .eq(nextIndex).fadeTo('fast', 1.0);
		},
		onPageTransitionOut:       function(callback)
                {
                    this.fadeTo('fast', 0.0, callback);
		},
		onPageTransitionIn:        function()
                {
                    this.fadeTo('fast', 1.0);
		}
            });
                                
            var onMouseOutOpacity = 0.67;
            $('#thumbs ul.thumbs li').opacityrollover({
            mouseOutOpacity:   onMouseOutOpacity,
            mouseOverOpacity:  1.0,
            fadeSpeed:         'fast',
            exemptionSelector: '.selected'
            });
});
