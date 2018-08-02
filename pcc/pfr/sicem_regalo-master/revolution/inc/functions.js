
//call ajax php page for sending message to office

function sendHello(){
	var name = $('#get_a_quote_name').val();
	var email = $('#get_a_quote_email').val();
	var message = $('#get_a_quote_message').val();
	if(trim(name) == '' || trim(name) == 'Name'){
		$('#info').html("* Name is a required field.");
		return false;
	}

	if(trim(email) == '' || trim(email) == 'Email'){
		$('#info').html("* Email address is a required field.");
		return false;
	}

	if(trim(message) == '' || trim(message) == 'Message'){
		$('#info').html ("* Message is required field.");
		return false;
	}

	validate = validate_email(email);

	if(validate != '200'){
		$('#info').html("* Email address seems to be wrong.");
		return false;
	}

	var pars ="name="+name+"&email="+email+"&message="+message;
	$.ajax({
			type: "POST",
			url: 'revolution/php/send_message.php?type=hello',
			data: pars,
			dataType: 'text',
			beforeSend: ShowLoader,
			success: HideLoader,
			complete: CallAjaxResponse
	})
}

function sendQuote()
{
	var name 		= $('#quote_name').val();
	var email 		= $('#quote_email').val();
	var company   	= $('#quote_company').val();
	var url		   	= $('#quote_url').val();
	var type 	  	= $('#quote_type').val();
	var scope 	  	= $('#quote_scope').val();
	var timeline  	= $('#quote_timeline').val();
	var message 	= $('#quote_message').val();

	if(trim(name) == '' || trim(name) == 'Name'){
		$('#info2').html("* Name is a required field.");
		return false;
	}
	if(trim(email) == '' || trim(email) == 'Email'){
		$('#info2').html("*Email is a required field.");
		return false;
	}
	if(trim(company) == '' || trim(company) == 'Company'){
		$('#info2').html("* Company is a required field.");
		return false;
	}
	if(trim(type) == '' || trim(type) == 'Type'){
		$('#info2').html("* Type selection is required.");
		return false;
	}
	if(trim(scope) == '' || trim(scope) == 'Scope'){
		$('#info2').html("* Scope selection is required.");
		return false;
	}
	if(trim(timeline) == '' || trim(timeline) == 'Timeline'){
		$('#info2').html("* Timeline selection is required.");
		return false;
	}
	if(trim(message) == '' || trim(message) == 'Message'){
		$('#info2').html("* Message is a required field.");
		return false;
	}

	validate = validate_email(email);

	if(validate != '200'){
		$('#info2').html("* Email address seems to be wrong.");
		return false;
	}

	var pars ="name="+name+"&email="+email+"&company="+company+"&url="+url+"&type="+type+"&scope="+scope+"&timeline="+timeline+"&message="+message;
	$.ajax({
			type: "POST",
			url: 'revolution/php/send_message.php?type=quote',
			data: pars,
			dataType: 'text',
			beforeSend: ShowLoader2,
			success: HideLoader2,
			complete: CallAjaxResponse2
	})
}

function CallAjaxResponse(){$('#info').html("Your message has been sent. Thank you.");}
function ShowLoader(){$('#info').html("<i>Please wait a second...</i>");}
function HideLoader(){$('#info').html("");}

function CallAjaxResponse2(){$('#info2').html("Message successfully sent. Thank you.");}
function ShowLoader2(){$('#info2').html("<i>Please wait a second...</i>");}
function HideLoader2(){$('#info2').html("");}



function validate_email(email) {
  	var reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9\.]{2,10})+$/.test(email);
  	if(reg == false) {
   		return '404'; // not valid
   	} else {
   		return '200'; // valid
   	}
}

function trim(str){
		trimed = str.replace(/^\s\s*/, "").replace(/\s\s*$/, "");
		return trimed;
}

function title2id(title){

	//alert(title);

	var tarray = new Array();
    tarray['#Consulta']      				= '#consultaNav';
	tarray['#Hobson_Files'] 				= '#hobsonNav';
	tarray['#Digital_Stock']                = '#dstockNav';
	tarray['#3rdPay']                       = '#thirdNav';
	tarray['#ATM_Cash']                     = '#atmcashNav';
	tarray['#Fresh'] 						= '#frontRangeNav';
	tarray['#FrontRange_Solutions'] 		= '#frontRangeNav';
	tarray['#Bytec'] 						= '#bytecNav';
	tarray['#NorthWest_Carpets'] 			= '#nwCarpetsNav';
	tarray['#Nikon_official_website'] 		= '#nikonNav';
	tarray['#Skype_Shop'] 					= '#skypeNav';
	tarray['#CAT_Footwear'] 				= '#catNav';
	tarray['#Nokia_N81'] 					= '#nokiaNav';
	tarray['#Logitech_Official'] 			= '#logitechNav';

	//alert(title);
	//alert(tarray[title]);
	return tarray[title];


}


