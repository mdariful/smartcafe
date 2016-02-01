(function($) {
	'use strict';
	// Form di contatto
    $('#contact').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
		email: true
            },
            message: {
                required: true
            },
	    hiddenRecaptcha: {
     		required: function() {
         	if(grecaptcha.getResponse() == '') {
            	 return true;
         	} else {
             		return false;
         		}
     		  }
		}
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Your name must consist of at least 2 characters"
            },
            email: {
                required: "Please enter your email address"
            },
            message: {
                required: "Please enter your message",
                minlength: "Your message must consist of at least 2 characters"
            },

		
        },
        submitHandler: function(form) {
            $(form).ajaxSubmit({
                type:"POST",
                data: $(form).serialize(),
                url:"./../inc/contact.php",
                success: function() {
                    $('#contact :input').attr('disabled', 'disabled');
                    $('#contact').fadeTo( "slow", 0.15, function() {
                        $(this).find(':input').attr('disabled', 'disabled');
                        $(this).find('label').css('cursor','default');
                        $('#success').fadeIn();
                    });
                },
                error: function() {
                    $('#contact').fadeTo( "slow", 0.15, function() {
                        $('#error').fadeIn();
                    });
                }
            });
        }
    });
})(jQuery);
