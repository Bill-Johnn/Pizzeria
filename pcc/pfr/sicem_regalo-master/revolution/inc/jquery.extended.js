$(document).ready(function(){

	   
		// Footer Contact form behaviour
		$(".footerForm fieldset input.footerField").focus(function () {$(this).css("backgroundPosition","0 -33px");});
		$(".footerForm fieldset input.footerField").blur(function () {$(this).css("backgroundPosition","0 0");});
		
		$(".footerForm fieldset").append("<div class='footerFakeTextarea'></div>");
		
		$(".footerForm fieldset textarea").focus(function () {$(".footerFakeTextarea").css("backgroundPosition","0 0");});
		$(".footerForm fieldset textarea ").blur(function () {$(".footerFakeTextarea").css("backgroundPosition","0 -88px");});
		
		// Get a Quotes form behaviour
		$(".quoteForm fieldset input.getaquoteField").focus(function () {$(this).css("backgroundPosition","0 -33px");});
		$(".quoteForm fieldset input.getaquoteField").blur(function () {$(this).css("backgroundPosition","0 0");});
		
		$(".quoteForm fieldset").append("<div class='quoteFakeTextarea'></div>");
		
		$(".quoteForm fieldset textarea").focus(function () {$(".quoteFakeTextarea").css("backgroundPosition","0 -108px");});
		$(".quoteForm fieldset textarea ").blur(function () {$(".quoteFakeTextarea").css("backgroundPosition","0 0");});

		if ($.browser.safari) {
		 $("textarea").css("resize","none");
		 $(".footerForm fieldset textarea").css("padding","5px 9px 9px 4px");
		 }
		
});