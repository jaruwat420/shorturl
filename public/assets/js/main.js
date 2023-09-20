pdfMake.fonts = {
    THSarabun: {
      normal: 'THSarabun.ttf',
      bold: 'THSarabun-Bold.ttf',
      italics: 'THSarabun-Italic.ttf',
      bolditalics: 'THSarabun-BoldItalic.ttf'
    }
 }

// $(document).ready(function () {
    // $.fn.dataTable.moment('{{ $sort }}');
    // $.fn.dataTable.moment('{{ $sort }} HH:mm');
    // $.fn.DataTable.ext.pager.numbers_length = 3;

    var buttonSettings = function ($dataTable, type) {
        var $columns = $('thead th:not(.dt-no-export)', $dataTable);

        return {
            extend: type + 'Html5',
            exportOptions: {
                columns: $columns
            }
        };
    };

    $.fn.dataTable.ext.errMode = 'none';
    $.extend( true, $.fn.dataTable.defaults, {
    buttons: [
        // {
        //     "bom": true,
        //     charset: 'UTF-8',
        //     extend: 'csvHtml5',
        //     text: '<i class="fas fa-download"></i> CSV',
        //     titleAttr: 'CSV',
        //     className:'btn-warning btn-sm',
        // },
        {
            "bom": true,
            charset: 'UTF-8',
            extend: 'excelHtml5',
            text: '<i class="fas fa-download"></i> EXCEL',
            titleAttr: 'EXCEL',
            className:'btn-success btn-rounded btn-sm',
            exportOptions: {
                columns: ':not(.no_export)',
            }
        },
        {
            "bom": true,
            charset: 'UTF-8',
            extend: 'pdfHtml5',
            text: '<i class="fas fa-download"></i> PDF',
            titleAttr: 'PDF',
            className:'btn-danger btn-rounded btn-sm',
            orientation: 'landscape',
            pageSize: 'LEGAL',
            exportOptions: {
                columns: ':not(.no_export)',
            },
            "customize":function(doc){
                doc.defaultStyle = {
                    font:'THSarabun',
                    fontSize:12,
                };
            }
        },
    ],
    "processing": true,
    "deferRender": true,
    "autoWidth": false,
    searching: false,
    dom: '<"row mb-2" <"col-md-3"l><"col-md-9 text-right"<"margin-left-10"B><f>> > tip',
    // "pagingType": "full_numbers",
    // "pageLength": {{ get_option('rows_per_table') }},
    // "language": {
    //             "processing": "@langapp('processing') ",
    //             "loadingRecords": "@langapp('loading') ",
    //             "lengthMenu": "@langapp('show_entries') ",
    //             "emptyTable": "@langapp('empty_table') ",
    //             "info": "@langapp('pagination_info') ",
    //             "infoEmpty": "@langapp('pagination_empty') ",
    //             "infoFiltered": "@langapp('pagination_filtered') ",
    //             "infoPostFix": "",
    //             "search": "@langapp('search') :",
    //             "url": "",
    //             "paginate": {
    //                 "first": "@langapp('first') ",
    //                 "previous": "@langapp('previous') ",
    //                 "next": "@langapp('next') ",
    //                 "last": "@langapp('last') "
    //             },
    //         },
    // "ordering": [],
    // "columnDefs": [{
    //             "targets": ["no-sort"]
    //             , "orderable": false
    //         }, {
    //             "targets": ["hide"],
    //             "visible": false
    //         }, {
    //             "targets": ["col-date"],
    //             "type": "date"
    //         }, {
    //             "targets": ["col-currency"]
    //             , "type": "num-fmt"
    //         }]
    } );
// });


// Select2
$(document).ready(function(){
    $('.select2').select2({
        width:'100%',
    })
});

