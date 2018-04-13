//== Class definition
var DatatableAutoColumnHideDemo = function() {
  //== Private functions

  // basic demo
  var demo = function() {
    var datatable = $('.m_datatable_video').mDatatable({
      // datasource definition
      data: {
        type: 'remote',
        source: {
			read: {
				url: '/admin/manage/video/getdatas',
                method: 'GET',
			},
		},
        pageSize: 10,
      },

      // column sorting
      sortable: true,

      pagination: true,

      toolbar: {
        // toolbar items
        items: {
          // pagination
          pagination: {
            // page size select
            pageSizeSelect: [10, 20, 30, 50, 100],
          },
        },
      },

      search: {
        input: $('#generalSearch'),
      },

      // columns definition
      columns: [
         {
          field: "id",
          title: "#",
          width: 20,
          sortable: false,
          textAlign: 'center',
          selector: {class: 'm-checkbox--solid m-checkbox--brand'}
        }, {
          field: 'video_title',
          title: 'Video Title',
          width: 200,
        }, {
          field: 'vdeo_url',
          title: 'Video Url',
          width: 300,
          template: function(row) {
              return '\
              <a href="https://youtu.be/'+row.video_id+'" target="_blank" title="View ">\
                https://youtu.be/'+row.video_id+'\
              </a>\
              ';
          }
        }, {
          field: 'video_description',
          title: 'Description',
          width: 300
        }, {
            field: "Actions",
            width: 80,
            title: i18n.language.action,
            sortable: false,
            overflow: 'visible',
            template: function (row, index, datatable) {
                var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';

                return '\
                <a href="javascript:;" data-video_id="'+row.id+'" class="m-video-edit-btn m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">\
                <i class="la la-edit"></i>\
                </a>\
                <a href="javascript:;" data-video_id="'+row.id+'" class="m-video-delete-btn m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="View ">\
                <i class="la la-trash"></i>\
                </a>\
                ';
            }
        }],
    });

    $('#m-admin-new_video-form').on('submit', function(e) {
        e.preventDefault();
        var $this = $(this);
        var youtube_url = $("#youtube_url").val()
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
        var match = youtube_url.match(regExp);
        if (match && match[2].length == 11) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
                }
            });
            var form = $this[0];
            var url = $(form).attr( 'action' );

            var formData = new FormData($(form)[0]);
            var submit_btn = $(form).find('.form-submit-btn');
            submit_btn.addClass('m-loader m-loader--right m-loader--success').attr('disabled', true);
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function (data) {
                    submit_btn.removeClass('m-loader m-loader--right m-loader--success').attr('disabled', false);
                    datatable.reload();
                    $('#m-admin-new_video-modal').modal('hide');
                },
                processData: false,
                contentType: false,
                error: function(data)
               {
                   console.log(data);
               }
            });
        } else {
            swal({
                "title": "Alert",
                "text": "Youtebe Url incorrect !.",
                "type": "warning",
                "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
            });
        }
    })

    $(document).on('click', '.m-video-edit-btn', function(e) {
        e.preventDefault();
        var videoId = $(this).data('video_id');
        $.ajax({
            url: '/admin/manage/get-video/'+videoId,
            type: 'get',
            success: function(result){
                if (result != "fail") {
                    var youtube_url = 'https://youtu.be/'+result.video_id;
                    var form = $('#m-admin-edit_video-form');
                    form.find('#video_id_edit').val(result.id);
                    form.find('#_video_title').val(result.video_title);
                    form.find('#_youtube_url').val(youtube_url);
                    form.find('#_video_description').val(result.video_description);
                    $('#m-admin-edit_video-modal').modal('show');
                }
            },
            error: function(error){
                console.log(error);
            }
        });
    })

    $('#m-admin-edit_video-form').on('submit', function(e) {
        e.preventDefault();
        var $this = $(this);
        var youtube_url = $("#_youtube_url").val()
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
        var match = youtube_url.match(regExp);
        if (match && match[2].length == 11) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
                }
            });
            var form = $this[0];
            var url = $(form).attr( 'action' );

            var formData = new FormData($(form)[0]);
            var submit_btn = $(form).find('.form-submit-btn');
            submit_btn.addClass('m-loader m-loader--right m-loader--success').attr('disabled', true);
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function (data) {
                    submit_btn.removeClass('m-loader m-loader--right m-loader--success').attr('disabled', false);
                    datatable.reload();
                    $('#m-admin-edit_video-modal').modal('hide');
                },
                processData: false,
                contentType: false,
                error: function(data)
               {
                   console.log(data);
               }
            });
        } else {
            swal({
                "title": "Alert",
                "text": "Youtebe Url incorrect !.",
                "type": "warning",
                "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
            });
        }
    })

    $(document).on('click', '.m-video-delete-btn', function(e) {
        e.preventDefault();
        var $this = $(this);
        swal({
            title: 'Are you sure?',
            text: "Do want to delete !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            confirmButtonClass: "btn m-btn--air btn-outline-danger",
            cancelButtonClass: "btn m-btn--air btn-outline-accent",
        }).then(function(result) {
            if (result.value) {
                var videoId = $this.data('video_id');
                $.ajax({
                    url: '/admin/manage/delete/video/'+videoId,
                    type: 'get',
                    success: function(result){
                        if (result == "fail") {
                            swal({
                                "title": "Faild",
                                "text": "can not find video !.",
                                "type": "error",
                                "confirmButtonClass": "btn m-btn--air btn-outline-accent"
                            });
                        } else if (result == "success") {
                            swal({
                                "title": "Success",
                                "text": "Video Deleted !.",
                                "type": "success",
                                "confirmButtonClass": "btn m-btn--air btn-outline-accent"
                            });
                            datatable.reload();
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            }
        });
    })
  };

  return {
    // public functions
    init: function() {
      demo();
    },
  };
}();

jQuery(document).ready(function() {
  DatatableAutoColumnHideDemo.init();
});