(function($) {

  $.fn.tweet = function(o){
    var s = {
      username: ["seaofclouds"],              // [string]   required, unless you want to display our tweets. :) it can be an array, just do ["username1","username2","etc"]
      avatar_size: null,                      // [integer]  height and width of avatar if displayed (48px max)
      count: 3,                               // [integer]  how many tweets to display?
      intro_text: null,                       // [string]   do you want text BEFORE your your tweets?
      outro_text: null,                       // [string]   do you want text AFTER your tweets?
      join_text:  null,                       // [string]   optional text in between date and tweet, try setting to "auto"
      auto_join_text_default: "i said,",      // [string]   auto text for non verb: "i said" bullocks
      auto_join_text_ed: "i",                 // [string]   auto text for past tense: "i" surfed
      auto_join_text_ing: "i am",             // [string]   auto tense for present tense: "i was" surfing
      auto_join_text_reply: "i replied to",   // [string]   auto tense for replies: "i replied to" @someone "with"
      auto_join_text_url: "i was looking at", // [string]   auto tense for urls: "i was looking at" http:...
      loading_text: null,                     // [string]   optional loading text, displayed while tweets load
      query: null                             // [string]   optional search query
    };

    if(o) $.extend(s, o);

    $.fn.extend({
      linkUrl: function() {
        var returning = [];
        var regexp = /((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/gi;
        this.each(function() {
          returning.push(this.replace(regexp,"<a href=\"$1\">$1</a>"))
        });
        return $(returning);
      },
      linkUser: function() {
        var returning = [];
        var regexp = /[\@]+([A-Za-z0-9-_]+)/gi;
        this.each(function() {
          returning.push(this.replace(regexp,"<a href=\"../twitter.com/%241.html\">@$1</a>"))
        });
        return $(returning);
      },
      linkHash: function() {
        var returning = [];
        var regexp = / [\#]+([A-Za-z0-9-_]+)/gi;
        this.each(function() {
          returning.push(this.replace(regexp, ' <a href="http://search.twitter.com/search?q=&tag=$1&lang=all&from='+s.username.join("%2BOR%2B")+'">#$1</a>'))
        });
        return $(returning);
      },
      capAwesome: function() {
        var returning = [];
        this.each(function() {
          returning.push(this.replace(/(a|A)wesome/gi, 'AWESOME'))
        });
        return $(returning);
      },
      capEpic: function() {
        var returning = [];
        this.each(function() {
          returning.push(this.replace(/(e|E)pic/gi, 'EPIC'))
        });
        return $(returning);
      },
      makeHeart: function() {
        var returning = [];
        this.each(function() {
          returning.push(this.replace(/(&lt;)+[3]/gi, "<tt class='heart'>&#x2665;</tt>"))
        });
        return $(returning);
      }
    });

    function relative_time(time_value) {
      var parsed_date = Date.parse(time_value);
      var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
      var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
      if(delta < 60) {
      return 'less than a minute ago';
      } else if(delta < 120) {
      return 'about a minute ago';
      } else if(delta < (45*60)) {
      return (parseInt(delta / 60)).toString() + ' minutes ago';
      } else if(delta < (90*60)) {
      return 'about an hour ago';
      } else if(delta < (24*60*60)) {
      return 'about ' + (parseInt(delta / 3600)).toString() + ' hours ago';
      } else if(delta < (48*60*60)) {
      return '1 day ago';
      } else {
      return (parseInt(delta / 86400)).toString() + ' days ago';
      }
    }

    return this.each(function(){
      var list = $('<ul class="tweet_list">').appendTo(this);
      var intro = '<p class="tweet_intro">'+s.intro_text+'</p>'
      var outro = '<p class="tweet_outro">'+s.outro_text+'</p>'
      var loading = $('<p class="loading">'+s.loading_text+'</p>');
      if(typeof(s.username) == "string"){
        s.username = [s.username];
      }
      var query = '';
      if(s.query) {
        query += 'q='+s.query;
      }
      query += '&q=from:'+s.username.join('%20OR%20from:');
      var url = 'http://search.twitter.com/search.json?&'+query+'&rpp='+s.count+'&callback=?';
      if (s.loading_text) $(this).append(loading);
      $.getJSON(url, function(data){
        if (s.loading_text) loading.remove();
        if (s.intro_text) list.before(intro);
        $.each(data.results, function(i,item){
          // auto join text based on verb tense and content
          if (s.join_text == "auto") {
            if (item.text.match(/^(@([A-Za-z0-9-_]+)) .*/i)) {
              var join_text = s.auto_join_text_reply;
            } else if (item.text.match(/(^\w+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&\?\/.=]+) .*/i)) {
              var join_text = s.auto_join_text_url;
            } else if (item.text.match(/^((\w+ed)|just) .*/im)) {
              var join_text = s.auto_join_text_ed;
            } else if (item.text.match(/^(\w*ing) .*/i)) {
              var join_text = s.auto_join_text_ing;
            } else {
              var join_text = s.auto_join_text_default;
            }
          } else {
            var join_text = s.join_text;
          };

          var join_template = '<span class="tweet_join"> '+join_text+' </span>';
          var join = ((s.join_text) ? join_template : ' ')
          var avatar_template = '<a class="tweet_avatar" href="http://twitter.com/'+ item.from_user+'"><img src="'+item.profile_image_url+'" height="'+s.avatar_size+'" width="'+s.avatar_size+'" alt="'+item.from_user+'\'s avatar" title="'+item.from_user+'\'s avatar" border="0"/></a>';
          var avatar = (s.avatar_size ? avatar_template : '')
          var date = '<a href="http://twitter.com/'+item.from_user+'/statuses/'+item.id+'" title="view tweet on twitter">'+relative_time(item.created_at)+'</a>';
          var text = '<span class="tweet_text">' +$([item.text]).linkUrl().linkUser().linkHash().makeHeart().capAwesome().capEpic()[0]+ '</span>';

          // until we create a template option, arrange the items below to alter a tweet's display.
          // list.append('<li>' + avatar + date + join + text + '</li>');
          list.append('<li>' + text + '</li>');

          list.children('li:first').addClass('tweet_first');
          list.children('li:odd').addClass('tweet_even');
          list.children('li:even').addClass('tweet_odd');
        });
        if (s.outro_text) list.after(outro);
      });

    });
  };
})(jQuery);

$(document).ready(function(){
    $("#tweet").tweet({
         username: "digimurai",
         avatar_size: 0,
         count: 1,
         loading_text: "loading tweets..."
     });
});