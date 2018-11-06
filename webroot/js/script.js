$( document ).ready(function() {
	
	$('#pre-register, #pre-register-footer').formValidation({
        icon: {
            valid: 'icon-check',
            invalid: 'icon-remove',
            validating: 'icon-refresh icon-spin'
        },
        live: 'enabled',
        fields: {
            'first_name': {
                validators: {
                    notEmpty: {}
                }
            },
            'last_name': {
                validators: {
                    notEmpty: {}
                }
            },
            'email': {
                verbose: false,
                validators: {
                    notEmpty: {},
                    emailAddress: {},
                    remote: {
                        type: 'POST',
                        url: 'users/check-email',
                        delay: 200,
                        message: 'Email already exists. Please choose another one.'
                    }
                }
            }
        }
    })

    $('.pre-register-submit').click(function(e) {
    	e.preventDefault();
    	var $this = $(this),
    		$form = $this.closest('form'),
    		_fname = $form.find('[name="first_name"]').val(),
    		_lname = $form.find('[name="last_name"]').val(),
    		_email = $form.find('[name="email"]').val();

    	if( _fname != '' && _lname != '' && _email != '' ){
    		var _url = $form.attr('action'),
	    		_data = $form.serialize();
	        $.ajax({
	            type:"POST",
	            url: _url,
	            data: _data,
	            dataType: 'text',
	            success: function(response){
	                response = $.parseJSON(response);
	                if (response.ok == 1) {
						$('#pre-register-modal').modal('show');
	                }
	            },
	            async: true
	        })
    	}
    	else $this.attr('disabled', 'disabled');
    });
	
	if( $('.owl-carousel').length > 0 ){
		$('.owl-carousel').owlCarousel({
		    stagePadding: 0,
		    items: 1,
		    smartSpeed: 700,
		    loop: true,
		    margin: 0,
		    singleItem: true,
		    dots: false,
		    nav: true,
		    navText: ["<i class='icon-angle-left'></i>", "<i class='icon-angle-right'></i>"],
		    navContainer: '.slider-nav',
		    autoplay: false,
		    // autoplayTimeout: 10000,
		    // autoplayHoverPause: true,
		}).on('changed.owl.carousel', function(event) {
			var current = event.item.index,
				_movie = $(event.target).find(".owl-item").eq(current).find(".slides").attr('data-movie');
			$('.vid-name').addClass('hide');
			$('.vid-name[data-name="' + _movie + '"]').removeClass('hide');
		});
	}
	
	$(window).scroll(function(){
		var _introOffset = $('.holoflix-content').offset().top,
			$scroll = $('.scroll-down');
	    if( _introOffset <= $(this).scrollTop() ) $scroll.addClass('go-top');
	    else $scroll.removeClass('go-top');
	});
	$('.scroll-down').click(function(e) {
		e.preventDefault();
		var _introOffset = $('.holoflix-content').offset().top;
	    $('html,body').animate({scrollTop: _introOffset},'slow');
	});
	
	

});