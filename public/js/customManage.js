$(document).on('click', '.m-admin-delete-btn', function(e) {
    e.preventDefault();
    var $this = $(this);
    swal({
        title: 'Are you sure?',
        text: "Do want to delete !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
    }).then(function(result) {
        if (result.value) {
            var current_unique = $this.data('unique_id');
            $.ajax({
                url: '/admin/manage/delete/admin/'+current_unique,
                type: 'get',
                success: function(result){
                    if (result == "role_fail") {
                        swal({
                            "title": "Faild",
                            "text": "Permission denied !.",
                            "type": "error",
                            "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
                        });
                    } else if (result == "find_fail") {
                        swal({
                            "title": "Faild",
                            "text": "Admin Can't find !.",
                            "type": "error",
                            "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
                        });
                        datatable.reload();
                    } else if (result == "success") {
                        swal({
                            "title": "Success",
                            "text": "Admin Deleted !.",
                            "type": "success",
                            "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
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

$(document).on('click', '.m-employee-delete-btn', function(e) {
    e.preventDefault();
    var $this = $(this);
    swal({
        title: 'Are you sure?',
        text: "Do want to delete !",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!'
    }).then(function(result) {
        if (result.value) {
            var current_unique = $this.data('unique_id');
            $.ajax({
                url: '/admin/manage/delete/employee/'+current_unique,
                type: 'get',
                success: function(result){
                    if (result == "find_fail") {
                        swal({
                            "title": "Faild",
                            "text": "Employee Can't find !.",
                            "type": "error",
                            "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
                        });
                        datatable.reload();
                    } else if (result == "success") {
                        swal({
                            "title": "Success",
                            "text": "Employee Deleted !.",
                            "type": "success",
                            "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
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
});
