var hrSystemSetting = function () {

    //== Private functions
    var start_js = function () {
        // minimum setup
        $('.break-time-picker').timepicker();

        $('#company-logo__pic-change-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this)[0];
            var url = $(form).attr( 'action' );

            var formData = new FormData($(form)[0]);
            var submit_btn = $(form).find('.form-submit-btn');
            submit_btn.addClass('m-loader m-loader--right m-loader--primary').attr('disabled', true);
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function (data) {
                    submit_btn.removeClass('m-loader m-loader--right m-loader--primary').attr('disabled', false);
                    if (data == "fail") {
                        toastr["error"]("Went something wrong!", "");
                    }else if (data == "role_fail") {
                        toastr["error"]("Permision Deinied !", "");
                    } else {
                        if (data == "validator" || data == "image") {
                            toastr["error"]("Image not Correct!", "");
                        } else {
                            console.log(data);
                            $('#company-logo__pic-change-modal').modal('hide');

                            setTimeout(function() {
                                $('.company-main-logo-img').each(function() {
                                    $(this).attr('src', data);
                                });

                                toastr["success"]("Logo image Updated!", "");
                                company_logo_cropper.destroy();
                                company_logo_cropper = new Slim(document.getElementById('company-logo__pic-slim'), {
                                    minSize: {
                                        width: 10,
                                        height: 10,
                                    },
                                    download: false,
                                    label: 'Choose Logo.',
                                    statusImageTooSmall:'Image too small. Min Size is $0 pixel. Try again',
                                });
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

        $('#company-fav__pic-change-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this)[0];
            var url = $(form).attr( 'action' );

            var formData = new FormData($(form)[0]);
            var submit_btn = $(form).find('.form-submit-btn');
            submit_btn.addClass('m-loader m-loader--right m-loader--primary').attr('disabled', true);
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function (data) {
                    submit_btn.removeClass('m-loader m-loader--right m-loader--primary').attr('disabled', false);
                    if (data == "fail") {
                        toastr["error"]("Went something wrong!", "");
                    }else if (data == "role_fail") {
                        toastr["error"]("Permision Deinied !", "");
                    } else {
                        if (data == "validator" || data == "image") {
                            toastr["error"]("Image not Correct!", "");
                        } else {
                            console.log(data);
                            $('#company-fav__pic-change-modal').modal('hide');

                            setTimeout(function() {
                                $('.company-fav-logo-img').each(function() {
                                    $(this).attr('src', data);
                                });

                                var current_fav = $(document).find("link[rel*='icon']");
                                current_fav.attr('href', data);
                                // console.log(current_fav);

                                toastr["success"]("Logo image Updated!", "");
                                company_fav_cropper.destroy();
                                company_fav_cropper = new Slim(document.getElementById('company-fav__pic-slim'), {
                                    minSize: {
                                        width: 10,
                                        height: 10,
                                    },
                                    download: false,
                                    label: 'Choose Logo.',
                                    statusImageTooSmall:'Image too small. Min Size is $0 pixel. Try again',
                                });
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

        $('#company-name__title-change-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this)[0];
            var url = $(form).attr( 'action' );

            var formData = new FormData($(form)[0]);
            var submit_btn = $(form).find('.form-submit-btn');
            submit_btn.addClass('m-loader m-loader--right m-loader--primary').attr('disabled', true);
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function (data) {
                    submit_btn.removeClass('m-loader m-loader--right m-loader--primary').attr('disabled', false);
                    var current_name = $(form).find('input[name=company_name]').val();
                    $('#hr-system-company-name').text(current_name);
                    var old_title = document.title;
                    var current_page_title = old_title.split("|")[1].trim();
                    document.title = current_name+" | "+current_page_title;
                    $('#company-name__title-change-modal').modal('hide');
                },
                processData: false,
                contentType: false,
                error: function(data)
               {
                   console.log(data);
               }
            });
        });
    }

    return {
        // public functions
        init: function() {
            start_js();
        }
    };
}();

jQuery(document).ready(function() {
    hrSystemSetting.init();
});
