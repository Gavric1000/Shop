var ZTMenu = function(boxTimer, xOffset, yOffset, smartBoxSuffix, smartBoxClose, isub, xduration, xtransition)
{
	var smartBoxes = $(document.body).getElements('[id$=' + smartBoxSuffix + ']');
	var closeElem = $(document.body).getElements('.' + smartBoxClose);
	var closeBoxes = function() { smartBoxes.setStyle('display', 'none'); };
	closeElem.addEvent('click', function(){ closeBoxes() });

	var closeBoxesTimer = 0;
	var fx = Array();
	var h  = Array();
	var w  = Array();

	smartBoxes.each(function(item, i)
	{
		var currentBox = item.getProperty('id');
		currentBox = currentBox.replace('' + smartBoxSuffix + '', '');

		fx[i] = new Fx.Elements(item.getChildren(), {wait: false, duration: xduration, transition: xtransition,
		onComplete: function(){item.setStyle('overflow', '');}});

		$(currentBox).addEvent('mouseleave', function(){
			item.setStyle('overflow', 'hidden');
			fx[i].cancel().start({
				'0':{
					'opacity': [1, 0],
					'height': [h[i], 0]
				}
			});

			closeBoxesTimer = closeBoxes.delay(boxTimer);
		});

		item.addEvent('mouseleave', function(){
			closeBoxesTimer = closeBoxes.delay(boxTimer);
		});

		$(currentBox).addEvent('mouseenter', function(){
			if($defined(closeBoxesTimer)) $clear(closeBoxesTimer);
		});

		item.addEvent('mouseenter', function(){
			if($defined(closeBoxesTimer)) $clear(closeBoxesTimer);
		});

		item.setStyle('margin', '0');
		$(currentBox).addEvent('mouseenter', function()
		{
			smartBoxes.setStyle('display', 'none');
			item.setStyles({ display: 'block', position: 'absolute' }).setStyle('z-index', '1000000');
			item.setStyle('overflow', 'hidden');

			var WindowX 	= window.getWidth();
			var boxSize 	= item.getSize();
			var inputPOS 	= $(currentBox).getCoordinates();
			var inputCOOR 	= $(currentBox).getPosition();
			var inputSize 	= $(currentBox).getSize();

			var inputBottomPOS 			= inputPOS.top + inputSize.y;
			var inputBottomPOSAdjust 	= inputBottomPOS - window.getScrollHeight();

			var inputLeftPOS 	= inputPOS.left + xOffset;
			var inputRightPOS 	= inputPOS.right;
			var leftOffset 		= inputCOOR.x + xOffset;

			if(item.getProperty('id').split("_")[2] == 'sub0') {
				item.setStyle('top', inputBottomPOS - 5);

				if(inputRightPOS > boxSize.x) {
					item.setStyle('left', inputRightPOS - boxSize.x);
				} else if(WindowX - inputLeftPOS - boxSize.x > 0) {
					item.setStyle('left', inputLeftPOS);
				} else {
					item.setStyle('left', (WindowX - boxSize.x)/2);
				}
			} else {
				if(inputLeftPOS > boxSize.x) {
					item.setStyle('right', inputSize.x);
				} else if(WindowX - inputRightPOS - boxSize.x > 0) {
					item.setStyle('right', -boxSize.x);
				} else {
					item.setStyle('right', -(WindowX - boxSize.x)/2);
				}
			}

			if(h[i] == null){ h[i] = boxSize.y-10; };

			fx[i].cancel().start({
				'0':{
					'opacity': [0, 1],
					'height': [0, h[i]]
				}
			});
		});
	});
};
window.addEvent("domready", function(){
	$$('ul#menusys_mega li').each(function(li, i){
		li.addEvent('mouseleave', function(){li.removeClass('hover');});
		li.addEvent('mouseenter', function(){li.addClass('hover');});
	});
});
