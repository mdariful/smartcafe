var hoverOutTimer = null;
 
jQuery(document).ready(function($) { 
	'use strict';
	$(".menulink a").click(function() { 
	  	jQuery("#menu").stop(true, true).slideToggle('fast');
	});
	resize_intro(); 
	jQuery(".hero").stop(true, true).fadeIn('fast');
	jQuery(".form-box").stop(true, true).fadeIn('fast');
	jQuery(".shadow").stop(true, true).fadeIn('fast');
});

jQuery(window).resize(function () { 
	'use strict';
	resize_intro(); 
});

function resize_intro(){
	if(jQuery(window).width() > 720) {  
		page_height =  (((jQuery(window).height()) - jQuery('#header').height())) - 50; 
 		if(jQuery('.form-box').height() < (page_height)) {
	 		if(jQuery('.wrapper-flexi').length < 1) {
				form_margin = (page_height - jQuery('.form-box').height()) / 2; 
				jQuery(".form-box").css('margin-top',form_margin+'px'); 
				hero_margin = ((page_height - jQuery('.hero').height())-50) / 2;
				jQuery(".hero").css('margin-top',hero_margin+'px');   
			}
		}
	} 
}

//couner with api
/*(function($){
$.ajax({
			  "url": "https://www.kimonolabs.com/api/bpw5qg1o?apikey=wu6a4GqSRNbnZSAo27WxyyLXeFD8h2bI",
			  "crossDomain": true,
			  "dataType": "jsonp",
			  //Make a call to the Kimono API following the "url" 
			
			  'success': function(response) {
			    // If the call request was successful and the data was retrieved, this function will create a list displaying the data
			
			    //$(".panel-heading").html(response.name);
			    //Puts the API name into the panel heading  
			
			    var collection = response.results.collection1;
			    for (var i = 0; i < collection.length; i++) {
			      // Element of api
				$('<tr class="data"><th class="counter" data-count="' + collection[i].commits + '">0</th><th class="counter" data-count="' + collection[i].activeissue + '">0</th><th class="counter" data-count="' + collection[i].issueclose + '" >0</th><th class="counter" data-count="' + collection[i].issueopen + '">0</th></tr>').appendTo("table");
			      // adds the text and the links from the first property into the list
			    }
				//counter
				$('.counter').each(function() {
				  var $this = $(this),
					  countTo = $this.attr('data-count');
				  
				  $({ countNum: $this.text()}).animate({
					countNum: countTo
				  },

				  {

					duration: 8000,
					easing:'linear',
					step: function() {
					  $this.text(Math.floor(this.countNum));
					},
					complete: function() {
					  $this.text(this.countNum);
					  //alert('finished');
					}

				  });  
				  
				});
			  }
			
			});
})(window.jQuery);*/