// Date
$(function() {

    $('.daterangetime').daterangepicker({
        timePicker: true,
        startDate: moment().startOf('hour'),
        endDate: moment().startOf('hour').add(32, 'hour'),
        locale: {
        format: 'M/DD hh:mm A'
        }
    });

    $('.datetime').datepicker({
        format: "yyyy-mm-dd"
    }).datepicker('setDate', new Date());

    $('.datetime_edit').datepicker({
        format: "yyyy-mm-dd"
    });

    $('.datetime_custom').datepicker({
        format: "yyyy-mm-dd",
        maxDate: new Date()
    }).datepicker('setDate', new Date());

    $('.datetime_format').datepicker({
        format: "yyyy-mm-dd"
    }).datepicker('setDate', new Date());

    day_one();
    $('.seach_date_end').datetimepicker({
        defaultDate: new Date(),
        format:'YYYY-MM-DD',
        minDate : $('.datetime_first_day').val(),
    });

    $('.datetime_first_day').on('dp.change', function(e){
        $('.seach_date_end').datetimepicker("destroy");
        $('.seach_date_end').datetimepicker({
            format:'YYYY-MM-DD',
            minDate : $('.datetime_first_day').val(),
            maxDate: new Date(),
        });
    });

    // Report Date Format
    $('.report_datetime_first_day').datetimepicker({
        defaultDate: new Date(),
        format:'DD-MM-YYYY',
        maxDate: new Date(),
    });

    $('.report_seach_date_end').datetimepicker({
        defaultDate: new Date(),
        format:'DD-MM-YYYY',
    });

    // $('.report_datetime_first_day').on('dp.change', function(e){
    //     $('.report_seach_date_end').datetimepicker("destroy");
    //     $('.report_seach_date_end').datetimepicker({
    //         format:'DD-MM-YYYY',
    //         minDate : $('.report_datetime_first_day').val(),
    //         maxDate: new Date(),
    //     });
    // });

});

$('.dateyear').datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
}).datepicker('setDate', new Date());

$.extend(true, $.fn.datetimepicker.defaults, {
    icons: {
        time: 'far fa-clock',
        date: 'far fa-calendar',
        up: 'fas fa-arrow-up',
        down: 'fas fa-arrow-down',
        previous: 'fas fa-chevron-left',
        next: 'fas fa-chevron-right',
        today: 'fas fa-calendar-check',
        clear: 'far fa-trash-alt',
        close: 'far fa-times-circle'
    }
});

$('.modal').modal({
    backdrop: 'static',
    keyboard: false,
    show: false,
})

function convert_datetime_ddmmyyyy_to_yyyymmdd(datetime_ddmmyyyy){
    if (datetime_ddmmyyyy) {
        const datetime_ddmmyyyy_list = datetime_ddmmyyyy.split("-");
        return datetime_ddmmyyyy_list[2]+'-'+datetime_ddmmyyyy_list[1]+'-'+datetime_ddmmyyyy_list[0];
    } else {
        return '';
    }
}

function convert_datetime_yyyymmdd_to_ddmmyyyy(datetime_yyyymmdd){
    if (datetime_yyyymmdd) {
        const datetime_yyyymmdd_list = datetime_yyyymmdd.split("-");
        return datetime_yyyymmdd_list[2]+'-'+datetime_yyyymmdd_list[1]+'-'+datetime_yyyymmdd_list[0];
    } else {
        return '';
    }
}

//ใส่ได้แต่ตัวเลข
function input_number(id){
    $(id).keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
}

//เลือกวันแรกของเดือน
function day_one(){

    var d = new Date();
    var currMonth = d.getMonth();
    var currYear = d.getFullYear();
    var startDate = new Date(currYear, currMonth, 1);

    $(".datetime_first_day").datetimepicker({
        format:'YYYY-MM-DD',
        date : startDate,
        maxDate: new Date(),
    });
}

// Toast
function toastSuccess(message){
    toastr.success(message);
}

function toastWarning(message){
    toastr.warning(message);
}
function toastError(message){
    toastr.error(message);
}

$(document).ready(function(){
    $('body').on('hidden.bs.modal', function () {
        if($('.modal.show').length > 0)
        {
            $('body').addClass('modal-open');
            console.log('active')
        }
    });
});

// Function -> Number Format Ceil
function number_format_ceil(number) {
    let value = Math.ceil(number);
    return value;
}

// Function -> Number Format Int
function number_format_int(number) {
    let value = parseInt(number).toFixed();
    return value;
}

// Number With Commas
function numberWithCommas(x) {
    return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
}
