//== Class definition
var datatable;

var DatatableAutoColumnHideDemo = function() {
  //== Private functions

  // basic demo
  var demo = function() {
    datatable = $('.m_datatable_employee').mDatatable({
      // datasource definition
      data: {
        type: 'remote',
        source: {
			read: {
				url: '/admin/manage/employee/getdatas',
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
          field: 'username',
          title: 'Username',
          width: 300,
          template: function (row, index, datatable) {
              return '\
              <a class="employee-manage-unsername-select" href="/admin/profile/employee/'+row.unique_id+'" target="_blank" title="'+row.username+'">\
              <img src="'+row.avatar+'">\
              <div style="padding-left:10px;display: flex;flex-direction: column;justify-content: center;"><p class="username-text">'+row.first_name+' '+row.last_name+'</p></div>\
              </a>\
              ';
          }
        }, {
          field: 'email',
          title: 'Email',
          width: 300,
        }, {
            field: "Actions",
            width: 80,
            title: i18n.language.action,
            sortable: false,
            overflow: 'visible',
            template: function (row, index, datatable) {
                var dropup = (datatable.getPageSize() - index) <= 4 ? 'dropup' : '';

                return '\
                <a href="/admin/profile/employee/'+row.unique_id+'" target="_blank" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="View ">\
                <i class="la la-edit"></i>\
                </a>\
                <a href="javascript:;" data-unique_id="'+row.unique_id+'" class="m-employee-delete-btn m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="View ">\
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
