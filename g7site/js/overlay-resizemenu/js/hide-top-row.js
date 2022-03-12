    function init() {
		window.addEventListener('scroll', function(e) {
			var distanceY = window.pageYOffset || document.documentElement.scrollTop,
				shrinkOn = 90,				
				tc = document.querySelector("div#tc");			
			if (distanceY > shrinkOn) {
				classie.add(tc, "hide");
			} else {
				if (classie.has(tc, "hide")) {
					classie.remove(tc, "hide");
				}
			}
		});
	}
	window.onload = init();