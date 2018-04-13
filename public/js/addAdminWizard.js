//== Class definition
var WizardDemo = function () {
    //== Base elements
    var wizardEl = $('#m_wizard');
    var formEl = $('#add-new-admin-form');
    var validator;
    var wizard;

    //== Private functions
    var initWizard = function () {
        //== Initialize form wizard
        wizard = wizardEl.mWizard({
            startStep: 1
        });

        //== Validation before going to next page
        wizard.on('beforeNext', function(wizard) {
            if (validator.form() !== true) {
                return false;  // don't go to the next step
            }
        })

        //== Change event
        wizard.on('change', function(wizard) {
            mApp.scrollTop();
            var current_active = wizard.find('.m-build-new-user-profile__tap-li.m-wizard__step--current');
            var margin_left = null;
            var moving_tap_text = "About";
            if (current_active.data('wizard_index') == 1) {
                margin_left = "-4px";
            } else if (current_active.data('wizard_index') == 2) {
                margin_left = "calc(33.33333% - 4px)";
                moving_tap_text = "Password";
            } else if (current_active.data('wizard_index') == 3) {
                margin_left = "calc(66.66666% - 4px)";
                moving_tap_text = "Other";
            }
            if (margin_left != null) {
                $('#add-new-user-moving-tab').html(moving_tap_text);
                $('#add-new-user-moving-tab').css({'left':margin_left});
            }
        });
    }

    var initValidation = function() {
        $('.m_selectpicker').selectpicker();

        validator = formEl.validate({
            //== Validate only visible fields
            ignore: ":hidden",

            //== Validation rules
            rules: {
                //=== Client Information(step 1)
                //== Client details
                username: {
                    required: true,
                    remote: {
                        url: "/admin/manage/username/check",
                        dataFilter: function( data ) {
                            if (data == "new") {
                                return true;
                            } else {
                                return false;
                            }
                        },
                        complete: function( xhr ) {
                            console.log( xhr.responseText )
                        }
                  }
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "/admin/manage/email/check",
                        dataFilter: function( data ) {
                            if (data == "new") {
                                return true;
                            } else {
                                return false;
                            }
                        },
                        complete: function( xhr ) {
                            console.log( xhr.responseText )
                        }
                  }
                },
                first_name: {
                    required: true,
                },
                last_name: {
                    required: true,
                },

                //== Mailing address
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_pass: {
                    equalTo: "#register_new_password"
                },
            },

            //== Validation messages
            messages: {
                'account_communication[]': {
                    required: 'You must select at least one communication option'
                },
                accept: {
                    required: "You must accept the Terms and Conditions agreement!"
                }
            },

            //== Display error
            invalidHandler: function(event, validator) {

            },

            //== Submit valid form
            submitHandler: function (form) {

            }
        });
    }

    var initSubmit = function() {
        var btn = formEl.find('[data-wizard-action="submit"]');

        btn.on('click', function(e) {
            e.preventDefault();

            if (validator.form()) {
                //== See: src\js\framework\base\app.js
                mApp.progress(btn);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
                    }
                });

                var final_form = formEl[0];
                var url = $(final_form).attr( 'action' );

                var formData = new FormData($(final_form)[0]);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        setTimeout(function() {
                            mApp.unprogress(btn);
                            $('#m-admin-add-new-modal').modal('hide');
                            add_user_avatar_cropper.destroy();
                            add_user_avatar_cropper = new Slim(document.getElementById('m-add-new-user__pic-avatar-slim'), {
                                ratio: '1:1',
                                minSize: {
                                    width: 150,
                                    height: 150,
                                },
                                download: false,
                                label: 'Choose Avatar.',
                                statusImageTooSmall:'Image too small. Min Size is $0 pixel. Try again',
                            });
                            final_form.reset();
                            $('#m-admin-add-new-modal').find('.m-build-new-user-profile__tap-li').each(function() {
                                $(this).removeClass('m-wizard__step--current');
                                if ($(this).data('wizard_index') == 1) {
                                    $(this).find('a.m-wizard__step-number').click();
                                }
                            });
                            datatable.reload();
                        }, 500);
                    },
                    processData: false,
                    contentType: false,
                    error: function(data)
                    {
                       console.log(data);
                    }
                });
            }
        });
    }

    return {
        // public functions
        init: function() {
            wizardEl = $('#m_wizard');
            formEl = $('#add-new-admin-form');

            initWizard();
            initValidation();
            initSubmit();
        }
    };
}();

jQuery(document).ready(function() {
    WizardDemo.init();
});
