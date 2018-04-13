//== Class Definition
var SnippetLogin = function() {

    var login = $('#m_login');

    var showErrorMsg = function(form, type, msg) {
        var alert = $('<div class="m-alert m-alert--outline alert alert-' + type + ' alert-dismissible" role="alert">\
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\
			<span></span>\
		</div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        alert.animateClass('fadeIn animated');
        alert.find('span').html(msg);
    }

    //== Private Functions

    var handleSignInFormSubmit = function() {
        $(document).on('click', '#m_login_signin_submit',function(e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');
            $.ajaxSetup({
    			headers: {
    				'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
    			}
    		});

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
            var login_url = form.attr('action');
            console.log(login_url);

            form.ajaxSubmit({
                url: login_url,
                type: 'post',
                success: function(response, status, xhr, $form) {
                    if (response.result == "success") {
                        setTimeout(function() {
                            btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
                            window.location.replace(response.url);
                        }, 2000);
                    } else {
                        setTimeout(function() {
                            btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
                            showErrorMsg(form, 'danger', 'Incorrect email or password. Please try again.');
                        }, 2000);
                    }
                }
            });
        });
    }

    var handleCheckClientIdSubmit = function() {
        $('#m_login_client_id_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    client_id: {
                        required: true,
                        minlength: 5,
                        maxlength: 5,
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            var client_input_container = btn.parents('#client_id-check-container');
            var clientIdDiv =client_input_container.find('input[name=client_id]');
            var clientId = clientIdDiv.val();
            clientIdDiv.parent().addClass('m-loader m-loader--primary m-loader--right');
            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            $.ajax({
                url: '/check-client-id/'+clientId,
                type: 'get',
                success: function(result){
                    setTimeout(function(){
                        clientIdDiv.parent().removeClass('m-loader m-loader--primary m-loader--right');
                        btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
                        if (result.result == "success") {
                            form.find('#sigin-form-container-after-client-id').html(result.html);
                            form.find('#client_id-check-container .client_id_check-forget_container').fadeOut();
                            clientIdDiv.prop('disabled', true);
                            clientIdDiv.css({'background-color': '#89fbf080'});
                            form.find('#sigin-form-container-after-client-id').fadeIn();
                        } else {
                            showErrorMsg(form, 'danger', 'Incorrect client id. Please try again.');
                        }
                    }, 1000);
                },
                error: function(error){
                    console.log(error);
                }
            });
        });
    }

    var handleForgetPasswordFormSubmit = function() {
        $('#m_login_forget_password_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            form.ajaxSubmit({
                url: '',
                success: function(response, status, xhr, $form) {
                	// similate 2s delay
                	setTimeout(function() {
                		btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false); // remove
	                    form.clearForm(); // clear form
	                    form.validate().resetForm(); // reset validation states

	                    // display signup form
	                    displaySignInForm();
	                    var signInForm = login.find('.m-login__signin form');
	                    signInForm.clearForm();
	                    signInForm.validate().resetForm();

	                    showErrorMsg(signInForm, 'success', 'Cool! Password recovery instruction has been sent to your email.');
                	}, 2000);
                }
            });
        });
    }

    //== Public Functions
    return {
        // public functions
        init: function() {
            handleSignInFormSubmit();
            handleCheckClientIdSubmit();
            handleForgetPasswordFormSubmit();
        }
    };
}();

//== Class Initialization
jQuery(document).ready(function() {
    SnippetLogin.init();
});
