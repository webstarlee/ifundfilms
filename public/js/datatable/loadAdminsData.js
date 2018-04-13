//== Class definition
var datatable;

var DatatableAutoColumnHideDemo = function() {
  //== Private functions

  // basic demo
  var demo = function() {
    datatable = $('.m_datatable').mDatatable({
      // datasource definition
      data: {
        type: 'remote',
        source: {
			read: {
				url: '/admin/manage/admins/getdatas',
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
        },
        {
          field: 'username',
          title: 'UnserName',
          width: 150,
          template: '<a href="/admin/profile/admin/{{unique_id}}" target="_blank">{{username}}</a>'
        }, {
          field: 'first_name',
          title: 'Full Name',
          width: 150,
          responsive: {visible: 'lg'},
        }, {
          field: 'last_name',
          title: 'SurName',
          width: 150,
          responsive: {visible: 'lg'},
        },{
          field: 'birth',
          title: 'Birthday',
          width: 150,
          responsive: {visible: 'lg'},
        }, {
          field: 'role',
          title: 'User Role',
          width: 150,
          responsive: {visible: 'lg'},
          template: function (row, index, datatable) {
              var user_rol_txt = "Super Admin";
              if (row.role == 3) {
                  user_rol_txt = "Super Admin";
              } else if (row.role == 2) {
                  user_rol_txt = "CEO";
              } else if (row.role == 1) {
                  user_rol_txt = "Superior";
              } else {
                  user_rol_txt = "HR/Accountant";
              }
              return user_rol_txt;
          }
        }, {
            field: "Actions",
            width: 80,
            title: "Actions",
            sortable: false,
            overflow: 'visible',
            template: function (row, index, datatable) {
                var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';

                return '\
                <a href="/admin/profile/admin/'+row.unique_id+'" target="_blank" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">\
                <i class="la la-edit"></i>\
                </a>\
                <a href="javascript:;" data-unique_id="'+row.unique_id+'" class="m-admin-delete-btn m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="View ">\
                <i class="la la-trash"></i>\
                </a>\
                ';
            }
        }],
    });

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
