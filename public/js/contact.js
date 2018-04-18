$('#contact-email-send-form').on('submit', function(e) {
    e.preventDefault();
    console.log("adsfasdf");
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
    submit_btn.addClass('m-loader m-loader--right m-loader--accent').attr('disabled', true);
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function (data) {
            console.log(data);
            if (data == "success") {
                swal({
                    title: 'Success !',
                    text: "Contact Email has been sent",
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonText: "Ok!",
                    confirmButtonClass: "btn m-btn--air btn-outline-accent",
                });
            } else {
                swal({
                    title: 'Failed !',
                    text: "Went Somthing Wrong",
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonText: "Ok!",
                    confirmButtonClass: "btn m-btn--air btn-outline-accent",
                });
            }
            submit_btn.removeClass('m-loader m-loader--right m-loader--accent').attr('disabled', false);
        },
        processData: false,
        contentType: false,
        error: function(data)
       {
           console.log(data);
       }
    });
})
