(function ($, window, document, undefined)
{
	'use strict';
	
	$(function ()
	{
	    $("#mobileMenu").hide();
	    $(".toggleMobile").click(function()
	    {
	    	$(this).toggleClass("active");
	        $("#mobileMenu").slideToggle(500);
	    });
	});
	$(window).on("resize", function()
	{
		if($(this).width() > 500)
		{
			$("#mobileMenu").hide();
			$(".toggleMobile").removeClass("active");
		}
	});
})(jQuery, window, document);

function clearText (elm) {
    $('input[name='.concat(elm).concat(']')).attr("value", "");
};
function setHint(elm, str) {
    $('input[name='.concat(elm).concat(']')).attr("value", str);
};


function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
};
function releaseEmailInput(elm, s) {
    var str = $('input[name='.concat(elm).concat(']')).attr("value");
    if (validateEmail(str) || str == "") {
        $('.email-validate-checking').text("");
    } else {
        $('.email-validate-checking').text(s);
        $('.email-validate-checking').attr("style", "color: #d00");
    }
};
$(document).ready(function() {
	// Stay visible when user hover #login
    $('div#login').mouseenter(function() {
        $('div#login').attr("class", "remainvisible");
    });
	// Hide #login when user click outside of #login
    $(document).on('click', function(event) {
	    if (!$(event.target).closest('div#login').length) {
	        $('div#login').attr("class", "invisible");
	    }
	});
    // The same for #type-panel
    $('div#type-panel').mouseenter(function() {
        $('div#type-panel').attr("class", "remainvisible");
    });
    $(document).on('click', function(event) {
	    if (!$(event.target).closest('div#type-panel').length) {
	        $('div#type-panel').attr("class", "invisible");
	    }
	});
});
function gopage (page) {
    window.location = page;
}