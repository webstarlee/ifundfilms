var selecte_admin_unique_id = null;

toastr.options = {
    "closeButton": true,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

$('#m-user-profile__pic-change-btn').on('click', function(e) {
    e.preventDefault();
    selecte_admin_unique_id = $(this).data('admin_unique_id');
    $('#user-profile__pic-change-modal').modal('show');
});

$('#m-user-profile__cover-pic-change-btn').on('click', function(e) {
    e.preventDefault();
    selecte_admin_unique_id = $(this).data('admin_unique_id');
    $('#user-profile__cover-pic-change-modal').modal('show');
});

$('#m-user__pic-avatar-upload-form').on('submit', function(e) {
    e.preventDefault();
    var $this = $(this);
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
        }
    });
    var form = $this[0];
    var url = $(form).attr( 'action' );

    var formData = new FormData($(form)[0]);
    var submit_btn = $(form).find('.form-submit-btn');
    submit_btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function (data) {
            // console.log(data);
            submit_btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
            if (data == "fail") {
                toastr["error"]("Went something Wrong !", "");
            } else if (data == "role_fail") {
                toastr["error"]("Permision Deinied !", "");
            } else {
                if (data == "validator" || data == "image") {
                    toastr["error"]("Image not Correct!", "");
                } else {
                    $('#user-profile__pic-change-modal').modal('hide');

                    setTimeout(function() {
                        if (selecte_admin_unique_id != null) {
                            $('.m-'+selecte_admin_unique_id+'-profile-avatar').each(function() {
                                $(this).attr('src', data);
                            });

                            toastr["success"]("Avatar Updated!", "");

                            selecte_admin_unique_id = null;
                        }
                        resetAvatarCropper();
                    }, 500);
                }
            }
        },
        processData: false,
        contentType: false,
        error: function(data)
       {
           console.log(data);
       }
    });
});

$('#m-user__pic-cover-upload-form').on('submit', function(e) {
    e.preventDefault();
    var $this = $(this);
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
        }
    });
    var form = $this[0];
    var url = $(form).attr( 'action' );

    var formData = new FormData($(form)[0]);
    var submit_btn = $(form).find('.form-submit-btn');
    submit_btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function (data) {
            submit_btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);
            if (data == "fail") {
                toastr["error"]("Went something wrong!", "");
            }else if (data == "role_fail") {
                toastr["error"]("Permision Deinied !", "");
            } else {
                if (data == "validator" || data == "image") {
                    toastr["error"]("Image not Correct!", "");
                } else {
                    $('#user-profile__cover-pic-change-modal').modal('hide');

                    setTimeout(function() {
                        if (selecte_admin_unique_id != null) {
                            $('.m-'+selecte_admin_unique_id+'-profile-cover').each(function() {
                                $(this).css({'background-image': 'url('+data+')', 'background-position':'center', 'background-size':'cover', 'background-repeat': 'no-repeat'});
                            });

                            toastr["success"]("Cover photo Updated!", "");

                            selecte_admin_unique_id = null;
                        }
                        resetCoverCropper();
                    }, 500);
                }
            }
        },
        processData: false,
        contentType: false,
        error: function(data)
       {
           console.log(data);
       }
    });
});

function resetAvatarCropper() {
    user_avatar_cropper.destroy();
    setTimeout(function() {
        user_avatar_cropper = new Slim(document.getElementById('m-user__pic-avatar-slim'), {
            ratio: '1:1',
            minSize: {
                width: 150,
                height: 150,
            },
            download: false,
            label: 'Drop your image here or Click.',
            statusImageTooSmall:'Image too small. Min Size is $0 pixel. Try again',
        });
    }, 500)
}

function resetCoverCropper() {
    user_cover_cropper.destroy();
    setTimeout(function() {
        user_cover_cropper = new Slim(document.getElementById('m-user__pic-cover-slim'), {
            ratio: '5:3',
            minSize: {
                width: 250,
                height: 100,
            },
            download: false,
            label: 'Drop your image here or Click.',
            statusImageTooSmall:'Image too small. Min Size is $0 pixel. Try again',
        });
    }, 500)
}

$('#profile_unique_info_form input').each(function(){
    $(this).on('keydown', function(e) {
        $('#profile_unique_info_form_submit-btn').attr('disabled', true);
    })
});

$('#profile_unique_info_form_submit-btn').on('click', function(e) {
    e.preventDefault();
    var form = $('#profile_unique_info_form')[0];
    submitable_count = 0;
    console.log(form);
    $(form).find('input.m-input').each(function() {
        var check_require = $(this).prop('required');
        if (check_require == false) {
            console.log(check_require);
            submitable_count += 1;
        }
    });

    console.log(submitable_count);

    if (submitable_count == 0) {
        $(form).submit();
    }else {
        console.log("not available");
    }
})

