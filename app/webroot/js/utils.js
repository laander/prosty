function base() {
	return $('base').attr('href');
}

// hides the flash message by default (no js fallback)
function hideFlashMessage() {
	selector = '.flash-message';
	$(selector).css({display: "none", opacity: 0});
}

// will gently show the most recent flash message
function showFlashMessage() {
	selector = '.flash-message';
	if ($(selector).html()){
		$(selector).animate({height: "show", opacity: 1}, 500);
		$(".flash-message-seperator").animate({height: "show", opacity: 1}, 500);
		$(selector).click(function() {
			$(selector).animate({height: "hide", opacity: 0}, 500);
			$(".flash-message-seperator").animate({height: "hide"}, 500);
		});
	}
}

// will gently show the most recent flash message
function updateFlashMessage() {
	$.get(base() + 'projects/ajaxflash', function(response){
		if (flashMessageState() == false) {
			$('.flash-message').html(response);
			showFlashMessage();
		} else {
			$('.flash-message').fadeOut(200, function() { 
				$('.flash-message').html(response);
				$(this).fadeIn(200); 
			});
		}
	});
}

// Attaches to .ajax-button elements, displays ajax loading icon when clicked
function buttonAjaxLoad(selector) {
	$(selector).animate({opacity: 0.3}, 500).attr("disabled", true);
	var currentPosition = $(selector).position();
	var buttonWidth = ($(selector).width() / 2) + 4;
	var buttonHeight = ($(selector).height() / 2);
	$(selector).after("<img class='ajax-loader' src='" + base() + "img/ajax-loader.gif' style='position: absolute; left: " + (currentPosition.left + buttonWidth) + "px; top: " + (currentPosition.top + buttonHeight) + "px;' />");
	$(selector).next(".ajax-loader").fadeIn(500);
}

// Use as a callback for resetting an .ajax-button button
function buttonAjaxFinish(selector) {
	$(selector).animate({opacity: 1}, 500).attr("disabled", false);
	$(selector).next(".ajax-loader").fadeOut(function() { $(this).remove() });
}

// Attaches to .ajax-button elements, displays ajax loading icon when clicked
function iconAjaxLoad(selector, type) {
	$(selector).animate({opacity: 0.3}, 500);
	var currentPosition = $(selector).position();
	if (type == "slider") {
		$(selector).after("<img class='ajax-loader' src='" + base() + "img/ajax-loader.gif' style='position: absolute; left: " + (currentPosition.left - 7) + "px; top: " + (currentPosition.top) + "px;' />");	
	} else {
		$(selector).after("<img class='ajax-loader' src='" + base() + "img/ajax-loader.gif' style='position: absolute; left: " + (currentPosition.left) + "px; top: " + (currentPosition.top) + "px;' />");
	}
	$(selector).next(".ajax-loader").fadeIn(500);
}

// Use as a callback for resetting an .ajax-button button
function iconAjaxFinish(selector) {
	$(selector).animate({opacity: 1}, 500);
	$(selector).next(".ajax-loader").fadeOut(function() { $(this).remove() });
}

// Will simply create and show an ajax loading icon next to supplied selector
function replaceAjaxLoad(selector) {
	$(selector).hide().after("<img class='ajax-loader' src='" + base() + "img/ajax-loader.gif' />");
}

// Will fade out and remove the loading icon next to supplied selector
function replaceAjaxFinish(selector, replace) {
	$(selector).next(".ajax-loader").remove();
	$(selector).replaceWith(replace);
}