$('input[name=unique_username]').on('change', function(e) {
    e.preventDefault();
    var current_input = $(this);
    var new_username = $(this).val();
    var old_username = $(this).data('origine_username');
    current_input.parent().parent().removeClass('has-danger has-success');
    current_input.prop('required', false);
    if (new_username != old_username && new_username != "") {
        current_input.parent().addClass('m-loader m-loader--primary m-loader--right');
        $.ajax({
            url: '/profile/username/validater/'+new_username,
            type: 'get',
            success: function(result){
                if (result == "new") {
                    var html = '<div class="form-control-feedback">Username available</div>';
                    $result_msg = $(html);
                    current_input.prop('required', true);
                    setTimeout(function(){
                        current_input.parent().parent().addClass('has-success');
                        current_input.parent().removeClass('m-loader m-loader--primary m-loader--right');
                        $('#profile_unique_info_form_submit-btn').attr('disabled', false);
                        current_input.parent().after($result_msg);
                    }, 1000);

                    setTimeout(function() {
                        $result_msg.remove();
                    }, 3000);
                } else if (result == "exist") {
                    var html = '<div class="form-control-feedback">Username already taken.</div>';
                    $result_msg = $(html);
                    setTimeout(function(){
                        current_input.parent().parent().addClass('has-danger');
                        current_input.parent().removeClass('m-loader m-loader--primary m-loader--right');
                        $('#profile_unique_info_form_submit-btn').attr('disabled', false);
                        current_input.parent().after($result_msg);
                    }, 1000);

                    setTimeout(function() {
                        $result_msg.remove();
                    }, 3000);
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }
});

$('input[name=unique_email]').on('change', function(e) {
    e.preventDefault();
    var current_input = $(this);
    var new_email = $(this).val();
    var result_check = validateEmail(new_email);
    var old_email = $(this).data('origine_email');
    current_input.parent().parent().removeClass('has-danger has-success');

    if (result_check == false) {
        var html = '<div class="form-control-feedback">Incorrect Email</div>';
        $result_msg = $(html);
        current_input.parent().parent().addClass('has-danger');
        current_input.parent().after($result_msg);

        setTimeout(function() {
            $result_msg.fadeOut(500);
            setTimeout(function(){
                $result_msg.remove();
            }, 600);
        }, 3000);
    }
    current_input.prop('required', false);
    if (result_check && new_email != old_email) {
        current_input.parent().addClass('m-loader m-loader--primary m-loader--right');
        $.ajax({
            url: '/profile/email/validater/'+new_email,
            type: 'get',
            success: function(result){
                if (result == "new") {
                    var html = '<div class="form-control-feedback">Email available</div>';
                    $result_msg = $(html);
                    current_input.prop('required', true);
                    setTimeout(function(){
                        current_input.parent().parent().addClass('has-success');
                        current_input.parent().removeClass('m-loader m-loader--primary m-loader--right');
                        $('#profile_unique_info_form_submit-btn').attr('disabled', false);
                        current_input.parent().after($result_msg);
                    }, 1000);

                    setTimeout(function() {
                        $result_msg.remove();
                    }, 3000);
                } else if (result == "exist") {
                    var html = '<div class="form-control-feedback">Email already taken.</div>';
                    $result_msg = $(html);
                    setTimeout(function(){
                        current_input.parent().parent().addClass('has-danger');
                        current_input.parent().removeClass('m-loader m-loader--primary m-loader--right');
                        $('#profile_unique_info_form_submit-btn').attr('disabled', false);
                        current_input.parent().after($result_msg);
                    }, 1000);

                    setTimeout(function() {
                        $result_msg.remove();
                    }, 3000);
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    }
});

$('#m-user-profile-pass-change__own-form input[name=confirm_pass]').on('keyup', function(e) {
    var newpass = $('#m-user-profile-pass-change__own-form input[name=password]').val();
    if ($(this).val() == newpass) {
        $(this).css({'border-color': '#ebedf2'});
    } else {
        $(this).css({'border-color': '#f52525'});
    }
})

$('#m-user-profile-pass-change__own-form').on('submit', function(e) {
    e.preventDefault();
    var form = $(this)[0];
    var newPassword = $(form).find('input[name=password]').val();
    var confirmPassword = $(form).find('input[name=confirm_pass]').val();
    if (newPassword == confirmPassword && newPassword.length >= 6) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
            }
        });
        var url = $(form).attr( 'action' );

        var formData = new FormData($(form)[0]);
        var submit_btn = $(form).find('button[type=submit]');
        submit_btn.addClass('m-loader m-loader--success m-loader--right').attr('disabled', true);

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function (data) {
                setTimeout(function() {
                    submit_btn.removeClass('m-loader m-loader--success m-loader--right').attr('disabled', false);
                    form.reset();
                    if (data == "fail") {
                        toastr["error"]("Can't Update password!", "");
                    } else if (data == "success") {
                        toastr["success"]("Password Updated !", "");
                    } else if (data == "invalidPass") {
                        toastr["error"]("Current password Incorrect !", "");
                    }
                }, 1000)
            },
            processData: false,
            contentType: false,
            error: function(data) {
               console.log(data);
           }
       });
    } else {
        $(form).find('input[name=confirm_pass]').css({'border-color': '#b50101'});
    }
});

$('#m-user-profile-pass-change__force').on('submit', function(e) {
    e.preventDefault();
    var form = $(this)[0];
    var newPassword = $(form).find('input[name=force_password]').val();
    var confirmPassword = $(form).find('input[name=force_confirm_pass]').val();
    if (newPassword == confirmPassword && newPassword.length >= 6) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
            }
        });
        var url = $(form).attr( 'action' );

        var formData = new FormData($(form)[0]);
        var submit_btn = $(form).find('button[type=submit]');
        submit_btn.addClass('m-loader m-loader--success m-loader--right').attr('disabled', true);

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function (data) {
                console.log(data);
                setTimeout(function() {
                    submit_btn.removeClass('m-loader m-loader--success m-loader--right').attr('disabled', false);
                    form.reset();
                    if (data == "fail") {
                        toastr["error"]("Can't Update password!", "");
                    } else if (data == "success") {
                        toastr["success"]("Password Updated !", "");
                    }
                }, 1000)
            },
            processData: false,
            contentType: false,
            error: function(data) {
               console.log(data);
           }
       });
    } else {
        $(form).find('input[name=confirm_pass]').css({'border-color': '#b50101'});
    }
});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
